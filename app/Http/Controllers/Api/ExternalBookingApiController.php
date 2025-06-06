<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\ExternalBooking;
use App\Http\Controllers\Controller;

class ExternalBookingApiController extends Controller
{
    public function getExternalBookedDates($room)
    {
        $bookings = ExternalBooking::where('room_name', $room)->get();

        $checkin = [];
        $checkout = [];

        foreach ($bookings as $booking) {
            $start = Carbon::parse($booking->check_in);
            $end = Carbon::parse($booking->check_out);
            
            $current = $start->copy();
            while ($current < $end) {
                $date = $current->format('Y-m-d');
                $checkin[] = $date;

                if ($current->gt($start)) {
                    $checkout[] = $date;
                }

                $current->addDay();
            }
        }

        return response()->json([
            'checkin' => array_unique($checkin),
            'checkout' => array_unique($checkout),
        ]);
    }
}
