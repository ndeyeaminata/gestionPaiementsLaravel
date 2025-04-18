<?php

namespace App\Http\Controllers;

use App\Models\Rapport;
use Illuminate\Http\Request;

class RapportController extends Controller
{
    // Liste tous les rapports
    public function index()
    {
        return response()->json(Rapport::with('consultant')->get());
    }

    // Affiche un rapport spécifique
    public function show($id)
    {
        $rapport = Rapport::with('consultant')->find($id);

        if (!$rapport) {
            return response()->json(['message' => 'Rapport non trouvé'], 404);
        }

        return response()->json([
            'rapport' => $rapport,
        ]);
    }

    // Crée un nouveau rapport
    public function create(Request $request)
    {
        $validated = $request->validate([
            'date_soumission' => 'required|date',
            'detail_rapport' => 'required|string',
            'consultant_id' => 'required|exists:consultants,id',
        ]);

        $rapport = Rapport::create($validated);

        return response()->json([
            'message' => 'Rapport enregistré avec succes'
        ],201);
    }

    // Met à jour un rapport existant
    public function update(Request $request, $id)
    {
        $rapport = Rapport::find($id);

        if (!$rapport) {
            return response()->json(['message' => 'Rapport non trouvé'], 404);
        }

        $validated = $request->validate([
            'date_soumission' => 'required|date',
            'detail_rapport' => 'required|string',
            'consultant_id' => 'required|exists:consultants,id',
        ]);

        $rapport->update($validated);

        return response()->json([
            'message' => 'Rapport mis à jour avec succès',
            'rapport' => $rapport,
        ],201);
    }

    // Supprime un rapport
    public function destroy($id)
    {
        $rapport = Rapport::find($id);

        if (!$rapport) {
            return response()->json(['message' => 'Rapport non trouvé'], 404);
        }

        $rapport->delete();

        return response()->json(['message' => 'Rapport supprimé avec succès'],201);
    }
}
