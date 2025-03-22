<?php

namespace Database\Seeders;

use App\Models\Groupe;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GroupeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Groupe::factory(30)->create();
    }
}
