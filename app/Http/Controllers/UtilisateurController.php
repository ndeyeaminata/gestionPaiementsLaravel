<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use Illuminate\Http\Request;

class UtilisateurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $utilisateurs = Utilisateur::all();
        return response()->json($utilisateurs);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $request = validate([
            'nom' => 'required||string',
            'prenom' => 'required||string',
            'email' => 'required||string',
            'password' => 'required||string',
            'telephone' => 'required||string',
        ]);

        $utilisateur = Utilisateur::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'password' => $request->password,
            'telephone' => $request->telephone,
        ]);

        return response()->json([
            'message' => 'Utilisateur créé avec succès',
            'utilisateur' => $utilisateur
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */


    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        $utilisateur = Utilisateur::find($id);
        return response()->json([
            'message' => 'Utilisateur trouvé',
            'utilisateur' => $utilisateur
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
   
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $utilisateur = Utilisateur::find($id);

        if (!$utilisateur) {
            return response()->json([
                'message' => 'Utilisateur non trouvé'
            ], 404);
        }

        $request = validate([
            'nom' => 'required||string',
            'prenom' => 'required||string',
            'email' => 'required||string',
            'password' => 'required||string',
            'telephone' => 'required||string',
        ]);

        $utilisateur = Utilisateur::update([
            'nom' => $request->input ('nom'),
            'prenom' => $request->input ('prenom'),
            'email' => $request->input ('email'),
            'password' => $request->input ('password'),
            'telephone' => $request->input ('telephone'),
        ]);
        
        return response()->json([
            'message' => 'Utilisateur mis à jour avec succès',
            'utilisateur' => $utilisateur
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $utilisateur = Utilisateur::find($id);
        if(!$utilisateur) {
            return response()->json([
                'message' => 'Utilisateur non trouvé'
            ], 404);
        }

        $utilisateur->delete();
        return response()->json([
            'message' => 'Utilisateur supprimé avec succès'
        ]);
    }

    public function authentifier(Request $request){
       
        $request = validate([
            'email' => 'required||string',
            'password' => 'required||string',
        ]);

       
        if(!$utilisateur){
            return response()->json([
                'message' => 'Utilisateur non trouvé'
            ], 404);
        }

        $utilisateur = Utilisateur::where('email', $request->email)->first();
        if($utilisateur->password !== $request->password){
            return response()->json([
                'message' => 'Mot de passe incorrect'
            ], 401);
        }
        return response()->json([
            'message' => 'Utilisateur authentifié avec succès',
            'utilisateur' => $utilisateur
        ]);
    }
}
