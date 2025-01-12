<?php

namespace App\Http\Controllers;

use App\Models\CabinetComptable;
use Illuminate\Http\Request;

class CabinetComptableController extends Controller
{
    // Afficher la liste des cabinets comptables
    public function index()
    {
        $cabinetsComptables = CabinetComptable::with('etatFinancier')->get(); // Ajout de la relation avec EtatFinancier
        return response()->json($cabinetsComptables, 200); // Ajout du code de statut HTTP
    }

    // Afficher un cabinet comptable spécifique
    public function show($id)
    {
        $cabinetComptable = CabinetComptable::with('etatFinancier')->find($id); // Ajout de la relation avec EtatFinancier

        if (!$cabinetComptable) {
            return response()->json(['message' => 'Cabinet comptable non trouvé'], 404);
        }

        return response()->json($cabinetComptable, 200); // Ajout du code de statut HTTP
    }

    // Créer un cabinet comptable
    public function store(Request $request) // Correction : utiliser store() pour suivre la convention REST
    {
        $validated = $request->validate([
            'nomCabinet' => 'required|string|max:255',
            'etatFinancier_id' => 'required|exists:etat_financiers,id',
        ]);

        $cabinetComptable = CabinetComptable::create($validated);

        return response()->json([
            'message' => 'Cabinet comptable créé avec succès',
            'cabinetComptable' => $cabinetComptable,
        ], 201); // Code de statut HTTP 201 pour création
    }

    // Mettre à jour un cabinet comptable
    public function update(Request $request, $id)
    {
        $cabinetComptable = CabinetComptable::find($id);

        if (!$cabinetComptable) {
            return response()->json(['message' => 'Cabinet comptable non trouvé'], 404);
        }

        $validated = $request->validate([
            'nomCabinet' => 'required|string|max:255',
            'etatFinancier_id' => 'required|exists:etat_financiers,id',
        ]);

        $cabinetComptable->update($validated);

        return response()->json([
            'message' => 'Cabinet comptable mis à jour avec succès',
            'cabinetComptable' => $cabinetComptable,
        ], 200);
    }

    // Supprimer un cabinet comptable
    public function destroy($id)
    {
        $cabinetComptable = CabinetComptable::find($id);

        if (!$cabinetComptable) {
            return response()->json(['message' => 'Cabinet comptable non trouvé'], 404);
        }

        $cabinetComptable->delete();

        return response()->json(['message' => 'Cabinet comptable supprimé avec succès'], 200);
    }
}
