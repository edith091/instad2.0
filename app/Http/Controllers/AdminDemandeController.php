<?php

namespace App\Http\Controllers;
use App\Models\Demande;
use App\Models\User;
use App\Models\Tache;
use App\Models\Equipement;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\TacheAffecteeMail;

use Illuminate\Http\Request;

class AdminDemandeController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        
        if ($search) {
            $demandes = Demande::whereHas('user', function ($query) use ($search) {
                $query->where('nom', 'like', "%$search%")
                      ->orWhere('prenom', 'like', "%$search%");
            })->orWhereHas('equipement', function ($query) use ($search) {
                $query->where('nomM', 'like', "%$search%")
                      ->orWhere('codification', 'like', "%$search%");
            })->orWhere('description', 'like', "%$search%")
              ->paginate(10);
        } else {
            $demandes = Demande::paginate(10);
        }
        $techniciens = User::where('usertype', 'technicien')->get();
        return view('admin.demandes-index', compact('demandes','techniciens'));
    }



 public function create()
    {
        $demandes = Demande::all();
        $equipements = Equipement::all();
        $users = User::all(); // Récupérer tous les utilisateurs
        return view('admin.faire-demande', compact('demandes', 'users', 'equipements'));
    }


    public function store(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'equipement_id' => 'required|exists:equipements,id',
            'description' => 'required|string|max:255',
            'priorite' => 'required|in:gênant,bloquant',
            'date_demande' => 'required',
            'statut' => 'required|in: non traité,en cours,traité,affecté,rejeté',
        ]);

        // Créer une nouvelle demande
        $demande = new Demande();
        $demande->user_id = Auth::id(); // ID de l'utilisateur connecté
        $demande->equipement_id = $request->input('equipement_id');
        $demande->description = $request->input('description');
        $demande->date_demande = $request->input('date_demande');
        $demande->priorite = $request->input('priorite');
        $demande->statut = $request->input('statut'); // Par défaut, le statut est "non traité"

        // Enregistrer la demande
        $demande->save();

        // Rediriger avec un message de succès
        return redirect()->route('admin.demandes.index')->with('success', 'Demande créée avec succès.');
    }

   /*  public function edit($demande)
    {
        $demande = Demande::findOrFail($demande,'id'); // Charger la demande à éditer
        $equipements = Equipement::all(); // Par exemple, charger les équipements pour le formulaire
        return view('user.demande_edit', compact('demande', 'equipements'));
    } */
    public function edit($id)
{
    $demande = Demande::findOrFail($id); // Charger la demande à éditer
    $equipements = Equipement::all(); // Par exemple, charger les équipements pour le formulaire
    return view('admin.demandes_edit', compact('demande', 'equipements'));
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Demande $demande)
    {
        $request->validate([
            'equipement_id' => 'required|exists:equipements,id',
            'description' => 'required|string|max:255',
            'date_demande' => 'required|date',
            'priorite' => 'required|in:gênant,bloquant',
            'statut' => 'required|in:en cours,traité,affecté,rejeté',
        ]);

        $demande->update([
            'equipement_id' => $request->equipement_id,
            'description' => $request->description,
            'datedemande' => $request->date_demande,
            'priorite' => $request->priorite,
            'statut' => $request->statut,
        ]);

        return redirect()->route('admin.demandes.index')->with('success', 'Demande mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Demande $demande)
    {
        $demande->delete();
        return redirect()->route('admin.demandes.index')->with('success', 'Demande supprimée avec succès.');
    }
/* 
    public function assign(Request $request, $id)
    {
        // Check if the request has already been assigned
        $check = Tache::where('demande_id', $id)->exists();
       /*  dd($check) */
        /* if ($check) {
            return redirect()->route('admin.demandes.index')->with('success', 'Demande déjà affectée');
        } */
    
        // Retrieve the request
        /* $demande = Demande::findOrFail($id); */
    
        // Update the request status and assign the technician
       /*  $demande->statut = 'affecté';
        $demande->technicien_id = $request->input('technicien_id'); // Ensure 'technicien_id' matches the foreign key in your 'demandes' table
        $demande->save(); */
    
        // Create a new task associated with the request
       /*  $tache = new Tache;
        $tache->demande_id = $id;
        $tache->user_id = $demande->user_id;
        $tache->technicien_id = $request->input('technicien_id');
        $tache->statut = 'en cours';
        $tache->save(); */
    
        // Redirect to the requests list with a success message
  /*       return redirect()->route('admin.demandes.index')->with('success', 'Demande affectée avec succès.');
    } */
    
    public function assign(Request $request, $id)
    {
        // Retrieve the request
        $demande = Demande::findOrFail($id);
    
        // Check if the request has already been assigned and is not in 'non traité' status
        if ($demande->statut !== 'non traité' && Tache::where('demande_id', $id)->exists()) {
            return redirect()->route('admin.demandes.index')->with('success', 'Demande déjà affectée');
        }
    
        $technicien = User::findOrFail($request->input('technicien_id'));
    
        // Update the request status and assign the technician
        $demande->statut = 'affecté';
        $demande->technicien_id = $request->input('technicien_id'); // Ensure 'technicien_id' matches the foreign key in your 'demandes' table
        $demande->save();
    
        // Check if a task already exists for this request
        $tache = Tache::where('demande_id', $id)->first();
        if ($tache) {
            // Update the existing task
            $tache->technicien_id = $request->input('technicien_id');
            $tache->statut = 'en cours';
        } else {
            // Create a new task associated with the request
            $tache = new Tache;
            $tache->demande_id = $id;
            $tache->user_id = $demande->user_id;
            $tache->technicien_id = $request->input('technicien_id');
            $tache->statut = 'en cours';
        }
        $tache->save();
    
        // Send email to the technician
        $dateAffectation = now()->format('d-m-Y H:i:s');
        Mail::to($technicien->email)->send(new TacheAffecteeMail($demande, $technicien, $dateAffectation));
    
        return redirect()->route('admin.demandes.index')->with('success', 'Demande affectée avec succès');
    }

    public function declareIndisponibilite(Request $request, $id)
{
    // Valider les données du formulaire
    $request->validate([
        'motif' => 'required|string|max:255',
    ]);

    // Récupérer la demande
    $demande = Demande::findOrFail($id);

    // Mettre à jour le statut de la demande et ajouter le motif d'indisponibilité
    $demande->statut = 'non traité';
    $demande->motif_indisponibilite = $request->input('motif');
    $demande->save();

    // Rediriger avec un message de succès
    return redirect()->route('admin.demandes.index')->with('success', 'Demande déclarée indisponible avec succès.');
}

    
    

}









/* 
<?php

namespace App\Http\Controllers;
use App\Models\Demande;
use App\Models\User;
use App\Models\Equipement;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class AdminDemandeController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        
        if ($search) {
            $demandes = Demande::whereHas('user', function ($query) use ($search) {
                $query->where('nom', 'like', "%$search%")
                      ->orWhere('prenom', 'like', "%$search%");
            })->orWhereHas('equipement', function ($query) use ($search) {
                $query->where('nomM', 'like', "%$search%")
                      ->orWhere('codification', 'like', "%$search%");
            })->orWhere('description', 'like', "%$search%")
              ->paginate(10);
        } else {
            $demandes = Demande::paginate(10);
        }

        return view('admin.demandes-index', compact('demandes'));
    }



 public function create()
    {
        $demandes = Demande::all();
        $equipements = Equipement::all();
        $users = User::all(); // Récupérer tous les utilisateurs
        return view('admin.faire-demande', compact('demandes', 'users', 'equipements'));
    }


    public function store(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'equipement_id' => 'required|exists:equipements,id',
            'description' => 'required|string|max:255',
            'priorite' => 'required|in:gênant,bloquant',
            'date_demande' => 'required',
            'statut' => 'required|in: non traité,en cours,traité,affecté,rejeté',
        ]);

        // Créer une nouvelle demande
        $demande = new Demande();
        $demande->user_id = Auth::id(); // ID de l'utilisateur connecté
        $demande->equipement_id = $request->input('equipement_id');
        $demande->description = $request->input('description');
        $demande->date_demande = $request->input('date_demande');
        $demande->priorite = $request->input('priorite');
        $demande->statut = $request->input('statut'); // Par défaut, le statut est "non traité"

        // Enregistrer la demande
        $demande->save();

        // Rediriger avec un message de succès
        return redirect()->route('admin.demandes.index')->with('success', 'Demande créée avec succès.');
    }

   /*  public function edit($demande)
    {
        $demande = Demande::findOrFail($demande,'id'); // Charger la demande à éditer
        $equipements = Equipement::all(); // Par exemple, charger les équipements pour le formulaire
        return view('user.demande_edit', compact('demande', 'equipements'));
    } */
/*     public function edit($id)
{
    $demande = Demande::findOrFail($id); // Charger la demande à éditer
    $equipements = Equipement::all(); // Par exemple, charger les équipements pour le formulaire
    return view('admin.demandes_edit', compact('demande', 'equipements'));
} */


    /**
     * Update the specified resource in storage.
     */
 /*    public function update(Request $request, Demande $demande)
    {
        $request->validate([
            'equipement_id' => 'required|exists:equipements,id',
            'description' => 'required|string|max:255',
            'date_demande' => 'required|date',
            'priorite' => 'required|in:gênant,bloquant',
            'statut' => 'required|in:en cours,traité,affecté,rejeté',
        ]);

        $demande->update([
            'equipement_id' => $request->equipement_id,
            'description' => $request->description,
            'datedemande' => $request->date_demande,
            'priorite' => $request->priorite,
            'statut' => $request->statut,
        ]);

        return redirect()->route('admin.demandes.index')->with('success', 'Demande mise à jour avec succès.');
    } */

    /**
     * Remove the specified resource from storage.
     */
   /*  public function destroy(Demande $demande)
    {
        $demande->delete();
        return redirect()->route('admin.demandes.index')->with('success', 'Demande supprimée avec succès.');
    } */
    

    
/* public function assign(Request $request, $id)
{
    // Récupérer la demande
    $demande = Demande::findOrFail($id);

    // Mettre à jour les champs de la demande
    $demande->statut = 'affecté';
    $demande->technicien_id = $request->technicien_id; // Assurez-vous que technicien_id correspond à la clé étrangère dans votre table 'demandes'
    $demande->save();

    // Récupérer la liste des techniciens
    $techniciens = User::where('usertype', 'technicien')->get();

    // Retourner la vue avec les données mises à jour
    return view('admin.demandes.index', compact('demande', 'techniciens'));
} 

} */