<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    // Liste des rôles
    public function index()
    {
        return response()->json(Role::all(), 200);
    }

    // Création d'un rôle
    public function create(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:roles,name'
        ]);

        $role = Role::create($validated);
        return response()->json(['message' => 'Rôle créé avec succès', 'role' => $role], 201);
    }

    // Afficher un rôle spécifique
    public function show($id)
    {
        $role = Role::findOrFail($id);
        return response()->json($role, 200);
    }

    // Mise à jour d'un rôle
    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:roles,name,' . $id
        ]);

        $role->update($validated);
        return response()->json(['message' => 'Rôle mis à jour avec succès', 'role' => $role], 200);
    }

    // Suppression d'un rôle avec protection pour les rôles critiques
    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        
        if (in_array($role->name, ['admin'])) {
            return response()->json(['message' => 'Ce rôle ne peut pas être supprimé'], 403);
        }
        
        $role->delete();
        return response()->json(['message' => 'Rôle supprimé avec succès'], 204);
    }

    public function assignerRole(Request $request, $id)
{
    // Validation des données entrantes
    $request->validate([
        'role' => 'required|in:admin,mentor,consultant,comptable',
    ]);

    // Vérifier si l'utilisateur existe
    $utilisateur = Utilisateur::find($id);
    if (!$utilisateur) {
        return response()->json(['message' => 'Utilisateur introuvable'], 404);
    }

    // Assigner le rôle
    $utilisateur->role = $request->role;
    $utilisateur->save();

    return response()->json(['message' => 'Rôle assigné avec succès', 'utilisateur' => $utilisateur], 200);
}

public function voirRole($id)
{
    // Vérifier si l'utilisateur existe
    $utilisateur = Utilisateur::find($id);
    if (!$utilisateur) {
        return response()->json(['message' => 'Utilisateur introuvable'], 404);
    }

    return response()->json(['role' => $utilisateur->role], 200);
}


}
