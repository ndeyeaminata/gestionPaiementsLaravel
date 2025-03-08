<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Compte;
use Illuminate\Support\Facades\Hash; // Ajout pour le hachage du mot de passe

class CompteSeeder extends Seeder
{
    public function run(): void
    {
<<<<<<< Updated upstream
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
=======
        DB::table('comptes')->insert([
            [
                'email' => 'user1@example.com',
                'password' => Hash::make('password123'), // Utiliser un hachage sécurisé pour les mots de passe
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
            [
                'email' => 'user2@example.com',
                'password' => Hash::make('password456'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'email' => 'user3@example.com',
                'password' => Hash::make('password789'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
>>>>>>> Stashed changes
        ]);
    }
}
