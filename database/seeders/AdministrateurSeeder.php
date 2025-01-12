<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Administrateur;

class AdministrateurSeeder extends Seeder
{
    public function run(): void
    {
        Administrateur::create([
            'utilisateur_id' => 1,
            'compte_id' => 1,
        ]);

        Administrateur::create([
            'utilisateur_id' => 2,
            'compte_id' => 2,
        ]);

    }
}
