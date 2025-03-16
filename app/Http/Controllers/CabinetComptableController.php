<?php

namespace App\Http\Controllers;

use App\Models\CabinetComptable;
use App\Models\EtatFinancier;
use Illuminate\Http\Request;

class CabinetComptableController extends Controller
{
    // Afficher la liste des cabinets comptables
    public function index()
    {
        $cabinetsComptables = CabinetComptable::all();
        return response()->json($cabinetsComptables);
    }

    // Afficher un cabinet comptable spécifique
    public function show($id)
    {
        $cabinetComptable = CabinetComptable::find($id);
        if (!$cabinetComptable) {
            return response()->json(['message' => 'Cabinet comptable non trouvé'], 404);
        }
        return response()->json([
            'message' => 'Cabinet comptable trouvé',
            'cabinetComptable' => $cabinetComptable,
        ],201);
    }
    // Créer un cabinet comptable
    public function create(Request $request, $id)
    {
        $request->validate([
            'nomCabinet' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'telephone' => 'required|string|max:20',
            'email' => 'required|email|unique:cabinets_comptables,email',
            'etatFinancier_id' => 'required|exists:etat_financiers,id',
        ]);

        $cabinetComptable = CabinetComptable::create([
            'nomCabinet' => $request->nomCabinet,
            'adresse' => $request->adresse,
            'telephone' => $request->telephone,
            'email' => $request->email,
            'etatFinancier_id' => $request->etatFinancier_id,
        ]);

        return response()->json([
            'message' => 'Cabinet comptable créé avec succès',
            'cabinetComptable' => $cabinetComptable,
        ],201);
    }

    // Mettre à jour un cabinet comptable
    public function update(Request $request, $id)
    {
        $cabinetComptable = CabinetComptable::find($id);

        $request->validate([
            'nomCabinet' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'telephone' => 'required|string|max:20',
            'email' => 'required|email|unique:cabinets_comptables,email,' . $cabinetComptable->id,
            'etatFinancier_id' => 'required|exists:etat_financiers,id',
        ]);

        if(!$cabinetComptable) {
            return response()->json(['message' => 'Cabinet comptable non trouvé'], 404);
        }

        $cabinetComptable->update([
            'nomCabinet' => $request->input ('nomCabinet'),
            'adresse' => $request->input ('adresse'),
            'telephone' => $request->input ('telephone'),
            'email' => $request->input ('email'),
            'etatFinancier_id' => $request->input ('etatFinancier_id'),
        ]);

        return response()->json([
            'message' => 'Cabinet comptable mis à jour avec succès',
            'cabinetComptable' => $cabinetComptable,
        ],201);
    }

    // Supprimer un cabinet comptable
    public function destroy($id)
    {
        $cabinetComptable = CabinetComptable::findOrFail($id);
        $cabinetComptable->delete();

        return response()->json(['message' => 'Cabinet comptable supprimé avec succès'],201);
    }


    public function fichePresenceEnAttente()
    {
        $fiches = FichePresence::where('statut', 'En attente')->get();
        return response()->json($fiches, 200);
    }

    /**
     * 📌 Valider une fiche de présence
     */
    public function validerFichePresence($id)
    {
        $fiche = FichePresence::find($id);
        if (!$fiche) {
            return response()->json(['message' => 'Fiche de présence introuvable'], 404);
        }

        $fiche->statut = 'Validé';
        $fiche->save();

        return response()->json(['message' => 'Fiche de présence validée avec succès', 'fiche' => $fiche], 200);
    }

    /**
     * 📌 Liste des rapports en attente
     */
    public function rapportsEnAttente()
    {
        $rapports = Rapport::where('statut', 'En attente')->get();
        return response()->json($rapports, 200);
    }

    /**
     * 📌 Valider un rapport
     */
    public function validerRapport($id)
    {
        $rapport = Rapport::find($id);
        if (!$rapport) {
            return response()->json(['message' => 'Rapport introuvable'], 404);
        }

        $rapport->statut = 'Validé';
        $rapport->save();

        return response()->json(['message' => 'Rapport validé avec succès', 'rapport' => $rapport], 200);
    }

    /**
     * 📌 Signer un état financier
     */
    public function signerEtatFinancier($id)
    {
        $etat = EtatFinancier::find($id);
        if (!$etat) {
            return response()->json(['message' => 'État financier introuvable'], 404);
        }

        $etat->statut = 'Signé';
        $etat->save();

        return response()->json(['message' => 'État financier signé avec succès', 'etat' => $etat], 200);
    }

}
