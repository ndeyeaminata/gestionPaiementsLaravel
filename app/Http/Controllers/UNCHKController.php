<?php

namespace App\Http\Controllers;

use App\Models\UNCHK;
use Illuminate\Http\Request;

class UNCHKController extends Controller
{
    // Liste tous les UNCHK
    public function index()
    {
        return response()->json(UNCHK::with('etatFinancier')->get());
    }

    // Affiche un UNCHK spécifique
    public function show($id)
    {
        $unchk = UNCHK::with('etatFinancier')->find($id);

        if (!$unchk) {
            return response()->json(['message' => 'UNCHK non trouvé'], 404);
        }

        return response()->json($unchk);
    }

    // Crée un nouveau UNCHK
    public function create(Request $request)
    {
        $validated = $request->validate([
            'montant' => 'required|numeric',
            'date_soumission' => 'required|date',
            'statut' => 'required|string',
            'etatFinancier_id' => 'required|exists:etat_financiers,id',
        ]);

        $unchk = UNCHK::create($validated);

        return response()->json($unchk, 201);
    }

    // Met à jour un UNCHK existant
    public function update(Request $request, $id)
    {
        $unchk = UNCHK::find($id);

        if (!$unchk) {
            return response()->json(['message' => 'UNCHK non trouvé'], 404);
        }

        $validated = $request->validate([
            'montant' => 'required|numeric',
            'date_soumission' => 'required|date',
            'statut' => 'required|string',
            'etatFinancier_id' => 'required|exists:etat_financiers,id',
        ]);

        $unchk->update($validated);

        return response()->json($unchk);
    }

    // Supprime un UNCHK
    public function destroy($id)
    {
        $unchk = UNCHK::find($id);

        if (!$unchk) {
            return response()->json(['message' => 'UNCHK non trouvé'], 404);
        }

        $unchk->delete();

        return response()->json(['message' => 'UNCHK supprimé avec succès']);
    }
}
