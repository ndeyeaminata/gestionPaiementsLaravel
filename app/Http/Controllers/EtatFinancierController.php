<?php

namespace App\Http\Controllers;

use App\Models\EtatFinancier;
use Illuminate\Http\Request;

class EtatFinancierController extends Controller
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

    public function transfererVersUnchk($id)
{
    // Vérifier si l'état financier existe
    $etat = EtatFinancier::find($id);
    if (!$etat) {
        return response()->json(['message' => 'État financier introuvable'], 404);
    }

    // Vérifier si l'état financier est bien signé
    if ($etat->statut !== 'Signé') {
        return response()->json(['message' => 'Seuls les états financiers signés peuvent être transférés'], 400);
    }

    // Créer une nouvelle entrée dans UNCHK
    $unchk = UNCHK::create([
        'etatFinancier_id' => $etat->id,
        'date_soumission' => now(),
        'statut' => 'En attente',
    ]);

    return response()->json(['message' => 'État financier transféré vers UNCHK avec succès', 'unchk' => $unchk], 200);
}

}
