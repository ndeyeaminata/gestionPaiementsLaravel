<?php

namespace App\Http\Controllers;

use App\Models\Mentor;
use Illuminate\Http\Request;

class MentorController extends Controller
{
    // Liste tous les mentors
    public function index()
    {
        return response()->json(Mentor::with('utilisateur')->get());
    }

    // Affiche un mentor spécifique
    public function show($id)
    {
        $mentor = Mentor::with('utilisateur')->find($id);

        if (!$mentor) {
            return response()->json(['message' => 'Mentor non trouvé'], 404);
        }

        return response()->json([
            'message' => 'Mentor trouvé',
            'mentor' => $mentor,
        ],201);
    }

    // Crée un nouveau mentor
    public function create(Request $request)
    {
        $validated = $request->validate([
            'utilisateur_id' => 'required|exists:utilisateurs,id',
        ]);

        $mentor = Mentor::create($validated);

        return response()->json([
            'message' => 'Mentor créé avec succès',
            'mentor' => $mentor,
        ],201);
    }

    // Met à jour un mentor existant
    public function update(Request $request, $id)
    {
        $mentor = Mentor::find($id);

        if (!$mentor) {
            return response()->json(['message' => 'Mentor non trouvé'], 404);
        }

        $validated = $request->validate([
            'utilisateur_id' => 'required|exists:utilisateurs,id',
        ]);

        $mentor->update($validated);

        return response()->json([
            'message' => 'Mentor mis à jour avec succès',
            'mentor' => $mentor,
        ],201);
    }

    // Supprime un mentor
    public function destroy($id){
        $mentor = Mentor::find($id);
        if (!$mentor) {
            return response()->json(['message' => 'Mentor non trouvé'], 404);
        }

        $mentor->delete();

        return response()->json(['message' => 'Mentor supprimé avec succès'],201);
    }

        public function showProfile()
        {
            $mentor = Auth::user();

            // Vérifie si l'utilisateur est bien un mentor
            if (!$mentor->mentor) {
                return response()->json(['message' => 'Accès refusé. Vous n\'êtes pas un mentor.'], 403);
            }

            return response()->json([
                'id' => $mentor->id,
                'nom' => $mentor->nom,
                'prenom' => $mentor->prenom,
                'email' => $mentor->email,
                'telephone' => $mentor->telephone,
                'created_at' => $mentor->created_at,
            ], 200);
        }


        public function updateProfile(Request $request)
    {
        // Récupère le mentor connecté
        $mentor = Auth::user();

        // Vérifie si l'utilisateur est bien un mentor
        if (!$mentor->mentor) {
            return response()->json(['message' => 'Accès refusé. Vous n\'êtes pas un mentor.'], 403);
        }

        // Validation des champs
        $request->validate([
            'nom' => 'string|max:255',
            'prenom' => 'string|max:255',
            'email' => 'email|unique:utilisateurs,email,' . $mentor->id,
            'telephone' => 'string|max:20',
            'password' => 'nullable|min:6|confirmed',
        ]);

        // Mise à jour des informations du mentor
        $mentor->nom = $request->nom ?? $mentor->nom;
        $mentor->prenom = $request->prenom ?? $mentor->prenom;
        $mentor->email = $request->email ?? $mentor->email;
        $mentor->telephone = $request->telephone ?? $mentor->telephone;

        // Mise à jour du mot de passe si fourni
        if ($request->password) {
            $mentor->password = Hash::make($request->password);
        }

        $mentor->save();

        return response()->json(['message' => 'Profil mis à jour avec succès', 'mentor' => $mentor], 200);
    }

    }


