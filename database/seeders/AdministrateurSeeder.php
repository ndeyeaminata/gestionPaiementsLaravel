<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdministrateurSeeder extends Seeder
{
    public function run()
    {
        DB::table('administrateurs')->insert([
            [
                'utilisateur_id' => 1, // Assurez-vous que cet ID correspond à un utilisateur existant
                'compte_id' => 1, // Assurez-vous que cet ID correspond à un compte existant
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'utilisateur_id' => 2, // Assurez-vous que cet ID correspond à un autre utilisateur existant
                'compte_id' => 2, // Assurez-vous que cet ID correspond à un autre compte existant
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
