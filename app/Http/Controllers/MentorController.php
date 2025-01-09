<?php

namespace App\Http\Controllers;

use App\Models\Mentor;
use Illuminate\Http\Request;

class MentorController extends Controller
{
    /**
     * Affiche la liste des mentors.
     */
    public function index()
    {
        $mentors=Mentor::all();
        return view('mentors.index', compact('mentors'));
    }

    /**
     * Affiche le formulaire de création d'un mentor.
     */
    public function create()
    {
        return view('mentors.create');
    }

    /**
     * Enregistre un nouveau mentor.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:utilisateurs,email',
            'motDePasse' => 'required|string|min:8',
            'telephone' => 'nullable|string',
        ]);

        Mentor::create($validated);
        return redirect()->route('mentors.index')->with('success', 'Mentor créé avec succès.');
    }

    /**
     * Affiche un mentor spécifique.
     */
    public function show(Mentor $mentor)
    {
        return view('mentors.show', compact('mentor'));
    }

    /**
     *  Affiche le formulaire d'édition d'un mentor.
     */
    public function edit(Mentor $mentor)
    {
        return view('mentors.edit', compact('mentor'));
    }

    /**
     * Met à jour les informations d'un mentor.
     */
    public function update(Request $request, Mentor $mentor)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:utilisateurs,email,' . $mentor->id,
            'motDePasse' => 'nullable|string|min:8',
            'telephone' => 'nullable|string',
        ]);

        $mentor->update($validated);
        return redirect()->route('mentors.index')->with('success', 'Mentor mis à jour avec succès.');
    }

    /**
     * Supprime un mentor.
     */
    public function destroy(Mentor $mentor)
    {
        $mentor->delete();
        return redirect()->route('mentors.index')->with('success', 'Mentor supprimé avec succès.');
    }
}
