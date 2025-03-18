<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CabinetComptable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            CabinetComptable::factory(3)->create();
    }
}
