<?php

namespace App\Http\Controllers;

use App\Models\Compte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // Ajout pour le hachage du mot de passe

class CompteController extends Controller
{
    // Afficher tous les comptes
    public function index()
    {
        $comptes = Compte::all();
        return response()->json($comptes, 200); // Ajout du code de statut HTTP
    }

    // Afficher un compte spécifique
    public function show($id)
    {
        $compte = Compte::find($id);

        if (!$compte) {
            return response()->json(['message' => 'Compte non trouvé'], 404);
        }

        return response()->json([
            'message' => 'Compte trouvé',
            'compte' => $compte,
        ], 200); // Ajout du code de statut HTTP
    }

    // Créer un nouveau compte
    public function store(Request $request) // Correction : utiliser store() pour suivre la convention REST
    {
        $validated = $request->validate([
            'email' => 'required|email|unique:comptes,email',
            'password' => 'required|string|min:6',
        ]);

        $compte = Compte::create([
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']), // Hachage du mot de passe
        ]);

        return response()->json([
            'message' => 'Compte créé avec succès',
            'compte' => $compte,
        ], 201); // Code de statut HTTP 201 pour création
    }

    // Mettre à jour un compte
    public function update(Request $request, $id)
    {
        $compte = Compte::find($id);

        if (!$compte) {
            return response()->json(['message' => 'Compte non trouvé'], 404);
        }

        $validated = $request->validate([
            'email' => 'sometimes|required|email|unique:comptes,email,' . $id,
            'password' => 'nullable|string|min:6',
        ]);

        if (isset($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']); // Hachage du mot de passe
        }

        $compte->update($validated);

        return response()->json([
            'message' => 'Compte mis à jour avec succès',
            'compte' => $compte,
        ], 200);
    }

    // Supprimer un compte
    public function destroy($id)
    {
        $compte = Compte::find($id);

        if (!$compte) {
            return response()->json(['message' => 'Compte non trouvé'], 404);
        }

        $compte->delete();

        return response()->json(['message' => 'Compte supprimé avec succès'], 200);
    }
}
