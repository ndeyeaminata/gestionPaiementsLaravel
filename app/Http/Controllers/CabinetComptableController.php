<?php

namespace App\Http\Controllers;

use App\Models\CabinetComptable;
use App\Models\EtatFinancier;
use Illuminate\Http\Request;

class CabinetComptableController extends Controller
{
    // Afficher la liste des cabinets comptables
    public function index()
    {
        $cabinetsComptables = CabinetComptable::all();
        return response()->json($cabinetsComptables);
    }

    // Afficher un cabinet comptable spécifique
    public function show($id)
    {
        $cabinetComptable = CabinetComptable::find($id);
        if (!$cabinetComptable) {
            return response()->json(['message' => 'Cabinet comptable non trouvé'], 404);
        }
        return response()->json([
            'message' => 'Cabinet comptable trouvé',
            'cabinetComptable' => $cabinetComptable,
        ]);
    }
    // Créer un cabinet comptable
    public function store(Request $request, $id)
    {
        $request->validate([
            'nomCabinet' => 'required|string|max:255',
            'etatFinancier_id' => 'required|exists:etat_financiers,id',
        ]);

        $cabinetComptable = CabinetComptable::create([
            'nomCabinet' => $request->nomCabinet,
            'etatFinancier_id' => $request->etatFinancier_id,
        ]);

        return response()->json([
            'message' => 'Cabinet comptable créé avec succès',
            'cabinetComptable' => $cabinetComptable,
        ],200);
    }

    // Mettre à jour un cabinet comptable
    public function update(Request $request, $id)
    {
        $cabinetComptable = CabinetComptable::find($id);

        $request->validate([
            'nomCabinet' => 'required|string|max:255',
            'etatFinancier_id' => 'required|exists:etat_financiers,id',
        ]);

        if(!$cabinetComptable) {
            return response()->json(['message' => 'Cabinet comptable non trouvé'], 404);
        }

        $cabinetComptable->update([
            'nomCabinet' => $request->input ('nomCabinet'),
            'etatFinancier_id' => $request->input ('etatFinancier_id'),
        ]);

        return response()->json([
            'message' => 'Cabinet comptable mis à jour avec succès',
            'cabinetComptable' => $cabinetComptable,
        ],200);
    }

    // Supprimer un cabinet comptable
    public function destroy($id)
    {
        $cabinetComptable = CabinetComptable::findOrFail($id);
        $cabinetComptable->delete();

        return response()->json(['message' => 'Cabinet comptable supprimé avec succès']);
    }
}
