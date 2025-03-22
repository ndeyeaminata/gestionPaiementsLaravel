<?php

namespace Database\Seeders;

use App\Models\EtatFinancier;
use App\Models\EtatFinRapport;
use App\Models\Rapport;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EtatFinRapportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rapports = Rapport::all();

        foreach($rapports as $r){
            EtatFinRapport::factory()->create([
                'rapport_id' => $r->id,
            ]);
        }
    }
}
