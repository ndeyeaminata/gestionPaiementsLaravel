<?php

namespace Database\Seeders;

use App\Models\Rapport;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RapportSeeder extends Seeder
{
    public function run()
    {
        Rapport::factory(30)->create();
    }

}
