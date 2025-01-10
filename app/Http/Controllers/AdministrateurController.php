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
        
        $administrateurs = Administrateur::all();
        return response()->json($administrateurs);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $request = validate([
           
        ]);

        $administrateur = Administrateur::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'password' => $request->password,
            'telephone' => $request->telephone,
        ]);

        return response()->json([
            'message' => 'administrateur créé avec succès',
            'administrateur' => $administrateur
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
        $administrateur = administrateur::find($id);
        return response()->json([
            'message' => 'administrateur trouvé',
            'administrateur' => $administrateur
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
        $administrateur = administrateur::find($id);

        if (!$administrateur) {
            return response()->json([
                'message' => 'administrateur non trouvé'
            ], 404);
        }

        $request = validate([
            'nom' => 'required||string',
            'prenom' => 'required||string',
            'email' => 'required||string',
            'password' => 'required||string',
            'telephone' => 'required||string',
        ]);

        $administrateur = administrateur::update([
            'nom' => $request->input ('nom'),
            'prenom' => $request->input ('prenom'),
            'email' => $request->input ('email'),
            'password' => $request->input ('password'),
            'telephone' => $request->input ('telephone'),
        ]);
        
        return response()->json([
            'message' => 'administrateur mis à jour avec succès',
            'administrateur' => $administrateur
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $administrateur = administrateur::find($id);
        if(!$administrateur) {
            return response()->json([
                'message' => 'administrateur non trouvé'
            ], 404);
        }

        $administrateur->delete();
        return response()->json([
            'message' => 'administrateur supprimé avec succès'
        ]);
    }

    
}
