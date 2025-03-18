<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Compte;

class CompteSeeder extends Seeder
{
    public function run()
    {
        // Créer 10 comptes pour les utilisateurs existants
        Compte::factory(10)->create();
    }
}
