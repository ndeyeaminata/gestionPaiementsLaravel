<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Utilisateur;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UtilisateurSeeder extends Seeder
{
    public function run()
    {
        //Creating 10Admins
        Utilisateur::factory(10)->create([
            "role_id" => Role::where('nomRole', 'like', '%Administrateur%')->pluck('id')->first()
        ]);

        //Creating 20Mentors
        Utilisateur::factory(20)->create([
            "role_id" => Role::where('nomRole', 'like', '%Mentor%')->pluck('id')->first()
        ]);

        //Creating 10Consultants
        Utilisateur::factory(10)->create([
            "role_id" => Role::where('nomRole', 'like', '%Consultant%')->pluck('id')->first()
        ]);

        //Creating 5Comptables
        Utilisateur::factory(5)->create([
            "role_id" => Role::where('nomRole', 'like', '%Comptable%')->pluck('id')->first()
        ]);

    }
}
