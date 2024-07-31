<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Demande;
use App\Models\Equipement;

class UserController extends Controller
{
    public function index()
{
    return view('dashboard');
}


/* public function index()
{
    $user = Auth::user();
    
    $nombreDemandes = Demande::where('user_id', $user->id)->count();
    $nombreEquipements = Equipement::where('user_id', $user->id)->count();
    // Vous pouvez ajouter d'autres données ici

    return view('dashboard', compact('nombreDemandes', 'nombreEquipements'));
} */
}
