<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB; // Ajoutez cette ligne

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Demande;

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

                $totalDemande = $demande->sum('total_demandes');
                return view('dashboard',compact('totalDemande','demande'));
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

            $totalDemande = $demande->sum('total_demandes');
            return view('tech.technicienhome', compact('demande', 'totalDemande'));
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
