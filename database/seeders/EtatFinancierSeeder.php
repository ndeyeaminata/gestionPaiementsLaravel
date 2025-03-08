<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EtatFinancierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('etat_financiers')->insert([
            [
                'statut' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'statut' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
