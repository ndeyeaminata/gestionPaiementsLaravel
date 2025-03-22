<?php

namespace Database\Seeders;

use App\Models\EtatFinancier;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EtatFinancierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       EtatFinancier::factory()->create();
    }
}
