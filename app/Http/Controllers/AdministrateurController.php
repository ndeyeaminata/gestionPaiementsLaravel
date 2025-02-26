<?php

namespace App\Http\Controllers;

use App\Models\Administrateur;
use Illuminate\Http\Request;

class AdministrateurController extends Controller
{
    // Liste des administrateurs
    public function index()
    {
        $administrateurs = Administrateur::with('utilisateur', 'compte')->get();
        return response()->json([
            'message' => 'Liste des administrateurs',
            'administrateurs' => $administrateurs,
        ],201);
    }

    // Créer un administrateur
    public function create(Request $request)
    {
        $validated = $request->validate([
            'utilisateur_id' => 'required|exists:utilisateurs,id',
            'compte_id' => 'required|exists:comptes,id',
            'role' => 'nullable|string|max:255',
        ]);

        $administrateur = Administrateur::create($validated);
        return response()->json([
            'message' => 'Administrateur créé avec succès',
            'administrateur' => $administrateur,
        ],201);
    }

    // Afficher un administrateur spécifique
    public function show($id)
    {
        $administrateur = Administrateur::with('utilisateur', 'compte')->findOrFail($id);
        return response()->json([
            'message' => 'Administrateur trouvé',
            'administrateur' => $administrateur,
        ],201);
    }

    // Mettre à jour un administrateur
    public function update(Request $request, $id)
    {
        $administrateur = Administrateur::findOrFail($id);

        $validated = $request->validate([
            'utilisateur_id' => 'required|exists:utilisateurs,id',
            'compte_id' => 'required|exists:comptes,id',
            'role' => 'nullable|string|max:255',
        ]);

        $administrateur->update($validated);

        return response()->json([
            'message' => 'Administrateur mis à jour avec succès',
            'administrateur' => $administrateur,
        ],201);
    }

    // Supprimer un administrateur
    public function destroy($id)
    {
        $administrateur = Administrateur::findOrFail($id);
        $administrateur->delete();
        return response()->json(['message' => 'Administrateur supprimé avec succès.'],201);
    }
}
