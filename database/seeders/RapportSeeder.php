<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Rapport;

class RapportSeeder extends Seeder
{
    public function run(): void
    {
        Rapport::create([
            'date_soumission' => '2025-01-01',
            'detail_rapport' => 'Rapport initial',
            'statut' => 'soumis',
            'consultant_id' => 1,
        ]);

        Rapport::create([
            'date_soumission' => '2025-01-02',
            'detail_rapport' => 'Deuxième rapport',
            'statut' => 'en attente',
            'consultant_id' => 2,
        ]);

        Rapport::create([
            'date_soumission' => '2025-01-02',
            'detail_rapport' => 'Deuxième rapport',
            'statut' => 'rejété',
            'consultant_id' => 3,
        ]);
    }
}
