<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ConsultantSeeder extends Seeder
{
    public function run()
    {
        DB::beginTransaction(); // Démarrer une transaction

        try {
            // Insérer les utilisateurs et récupérer leur ID
            DB::table('utilisateurs')->insert([
                'id' => 3,
                'nom' => 'Diop',
                'prenom' => 'Mariama',
                'email' => 'mariama@gmail.com',
                'password' => Hash::make('password123'),
                'telephone' => '789034569',
                'role_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            $utilisateurId3 = DB::getPdo()->lastInsertId();

            DB::table('utilisateurs')->insert([
                'id' => 4,
                'nom' => 'Boye',
                'prenom' => 'Fatou',
                'email' => 'fatougmail.com',
                'password' => Hash::make('password123'),
                'telephone' => '771234569',
                'role_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            $utilisateurId4 = DB::getPdo()->lastInsertId();

            // Insérer les consultants avec les vrais ID
            DB::table('consultants')->insert([
                [
                    'utilisateur_id' => $utilisateurId3,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'utilisateur_id' => $utilisateurId4,
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

