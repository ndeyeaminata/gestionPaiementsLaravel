<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UtilisateurController extends Controller
{
    /**
     * Récupérer tous les utilisateurs.
     */
    public function index()
    {
        $utilisateurs = Utilisateur::all();
        return response()->json($utilisateurs);
    }

    /**
     * Création d'un utilisateur avec hachage du mot de passe.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'email' => 'required|string|email|unique:utilisateurs,email',
            'password' => 'required|string|min:6',
            'telephone' => 'required|string',
        ]);

        $utilisateur = Utilisateur::store([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'password' =>$request->password,
            'telephone' => $request->telephone,
        ]);

        return response()->json([
            'message' => 'Utilisateur créé avec succès',
            'utilisateur' => $utilisateur
        ], 201);
    }

    /**
     * Récupérer un utilisateur spécifique.
     */
    public function show($id)
    {
        $utilisateur = Utilisateur::find($id);
        if (!$utilisateur) {
            return response()->json(['message' => 'Utilisateur non trouvé'], 404);
        }

        return response()->json([
            'message' => 'Utilisateur trouvé',
            'utilisateur' => $utilisateur
        ], 200);
    }

    /**
     * Mettre à jour un utilisateur.
     */
    public function update(Request $request, $id)
    {
        $utilisateur = Utilisateur::find($id);
        if (!$utilisateur) {
            return response()->json(['message' => 'Utilisateur non trouvé'], 404);
        }

        $request->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'email' => 'required|string|email|unique:utilisateurs,email,'.$id,
            'password' => 'nullable|string|min:6',
            'telephone' => 'required|string',
        ]);

        $utilisateur->nom = $request->nom;
        $utilisateur->prenom = $request->prenom;
        $utilisateur->email = $request->email;
        $utilisateur->telephone = $request->telephone;

        // Vérifier si le mot de passe doit être mis à jour
        if ($request->filled('password')) {
            $utilisateur->password = Hash::make($request->password);
        }

        $utilisateur->save();

        return response()->json([
            'message' => 'Utilisateur mis à jour avec succès',
            'utilisateur' => $utilisateur
        ], 200);
    }

    /**
     * Supprimer un utilisateur.
     */
    public function destroy($id)
    {
        $utilisateur = Utilisateur::find($id);
        if (!$utilisateur) {
            return response()->json(['message' => 'Utilisateur non trouvé'], 404);
        }

        $utilisateur->delete();
        return response()->json(['message' => 'Utilisateur supprimé avec succès'], 200);
    }

    /**
     * Connexion d'un utilisateur et génération du token Passport.
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $utilisateur = Utilisateur::where('email', $request->email)->first();

        if (!$utilisateur || !Hash::check($request->password, $utilisateur->password)) {
            return response()->json([
                'message' => 'Identifiants incorrects'
            ], 401);
        }

        $token = $utilisateur->createToken('Personal Access Token')->accessToken;

        return response()->json([
            'message' => 'Login réussi',
            'token' => $token,
            'utilisateur' => $utilisateur
        ], 200);
    }



}
