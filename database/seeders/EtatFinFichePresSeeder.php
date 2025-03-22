<?php

namespace Database\Seeders;

use App\Models\EtatFinFichePres;
use App\Models\FichePresence;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EtatFinFichePresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fiches = FichePresence::all();

        foreach($fiches as $f){
            EtatFinFichePres::factory()->create([
                'fiche_presence_id' => $f->id,
            ]);
        }
    }
}
