<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class MentorSeeder extends Seeder
{
    public function run()
    {
         // Vérifier si les utilisateurs avec id 1 et 2 existent, sinon les créer
        if (!DB::table('utilisateurs')->where('id', 1)->exists()) {
            DB::table('utilisateurs')->insert([
                'nom' => 'Sarr',
                'prenom' => 'Aminata',
                'email' => 'aminata1@gmail.com',
                'password' => Hash::make('password123'), // Hachage sécurisé
                'telephone' => '771234569',
                'role_id' => 1,
            ]);
        }

        if (!DB::table('utilisateurs')->where('id', 2)->exists()) {
            DB::table('utilisateurs')->insert([
                'nom' => 'Afana',
                'prenom' => 'Joe',
                'email' => 'Joe2@gmail.com',
                'password' => Hash::make('password123'), // Hachage sécurisé
                'telephone' => '771234569',
                'role_id' => 2, 
            ]);
        }

        DB::table('mentors')->insert([
            [
                'utilisateur_id' => 1, // Assurez-vous que cet ID correspond à un utilisateur existant dans la table 'utilisateurs'
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'utilisateur_id' => 2, // Exemple pour un autre utilisateur
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
