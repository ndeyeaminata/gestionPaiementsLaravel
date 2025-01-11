<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FichePresenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FichePresence::create([
            'dateHeureEntree' => '2025-01-01 08:00:00',
            'carteIdentiteMentor' => '1', // Associez à un mentor existant
            'nbreheure' => 8,
            'statut' => 'validée',
        ]);

        FichePresence::create([
            'dateHeureEntree' => '2025-01-02 09:00:00',
            'carteIdentiteMentor' => '2',
            'nbreheure' => 7,
            'statut' => 'en attente',
        ]);

        FichePresence::create([
            'dateHeureEntree' => '2025-01-03 10:00:00',
            'carteIdentiteMentor' => '3',
            'nbreheure' => 6,
            'statut' => 'rejetée',
        ]);
    }
}
