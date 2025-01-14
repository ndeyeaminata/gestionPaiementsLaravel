<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UtilisateurSeeder extends Seeder
{
    public function run()
    {
        DB::table('utilisateurs')->insert([
            [
                'nom' => 'Sarr',
                'prenom' => 'Aminata',
                'email' => 'aminata.doe@example.com',
                'password' => Hash::make('password123'), // Hachage sécurisé
                'telephone' => '771234569',
                'role_id' => 1, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Gaye',
                'prenom' => 'Fatou',
                'email' => 'Fatou.smith@example.com',
                'password' => Hash::make('password456'),
                'telephone' => '987654321',
                'role_id' => 2, // Consultant
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Ndoye',
                'prenom' => 'Astou',
                'email' => 'charlie.brown@example.com',
                'password' => Hash::make('password789'),
                'telephone' => '112233445',
                'role_id' => 3, // Mentor
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
