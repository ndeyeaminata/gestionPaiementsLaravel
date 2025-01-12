<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Consultant;

class ConsultantSeeder extends Seeder
{
    public function run(): void
    {
        Consultant::create(['utilisateur_id' => 1]);
        Consultant::create(['utilisateur_id' => 2]);
        Consultant::create(['utilisateur_id' => 3]);
    }
}
