<?php

namespace App\Http\Controllers;

use App\Models\UNCHK;
use Illuminate\Http\Request;

class UNCHKController extends Controller
{
    // Liste tous les UNCHK
    public function index()
    {
        return response()->json(UNCHK::with('etatFinancier')->get(), 200); // Ajout du code de statut HTTP
    }

    // Affiche un UNCHK spécifique
    public function show($id)
    {
        $unchk = UNCHK::with('etatFinancier')->find($id);

        if (!$unchk) {
            return response()->json(['message' => 'UNCHK non trouvé'], 404);
        }

        return response()->json($unchk, 200); // Ajout du code de statut HTTP
    }

    // Crée un nouveau UNCHK
    public function store(Request $request) // Correction : utiliser store() pour suivre la convention REST
    {
        $validated = $request->validate([
            'montant' => 'required|numeric',
            'date_soumission' => 'required|date',
            'statut' => 'required|string',
            'etatFinancier_id' => 'required|exists:etat_financiers,id',
        ]);

        $unchk = UNCHK::create($validated);

        return response()->json($unchk, 201); // Code de statut HTTP 201 pour création
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

        return response()->json($unchk, 200);
    }

    // Supprime un UNCHK
    public function destroy($id)
    {
        $unchk = UNCHK::find($id);

        if (!$unchk) {
            return response()->json(['message' => 'UNCHK non trouvé'], 404);
        }

        $unchk->delete();

        return response()->json(['message' => 'UNCHK supprimé avec succès'], 200);
    }
}
