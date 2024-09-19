<?php

namespace App\Http\Controllers;
use App\Models\Demande;
use App\Models\User;
use App\Models\Tache;
use App\Models\Equipement;
use App\Models\TypeEquipement;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class DemandeController extends Controller
{
    public function index(Request $request)
    {
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
                ->paginate(5);
        } else {
            $demandes = Demande::where('user_id', $userId)->paginate(5); // Filtrer par l'utilisateur connecté
        }

        return view('user.demande-index', compact('demandes'));
    }
    public function showRapportForm($id)
    {
        $demande = Demande::findOrFail($id);
        // Logique pour afficher le formulaire de rapport
        return view('user.rapport', compact('demande'));
    }
    public function storeRapport(Request $request, $id)
    {
        $tache = Tache::where('demande_id',$id)->first(); 
        if($tache){
            // Valider les données
            $request->validate([
                'rapport_utilisateur' => 'required|string',
            ]);
            $tache->rapport_utilisateur = $request->input('rapport_utilisateur');
            $tache->save();

            return redirect()->route('demandes.index')->with('success', 'Rapport enregistré avec succès.'); 
        }
        
    }

    public function create()
    {
        $user = auth()->user(); // Récupérer l'utilisateur connecté
        $typesEquipement = TypeEquipement::all();
        $equipements = Equipement::where('user_id', $user->id)->get(); // Récupérer les équipements de l'utilisateur connecté
        return view('user.faire-demande', compact('equipements', 'typesEquipement'));
        
    }

/* 
    public function store(Request $request)
    {
        $request->validate([
            'equipement_id' => 'required|exists:equipements,id',
            'description' => 'required|string|max:255',
            'priorite' => 'required|in:gênant,bloquant',
            'date_demande' => 'required',
        ]);

        $demande = new Demande();
        $demande->user_id = Auth::id(); // ID de l'utilisateur connecté
        $demande->equipement_id = $request->input('equipement_id');
        $demande->description = $request->input('description');
        $demande->date_demande = $request->input('date_demande');
        $demande->priorite = $request->input('priorite');
        $demande->statut = 'en cours';
        $req=Demande::latest('id')->first();
        $req->codification='DEM00'.$req->id;
        $req->save();
        $demande->save();
        
        return redirect()->route('demandes.index')->with('success', 'Demande créée avec succès.');
    } */
    public function store(Request $request)
    {
        $request->validate([
            'equipement_id' => 'required|exists:equipements,id',
            'description' => 'required|string|max:255',
            'priorite' => 'required|in:gênant,bloquant',
            'date_demande' => 'required',
        ]);
    
        $demande = new Demande();
        $demande->user_id = Auth::id(); // ID de l'utilisateur connecté
        $demande->equipement_id = $request->input('equipement_id');
        $demande->description = $request->input('description');
        $demande->date_demande = $request->input('date_demande');
        $demande->priorite = $request->input('priorite');
        $demande->statut = 'en cours';
        $demande->save(); // Enregistrer la demande d'abord pour générer l'ID
    
        // Mettre à jour la codification avec l'ID généré
        $demande->codification = 'DEM00' . $demande->id;
        $demande->save();
    
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
