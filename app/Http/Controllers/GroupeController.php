<?php

namespace App\Http\Controllers;

use App\Models\Groupe;
use Illuminate\Http\Request;
use App\Http\Requests\GroupeStoreRequest;
use App\Http\Requests\GroupeUpdateRequest;

class GroupeController extends Controller
{
    /**
     * Afficher tous les groupes
     */
    public function index()
    {
        $groupes = Groupe::with('certificat')->get();

        return response()->json([
            'status' => 200,
            'message' => 'Liste des groupes',
            'data' => $groupes
        ]);
    }

    /**
     * Enregistrer un nouveau groupe
     */
    public function store(GroupeStoreRequest $request)
    {
        $data = $request->validated();

        $groupe = Groupe::create($data);

        if ($groupe) {
            return response()->json([
                'status' => 200,
                'message' => 'Groupe créé avec succès',
                'data' => $groupe
            ]);
        }

        return response()->json([
            'status' => 400,
            'message' => 'Une erreur est survenue lors de la création'
        ]);
    }

    /**
     * Afficher un groupe spécifique
     */
    public function show(Groupe $groupe)
    {
        return response()->json([
            'status' => 200,
            'message' => 'Détails du groupe',
            'data' => $groupe->load('certificat')
        ]);
    }

    /**
     * Modifier un groupe
     */
    public function update(GroupeUpdateRequest $request, Groupe $groupe)
    {
        if ($request->validated()) {
            $updated = $groupe->update($request->all());

            if ($updated) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Groupe modifié avec succès',
                    'data' => $groupe
                ]);
            }
        }

        return response()->json([
            'status' => 400,
            'message' => 'Une erreur est survenue lors de la mise à jour'
        ]);
    }

    /**
     * Supprimer un groupe
     */
    public function destroy(Groupe $groupe)
    {
        $groupe->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Groupe supprimé avec succès'
        ]);
    }
}
