<?php

namespace App\Http\Controllers;

use App\Models\FichePresence;
use Illuminate\Http\Request;

class FichePresenceController extends Controller
{
    // Liste tous les états financiers
    public function index()
    {
        return response()->json(EtatFinancier::all());
    }

    // Affiche un état financier spécifique
    public function show($id)
    {
        $etatFinancier = EtatFinancier::find($id);

        if (!$etatFinancier) {
            return response()->json(['message' => 'État financier non trouvé'], 404);
        }

        return response()->json([
            'message' => 'État financier trouvé',
            'etatFinancier' => $etatFinancier,
        ],201);
    }

    // Crée un nouvel état financier
    public function create(Request $request)
    {
        $validated = $request->validate([
            'statut' => 'required|string|max:255',
        ]);

        $etatFinancier = EtatFinancier::create($validated);

        return response()->json([
            'message' => 'État financier créé avec succès',
            'etatFinancier' => $etatFinancier,
        ],201);
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

        return response()->json([
            'message' => 'État financier mis à jour avec succès',
            'etatFinancier' => $etatFinancier,
        ],201);
    }

    // Supprime un état financier
    public function destroy($id)
    {
        $etatFinancier = EtatFinancier::find($id);

        if (!$etatFinancier) {
            return response()->json(['message' => 'État financier non trouvé'], 404);
        }

        $etatFinancier->delete();

        return response()->json(['message' => 'État financier supprimé avec succès'],201);
    }

    

}
