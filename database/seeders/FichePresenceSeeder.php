<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FichePresence; // Correction : Importation correcte du modèle

class FichePresenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FichePresence::create([
            'nombre_heures' => 8,
            'certificat' => 'Certificat PHP',
            'numero_groupe' => 1,
            'statut' => 'validée',
            'mentor_id' => 1,
            'consultant_id' => 1,
        ]);

        FichePresence::create([
            'nombre_heures' => 7,
            'certificat' => 'Certificat JAVA',
            'numero_groupe' => 2,
            'statut' => 'en attente',
            'mentor_id' => 2,
            'consultant_id' => 2,
        ]);

        FichePresence::create([
            'nombre_heures' => 6,
            'certificat' => 'Certificat PYTHON',
            'numero_groupe' => 3,
            'statut' => 'rejetée',
            'mentor_id' => 3,
            'consultant_id' => 3,
        ]);
    }
}
