<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CabinetComptableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cabinet_comptables')->insert([
            [
                'nom' => 'Cabinet ABC',
                'adresse' => '123 Rue Principale, Dakar',
                'telephone' => 'è-3456789',
                'email' => 'contact@cabinetabc.sn',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Cabinet XYZ',
                'adresse' => '456 Avenue des Entreprises, Thiès',
                'telephone' => '777654321',
                'email' => 'info@cabinetxyz.sn',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
