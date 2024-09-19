<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tache;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFController extends Controller
{
    public function view($id)
    {
        // Obtenir la tâche avec les relations nécessaires
        $tache = Tache::where('demande_id', $id)->firstOrFail();
        $demande = $tache->demande;

        $data = [
            'demande' => $demande,
            'tache' => $tache,
            'user' => $demande->user->nom . ' ' . $demande->user->prenom,
            'equipement' => $tache->demande->equipement,
            'technicien' => $tache->technicien ? $tache->technicien->nom . ' ' . $tache->technicien->prenom : 'Non assigné',
            'dateAffectation' => $tache->created_at->format('d/m/Y'),
            'rapport_utilisateur' => $tache->rapport_utilisateur ?? 'Non précisé',
            'dateFin' => $tache->date_fin ? $tache->date_fin='' : 'Non complété',
            'feedback' => $tache->feedback ?? 'Pas de feedback',
            'indisponibiliteTechnicien' => $tache->indisponibilite ? $tache->indisponibilite->nom . ' ' . $tache->indisponibilite->prenom : null,
        ];

        // Charger la vue et les données dans le PDF
        $pdf = Pdf::loadView('pdf', $data);

        // Retourner le PDF en affichage dans le navigateur
        return $pdf->stream('rapport_demande.pdf'); // Ou utiliser ->download('rapport_demande.pdf') pour télécharger le PDF
    }
}
