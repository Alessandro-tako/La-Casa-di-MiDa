<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Booking;
use Illuminate\Http\Request;

class IcsExportController extends Controller
{
    public function export($room)
    {
        $bookings = Booking::where('room_name', $room)
            ->where('status', 'confermata')
            ->orderBy('check_in')
            ->get();

        $calendar = "BEGIN:VCALENDAR\r\n";
        $calendar .= "VERSION:2.0\r\n";
        $calendar .= "PRODID:-//La Casa di MiDa//IT\r\n";

        foreach ($bookings as $booking) {
            $checkIn = Carbon::parse($booking->check_in)->format('Ymd');
            $checkOut = Carbon::parse($booking->check_out)->format('Ymd');
            $timestamp = Carbon::now()->format('Ymd\THis\Z');
            $uid = uniqid();

            $description = addslashes("Prenotazione per {$booking->guest_first_name} {$booking->guest_last_name}");

            $calendar .= "BEGIN:VEVENT\r\n";
            $calendar .= "UID:$uid@lacasadimida.it\r\n";
            $calendar .= "DTSTAMP:$timestamp\r\n";
            $calendar .= "DTSTART;VALUE=DATE:$checkIn\r\n";
            $calendar .= "DTEND;VALUE=DATE:$checkOut\r\n";
            $calendar .= "SUMMARY:Occupato - {$booking->room_name}\r\n";
            $calendar .= "DESCRIPTION:$description\r\n";
            $calendar .= "END:VEVENT\r\n";
        }

        $calendar .= "END:VCALENDAR\r\n";

        return response($calendar)
            ->header('Content-Type', 'text/calendar')
            ->header('Content-Disposition', "inline; filename={$room}_calendar.ics");
    }
}
