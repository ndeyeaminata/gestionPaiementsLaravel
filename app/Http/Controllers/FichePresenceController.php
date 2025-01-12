<?php

namespace App\Http\Controllers;

use App\Models\FichePresence; // Correction : Utiliser FichePresence au lieu de EtatFinancier
use Illuminate\Http\Request;

class FichePresenceController extends Controller
{
    // Liste toutes les fiches de présence
    public function index()
    {
        return response()->json(FichePresence::all(), 200); // Ajout du code de statut HTTP
    }

    // Affiche une fiche de présence spécifique
    public function show($id)
    {
        $fichePresence = FichePresence::find($id);

        if (!$fichePresence) {
            return response()->json(['message' => 'Fiche de présence non trouvée'], 404);
        }

        return response()->json($fichePresence, 200); // Ajout du code de statut HTTP
    }

    // Crée une nouvelle fiche de présence
    public function store(Request $request) // Correction : changer le nom de la méthode en store() pour suivre la convention REST
    {
        $validated = $request->validate([
            'nombre_heures' => 'required|integer',
            'certificat' => 'required|string',
            'numero_groupe' => 'required|integer',
            'statut' => 'required|string|max:255',
            'mentor_id' => 'required|integer|exists:mentors,id',
            'consultant_id' => 'required|integer|exists:consultants,id',
        ]);

        $fichePresence = FichePresence::create($validated);

        return response()->json($fichePresence, 201); // Ajout du code de statut HTTP 201 pour création
    }

    // Met à jour une fiche de présence existante
    public function update(Request $request, $id)
    {
        $fichePresence = FichePresence::find($id);

        if (!$fichePresence) {
            return response()->json(['message' => 'Fiche de présence non trouvée'], 404);
        }

        $validated = $request->validate([
            'nombre_heures' => 'required|integer',
            'certificat' => 'required|string',
            'numero_groupe' => 'required|integer',
            'statut' => 'required|string|max:255',
            'mentor_id' => 'required|integer|exists:mentors,id',
            'consultant_id' => 'required|integer|exists:consultants,id',
        ]);

        $fichePresence->update($validated);

        return response()->json($fichePresence, 200);
    }

    // Supprime une fiche de présence
    public function destroy($id)
    {
        $fichePresence = FichePresence::find($id);

        if (!$fichePresence) {
            return response()->json(['message' => 'Fiche de présence non trouvée'], 404);
        }

        $fichePresence->delete();

        return response()->json(['message' => 'Fiche de présence supprimée avec succès'], 200);
    }
}
