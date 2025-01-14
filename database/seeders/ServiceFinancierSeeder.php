<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceFinancierSeeder extends Seeder
{
    public function run()
    {
        DB::table('service_financiers')->insert([
            [
                'nomService' => 'Service de gestion de fonds',
                'etantFinancier_id' => 1, // Assurez-vous que cet ID correspond à un état financier existant
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nomService' => 'Service de consultation financière',
                'etantFinancier_id' => 2, // Assurez-vous que cet ID correspond à un autre état financier existant
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
