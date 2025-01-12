<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Utilisateur;
use Illuminate\Support\Facades\Hash; // Ajout pour le hachage du mot de passe

class UtilisateurSeeder extends Seeder
{
    public function run(): void
    {
        Utilisateur::create([
            'nom' => 'NOM1',
            'prenom' => 'Prenom1',
            'email' => 'user1@example.com',
            'password' => Hash::make('password123'), // Hachage du mot de passe
            'telephone' => '1234567890',
            'role_id' => 1,
        ]);

        Utilisateur::create([
            'nom' => 'NOM2',
            'prenom' => 'Prenom2',
            'email' => 'user2@example.com',
            'password' => Hash::make('password123'),
            'telephone' => '0987654321',
            'role_id' => 2,
        ]);

        Utilisateur::create([
            'nom' => 'NOM3',
            'prenom' => 'Prenom3',
            'email' => 'user3@example.com',
            'password' => Hash::make('password123'),
            'telephone' => '0987654321',
            'role_id' => 2,
        ]);
    }
}
