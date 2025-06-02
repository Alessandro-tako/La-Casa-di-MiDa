<?php

namespace Database\Seeders;

use App\Models\Booking;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Carbon\Carbon;

class BookingSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();
        $rooms = ['Green Room', 'Pink Room', 'Gray Room'];
        $countries = ['IT', 'FR', 'DE', 'US', 'GB', 'ES', 'CA'];

        $prezzi = [
            'Green Room' => ['bassa' => 125, 'media' => 160, 'alta' => 185],
            'Gray Room'  => ['bassa' => 125, 'media' => 160, 'alta' => 185],
            'Pink Room'  => ['bassa' => 115, 'media' => 150, 'alta' => 175],
        ];

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

        $i = 0;
        $maxPrenotazioni = 30;

        while ($i < $maxPrenotazioni) {
            $room = $faker->randomElement($rooms);
            $checkIn = Carbon::now()->addDays(rand(1, 90))->startOfDay();
            $notti = rand(2, 5);
            $checkOut = (clone $checkIn)->addDays($notti);
            $guests = rand(1, 3);

            // Verifica sovrapposizione
            $overlap = Booking::where('room_name', $room)
                ->where('status', '!=', 'annullata')
                ->where(function ($query) use ($checkIn, $checkOut) {
                    $query->where('check_in', '<', $checkOut)
                          ->where('check_out', '>', $checkIn);
                })
                ->exists();

            if ($overlap) {
                continue;
            }

            // Calcolo prezzo
            $totale = 0;
            $date = $checkIn->copy();

            while ($date < $checkOut) {
                $stagione = determinareStagione($date);
                $base = $prezzi[$room][$stagione];

                if ($room === 'Pink Room' && $guests === 1) {
                    $base *= 0.90;
                } elseif ($room !== 'Pink Room') {
                    if ($guests === 1) {
                        $base *= 0.90;
                    } elseif ($guests === 3) {
                        $base += 50;
                    }
                }

                $totale += $base;
                $date->addDay();
            }

            // Inserimento prenotazione
            Booking::create([
                'guest_first_name' => $faker->firstName,
                'guest_last_name' => $faker->lastName,
                'guest_email' => $faker->safeEmail,
                'guest_address_street' => $faker->streetAddress,
                'guest_address_city' => $faker->city,
                'guest_address_country' => $faker->randomElement($countries),
                'guest_address_zip' => $faker->postcode,
                'room_name' => $room,
                'check_in' => $checkIn->toDateString(),
                'check_out' => $checkOut->toDateString(),
                'guests' => $guests,
                'price' => round($totale, 2),
                'status' => 'confermata',
                'payment_method' => 'pm_test_4242424242424242',
                'stripe_payment_method' => 'pm_card_visa', // carta test che supporta off_session
                'stripe_customer_id' => 'cus_test_' . $faker->unique()->bothify('??##??##'), // finto ID per test
                'penale_addebitata' => false,
                'penale_ricevuta_url' => null,
            ]);


            $i++;
        }
    }
}
