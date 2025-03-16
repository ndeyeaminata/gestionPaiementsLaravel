<?php

namespace App\Http\Controllers;

use App\Models\Consultant;
use Illuminate\Http\Request;

class ConsultantController extends Controller
{
    // Liste tous les consultants
    public function index()
    {
        return response()->json(Consultant::with('utilisateur')->get());
    }

    // Affiche un consultant spécifique
    public function show($id)
    {
        $consultant = Consultant::with('utilisateur')->find($id);
        if (!$consultant) {
            return response()->json(['message' => 'Consultant non trouvé'], 404);
        }
        return response()->json([
            'message' => 'Consultant trouvé',
            'consultant' => $consultant,
        ],201);
    }

    // Crée un nouveau consultant
    public function create(Request $request)
    {
        $validated = $request->validate([
            'utilisateur_id' => 'required|exists:utilisateurs,id',
        ]);

        $consultant = Consultant::create($validated);
        return response()->json([
            'message' => 'Consultant créé avec succès',
            'consultant' => $consultant,
        ],201);
    }

    // Met à jour un consultant existant
    public function update(Request $request, $id)
    {
        $consultant = Consultant::find($id);
        if (!$consultant) {
            return response()->json(['message' => 'Consultant non trouvé'], 404);
        }

        $validated = $request->validate([
            'utilisateur_id' => 'required|exists:utilisateurs,id',
        ]);

        $consultant->update($validated);
        return response()->json([
            'message' => 'Consultant mis à jour avec succès',
            'consultant' => $consultant,
        ],201);
    }

    // Supprime un consultant
    public function destroy($id)
    {
        $consultant = Consultant::find($id);
        if (!$consultant) {
            return response()->json(['message' => 'Consultant non trouvé'], 404);
        }

        $consultant->delete();
        return response()->json(['message' => 'Consultant supprimé avec succès'],201);
    }


    public function showProfile()
    {
        // Récupère l'utilisateur actuellement connecté
        $consultant = Auth::user();

        // Vérifie si l'utilisateur est bien un consultant
        if (!$consultant->consultant) {
            return response()->json(['message' => 'Accès refusé. Vous n\'êtes pas un consultant.'], 403);
        }

        return response()->json([
            'id' => $consultant->id,
            'nom' => $consultant->nom,
            'prenom' => $consultant->prenom,
            'email' => $consultant->email,
            'telephone' => $consultant->telephone,
            'created_at' => $consultant->created_at,
        ], 200);
    }


    public function updateProfile(Request $request)
    {
        // Récupère le consultant connecté
        $consultant = Auth::user();

        // Vérifie si l'utilisateur est bien un consultant
        if (!$consultant->consultant) {
            return response()->json(['message' => 'Accès refusé. Vous n\'êtes pas un consultant.'], 403);
        }

        // Validation des champs
        $request->validate([
            'nom' => 'string|max:255',
            'prenom' => 'string|max:255',
            'email' => 'email|unique:utilisateurs,email,' . $consultant->id,
            'telephone' => 'string|max:20',
            'password' => 'nullable|min:6|confirmed',
        ]);

        // Mise à jour des informations du consultant
        $consultant->nom = $request->nom ?? $consultant->nom;
        $consultant->prenom = $request->prenom ?? $consultant->prenom;
        $consultant->email = $request->email ?? $consultant->email;
        $consultant->telephone = $request->telephone ?? $consultant->telephone;

        // Mise à jour du mot de passe si fourni
        if ($request->password) {
            $consultant->password = Hash::make($request->password);
        }

        $consultant->save();

        return response()->json(['message' => 'Profil mis à jour avec succès', 'consultant' => $consultant], 200);
    }
}
