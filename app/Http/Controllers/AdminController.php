<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Booking;
use Carbon\CarbonPeriod;
use App\Mail\BookingUpdated;
use Illuminate\Http\Request;
use App\Mail\BookingCancelled;
use App\Mail\BookingConfirmed;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totali = [
            'tutte' => Booking::count(),
            'in_attesa' => Booking::where('status', 'in_attesa')->count(),
            'confermate' => Booking::where('status', 'confermata')->count(),
            'annullate' => Booking::where('status', 'annullata')->count(),
        ];


    $prenotazioni = Booking::where('status', 'confermata')->get()->map(function ($booking) {
        return [
            'title' => $booking->room_name,
            'start' => Carbon::parse($booking->check_in)->format('Y-m-d') . 'T14:00:00',
            'end' => Carbon::parse($booking->check_out)->format('Y-m-d') . 'T10:00:00',
            'allDay' => false, //  Attenzione: serve false per gestire gli orari
            'color' => match ($booking->room_name) {
                'Pink Room' => '#e83e8c',
                'Green Room' => '#28a745',
                'Gray Room' => '#6c757d',
                default => '#007bff'
            },
        ];
    });




        return view('admin.dashboard', compact('totali', 'prenotazioni'));
    }


    public function prenotazioni()
    {
        $prenotazioni = Booking::orderBy('created_at', 'desc')->get();
        return view('admin.prenotazioni', compact('prenotazioni'));
    }

    public function updatePrenotazione(Request $request, Booking $prenotazione)
    {
        $azione = $request->input('action');

        if ($azione === 'conferma') {
            $prenotazione->status = 'confermata';
            $prenotazione->save();

            Mail::to($prenotazione->guest_email)->send(new BookingConfirmed($prenotazione));

            return redirect()->back()->with('success', 'Prenotazione confermata con successo.');
        }

        if ($azione === 'annulla') {
            $prenotazione->status = 'annullata';
            $prenotazione->save();

            Mail::to($prenotazione->guest_email)->send(new BookingCancelled($prenotazione));

            return redirect()->back()->with('success', 'Prenotazione annullata.');
        }

        return redirect()->back()->with('error', 'Azione non valida.');
    }

    public function edit(Booking $prenotazione)
    {
        $bookedDates = Booking::where('room_name', $prenotazione->room_name)
            ->where('id', '!=', $prenotazione->id)
            ->whereIn('status', ['confermata', 'in_attesa'])
            ->get()
            ->flatMap(function ($booking) {
                return collect(CarbonPeriod::create(
                    Carbon::parse($booking->check_in),
                    Carbon::parse($booking->check_out)->subDay()
                ))->map(fn ($date) => $date->format('Y-m-d'));
            })->unique()->values();

        return view('booking.edit', compact('prenotazione', 'bookedDates'));
    }

    public function update(Request $request, Booking $prenotazione)
    {
        $request->validate([
            'room_name'  => 'required|in:Green Room,Pink Room,Gray Room',
            'check_in'   => 'required|date_format:d-m-Y',
            'check_out'  => 'required|date_format:d-m-Y|after:check_in',
            'guests'     => 'required|integer|min:1|max:3',
        ]);

        $checkIn = Carbon::createFromFormat('d-m-Y', $request->check_in);
        $checkOut = Carbon::createFromFormat('d-m-Y', $request->check_out);

        $overlap = Booking::where('room_name', $request->room_name)
            ->where('id', '!=', $prenotazione->id)
            ->where('status', '!=', 'annullata')
            ->where(function ($query) use ($checkIn, $checkOut) {
                $query->where('check_in', '<', $checkOut->format('Y-m-d'))
                    ->where('check_out', '>', $checkIn->format('Y-m-d'));
            })->exists();

        if ($overlap) {
            return back()->withErrors([
                'check_in' => 'Le date selezionate sono già occupate per questa camera.',
            ])->withInput();
        }

        function determinareStagione($date)
        {
            $dataStr = $date->format('m-d');

            $alta = [
                ['01-01', '01-06'], ['04-01', '04-10'], ['04-11', '04-30'],
                ['05-01', '05-31'], ['06-01', '06-30'], ['07-01', '07-31'],
                ['08-01', '08-25'], ['09-01', '09-30'], ['10-01', '10-20'],
                ['11-01', '11-03'], ['12-21', '12-31']
            ];

            $media = [
                ['03-01', '03-31'], ['08-26', '08-31'], ['10-21', '10-31']
            ];

            foreach ($alta as [$start, $end]) {
                if ($dataStr >= $start && $dataStr <= $end) return 'alta';
            }
            foreach ($media as [$start, $end]) {
                if ($dataStr >= $start && $dataStr <= $end) return 'media';
            }

            return 'bassa';
        }

        $prezzi = [
            'Green Room' => ['bassa' => 125, 'media' => 160, 'alta' => 185],
            'Gray Room'  => ['bassa' => 125, 'media' => 160, 'alta' => 185],
            'Pink Room'  => ['bassa' => 115, 'media' => 150, 'alta' => 175],
        ];

        $totale = 0;
        for ($date = $checkIn->copy(); $date < $checkOut; $date->addDay()) {
            $stagione = determinareStagione($date);
            $base = $prezzi[$request->room_name][$stagione];

            if ($request->room_name === 'Pink Room') {
                if ($request->guests == 1) $base *= 0.90;
            } else {
                if ($request->guests == 1) {
                    $base *= 0.90;
                } elseif ($request->guests == 3) {
                    $base += 50;
                }
            }

            $totale += $base;
        }

        $prenotazione->update([
            'room_name' => $request->room_name,
            'check_in' => $checkIn->format('Y-m-d'),
            'check_out' => $checkOut->format('Y-m-d'),
            'guests' => $request->guests,
            'price' => round($totale, 2),
        ]);
        
        Mail::to($prenotazione->guest_email)->send(new BookingUpdated($prenotazione));
        return redirect()->route('admin.prenotazioni')->with('success', 'Prenotazione aggiornata con successo.');
    }
}
