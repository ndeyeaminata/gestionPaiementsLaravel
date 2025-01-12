<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // Ajout pour le hachage du mot de passe

class UtilisateurController extends Controller
{
    // Liste tous les utilisateurs
    public function index()
    {
        $utilisateurs = Utilisateur::all();
        return response()->json($utilisateurs, 200); // Ajout du code de statut HTTP
    }

    // Crée un nouvel utilisateur
    public function store(Request $request) // Correction : changer create() en store() pour suivre la convention REST
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:utilisateurs,email',
            'password' => 'required|string|min:8',
            'telephone' => 'required|string|max:15',
            'role_id' => 'required|exists:roles,id',
        ]);

        $validated['password'] = Hash::make($validated['password']); // Hachage du mot de passe

        $utilisateur = Utilisateur::create($validated);

        return response()->json([
            'message' => 'Utilisateur créé avec succès',
            'utilisateur' => $utilisateur
        ], 201); // Code de statut HTTP 201 pour création
    }

    // Affiche un utilisateur spécifique
    public function show($id)
    {
        $utilisateur = Utilisateur::find($id);

        if (!$utilisateur) {
            return response()->json(['message' => 'Utilisateur non trouvé'], 404);
        }

        return response()->json($utilisateur, 200); // Ajout du code de statut HTTP
    }

    // Met à jour un utilisateur existant
    public function update(Request $request, $id)
    {
        $utilisateur = Utilisateur::find($id);

        if (!$utilisateur) {
            return response()->json(['message' => 'Utilisateur non trouvé'], 404);
        }

        $validated = $request->validate([
            'nom' => 'sometimes|required|string|max:255',
            'prenom' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|email|unique:utilisateurs,email,' . $id,
            'password' => 'sometimes|required|string|min:8',
            'telephone' => 'sometimes|required|string|max:15',
            'role_id' => 'sometimes|required|exists:roles,id',
        ]);

        if (isset($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']); // Hachage du mot de passe
        }

        $utilisateur->update($validated);

        return response()->json([
            'message' => 'Utilisateur mis à jour avec succès',
            'utilisateur' => $utilisateur
        ], 200);
    }

    // Supprime un utilisateur
    public function destroy($id)
    {
        $utilisateur = Utilisateur::find($id);

        if (!$utilisateur) {
            return response()->json(['message' => 'Utilisateur non trouvé'], 404);
        }

        $utilisateur->delete();

        return response()->json(['message' => 'Utilisateur supprimé avec succès'], 200);
    }

    // Authentifie un utilisateur
    public function authentifier(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $utilisateur = Utilisateur::where('email', $validated['email'])->first();

        if (!$utilisateur || !Hash::check($validated['password'], $utilisateur->password)) {
            return response()->json(['message' => 'Les informations d\'identification sont incorrectes'], 401);
        }

        return response()->json([
            'message' => 'Utilisateur authentifié avec succès',
            'utilisateur' => $utilisateur
        ], 200);
    }
}
