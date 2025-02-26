<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    // Liste tous les rôles
    public function index()
    {
        $roles = Role::all();
        return response()->json([
            'message' => 'Liste des rôles',
            'roles' => $roles,
        ],201);
    }

    // Affiche un rôle spécifique
    public function show($id)
    {
        $role = Role::find($id);

        if (!$role) {
            return response()->json(['message' => 'Rôle non trouvé'], 404);
        }

        return response()->json(
            [
                'message' => 'Rôle trouvé',
                'role' => $role,
            ],201
        );
    }

    // Crée un nouveau rôle
    public function create(Request $request)
    {
        $validated = $request->validate([
            'nomRole' => 'required|string|max:255|unique:roles,nomRole',
        ]);

        $role = Role::create($validated);

        return response()->json([
            'message' => 'Rôle créé avec succès',
            'role' => $role,
        ],201);
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

        return response()->json([
            'message' => 'Rôle mis à jour avec succès',
            'role' => $role,
        ],201);
    }

    // Supprime un rôle
    public function destroy($id)
    {
        $role = Role::find($id);

        if (!$role) {
            return response()->json(['message' => 'Rôle non trouvé'], 404);
        }

        $role->delete();

        return response()->json(['message' => 'Rôle supprimé avec succès'],201);
    }
}
