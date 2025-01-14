<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FichePresenceSeeder extends Seeder
{
    public function run()
    {
        DB::table('fiche_presences')->insert([
            [
                'nombre_heures' => 8,
                'certificat' => 'certificat_presence_01',
                'numero_groupe' => 1,
                'statut' => 'Validé',
                'mentor_id' => 1, // Assurez-vous que cet ID correspond à un mentor existant
                'consultant_id' => 1, // Assurez-vous que cet ID correspond à un consultant existant
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre_heures' => 6,
                'certificat' => 'certificat_presence_02',
                'numero_groupe' => 2,
                'statut' => 'En attente',
                'mentor_id' => 2,
                'consultant_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
