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
}
