<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FichePresenceSeeder extends Seeder
{
    public function run()
    {
        // Vérifier si des mentors et consultants existent
        $mentor1 = DB::table('mentors')->first();
        $consultant1 = DB::table('consultants')->first();

        if (!$mentor1 || !$consultant1) {
            return; // Empêche l'exécution si les références n'existent pas
        }

        DB::table('fiche_presences')->insert([
            [
                'nombre_heures' => 8,
                'certificat' => 'certificat_presence_01',
                'numero_groupe' => 1,
                'statut' => 'Validé',
                'mentor_id' => $mentor1->id,
                'consultant_id' => $consultant1->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre_heures' => 6,
                'certificat' => 'certificat_presence_02',
                'numero_groupe' => 2,
                'statut' => 'En attente',
                'mentor_id' => $mentor1->id,
                'consultant_id' => $consultant1->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
