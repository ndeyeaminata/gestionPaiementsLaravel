<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UNCHKSeeder extends Seeder
{
    public function run()
    {
        // Récupérer les IDs des états financiers existants
        $etatFinancierIds = DB::table('etat_financiers')->pluck('id')->toArray();

        // Vérifier qu'il y a au moins deux états financiers
        if (count($etatFinancierIds) < 2) {
            \Log::error("Pas assez d'états financiers pour insérer des enregistrements UNCHK.");
            return;
        }

        DB::beginTransaction();

        try {
            DB::table('u_n_c_h_k_s')->insert([
                [
                    'montant' => 15000,
                    'date_soumission' => '2025-01-05',
                    'statut' => 'Validé',
                    'etatFinancier_id' => $etatFinancierIds[0],
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'montant' => 20000,
                    'date_soumission' => '2025-01-06',
                    'statut' => 'En cours',
                    'etatFinancier_id' => $etatFinancierIds[1],
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error("Erreur lors de l'insertion des enregistrements UNCHK : " . $e->getMessage());
        }
    }
}
