<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CompteSeeder extends Seeder
{
    public function run()
    {
        // Désactiver les vérifications des clés étrangères
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Vider la table comptes
        DB::table('comptes')->truncate();

        // Insérer les données
        DB::table('comptes')->insert([
            [
                'email' => 'user1@example.com',
                'password' => Hash::make('password123'),
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

        // Réactiver les vérifications des clés étrangères
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
