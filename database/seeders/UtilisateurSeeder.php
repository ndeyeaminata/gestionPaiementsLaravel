<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UtilisateurSeeder extends Seeder
{
    public function run()
    {
        // Récupérer les IDs des rôles existants
        $roleIds = DB::table('roles')->pluck('id', 'nomRole');

        // Vérifier que les rôles existent
        if (!isset($roleIds['Administrateur'], $roleIds['Consultant'], $roleIds['Mentor'])) {
            \Log::error("Les rôles nécessaires n'existent pas dans la base de données.");
            return;
        }

        DB::beginTransaction();

        try {
            DB::table('utilisateurs')->insert([
                [
                    'nom' => 'Sarr',
                    'prenom' => 'Aminata',
                    'email' => 'aminata2@gmail.com',
                    'password' => Hash::make('passer123'),
                    'telephone' => '771234569',
                    'role_id' => $roleIds['Administrateur'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'nom' => 'Gaye',
                    'prenom' => 'Fatou',
                    'email' => 'Fatou.smith@example.com',
                    'password' => Hash::make('password456'),
                    'telephone' => '987654321',
                    'role_id' => $roleIds['Consultant'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'nom' => 'Ndoye',
                    'prenom' => 'Astou',
                    'email' => 'charlie.brown@example.com',
                    'password' => Hash::make('password789'),
                    'telephone' => '112233445',
                    'role_id' => $roleIds['Mentor'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error("Erreur lors de l'insertion des utilisateurs : " . $e->getMessage());
        }
    }
}
