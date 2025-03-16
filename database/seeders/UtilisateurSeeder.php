<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UtilisateurSeeder extends Seeder
{
    public function run()
    {
        DB::table('utilisateurs')->insert([
            [
                'nom' => 'Sarr',
                'prenom' => 'Aminata',
                'email' => 'aminata2@gmail.com',
                'password' => Hash::make('passer123'),
                'telephone' => '771234569',
                'role_id' => fake()->randomElement(Role::pluck('id')),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Gaye',
                'prenom' => 'Fatou',
                'email' => 'Fatou.smith@example.com',
                'password' => Hash::make('password456'),
                'telephone' => '987654321',
                'role_id' => fake()->randomElement(Role::pluck('id')),
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
