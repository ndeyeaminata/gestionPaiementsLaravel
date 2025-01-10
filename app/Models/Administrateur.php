<?php

namespace App\Http\Controllers;

use App\Models\Administrateur;
use App\Models\Utilisateur;
use App\Models\Compte;
use Illuminate\Http\Request;

class AdministrateurController extends Controller
{
    // Créer un nouvel administrateur
    public function create(Request $request)
    {
        $request->validate([
            'utilisateur_id' => 'required|exists:utilisateurs,id',
            'compte_id' => 'required|exists:comptes,id',
        ]);

        $administrateur = Administrateur::create([
            'utilisateur_id' => $request->utilisateur_id,
            'compte_id' => $request->compte_id,
        ]);

        return response()->json([
            'message' => 'Administrateur créé avec succès',
            'administrateur' => $administrateur,
        ],200);
    }

    // Afficher tous les administrateurs
    public function index()
    {
        $administrateurs = Administrateur::all();
        return response()->json($administrateurs);
    }

    // Afficher un administrateur spécifique
    public function show(Request $request, $id)
    {
        $administrateur = Administrateur::find($id);

        if(!$administrateur) {
            return response()->json(['message' => 'Administrateur non trouvé'], 404);
        }
        
        return response()->json([
            'message' => 'Administrateur trouvé',
            'administrateur' => $administrateur,
        ],200);
    }

    // Mettre à jour un administrateur existant
    public function update(Request $request, $id)
    {
        $request->validate([
            'utilisateur_id' => 'required|exists:utilisateurs,id',
            'compte_id' => 'required|exists:comptes,id',
        ]);

        $administrateur = Administrateur::find($id);
        
        if(!$administrateur) {
            return response()->json(['message' => 'Administrateur non trouvé'], 404);
        }

        $administrateur->update([
            'utilisateur_id' => $request->input ('utilisateur_id'),
            'compte_id' => $request->input ('compte_id'),
        ]);

        return response()->json([
            'message' => 'Administrateur mis à jour avec succès',
            'administrateur' => $administrateur,
        ],200);
    }

    // Supprimer un administrateur
    public function destroy($id)
    {
        $administrateur = Administrateur::find($id);

        if(!$administrateur) {
            return response()->json(['message' => 'Administrateur non trouvé'], 404);
        }

        $administrateur->delete();

        return response()->json([
            'message' => 'Administrateur supprimé avec succès',
        ],200);
    }

    public function createAccount(Request $request, $role, $utilisateurId)
    {
        $request->validate([
            'email' => 'required|email|unique:comptes,email',
            'password' => 'required|min:8',
        ]);

        // Vérifier si le rôle est un mentor ou consultant
        if ($role !== 'mentor' && $role !== 'consultant') {
            return response()->json(['error' => 'Rôle invalide'], 400);
        }

        // Vérification de l'existence de l'utilisateur selon le rôle
        $utilisateur = null;
        if ($role === 'mentor') {
            $user = Mentor::findOrFail($userId);
        } elseif ($role === 'consultant') {
            $user = Consultant::findOrFail($userId);
        }

        // Crée un nouveau compte pour l'utilisateur
        $compte = Compte::create([
            'email' => $request->email,
            'password' => bcrypt($request->password), // Hachage du mot de passe
            'user_id' => $user->id, // Associer l'ID de l'utilisateur
            'role' => $role // Optionnel, selon comment vous gérez les rôles
        ]);

        return response()->json([
            'message' => 'Compte créé avec succès',
            'compte' => $compte,
        ],200);
    }
}
