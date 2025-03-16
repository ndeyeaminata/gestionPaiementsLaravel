<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            'Administrateur',
            'Consultant',
            'Mentor',
            'Comptable',

        ];

        DB::beginTransaction();

        try {
            foreach ($roles as $role) {
                DB::table('roles')->updateOrInsert(
                    ['nomRole' => $role],
                    ['created_at' => now(), 'updated_at' => now()]
                );
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error("Erreur lors de l'insertion des rôles : " . $e->getMessage());
        }
    }
}
