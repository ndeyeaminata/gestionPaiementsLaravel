<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    public function run()
    {
        DB::table('roles')->insert([
            ['nomRole' => 'Administrateur', 'created_at' => now(), 'updated_at' => now()],
            ['nomRole' => 'Consultant', 'created_at' => now(), 'updated_at' => now()],
            ['nomRole' => 'Mentor', 'created_at' => now(), 'updated_at' => now()],
            ['nomRole' => 'Utilisateur', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
