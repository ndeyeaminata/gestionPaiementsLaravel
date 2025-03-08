<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceFinancierSeeder extends Seeder
{
    public function run()
    {
        // Récupérer les IDs des états financiers existants
        $etatFinancierIds = DB::table('etat_financiers')->pluck('id')->toArray();

        // Vérifier qu'il y a au moins deux états financiers
        if (count($etatFinancierIds) < 2) {
            \Log::error("Pas assez d'états financiers pour insérer des services financiers.");
            return;
        }

        DB::beginTransaction();

        try {
            DB::table('service_financiers')->insert([
                [
                    'nomService' => 'Service de gestion de fonds',
                    'etantFinancier_id' => $etatFinancierIds[0],
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'nomService' => 'Service de consultation financière',
                    'etantFinancier_id' => $etatFinancierIds[1],
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error("Erreur lors de l'insertion des services financiers : " . $e->getMessage());
        }
    }
}
