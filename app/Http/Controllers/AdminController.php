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
                'allDay' => false,
                'color' => match ($booking->room_name) {
                    'Pink Room' => '#e83e8c',
                    'Green Room' => '#28a745',
                    'Grey Room' => '#6c757d',
                    default => '#007bff'
                },
            ];
        });

        return view('admin.dashboard', compact('totali', 'prenotazioni'));
    }

    public function prenotazioni(Request $request)
    {
        $query = Booking::query();

        if ($request->filled('search')) {
            $results = Booking::search($request->search)->get();

            if ($request->filled('sort')) {
                $results = match ($request->input('sort')) {
                    'id_asc' => $results->sortBy('id'),
                    'id_desc' => $results->sortByDesc('id'),
                    'checkin_asc' => $results->sortBy('check_in'),
                    'checkin_desc' => $results->sortByDesc('check_in'),
                    default => $results,
                };
            }

            $results->transform(function ($booking) {
                $today = now();
                $checkin = Carbon::parse($booking->check_in);
                $checkout = Carbon::parse($booking->check_out);

                if ($booking->status !== 'confermata') {
                    $booking->soggiorno = null;
                } elseif ($today->between($checkin, $checkout->copy()->subDay())) {
                    $booking->soggiorno = 'in_corso';
                } elseif ($today->gte($checkout)) {
                    $booking->soggiorno = 'concluso';
                } elseif ($today->lt($checkin)) {
                    $booking->soggiorno = 'in_arrivo';
                } else {
                    $booking->soggiorno = null;
                }

                return $booking;
            });

            $page = $request->input('page', 1);
            $perPage = 10;

            $paginated = new \Illuminate\Pagination\LengthAwarePaginator(
                $results->forPage($page, $perPage),
                $results->count(),
                $perPage,
                $page,
                ['path' => $request->url(), 'query' => $request->query()]
            );

            return view('admin.prenotazioni', ['prenotazioni' => $paginated]);
        }

        switch ($request->input('sort')) {
            case 'id_asc':
                $query->orderBy('id', 'asc');
                break;
            case 'id_desc':
                $query->orderBy('id', 'desc');
                break;
            case 'checkin_asc':
                $query->orderBy('check_in', 'asc');
                break;
            case 'checkin_desc':
                $query->orderBy('check_in', 'desc');
                break;
            case 'room_asc':
                $query->orderBy('room_name', 'asc');
                break;
            case 'room_desc':
                $query->orderBy('room_name', 'desc');
                break;
            case 'guests_asc':
                $query->orderBy('guests', 'asc');
                break;
            case 'guests_desc':
                $query->orderBy('guests', 'desc');
                break;
            case 'status_asc':
                $query->orderBy('status', 'asc');
                break;
            case 'status_desc':
                $query->orderBy('status', 'desc');
                break;
            default:
                $query->latest();
        }

        // mostriamo soltanto le prenotazioni arretrate di due mesi e tutte le future
            if (!$request->boolean('show_all')) {
                $oggi = now();
                $dueMesiFa = $oggi->copy()->subMonths(2)->startOfDay();

                $query->where(function ($q) use ($oggi, $dueMesiFa) {
                    $q->where('check_out', '>=', $oggi->toDateString()) // prenotazioni future o in corso
                    ->orWhere(function ($sub) use ($dueMesiFa, $oggi) {
                        $sub->whereBetween('check_out', [$dueMesiFa->toDateString(), $oggi->toDateString()]);
                    });
                });
            }


        $prenotazioni = $query->paginate(10);

        $prenotazioni->getCollection()->transform(function ($booking) {
            $today = now();
            $checkin = Carbon::parse($booking->check_in);
            $checkout = Carbon::parse($booking->check_out);

            if ($booking->status !== 'confermata') {
                $booking->soggiorno = null;
            } elseif ($today->gte($checkin) && $today->lt($checkout)) {
                $booking->soggiorno = 'in_corso';
            } elseif ($today->gte($checkout)) {
                $booking->soggiorno = 'concluso';
            } elseif ($today->lt($checkin)) {
                $booking->soggiorno = 'in_arrivo';
            } else {
                $booking->soggiorno = null;
            }

            return $booking;
        });

        return view('admin.prenotazioni', compact('prenotazioni'));
    }

    public function updatePrenotazione(Request $request, Booking $prenotazione)
    {
        $azione = $request->input('action');

        if ($azione === 'conferma') {
            $prenotazione->status = 'confermata';
            $prenotazione->save();

            app()->setLocale($prenotazione->locale);
            Mail::to($prenotazione->guest_email)->send(new BookingConfirmed($prenotazione));

            return redirect()->back()->with('success', 'Prenotazione confermata con successo.');
        }

        if ($azione === 'annulla') {
            $prenotazione->status = 'annullata';
            $prenotazione->save();

            app()->setLocale($prenotazione->locale);
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
            'room_name'  => 'required|in:Green Room,Pink Room,Grey Room',
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
            'Green Room' => ['bassa' => 120, 'media' => 145, 'alta' => 170],
            'Grey Room'  => ['bassa' => 120, 'media' => 145, 'alta' => 170],
            'Pink Room'  => ['bassa' => 110, 'media' => 135, 'alta' => 160],
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

        app()->setLocale($prenotazione->locale);
        Mail::to($prenotazione->guest_email)->send(new BookingUpdated($prenotazione));

        return redirect()->route('admin.prenotazioni')->with('success', 'Prenotazione aggiornata con successo.');
    }
}
