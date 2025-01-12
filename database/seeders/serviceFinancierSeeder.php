<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ServiceFinancier;

class ServiceFinancierSeeder extends Seeder
{
    public function run(): void
    {
        ServiceFinancier::create([
            'nom' => 'Service Financier A',
            'etatFinancier_id' => 1,
        ]);

        ServiceFinancier::create([
            'nom' => 'Service Financier B',
            'etatFinancier_id' => 2,
        ]);
    }
}
