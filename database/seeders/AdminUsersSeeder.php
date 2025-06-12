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
                'email' => 'damiano@lacasadimida.it',
                'password' => Hash::make('25DamianoMiDa'), // Cambialo in produzione
            ],
            [
                'name' => 'Michela',
                'email' => 'michela@lacasadimida.it',
                'password' => Hash::make('25MichelaMiDa'), // Cambialo in produzione
            ],
        ];

        foreach ($users as $user) {
            User::updateOrCreate(['email' => $user['email']], $user);
        }
    }
}
