<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    // Liste tous les rôles
    public function index()
    {
        return response()->json(Role::all(), 200); // Ajout du code de statut HTTP
    }

    // Affiche un rôle spécifique
    public function show($id)
    {
        $role = Role::find($id);

        if (!$role) {
            return response()->json(['message' => 'Rôle non trouvé'], 404);
        }

        return response()->json($role, 200); // Ajout du code de statut HTTP
    }

    // Crée un nouveau rôle
    public function store(Request $request) // Correction : changer create() en store() pour suivre la convention REST
    {
        $validated = $request->validate([
            'nomRole' => 'required|string|max:255|unique:roles,nomRole',
        ]);

        $role = Role::create($validated);

        return response()->json($role, 201); // Code de statut HTTP 201 pour création
    }

    // Met à jour un rôle existant
    public function update(Request $request, $id)
    {
        $role = Role::find($id);

        if (!$role) {
            return response()->json(['message' => 'Rôle non trouvé'], 404);
        }

        $validated = $request->validate([
            'nomRole' => 'required|string|max:255|unique:roles,nomRole,' . $id,
        ]);

        $role->update($validated);

        return response()->json($role, 200);
    }

    // Supprime un rôle
    public function destroy($id)
    {
        $role = Role::find($id);

        if (!$role) {
            return response()->json(['message' => 'Rôle non trouvé'], 404);
        }

        $role->delete();

        return response()->json(['message' => 'Rôle supprimé avec succès'], 200);
    }
}
