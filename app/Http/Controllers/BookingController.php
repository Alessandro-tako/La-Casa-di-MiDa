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
        $data = $request->validate([
            'guest_first_name' => 'required|string|max:255',
            'guest_last_name'  => 'required|string|max:255',
            'guest_email'      => 'required|email|max:255',
            'guest_address_street' => 'required|string|max:255',
            'guest_address_city'   => 'required|string|max:255',
            'guest_address_country'=> 'required|string|max:255',
            'guest_address_zip'    => 'required|string|max:20',
            'room_name'        => 'required|in:Green Room,Pink Room,Gray Room',
            'check_in'         => 'required|date|after_or_equal:today',
            'check_out'        => 'required|date|after:check_in',
            'guests'           => 'required|integer|min:1|max:3',
        ]);

        // Impedisce prenotazioni con 0 notti
        $notti = Carbon::parse($data['check_in'])->diffInDays(Carbon::parse($data['check_out']));
        if ($notti < 1) {
            return back()->withErrors(['check_in' => 'La durata minima del soggiorno è di almeno una notte.'])->withInput();
        }

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

        // Funzione per determinare la stagione
        function determinareStagione($date)
        {
            $month = $date->month;
            $day = $date->day;

            $alta = [
                ['01-01', '01-06'], ['04-01', '04-10'], ['04-11', '04-30'],
                ['05-01', '05-31'], ['06-01', '06-30'], ['07-01', '07-31'],
                ['08-01', '08-25'], ['09-01', '09-30'], ['10-01', '10-20'],
                ['11-01', '11-03'], ['12-21', '12-31']
            ];

            $media = [
                ['03-01', '03-31'], ['08-26', '08-31'], ['10-21', '10-31']
            ];

            $bassa = [
                ['01-07', '02-28'], ['11-04', '11-30'], ['12-01', '12-20']
            ];

            $dataStr = $date->format('m-d');

            foreach ($alta as [$start, $end]) {
                if ($dataStr >= $start && $dataStr <= $end) return 'alta';
            }
            foreach ($media as [$start, $end]) {
                if ($dataStr >= $start && $dataStr <= $end) return 'media';
            }
            return 'bassa';
        }

        // Prezzi per camera e stagione
        $prezzi = [
            'Green Room' => ['bassa' => 125, 'media' => 160, 'alta' => 185],
            'Gray Room'  => ['bassa' => 125, 'media' => 160, 'alta' => 185],
            'Pink Room'  => ['bassa' => 115, 'media' => 150, 'alta' => 175],
        ];

        $totale = 0;
        $checkin = Carbon::parse($data['check_in']);
        $checkout = Carbon::parse($data['check_out']);

        for ($date = $checkin->copy(); $date < $checkout; $date->addDay()) {
            $stagione = determinareStagione($date);
            $base = $prezzi[$data['room_name']][$stagione];

            // Modifiche per numero ospiti
            if ($data['room_name'] === 'Pink Room') {
                if ($data['guests'] === 1) $base *= 0.90; // -10%
            } else { // Green o Gray
                if ($data['guests'] === 1) {
                    $base *= 0.90;
                } elseif ($data['guests'] === 3) {
                    $base += 50;
                }
            }

            $totale += $base;
        }

        $data['price'] = round($totale, 2);

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
