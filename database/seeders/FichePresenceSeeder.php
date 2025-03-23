<?php

namespace Database\Seeders;

use App\Models\FichePresence;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FichePresenceSeeder extends Seeder
{
    public function run()
    {
        FichePresence::factory(50)->create();
    }
}
