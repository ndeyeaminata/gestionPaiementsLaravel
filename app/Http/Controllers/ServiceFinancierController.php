<?php

namespace App\Http\Controllers;

use App\Models\ServiceFinancier;
use Illuminate\Http\Request;

class ServiceFinancierController extends Controller
{
    // Liste tous les services financiers
    public function index()
    {
        return response()->json(ServiceFinancier::with('etatFinancier')->get());
    }

    // Affiche un service financier spécifique
    public function show($id)
    {
        $serviceFinancier = ServiceFinancier::with('etatFinancier')->find($id);

        if (!$serviceFinancier) {
            return response()->json(['message' => 'Service financier non trouvé'], 404);
        }

        return response()->json($serviceFinancier);
    }

    // Crée un nouveau service financier
    public function create(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'etatFinancier_id' => 'required|exists:etat_financiers,id',
        ]);

        $serviceFinancier = ServiceFinancier::create($validated);

        return response()->json($serviceFinancier, 201);
    }

    // Met à jour un service financier existant
    public function update(Request $request, $id)
    {
        $serviceFinancier = ServiceFinancier::find($id);

        if (!$serviceFinancier) {
            return response()->json(['message' => 'Service financier non trouvé'], 404);
        }

        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'etatFinancier_id' => 'required|exists:etat_financiers,id',
        ]);

        $serviceFinancier->update($validated);

        return response()->json($serviceFinancier);
    }

    // Supprime un service financier
    public function destroy($id)
    {
        $serviceFinancier = ServiceFinancier::find($id);

        if (!$serviceFinancier) {
            return response()->json(['message' => 'Service financier non trouvé'], 404);
        }

        $serviceFinancier->delete();

        return response()->json(['message' => 'Service financier supprimé avec succès']);
    }
}
