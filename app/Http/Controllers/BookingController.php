<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Stripe\Stripe;
use Stripe\SetupIntent;
use Stripe\Customer;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\BookingConfirmed;
use App\Mail\BookingCancelled;
use App\Mail\BookingConfirmationMail;
use App\Mail\AdminBookingNotificationMail;

class BookingController extends Controller
{
    public function create(Request $request)
    {
        $selectedRoom = $request->query('camera');

        Stripe::setApiKey(config('services.stripe.secret'));
        $intent = SetupIntent::create();

        return view('booking.create', [
            'selectedRoom' => $selectedRoom,
            'intent' => $intent
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'guest_first_name'       => 'required|string|max:255',
            'guest_last_name'        => 'required|string|max:255',
            'guest_email'            => 'required|email|max:255',
            'guest_address_street'   => 'required|string|max:255',
            'guest_address_city'     => 'required|string|max:255',
            'guest_address_country'  => 'required|string|max:255',
            'guest_address_zip'      => 'required|string|max:20',
            'room_name'              => 'required|in:Green Room,Pink Room,Grey Room',
            'check_in'               => 'required|date_format:d-m-Y|after_or_equal:today',
            'check_out'              => 'required|date_format:d-m-Y|after:check_in',
            'guests'                 => 'required|integer|min:1|max:3',
            'accetta_condizioni'     => 'accepted',
            'payment_method'         => 'required|string',

        ]);

        $data['locale'] = app()->getLocale();
        $data['check_in'] = Carbon::createFromFormat('d-m-Y', $data['check_in'])->format('Y-m-d');
        $data['check_out'] = Carbon::createFromFormat('d-m-Y', $data['check_out'])->format('Y-m-d');

        $notti = Carbon::parse($data['check_in'])->diffInDays(Carbon::parse($data['check_out']));
        if ($notti < 1) {
            return back()->withErrors(['check_in' => 'La durata minima del soggiorno è di almeno una notte.'])->withInput();
        }

        $overlap = Booking::where('room_name', $data['room_name'])
            ->where('status', '!=', 'annullata')
            ->where(function ($query) use ($data) {
                $query->where('check_in', '<', $data['check_out'])
                    ->where('check_out', '>', $data['check_in']);
            })
            ->exists();

        if ($overlap) {
            return back()->withErrors([
                'check_in' => 'Le date selezionate non sono disponibili per questa camera.',
            ])->withInput();
        }

        // Calcolo del prezzo
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
            'Grey Room'  => ['bassa' => 125, 'media' => 160, 'alta' => 185],
            'Pink Room'  => ['bassa' => 115, 'media' => 150, 'alta' => 175],
        ];

        $totale = 0;
        $checkin = Carbon::parse($data['check_in']);
        $checkout = Carbon::parse($data['check_out']);

        for ($date = $checkin->copy(); $date < $checkout; $date->addDay()) {
            $stagione = determinareStagione($date);
            $base = $prezzi[$data['room_name']][$stagione];

            if ($data['room_name'] === 'Pink Room') {
                if ($data['guests'] === 1) $base *= 0.90;
            } else {
                if ($data['guests'] === 1) {
                    $base *= 0.90;
                } elseif ($data['guests'] === 3) {
                    $base += 50;
                }
            }

            $totale += $base;
        }

        $data['price'] = round($totale, 2);

        // Stripe
        Stripe::setApiKey(config('services.stripe.secret'));

        $customer = Customer::create([
            'email' => $data['guest_email'],
            'name' => $data['guest_first_name'] . ' ' . $data['guest_last_name'],
            'payment_method' => $request->input('payment_method'),
        ]);

        $data['stripe_payment_method'] = $request->input('payment_method');
        $data['stripe_customer_id'] = $customer->id;
        $data['status'] = 'in_attesa';

        $booking = Booking::create($data);

        app()->setLocale($booking->locale);

        // Email cliente
        Mail::to($booking->guest_email)->send(new BookingConfirmationMail($booking));

        // Email admin
        Mail::to('booking@lacasadimida.it')->send(new AdminBookingNotificationMail($booking));

        return redirect()->route('booking.create')->with('success', 'Prenotazione effettuata con successo!');
    }

    public function getBookedDates($room)
{
    $bookings = Booking::where('room_name', $room)
        ->where('status', '!=', 'annullata')
        ->get(['check_in', 'check_out']);

    $checkinDisabled = [];
    $checkoutDisabled = [];

    foreach ($bookings as $booking) {
        // Tutti i giorni dal check-in al giorno prima del check-out
        $current = Carbon::parse($booking->check_in);
        $end = Carbon::parse($booking->check_out);

        while ($current < $end) {
            $date = $current->format('Y-m-d');
            $checkinDisabled[] = $date;

            // Per il calendario di checkout, escludi il giorno del check-in
            if ($current->gt(Carbon::parse($booking->check_in))) {
                $checkoutDisabled[] = $date;
            }

            $current->addDay();
        }
    }

    return response()->json([
        'checkin' => array_values(array_unique($checkinDisabled)),
        'checkout' => array_values(array_unique($checkoutDisabled)),
    ]);
}

}
