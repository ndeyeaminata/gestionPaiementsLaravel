<?php

namespace App\Http\Controllers;

use App\Models\EtatFinancier;
use Illuminate\Http\Request;

class EtatFinancierController extends Controller
{
    // Liste tous les états financiers
    public function index()
    {
        return response()->json(EtatFinancier::all(), 200); // Ajout du code de statut HTTP
    }

    // Affiche un état financier spécifique
    public function show($id)
    {
        $etatFinancier = EtatFinancier::find($id);

        if (!$etatFinancier) {
            return response()->json(['message' => 'État financier non trouvé'], 404);
        }

        return response()->json($etatFinancier, 200); // Ajout du code de statut HTTP
    }

    // Crée un nouvel état financier
    public function store(Request $request) // Correction : remplacer create() par store() pour suivre la convention REST
    {
        $validated = $request->validate([
            'statut' => 'required|string|max:255',
        ]);

        $etatFinancier = EtatFinancier::create($validated);

        return response()->json($etatFinancier, 201); // Code de statut HTTP 201 pour création
    }

    // Met à jour un état financier existant
    public function update(Request $request, $id)
    {
        $etatFinancier = EtatFinancier::find($id);

        if (!$etatFinancier) {
            return response()->json(['message' => 'État financier non trouvé'], 404);
        }

        $validated = $request->validate([
            'statut' => 'required|string|max:255',
        ]);

        $etatFinancier->update($validated);

        return response()->json($etatFinancier, 200);
    }

    // Supprime un état financier
    public function destroy($id)
    {
        $etatFinancier = EtatFinancier::find($id);

        if (!$etatFinancier) {
            return response()->json(['message' => 'État financier non trouvé'], 404);
        }

        $etatFinancier->delete();

        return response()->json(['message' => 'État financier supprimé avec succès'], 200);
    }
}
