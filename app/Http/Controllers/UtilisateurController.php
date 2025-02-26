<?php

namespace App\Http\Controllers;
use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;



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
    $request->validate([
        'nom' => 'required|string',
        'prenom' => 'required|string',
        'email' => 'required|string|email',
        'password' => 'required|string',
        'telephone' => 'required|string',
    ]);

    $utilisateur = Utilisateur::create([
        'nom' => $request->nom,
        'prenom' => $request->prenom,
        'email' => $request->email,
        'password' => bcrypt($request->password), // Hachage du mot de passe
        'telephone' => $request->telephone,
    ]);

    return response()->json([
        'message' => 'Utilisateur créé avec succès',
        'utilisateur' => $utilisateur
    ],201);
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
        if (!$utilisateur) {
            return response()->json([
                'message' => 'Utilisateur non trouvé'
            ], 404);
        }

        return response()->json([
            'message' => 'Utilisateur  trouvé',
            'utilisateur' => $utilisateur
        ],201);
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

        $request -> validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'email' => 'required|string',
            'password' => 'required|string',
            'telephone' => 'required|string',
        ]);

        $utilisateur -> update([
            'nom' => $request->input ('nom'),
            'prenom' => $request->input ('prenom'),
            'email' => $request->input ('email'),
            'password' => $request->has('password') ? bcrypt($request->input('password')) : $utilisateur->password,
            'telephone' => $request->input ('telephone'),
        ]);
        
        return response()->json([
            'message' => 'Utilisateur mis à jour avec succès',
            'utilisateur' => $utilisateur
        ],201);
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
        ],201);
    }

    public function authentifier(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
    
        $utilisateur = Utilisateur::where('email', $request->email)->first();
    
        if (!$utilisateur || !Hash::check($request->password, $utilisateur->password)) {
            return response()->json([
                'message' => 'Identifiants incorrects'
            ], 401);
        }
    
        return response()->json([
            'message' => 'Utilisateur authentifié avec succès',
            'utilisateur' => $utilisateur
        ],201);
    }


    public function getLatestUsers()
    {
        // Récupérer les 10 derniers utilisateurs
        $users = User::orderBy('created_at', 'desc')->take(10)->get();

        // Retourner la réponse JSON
        return response()->json($users);
    }
    
    



    public function login(Request $request)
    {
        // Validation des données
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Tentative de connexion
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $token = $user->createToken('authToken')->accessToken;

            // Retourner la réponse JSON avec le token
            return response()->json([
                'message' => 'Login successful',
                'token' => $token,
                'user' => $user,
            ], 200);
        } else {
            // Échec de l'authentification
            return response()->json([
                'message' => 'Unauthorized',
                'errors' => ['email' => ['Invalid credentials']],
            ], 401);
        }
    }
}


    

