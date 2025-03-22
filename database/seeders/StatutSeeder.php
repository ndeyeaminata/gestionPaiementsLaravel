<?php

namespace Database\Seeders;

use App\Models\Statut;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuts = ['En attente', 'Signé', 'Annulé'];
        foreach($statuts as $st){
            Statut::factory()->create([
                'titreStatut' => $st
            ]);
        }
    }
}
