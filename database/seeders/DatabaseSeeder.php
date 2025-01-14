<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CompteSeeder::class,
            RoleSeeder::class,
            UtilisateurSeeder::class,
            MentorSeeder::class,
            ConsultantSeeder::class,
            FichePresenceSeeder::class,
            RapportSeeder::class,
            AdministrateurSeeder::class,
            EtatFinancierSeeder::class,
            UNCHKSeeder::class,
            ServiceFinancierSeeder::class,
            CabinetComptableSeeder::class
        ]);
    }
}
