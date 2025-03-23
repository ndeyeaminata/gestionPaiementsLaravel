<?php

namespace Database\Seeders;

use App\Models\Apprenant;
use App\Models\ApprenantGroupe;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ApprenantGroupeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $apps = Apprenant::all();
        foreach($apps as $a){
            ApprenantGroupe::factory()->create([
                'apprenant_id' => $a->id
            ]);
        }
    }
}
