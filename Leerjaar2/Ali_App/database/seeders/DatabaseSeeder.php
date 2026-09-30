<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'klant@test.nl'],
            [
                'name' => 'Klant',
                'password' => Hash::make('password'),
                'rolenaam' => 'Klant',
            ]
        );

        User::updateOrCreate(
            ['email' => 'admin@test.nl'],
            [
                'name' => 'Admin',
                'password' => Hash::make('password'),
                'rolenaam' => 'Admin',
            ]
        );

        User::updateOrCreate(
            ['email' => 'magazijn@test.nl'],
            [
                'name' => 'Magazijnmedewerker',
                'password' => Hash::make('password'),
                'rolenaam' => 'Magazijnmedewerker',
            ]
        );
    }
}
