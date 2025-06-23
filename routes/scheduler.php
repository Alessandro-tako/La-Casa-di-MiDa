<?php

use Illuminate\Console\Scheduling\Schedule;

return function (Schedule $schedule) {
    // Booking.com - Pink Room
        $schedule->command('import:ics "https://ical.booking.com/v1/export?t=95489229-17eb-47a9-be44-850ddae187ba" "Pink Room" "booking.com"')
                ->everyMinute()
                ->onFailure(function (\Throwable $exception) {
                \Log::error('❌ Import ICS fallito: Pink Room da Booking.com – ' . $exception->getMessage());
                });

        // Airbnb - Pink Room 
        // $schedule->command('import:ics "https://www.airbnb.it/calendar/ical/1380411445426546713.ics?s=a94465ed00ccdf3fc0bec27469bb69ec" "Pink Room" "airbnb"')
        //         ->everyMinute()
        //         ->onFailure(function (\Throwable $exception) {
        //         \Log::error('❌ Import ICS fallito: Pink Room da Airbnb – ' . $exception->getMessage());
        //         });

        // Booking.com - Green Room
        $schedule->command('import:ics "https://ical.booking.com/v1/export?t=9cbad127-10b2-4fa9-8a1c-0642476f28cd" "Green Room" "booking.com"')
                ->everyMinute()
                ->onFailure(function (\Throwable $exception) {
                \Log::error('❌ Import ICS fallito: Green Room da Booking.com – ' . $exception->getMessage());
                });

        // Airbnb - Green Room 
        // $schedule->command('import:ics "https://www.airbnb.it/calendar/ical/1380462803865432001.ics?s=76d2d09a2b1141f26e094ac84f053e50" "Green Room" "airbnb"')
        //         ->everyMinute()
        //         ->onFailure(function (\Throwable $exception) {
        //         \Log::error('❌ Import ICS fallito: Green Room da Airbnb – ' . $exception->getMessage());
        //         });

        // Booking.com - Grey Room
        $schedule->command('import:ics "https://ical.booking.com/v1/export?t=d30eecd9-f88e-4ebc-aca9-3e07d9672091" "Grey Room" "booking.com"')
                ->everyMinute()
                ->onFailure(function (\Throwable $exception) {
                \Log::error('❌ Import ICS fallito: Grey Room da Booking.com – ' . $exception->getMessage());
                });

        // Airbnb - Grey Room 
        // $schedule->command('import:ics "https://www.airbnb.it/calendar/ical/1380425056149611178.ics?s=315f7688b14adbeb9b0a2996ce336c73" "Grey Room" "airbnb"')
        //         ->everyMinute()
        //         ->onFailure(function (\Throwable $exception) {
        //         \Log::error('❌ Import ICS fallito: Grey Room da Airbnb – ' . $exception->getMessage());
        //         });

        // Comando personalizzato per anonimizzazione
        $schedule->command('bookings:anonymize')
                ->daily()
                ->onFailure(function (\Throwable $exception) {
                \Log::error('❌ Errore comando bookings:anonymize – ' . $exception->getMessage());
                });

        // Test: cron attivo (puoi rimuoverlo se non ti serve più)
        $schedule->call(function () {
                \Log::info('⏱ Cron Laravel attivo - ' . now());
        })->everyMinute();
};
