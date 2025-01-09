<?php

namespace App\Http\Controllers;

use App\Models\Rapport;
use Illuminate\Http\Request;

class RapportController extends Controller
{
    /**
     * Affiche la liste des rapports.
     */
    public function index()
    {
        $rapports = Rapport::all();
        return view('rapports.index', compact('rapports'));
    }

    /**
     * Affiche le formulaire de création d'un rapport.
     */
    public function create()
    {
        return view('rapports.create');
    }
    /**
     * Enregistre un nouveau rapport.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'dateSoumission' => 'required|date',
            'statut' => 'required|string|max:255',
        ]);

        Rapport::create($validated);
        return redirect()->route('rapports.index')->with('success', 'Rapport créé avec succès.');
    }

    /**
     * Affiche un rapport spécifique.
     */
    public function show(Rapport $rapport)
    {
        return view('rapports.show', compact('rapport'));
    }

    /**
     * Affiche le formulaire d'édition d'un rapport.
     */
    public function edit(Rapport $rapport)
    {
        return view('rapports.edit', compact('rapport'));
    }

    /**
     * Met à jour un rapport.
     */
    public function update(Request $request, Rapport $rapport)
    {
        $validated = $request->validate([
            'dateSubmission' => 'required|date',
            'statut' => 'required|string|max:255',
        ]);

        $rapport->update($validated);
        return redirect()->route('rapports.index')->with('success', 'Rapport mis à jour avec succès.');
    }

    /**
     * Supprime un rapport.
     */
    public function destroy(Rapport $rapport)
    {
        $rapport->delete();
        return redirect()->route('rapports.index')->with('success', 'Rapport supprimé avec succès.');
    }
}
