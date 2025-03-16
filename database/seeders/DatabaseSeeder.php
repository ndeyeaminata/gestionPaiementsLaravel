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
            FichePresenceSeeder::class,
            RapportSeeder::class,
            EtatFinancierSeeder::class,
            GroupeSeeder::class,
            CertificatSeeder::class,
            StatutSeeder::class,
            ServiceFinancierSeeder::class,
        ]);
    }
}
