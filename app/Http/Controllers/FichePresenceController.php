<?php

namespace App\Http\Controllers;

use App\Models\FichePresence;
use Illuminate\Http\Request;

class FichePresenceController extends Controller
{
    /**
     * Affiche la liste des fiches de présence.
     */
    public function index()
    {
        $fichesPresence = FichePresence::all();
        return view('fiches_presence.index', compact('fichesPresence'));
    }

    /**
     * Affiche le formulaire de création d'une fiche de présence.
     */
    public function create()
    {
        return view('fiches_presence.create');
    }

    /**
     * Enregistre une nouvelle fiche de présence.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'dateHeureEntree' => 'required|datetime',
            'carteIdentiteMentor' => 'required|string|max:255',
            'statut' => 'required|string|max:255',
        ]);

        FichePresence::create($validated);
        return redirect()->route('fiches_presence.index')->with('success', 'Fiche de présence créée avec succès.');
    }

    /**
     * Affiche une fiche de présence spécifique.
     */
    public function show(FichePresence $fichePresence)
    {
        return view('fiches_presence.show', compact('fichePresence'));
    }

    /**
     * Affiche le formulaire d'édition d'une fiche de présence.
     */
    public function edit(FichePresence $fichePresence)
    {
        return view('fiches_presence.edit', compact('fichePresence'));
    }

    /**
     * Met à jour une fiche de présence.
     */
    public function update(Request $request, FichePresence $fichePresence)
    {
        $validated = $request->validate([
            'dateHeureEntree' => 'required|datetime',
            'carteIdentiteMentor' => 'required|string|max:255',
            'statut' => 'required|string|max:255',
        ]);

        $fichePresence->update($validated);
        return redirect()->route('fiches_presence.index')->with('success', 'Fiche de présence mise à jour avec succès.');
    }

    /**
     * Supprime une fiche de présence.
     */
    public function destroy(FichePresence $fichePresence)
    {
        $fichePresence->delete();
        return redirect()->route('fiches_presence.index')->with('success', 'Fiche de présence supprimée avec succès.');
    }
}
