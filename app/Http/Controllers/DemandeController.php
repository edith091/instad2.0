<?php

namespace App\Http\Controllers;
use App\Models\Demande;
use App\Models\User;
use App\Models\Equipement;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class DemandeController extends Controller
{
public function index(Request $request)
{
    /* $req=Demande::oldest('id')->first();
    $req->codification='DEM001';
    $req->save(); */
    $search = $request->input('search');
    $userId = Auth::id(); // Récupérer l'ID de l'utilisateur connecté

    if ($search) {
        $demandes = Demande::where('user_id', $userId) // Filtrer par l'utilisateur connecté
            ->where(function ($query) use ($search) {
                $query->whereHas('user', function ($query) use ($search) {
                    $query->where('nom', 'like', "%$search%")
                          ->orWhere('prenom', 'like', "%$search%");
                })->orWhereHas('equipement', function ($query) use ($search) {
                    $query->where('nomM', 'like', "%$search%")
                          ->orWhere('codification', 'like', "%$search%");
                })->orWhere('description', 'like', "%$search%");
            })
            ->paginate(10);
    } else {
        $demandes = Demande::where('user_id', $userId)->paginate(10); // Filtrer par l'utilisateur connecté
    }

    return view('user.demande-index', compact('demandes'));
}

public function create()
{
    $user = auth()->user(); // Récupérer l'utilisateur connecté
    $equipements = Equipement::where('user_id', $user->id)->get(); // Récupérer les équipements de l'utilisateur connecté
    return view('user.faire-demande', compact('equipements'));
}


public function store(Request $request)
{
    
    // Valider les données du formulaire
    $request->validate([
        'equipement_id' => 'required|exists:equipements,id',
        'description' => 'required|string|max:255',
        'priorite' => 'required|in:gênant,bloquant',
        'date_demande' => 'required',
    ]);

    // Créer une nouvelle demande
    $demande = new Demande();
    $demande->user_id = Auth::id(); // ID de l'utilisateur connecté
    $demande->equipement_id = $request->input('equipement_id');
    $demande->description = $request->input('description');
    $demande->date_demande = $request->input('date_demande');
    $demande->priorite = $request->input('priorite');
    $demande->statut = 'en cours'; // Par défaut, le statut est "en cours"

    /* $req=Demande::latest('id')->first();
        $match=$req->codification;
        $pattern='/(DEM00)(\d+)/';
        if(preg_match($pattern, $req, $num)){
            
            $chaine=$num[1];
            $entier=$num[2];
            $valeur=$entier+1;
            
            $demande->codification ="DEM00".$valeur;
            
            
        } */
    
        $req=Demande::latest('id')->first();
        $req->codification='DEM00'.$req->id;
        $req->save();
    
        // Enregistrer la demande
    $demande->save();
    
    // Rediriger avec un message de succès
    return redirect()->route('demandes.index')->with('success', 'Demande créée avec succès.');
}


        public function edit($id)
    {
        $demande = Demande::findOrFail($id); // Charger la demande à éditer
        $equipements = Equipement::all(); // Par exemple, charger les équipements pour le formulaire
        return view('user.demande_edit', compact('demande', 'equipements'));
    }


    public function update(Request $request, Demande $demande)
    {
        $request->validate([
            'equipement_id' => 'required|exists:equipements,id',
            'description' => 'required|string|max:255',
            'date_demande' => 'required|date',
            'priorite' => 'required|in:gênant,bloquant',
        ]);

        $demande->update([
            'equipement_id' => $request->equipement_id,
            'description' => $request->description,
            'date_demande' => $request->date_demande,
            'priorite' => $request->priorite,
        ]);

        return redirect()->route('demandes.index')->with('success', 'Demande mise à jour avec succès.');
    }

    public function destroy(Demande $demande)
    {
        $demande->delete();
        return redirect()->route('demandes.index')->with('success', 'Demande supprimée avec succès.');
    }


    
}
