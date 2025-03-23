<?php

namespace Database\Seeders;

use App\Models\Apprenant;
use App\Models\ApprenantGroupe;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ApprenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Apprenant::factory(200)->create();


    }
}
