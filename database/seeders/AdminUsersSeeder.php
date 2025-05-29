<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUsersSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'name' => 'Damiano',
                'email' => 'admin1@lacasadimida.it',
                'password' => Hash::make('DamianoMiDa'), // Cambialo in produzione
            ],
            [
                'name' => 'Michela',
                'email' => 'admin2@lacasadimida.it',
                'password' => Hash::make('MichelaMiDa'), // Cambialo in produzione
            ],
        ];

        foreach ($users as $user) {
            User::updateOrCreate(['email' => $user['email']], $user);
        }
    }
}
