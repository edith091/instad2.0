<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Equipement;
use App\Models\TypeEquipement;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use DateTime;

class EquipementController extends Controller
{
    /**
     * Affiche le formulaire de création d'une déclaration d'équipement.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $typesEquipement = TypeEquipement::all();
        return view('user.declare-equipment', compact('typesEquipement'));
    }

    /**
     * Stocke les données de déclaration d'équipement dans la base de données.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'nomM' => 'required|string|max:255',
            'codification' => 'required|string|max:255',
            'etat' => 'required|string|in:Fonctionne normalement,Défectueux,Bug souvent',
            'date_acquisition' => 'required|date',
            'idTypeEquipement' => 'required|integer|exists:type_equipements,idTypeEquipement',
        ]);

        $equipement = new Equipement();
        $equipement->user_id = Auth::id(); // Utilisateur connecté
        $equipement->nomM = $request->nomM;
        $equipement->codification = $request->codification;
        $equipement->etat = $request->etat;
        $equipement->date_acquisition = $request->date_acquisition;
        $equipement->idTypeEquipement = $request->idTypeEquipement;
        $equipement->save();

        return redirect()->route('user.equipements-index')->with('success', 'Équipement déclaré avec succès.');
    }

    /**
     * Affiche tous les équipements déclarés par l'utilisateur connecté.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $userId = Auth::id();
        
        $typesEquipement = TypeEquipement::all();
        $equipements = Equipement::with('typeEquipement:idTypeEquipement,nom')
            ->where('user_id', $userId)
            ->leftJoin('type_equipements', 'equipements.idTypeEquipement', '=', 'type_equipements.idTypeEquipement')
            ->select('equipements.id', 'equipements.nomM', 'equipements.codification', 'equipements.etat', 'equipements.date_acquisition', 'type_equipements.nom as type_nom')
            ->paginate(10); // Utilisation de paginate au lieu de get pour la pagination

        return view('user.equipements-index', compact('equipements', 'typesEquipement'));
    }

    /**
     * Affiche le formulaire de modification d'un équipement.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $equipment = Equipement::find($id);
        if (!$equipment) {
            return redirect()->route('user.equipements-index')->with('error', 'Équipement non trouvé.');
        }
        $typesEquipement = TypeEquipement::all();
        return view('user.equipement-edit', compact('equipment', 'typesEquipement'));
    }

    /**
     * Met à jour les données de l'équipement dans la base de données.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nomM' => 'required|string|max:255',
            'codification' => 'required|string|max:255',
            'etat' => 'required|string|max:255',
            'date_acquisition' => 'required|date',
            'idTypeEquipement' => 'required|exists:type_equipements,idTypeEquipement'
        ]);

        $equipement = Equipement::findOrFail($id);

        // Check if less than or equal to 30 days to allow state modification
        $declarationDate = new DateTime($equipement->created_at);
        $currentDate = new DateTime();
        $interval = $declarationDate->diff($currentDate);
        $daysDifference = $interval->days;

        if ($daysDifference <= 30) {
            $equipement->nomM = $request->nomM;
            $equipement->codification = $request->codification;
            $equipement->etat = $request->etat;
        }

        $equipement->date_acquisition = $request->date_acquisition;
        $equipement->idTypeEquipement = $request->idTypeEquipement;

        $equipement->save();

        return redirect()->route('user.equipements-index')->with('success', 'Équipement mis à jour avec succès.');
    }

    /**
     * Supprime un équipement de la base de données.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $equipement = Equipement::find($id);
        if (!$equipement) {
            return response()->json(['error' => 'Équipement non trouvé'], 404);
        }

        $equipement->delete();

        return response()->json(['message' => 'Équipement supprimé avec succès'], 200);
    }
}
