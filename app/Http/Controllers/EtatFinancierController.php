<?php

namespace App\Http\Controllers;

use App\Models\EtatFinancier;
use Illuminate\Http\Request;

class EtatFinancierController extends Controller
{
    /**
     * Affiche la liste des états financiers.
     */
    public function index()
    {
        $etatFinanciers = EtatFinancier::all();
        return response()->json($etatFinanciers);
    }

    /**
     * Affiche le formulaire de création d'un état financier.
     */
    public function create(Request $request)
    {
        $request = validate([
            'statut' => 'required||string',
        ]);

        $etatFinancier = EtatFinancier::create([
            'statut' => $request -> statut,
        ]);

        return response()->json([
            'message'=>'etatFinancier créé avec succès',
        ]);
    }

    /**
     * Enregistre un nouvel état financier.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'statut' => 'required|string|max:255',
        ]);

        EtatFinancier::create($validated);
        return redirect()->route('etat_financiers.index')->with('success', 'État financier créé avec succès.');
    }

    /**
     * Affiche un état financier spécifique.
     */
    public function show(EtatFinancier $etatFinancier)
    {
        return view('etat_financiers.show', compact('etatFinancier'));
    }

    /**
     * Affiche le formulaire d'édition d'un état financier.
     */
    public function edit(EtatFinancier $etatFinancier)
    {
        return view('etat_financiers.edit', compact('etatFinancier'));
    }

    /**
     * Met à jour un état financier.
     */
    public function update(Request $request, EtatFinancier $etatFinancier)
    {
        $validated = $request->validate([
            'statut' => 'required|string|max:255',
        ]);

        $etatFinancier->update($validated);
        return redirect()->route('etat_financiers.index')->with('success', 'État financier mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EtatFinancier $etatFinancier)
    {
        $etatFinancier->delete();
        return redirect()->route('etatFinancier.index')->with('success', 'Etat Financier supprimé avec succès.');
    }
}
