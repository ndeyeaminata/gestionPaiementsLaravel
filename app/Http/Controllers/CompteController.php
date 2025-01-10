<?php

namespace App\Http\Controllers;

use App\Models\Compte;
use Illuminate\Http\Request;

class CompteController extends Controller
{
    // Afficher tous les comptes
    public function index()
    {
        $comptes = Compte::all();
        return response()->json($comptes);
    }

    // Afficher un compte spécifique
    public function show($id)
    {
        $compte = Compte::find($id);
        if (!$compte) {
            return response()->json(['message' => 'Compte non trouvé'], 404);
        }
        return response()->json([
            'message' => 'Compte trouvé ',
            'compte' => $compte,
        ],200);
    }

    // Créer un nouveau compte
    public function store(Request $request, $id)
    {
        $request = validate([
            'email' => 'required|email|unique:comptes,email',
            'password' => 'required|min:6',
        ]);

        $compte = Compte::create([
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        
        return response()->json([
            'message' => 'Compte créé avec succès',
            'compte' => $compte,
        ],200);
    }

    // Mettre à jour un compte
    public function update(Request $request, $id)
    {
        $compte = Compte::find($id);

        $request->validate([
            'email' => 'required|email|unique:comptes,email,' . $id,
            'password' => 'nullable|min:6',
        ]);

        $compte->update($request->only(['email', 'password']));
        return response()->json(
            [
                'message' => 'Compte mis à jour avec succès',
                'compte' => $compte,
            ],200
        );
    }

    // Supprimer un compte
    public function destroy($id)
    {
        $compte = Compte::findOrFail($id);
        $compte->delete();

        return response()->json(['message' => 'Compte supprimé avec succès']);
    }
}
