<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class CompteSeeder extends Seeder
{
    public function run()
    {
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
        ]);
    }
}
