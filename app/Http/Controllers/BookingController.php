<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Mostra la pagina di prenotazione.
     */
    public function create()
    {
        return view('booking.create');
    }

    /**
     * Salva una nuova prenotazione.
     */
    public function store(Request $request)
    {
        // Validazione dei dati inseriti dall'utente
        $data = $request->validate([
            'guest_first_name' => 'required|string|max:255',
            'guest_last_name'  => 'required|string|max:255',
            'guest_email'      => 'required|email|max:255',
            'room_name'        => 'required|in:Green Room,Pink Room,Gray Room',
            'check_in'         => 'required|date|after_or_equal:today',
            'check_out'        => 'required|date|after:check_in',
        ]);

        // Verifica sovrapposizione con prenotazioni esistenti
        $overlap = Booking::where('room_name', $data['room_name'])
            ->where(function ($query) use ($data) {
                $query->whereBetween('check_in', [$data['check_in'], $data['check_out']])
                    ->orWhereBetween('check_out', [$data['check_in'], $data['check_out']])
                    ->orWhere(function ($query) use ($data) {
                        $query->where('check_in', '<=', $data['check_in'])
                                ->where('check_out', '>=', $data['check_out']);
                        });
            })
            ->exists();

        if ($overlap) {
            return back()->withErrors([
                'check_in' => 'Le date selezionate non sono disponibili per questa camera.',
            ])->withInput();
        }

        // Calcolo del numero di notti
        $notti = Carbon::parse($data['check_in'])->diffInDays(Carbon::parse($data['check_out']));

        // Tariffe per camera
        $prezzo_per_notte = match ($data['room_name']) {
            'Green Room' => 120,
            'Pink Room'  => 110,
            'Gray Room'  => 115,
            default      => 100,
        };

        // Calcolo totale
        $data['price'] = $notti * $prezzo_per_notte;

        // Salvataggio nel database
        Booking::create($data);

        return redirect()->route('booking.create')->with('success', 'Prenotazione effettuata con successo!');
    }

    /**
     * Restituisce un array di date già prenotate per una camera.
     */
    public function getBookedDates($room)
    {
        $bookings = Booking::where('room_name', $room)->get(['check_in', 'check_out']);

        $dates = [];

        foreach ($bookings as $booking) {
            $current = Carbon::parse($booking->check_in);
            $end = Carbon::parse($booking->check_out);
            while ($current < $end) {
                $dates[] = $current->format('Y-m-d');
                $current->addDay();
            }
        }

        return response()->json($dates);
    }
}
