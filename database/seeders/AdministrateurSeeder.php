<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdministrateurSeeder extends Seeder
{
    public function run()
    {

    try{
        // Insérer des utilisateurs
        DB::table('utilisateurs')->insert([
            [
                'id' => 1,
                'nom' => 'Diallo',
                'prenom' => 'Amina',
                'email' => 'amina@gmail.com',
                'password' => Hash::make('passer123'),
                'role_id' => 1,
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

        ]);

        DB::commit(); // Valider les insertions
    } catch (\Exception $e) {
        DB::rollBack(); // Annuler en cas d’erreur
        \Log::error("Erreur lors du seeding des mentors : " . $e->getMessage());
    }
    }
}
