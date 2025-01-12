<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UNCHK;

class UNCHKSeeder extends Seeder
{
    public function run(): void
    {
        UNCHK::create([
            'montant' => 10000,
            'date_soumission' => '2025-01-01',
            'statut' => 'soumis',
            'etatFinancier_id' => 1,
        ]);

        UNCHK::create([
            'montant' => 15000,
            'date_soumission' => '2025-01-02',
            'statut' => 'approuvé',
            'etatFinancier_id' => 2,
        ]);
    }
}
