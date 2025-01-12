<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Administrateur;
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
            CompteSeeder::class,
            AdministrateurSeeder::class,
            ConsultantSeeder::class,
            MentorSeeder::class,
            EtatFinancierSeeder::class,
            CabinetComptableSeeder::class,
            ServiceFinancierSeeder::class,
            UNCHKSeeder::class,
            FichePresenceSeeder::class,
            RapportSeeder::class,       
        ]);
    }
}


//exécutez ' php artisan db:seed ' pour peupler la base de données avec les données de test.

/*
    -RoleSeeder est exécuté en premier car Utilisateurdépend de role_id.
    -UtilisateurSeeder est exécuté ensuite car plusieurs autres entités dépendent de utilisateur_id.
    -CompteSeeder est exécuté avant AdministrateurSeedercar compte_idest nécessaire.
    -EtatFinancierSeeder est exécuté avant CabinetComptableSeeder, ServiceFinancierSeederet UNCHKSeederpour respecter la relation avec etatFinancier_id.
    -FichePresenceSeeder est exécutée après MentorSeederet ConsultantSeederpour assurer que mentor_idet consultant_idsoient présentes.
    -RapportSeeder est exécuté après ConsultantSeederpour satisfaire la relation consultant_id.
*/