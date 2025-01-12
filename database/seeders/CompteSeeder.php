<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Compte;
use Illuminate\Support\Facades\Hash; // Ajout pour le hachage du mot de passe

class CompteSeeder extends Seeder
{
    public function run(): void
    {
        Compte::create([
            'email' => 'user1@example.com',
            'password' => Hash::make('password123'), // Hachage du mot de passe
        ]);

        Compte::create([
            'email' => 'user2@example.com',
            'password' => Hash::make('password123'),
        ]);

        Compte::create([
            'email' => 'user3@example.com',
            'password' => Hash::make('password123'),
        ]);
    }
}
