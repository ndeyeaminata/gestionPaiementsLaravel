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

}