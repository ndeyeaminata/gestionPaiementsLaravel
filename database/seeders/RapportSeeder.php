<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RapportSeeder extends Seeder
{
    public function run()
    {
        DB::table('rapports')->insert([
            [
                'date_soumission' => '2025-01-05',
                'detail_rapport' => 'Détail du rapport pour consultant 1.',
                'statut' => 'En cours',
                'consultant_id' => 1, // Assurez-vous que cet ID correspond à un consultant existant
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'date_soumission' => '2025-01-06',
                'detail_rapport' => 'Détail du rapport pour consultant 2.',
                'statut' => 'Validé',
                'consultant_id' => 2, // Assurez-vous que cet ID correspond à un consultant existant
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
