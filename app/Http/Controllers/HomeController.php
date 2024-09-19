<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB; // Ajoutez cette ligne

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Demande;
use App\Models\Tache;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::id()) {
            $usertype = Auth::user()->usertype;
            $userId = Auth::id();

            if ($usertype == 'user') {

                $demande = Demande::select(
                        'equipements.nomM AS nom_equipement',
                        DB::raw('COUNT(demandes.id) AS total_demandes'),
                        DB::raw('(SELECT COUNT(*) FROM demandes WHERE user_id = ' . $userId . ') AS total_global')
                    )
                    ->join('equipements', 'demandes.equipement_id', '=', 'equipements.id')
                    ->where('demandes.user_id', $userId)
                    ->groupBy('equipements.nomM')
                    ->get();
                $demande_affecte = Demande::where('user_id',$userId)->where('statut','affecté')->get();
                $demande_affecte=count($demande_affecte);
                
                $demande_termine = Tache::where('user_id',$userId)->where('statut','terminée')->get();
                $demande_termine=count($demande_termine);
                
                $demande_annule = Tache::where('user_id',$userId)->where('statut','annulé')->get();
                $demande_annule=count($demande_annule);

                $totalDemande = $demande->sum('total_demandes');
                return view('dashboard',compact('totalDemande','demande','demande_affecte','demande_termine','demande_annule'));
            } elseif ($usertype == 'technicien') {
                $demande = Demande::select(
                        'equipements.nomM AS nom_equipement',
                        DB::raw('COUNT(demandes.id) AS total_demandes'),
                        DB::raw('(SELECT COUNT(*) FROM demandes WHERE technicien_id = ' . $userId . ') AS total_global')
                    )
                    ->join('equipements', 'demandes.equipement_id', '=', 'equipements.id')
                    ->where('demandes.technicien_id', $userId)
                    ->groupBy('equipements.nomM')
                    ->get();
                    $tache_totale = Tache::where('technicien_id',$userId)->get();
                    $tache_totale=count($tache_totale);
                    
                    $tache_termine = Tache::where('technicien_id',$userId)->where('statut','terminée')->get();
                    $tache_termine=count($tache_termine);

                    $tache_annule = Tache::where('technicien_id',$userId)->where('statut','annulé')->get();
                    $tache_annule=count($tache_annule);
                    
                    $tache_encours = Tache::where('technicien_id',$userId)->where('statut','en cours')->get();
                    $tache_encours=count($tache_encours);
    
                    $totalDemande = $demande->sum('total_demandes');
            return view('tech.technicienhome', compact('tache_encours', 'totalDemande','demande','tache_totale','tache_termine','tache_annule'));
        } else {
                // Redirect to a default page or handle the error
                return view('error');
            }
        } else {
            // Redirect to login page or handle the case when no user is logged in
            return redirect()->route('login');
        }
    }
}
