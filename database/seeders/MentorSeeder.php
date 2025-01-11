<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MentorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Mentor::create([
            'nom' => 'OUEDRAOGO',
            'prenom' => 'ISSIAKA',
            'email' => 'issi1@gmail.com',
            'motDePasse' => bcrypt('123ABC'),
            'telephone' => '123456789',
        ]);

        Mentor::create([
            'nom' => 'AMINA',
            'prenom' => 'SARR',
            'email' => 'aminasarr@gmail.com',
            'motDePasse' => bcrypt('123ABC'),
            'telephone' => '987654321',
        ]);

        Mentor::create([
            'nom' => 'Ciscoder',
            'prenom' => 'Marieme',
            'email' => 'ciscoder@example.com',
            'motDePasse' => bcrypt('123ABC'),
            'telephone' => '456789123',
        ]);
    }
}
