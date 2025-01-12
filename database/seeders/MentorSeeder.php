<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mentor; // Correction : Importation correcte du modèle

class MentorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    //Les données de seeders doivent correspondre à la table mentors. Ici, on suppose que des Utilisateurexistent déjà avec les ID correspondants.
    public function run(): void
    {
        Mentor::create([
            'utilisateur_id' => 1,
        ]);

        Mentor::create([
            'utilisateur_id' => 2,
        ]);

        Mentor::create([
            'utilisateur_id' => 3,
        ]);
    }
}
