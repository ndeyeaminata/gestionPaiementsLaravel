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
            RoleSeeder::class,
            UtilisateurSeeder::class,
            CertificatSeeder::class,
            GroupeSeeder::class,
            ConsultantCertificatSeeder::class,
            MentorGroupeSeeder::class,
            FichePresenceSeeder::class,
            RapportSeeder::class,
            StatutSeeder::class,
            EtatFinancierSeeder::class,
            EtatFinFichePresSeeder::class,
            EtatFinRapportSeeder::class
        ]);
    }
}
