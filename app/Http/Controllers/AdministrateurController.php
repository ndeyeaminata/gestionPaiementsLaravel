<?php

namespace App\Http\Controllers;

use App\Models\Administrateur;
use Illuminate\Http\Request;

class AdministrateurController extends Controller
{
    // Afficher tous les administrateurs
    public function index()
    {
        $administrateurs = Administrateur::with('utilisateur', 'compte')->get();
        return response()->json($administrateurs, 200); // Ajout du code de statut HTTP
    }

    // Créer un nouvel administrateur
    public function store(Request $request) // Correction : utiliser store() pour suivre la convention REST
    {
        $validated = $request->validate([
            'utilisateur_id' => 'required|exists:utilisateurs,id',
            'compte_id' => 'required|exists:comptes,id',
        ]);

        $administrateur = Administrateur::create($validated);

        return response()->json([
            'message' => 'Administrateur créé avec succès',
            'administrateur' => $administrateur,
        ], 201); // Code de statut HTTP 201 pour création
    }

    // Afficher un administrateur spécifique
    public function show($id)
    {
        $administrateur = Administrateur::with('utilisateur', 'compte')->find($id);

        if (!$administrateur) {
            return response()->json(['message' => 'Administrateur non trouvé'], 404);
        }

        return response()->json($administrateur, 200); // Ajout du code de statut HTTP
    }

    // Mettre à jour un administrateur existant
    public function update(Request $request, $id)
    {
        $administrateur = Administrateur::find($id);

        if (!$administrateur) {
            return response()->json(['message' => 'Administrateur non trouvé'], 404);
        }

        $validated = $request->validate([
            'utilisateur_id' => 'required|exists:utilisateurs,id',
            'compte_id' => 'required|exists:comptes,id',
        ]);

        $administrateur->update($validated);

        return response()->json([
            'message' => 'Administrateur mis à jour avec succès',
            'administrateur' => $administrateur,
        ], 200);
    }

    // Supprimer un administrateur
    public function destroy($id)
    {
        $administrateur = Administrateur::find($id);

        if (!$administrateur) {
            return response()->json(['message' => 'Administrateur non trouvé'], 404);
        }

        $administrateur->delete();

        return response()->json(['message' => 'Administrateur supprimé avec succès'], 200);
    }
}
