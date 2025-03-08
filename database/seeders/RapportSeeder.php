<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RapportSeeder extends Seeder
{
    public function run()
    {
        // Récupérer les IDs des consultants existants
        $consultantIds = DB::table('consultants')->pluck('id')->toArray();

        // Vérifier qu'il y a au moins deux consultants
        if (count($consultantIds) < 2) {
            \Log::error("Pas assez de consultants pour insérer des rapports.");
            return;
        }

        DB::beginTransaction();

        try {
            DB::table('rapports')->insert([
                [
                    'date_soumission' => '2025-01-05',
                    'detail_rapport' => 'Détail du rapport pour consultant 1.',
                    'statut' => 'En cours',
                    'consultant_id' => $consultantIds[0],
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'date_soumission' => '2025-01-06',
                    'detail_rapport' => 'Détail du rapport pour consultant 2.',
                    'statut' => 'Validé',
                    'consultant_id' => $consultantIds[1],
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error("Erreur lors de l'insertion des rapports : " . $e->getMessage());
        }
    }
}
