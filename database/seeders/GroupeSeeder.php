<?php

namespace Database\Seeders;

use App\Models\Certificat;
use App\Models\Groupe;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GroupeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $certs = Certificat::all();

        foreach($certs as $c){
            $i = 1;
            for($i = 1; $i<=rand(2,8); $i++){
                Groupe::factory()->create([
                    'nomGroupe' => 'Groupe '.$i,
                    'certificat_id' => $c->id,
                ]);
                $i++;
            }
        }
    }
}
