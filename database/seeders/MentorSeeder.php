<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MentorSeeder extends Seeder
{
    public function run()
    {
        DB::beginTransaction(); // Démarrer une transaction

        try {
            // Insérer les utilisateurs et récupérer leur ID
            DB::table('utilisateurs')->insert([
                'nom' => 'Sarr',
                'prenom' => 'Aminata',
                'email' => 'aminata1@gmail.com',
                'password' => Hash::make('password123'),
                'telephone' => '771234569',
                'role_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            $utilisateurId1 = DB::getPdo()->lastInsertId();

            DB::table('utilisateurs')->insert([
                'nom' => 'Afana',
                'prenom' => 'Joe',
                'email' => 'Joe2@gmail.com',
                'password' => Hash::make('password123'),
                'telephone' => '771234569',
                'role_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            $utilisateurId2 = DB::getPdo()->lastInsertId();

            // Insérer les mentors avec les vrais ID
            DB::table('mentors')->insert([
                [
                    'utilisateur_id' => $utilisateurId1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'utilisateur_id' => $utilisateurId2,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);

            DB::commit(); // Valider les insertions
        } catch (\Exception $e) {
            DB::rollBack(); // Annuler en cas d’erreur
            \Log::error("Erreur lors du seeding des mentors : " . $e->getMessage());
        }
    }
}
