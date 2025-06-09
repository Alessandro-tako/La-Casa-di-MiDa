<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Booking;
use Illuminate\Http\Request;

class IcsExportController extends Controller
{

    public function export($room)
    {
        $prenotazioni = Booking::where('room_name', $room)
            ->where('status', 'confermata')
            ->orderBy('check_in')
            ->get();

        $content = "BEGIN:VCALENDAR\r\nVERSION:2.0\r\nPRODID:-//La Casa di MiDa//IT\r\n";

        foreach ($prenotazioni as $booking) {
            $checkIn = \Carbon\Carbon::parse($booking->check_in)->format('Ymd');
            $checkOut = \Carbon\Carbon::parse($booking->check_out)->format('Ymd');

            $content .= "BEGIN:VEVENT\r\n";
            $content .= "DTSTART;VALUE=DATE:$checkIn\r\n";
            $content .= "DTEND;VALUE=DATE:$checkOut\r\n";
            $content .= "SUMMARY:Occupato - " . $booking->room_name . "\r\n";
            $content .= "DESCRIPTION:Prenotazione per " . $booking->guest_first_name . " " . $booking->guest_last_name . "\r\n";
            $content .= "END:VEVENT\r\n";
        }

        $content .= "END:VCALENDAR\r\n";

        return response($content)
            ->header('Content-Type', 'text/calendar')
            ->header('Content-Disposition', 'inline; filename=calendar.ics');
    }

}
