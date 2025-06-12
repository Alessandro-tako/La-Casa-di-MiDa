<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Booking;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class AnonymizeOldBookings extends Command
{
    protected $signature = 'bookings:anonymize';
    protected $description = 'Anonimizza i dati delle prenotazioni concluse da oltre 10 anni senza penale';

    public function handle(): int
    {
        $threshold = now()->subYears(10);

        $bookings = Booking::where('check_out', '<=', $threshold)
            ->where('is_anonymized', false)
            ->where(function ($query) {
                $query->whereNull('penalty_applied')->orWhere('penalty_applied', false);
            })
            ->get();

        foreach ($bookings as $booking) {
            $booking->guest_first_name = 'Anonymized';
            $booking->guest_last_name = 'User';
            $booking->guest_email = null;
            $booking->guest_address_street = null;
            $booking->guest_address_city = null;
            $booking->guest_address_country = null;
            $booking->guest_address_zip = null;
            $booking->ip_address = null;
            $booking->user_agent = null;
            $booking->is_anonymized = true;
            $booking->save();

            Log::channel('anonymizations')->info("Booking ID {$booking->id} anonimizzata il " . now()->toDateTimeString());
        }

        $this->info("Anonimizzate {$bookings->count()} prenotazioni.");
        return Command::SUCCESS;
    }
}
