<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EtatFinancier; // Correction : Importation correcte du modèle

class EtatFinancierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EtatFinancier::create(['statut' => 'signé']);
        EtatFinancier::create(['statut' => 'non signé']);
        EtatFinancier::create(['statut' => 'en attente']);
    }
}
