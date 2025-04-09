<?php

namespace App\Http\Controllers;

use App\Models\Apprenant;
use Illuminate\Http\Request;
use App\Http\Requests\ApprenantStoreRequest;
use App\Http\Requests\ApprenantUpdateRequest;

class ApprenantController extends Controller
{
    /**
     * Afficher la liste des apprenants.
     */
    public function index()
    {
        $apprenants = Apprenant::all();

        return response()->json([
            'status' => 200,
            'message' => 'Liste des apprenants',
            'data' => $apprenants
        ]);
    }

    /**
     * Enregistrer un nouvel apprenant.
     */
    public function store(ApprenantStoreRequest $request)
    {
        $data = $request->validated();

        $apprenant = Apprenant::create($data);

        if ($apprenant) {
            return response()->json([
                'status' => 200,
                'message' => 'Apprenant créé avec succès',
                'data' => $apprenant
            ]);
        }

        return response()->json([
            'status' => 400,
            'message' => 'Erreur lors de la création'
        ]);
    }

    /**
     * Afficher un apprenant spécifique.
     */
    public function show(Apprenant $apprenant)
    {
        return response()->json([
            'status' => 200,
            'message' => 'Détails de l\'apprenant',
            'data' => $apprenant
        ]);
    }

    /**
     * Mettre à jour un apprenant existant.
     */
    public function update(ApprenantUpdateRequest $request, Apprenant $apprenant)
    {
        if ($request->validated()) {
            $updated = $apprenant->update($request->all());

            if ($updated) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Apprenant modifié avec succès',
                    'data' => $apprenant
                ]);
            }
        }

        return response()->json([
            'status' => 400,
            'message' => 'Erreur lors de la mise à jour'
        ]);
    }

    /**
     * Supprimer un apprenant.
     */
    public function destroy(Apprenant $apprenant)
    {
        $apprenant->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Apprenant supprimé avec succès'
        ]);
    }
}
