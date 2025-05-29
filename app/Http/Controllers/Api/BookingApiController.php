<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;

class BookingApiController extends Controller
{
    public function getBookedDates($room)
    {
        $bookings = Booking::where('room_name', $room)->get(['check_in', 'check_out']);

        $dates = [];

        foreach ($bookings as $booking) {
            $current = strtotime($booking->check_in);
            $end = strtotime($booking->check_out);

            while ($current < $end) {
                $dates[] = date('Y-m-d', $current);
                $current = strtotime('+1 day', $current);
            }
        }

        return response()->json(array_unique($dates));
    }
}
