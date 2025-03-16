<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CabinetComptableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cabinet_comptables')->insert([
            [
                'nomCabinet' => 'Cabinet A',
                'adresse' => '123 Rue des Entreprises, Dakar',
                'telephone' => '33789054',
                'email' => 'cabinet@cabinetA.sn',
                'etat_financier_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nomCabinet' => 'Cabinet B',
                'adresse' => '456 Avenue des Entreprises, Dakar',
                'telephone' => '777654321',
                'email' => 'cabinet@cabinetB.sn',
                'etat_financier_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
