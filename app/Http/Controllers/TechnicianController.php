<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use App\Models\Direction;
use App\Models\User;
use App\Models\Admin;
use App\Models\Rapport;
use App\Models\Tache;
use App\Models\Equipement;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Notifications\TechnicienIndisponible;
use Illuminate\Support\Facades\Notification;

class TechnicianController extends Controller
{
    // Affichage de la page d'accueil du technicien
   

    public function index()
    {
        return view('tech.technicienhome');
    }

    // Affichage des tâches en cours
    public function show()
    {
        $user = Auth::user();
        $taches = Tache::where('technicien_id', $user->id)
                        ->where('statut', 'en cours')
                        ->with(['demande.user.direction'])
                        ->paginate(10);
    
        return view('tech.mes-taches-index', compact('taches'));
    }
    
    // Affichage de toutes les tâches affectées au technicien
    public function voirToutLesTachesAffectées()
    {
        $user = Auth::user();
        $taches = Tache::where('technicien_id', $user->id)
                       ->whereIn('statut', ['en cours', 'en attente', 'terminée','annulée'])
                       ->with(['demande.user.direction', 'rapports']) // Inclure la relation 'rapports'
                       ->paginate(10);
    
        $afficherFeedback = true;
    
        return view('tech.historiques-index', compact('taches', 'afficherFeedback'));
    }
    
    
    // Affichage du formulaire d'édition d'une tâche
    public function edit($id)
    {
        $tache = Tache::with(['demande.user.direction'])->findOrFail($id);
        return view('tech.modifier_taches', compact('tache'));
    }

    // Mise à jour d'une tâche
    public function update(Request $request, $id)
    {
        $request->validate([
            'description' => 'required|string',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date',
            'statut' => 'required|string|in:en cours,terminée,en attente,annulée',
        ]);
    
        $tache = Tache::findOrFail($id);
        $tache->date_debut = $request->input('date_debut');
        $tache->date_fin = $request->input('date_fin');
        $tache->statut = $request->input('statut');
        $tache->save();
    
        $tache->demande->description = $request->input('description');
        $tache->demande->save();
    
        return redirect()->route('my-tasks')->with('success', 'Tâche mise à jour avec succès.');
    }

    // Déclaration d'indisponibilité du technicien
   /*  public function declareIndisponible($id)
    {
        $tache = Tache::findOrFail($id);
    
        if ($tache->technicien_id != auth()->id()) {
            return redirect()->route('my-tasks')->with('error', 'Vous ne pouvez pas signaler cette tâche.');
        }
    
        $tache->statut = 'annulée';
        $tache->save();
    
        $technicien = auth()->user();
        $technicien->disponible = true;
        $technicien->save();
    
        // Recherchez un administrateur dans la table admins
        $admin = Admin::first(); // Vous pouvez utiliser un critère plus spécifique si nécessaire
    
        if ($admin) {
            Notification::route('mail', $admin->email)
                        ->notify(new TechnicienIndisponible($tache));
        } else {
            return redirect()->route('my-tasks')->with('error', 'Aucun administrateur trouvé pour envoyer la notification.');
        }
    
        return redirect()->route('my-tasks')->with('success', 'Tâche annulée avec succès. Vous êtes maintenant disponible.');
    } */



    public function declareDateDebut($id)
{
    // Fetch the task by its ID
    $tache = Tache::findOrFail($id);

    // Ensure that the task belongs to the authenticated technician
    if ($tache->technicien_id != auth()->id()) {
        return redirect()->route('my-tasks')->with('error', 'Vous ne pouvez pas déclarer cette tâche.');
    }

    // Update the start date of the task
    $tache->date_debut = now();
    $tache->save();

    return redirect()->route('my-tasks')->with('success', 'Date de début déclarée avec succès.');
}

public function declareDateFin($id)
{
    // Fetch the task by its ID
    $tache = Tache::findOrFail($id);

    // Ensure that the task belongs to the authenticated technician
    if ($tache->technicien_id != auth()->id()) {
        return redirect()->route('my-tasks')->with('error', 'Vous ne pouvez pas déclarer cette tâche.');
    }

    // Update the end date of the task
    $tache->date_fin = now();
    $tache->save();

    return redirect()->route('my-tasks')->with('success', 'Date de fin déclarée avec succès.');
}

    
    public function declareIndisponible($id)
{
    $tache = Tache::findOrFail($id);

    if ($tache->technicien_id != auth()->id()) {
        return redirect()->route('technician.dashboard')->with('error', 'Vous ne pouvez pas signaler cette tâche.');
    }

    $tache->statut = 'annulée';
    $tache->save();

    // Mettre à jour le statut de la demande associée
    $demande = $tache->demande;
    $demande->statut = 'non traité'; // ou un autre statut approprié
    $demande->save();

    $technicien = auth()->user();
    $technicien->disponible = true;
    $technicien->save();

    // Recherchez un administrateur dans la table admins
    $admin = Admin::first(); // Vous pouvez utiliser un critère plus spécifique si nécessaire

    if ($admin) {
        Notification::route('mail', $admin->email)
                    ->notify(new TechnicienIndisponible($tache));
    } else {
        return redirect()->route('technician.dashboard')->with('error', 'Aucun administrateur trouvé pour envoyer la notification.');
    }

    return redirect()->route('technician.dashboard')->with('success', 'Tâche annulée avec succès. Vous êtes maintenant disponible.');
}

}
