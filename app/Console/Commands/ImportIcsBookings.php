<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;
use App\Models\ExternalBooking;

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

            // Log iniziale (debug limitato)
            \Log::info("📥 ICS ricevuto per {$room} ({$source})", [
                'excerpt' => substr($icsContent, 0, 300)
            ]);

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

            \Log::info("✅ Importazione completata per {$room} ({$source}): {$imported} prenotazioni.");
            return 0;

        } catch (\Throwable $e) {
            \Log::error("❌ Errore importazione ICS per {$room} ({$source}): " . $e->getMessage());
            return 1;
        }
    }
}
