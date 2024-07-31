<?php

namespace App\Http\Controllers;

use App\Models\Tache;
use App\Models\Rapport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RapportController extends Controller
{
    // Afficher le formulaire d'ajout de rapport
    public function create()
    {
        // Récupérer les tâches terminées affectées au technicien connecté
        $user = Auth::user();
        $taches = Tache::where('technicien_id', $user->id)
                        ->where('statut', 'terminée')
                        ->with(['demande.user'])
                        ->paginate(10);

        return view('tech.create', compact('taches'));
    }

    // Traiter la soumission du rapport
    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'tache_id' => 'required|exists:taches,id',
            'feedback' => 'required|string|max:1000',
        ]);

        // Trouver la tâche associée
        $tache = Tache::findOrFail($request->input('tache_id'));

        // Création du rapport
        $rapport = Rapport::create([
            'tache_id' => $tache->id,
            'demande_id' => $tache->demande_id, // Ajout de demande_id
            'feedback' => $request->input('feedback'),
            'technician_id' => auth()->id(),
        ]);

        return redirect()->route('my-tasks', $tache->id)->with('success', 'Le rapport a été soumis avec succès.');
    }
}
