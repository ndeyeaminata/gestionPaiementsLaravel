<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdministrateurSeeder extends Seeder
{
    public function run()
    {
        // Désactiver les vérifications de clés étrangères
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Insérer des utilisateurs
        DB::table('utilisateurs')->insert([
            [
                'id' => 1,
                'nom' => 'Dupont',
                'prenom' => 'Jean',
                'email' => 'jean.dupont@example.com',
                'password' => Hash::make('motdepasse'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'nom' => 'Durand',
                'prenom' => 'Marie',
                'email' => 'marie.durand@example.com',
                'password' => Hash::make('motdepasse'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Insérer des comptes
        DB::table('comptes')->insert([
            [
                'id' => 1,
                'numero_compte' => 'CPT001',
                'solde' => 1000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'numero_compte' => 'CPT002',
                'solde' => 2000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Insérer des administrateurs
        DB::table('administrateurs')->insert([
            [
                'utilisateur_id' => 1,
                'compte_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'utilisateur_id' => 2,
                'compte_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Réactiver les vérifications de clés étrangères
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
