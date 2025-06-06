<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use ICal\ICal; // Questo è il namespace corretto con la nuova libreria
use App\Models\ExternalBooking;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

class ImportIcsBookings extends Command
{
    protected $signature = 'import:ics {url} {room} {source}';
    protected $description = 'Importa prenotazioni da file .ics di Booking o Airbnb';

    public function handle()
    {
        $url = $this->argument('url');
        $room = $this->argument('room');
        $source = $this->argument('source');

        try {
            $icsContent = Http::withHeaders([
                'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)',
            ])->get($url)->body();


            // Split events
            preg_match_all('/BEGIN:VEVENT(.*?)END:VEVENT/s', $icsContent, $matches);

            $imported = 0;

            foreach ($matches[1] as $rawEvent) {
                preg_match('/UID:(.+)/', $rawEvent, $uidMatch);
                preg_match('/DTSTART(;VALUE=DATE)?:([0-9T]+)/', $rawEvent, $startMatch);
                preg_match('/DTEND(;VALUE=DATE)?:([0-9T]+)/', $rawEvent, $endMatch);

                if (!isset($uidMatch[1], $startMatch[2], $endMatch[2])) {
                    continue;
                }

                $uid = trim($uidMatch[1]);
                $checkIn = Carbon::parse($startMatch[2])->toDateString();
                $checkOut = Carbon::parse($endMatch[2])->toDateString();

                if (ExternalBooking::where('uid', $uid)->exists()) {
                    continue;
                }

                ExternalBooking::create([
                    'room_name' => $room,
                    'check_in' => $checkIn,
                    'check_out' => $checkOut,
                    'uid' => $uid,
                    'source' => $source,
                ]);

                $imported++;
            }
            dd(substr($icsContent, 0, 500)); // Mostra i primi 500 caratteri del contenuto

            $this->info("Importazione completata: $imported prenotazioni aggiunte.");
        } catch (\Exception $e) {
            $this->error("Errore durante l'importazione: " . $e->getMessage());
        }
    }

}
