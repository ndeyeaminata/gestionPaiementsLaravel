<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ConsultantSeeder extends Seeder
{
    public function run()
    {
        if (!DB::table('utilisateurs')->where('id', 3)->exists()) {
            DB::table('utilisateurs')->insert([
                'nom' => 'Diop',
                'prenom' => 'Rama',
                'email' => 'rama3@gmail.com',
                'password' => Hash::make('password123'), // Hachage sécurisé
                'telephone' => '771234569',
                'role_id' => 3, 
            ]);
        }

        if (!DB::table('utilisateurs')->where('id', 4)->exists()) {
            DB::table('utilisateurs')->insert([
                'nom' => 'Ndoye',
                'prenom' => 'Astou',
                'email' => 'astou4@gmail.com',
                'password' => Hash::make('password123'), // Hachage sécurisé
                'telephone' => '771234569',
                'role_id' => 4, 
            ]);
        }

        DB::table('consultants')->insert([
            [
                'utilisateur_id' => 3, // ID correspondant à un utilisateur existant
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'utilisateur_id' => 4, // ID d’un autre utilisateur
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
