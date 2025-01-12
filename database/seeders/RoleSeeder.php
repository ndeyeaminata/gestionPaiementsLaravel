<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        Role::create(['nomRole' => 'Administrateur']);
        Role::create(['nomRole' => 'Utilisateur']);
        Role::create(['nomRole' => 'Consultant']);
    }
}
