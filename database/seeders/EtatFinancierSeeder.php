<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EtatFinancierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EtatFinancier::create([
            'statut' => 'signé',
        ]);

        EtatFinancier::create([
            'statut' => 'non signé',
        ]);

        EtatFinancier::create([
            'statut' => 'en attente',
        ]);
    }
}
