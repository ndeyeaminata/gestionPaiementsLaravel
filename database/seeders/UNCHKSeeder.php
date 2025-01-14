<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UNCHKSeeder extends Seeder
{
    public function run()
    {
        DB::table('u_n_c_h_k_s')->insert([
            [
                'montant' => 15000,
                'date_soumission' => '2025-01-05',
                'statut' => 'Validé',
                'etatFinancier_id' => 1, // Assurez-vous que cet ID correspond à un état financier existant
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'montant' => 20000,
                'date_soumission' => '2025-01-06',
                'statut' => 'En cours',
                'etatFinancier_id' => 2, // Assurez-vous que cet ID correspond à un autre état financier existant
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
