<?php

namespace App\Http\Controllers;

use App\Models\Caracteristique;
use App\Models\Equipement;
use App\Models\TypeEquipement;
use App\Models\User; // Importer le modèle User
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeclarerEquipementController extends Controller
{
    public function create()
    {
        $typesEquipement = TypeEquipement::all();
        $users = User::all(); // Récupérer tous les utilisateurs
        return view('admin.declare-equipement', compact('typesEquipement', 'users'));
    }
    

    public function store(Request $request)
    {
        $request->validate([
            'nomM' => 'required|string',
            'codification' => 'required|string',
            'etat' => 'required|string',
            'date_acquisition' => 'required|date',
            'idTypeEquipement' => 'required|exists:type_equipements,idTypeEquipement',
            'characteristics.marque' => 'nullable|string',
            'characteristics.modele' => 'nullable|string',
            'characteristics.processor' => 'nullable|string',
            'characteristics.ram' => 'nullable|string',
            'characteristics.storage' => 'nullable|string',
            'characteristics.os' => 'nullable|string',
            'characteristics.ecran' => 'nullable|string',
            'characteristics.gpu' => 'nullable|string',
            'characteristics.printer_type' => 'nullable|string',
            'characteristics.print_speed' => 'nullable|string',
            'characteristics.scanner_type' => 'nullable|string',
            'characteristics.resolution' => 'nullable|string',
            'characteristics.other_type' => 'nullable|string',
            'characteristics.details' => 'nullable|string',
        ]);
        $user = $request->user();
        // Création de l'équipement
        $equipement = Equipement::create([
            'user_id' => $user->id,
            'nomM' => $request->nomM,
            'codification' => $request->codification,
            'etat' => $request->etat,
            'date_acquisition' => $request->date_acquisition,
            'idTypeEquipement' => $request->idTypeEquipement,
        ]);
    
        // Création des caractéristiques
        $caracteristique = new Caracteristique([
            'equipement_id' => $equipement->id,
            'marque' => $request->input('characteristics.marque'),
            'modele' => $request->input('characteristics.modele'),
            'processor' => $request->input('characteristics.processor'),
            'ram' => $request->input('characteristics.ram'),
            'storage' => $request->input('characteristics.storage'),
            'os' => $request->input('characteristics.os'),
            'ecran' => $request->input('characteristics.ecran'),
            'gpu' => $request->input('characteristics.gpu'),
            'printer_type' => $request->input('characteristics.printer_type'),
            'print_speed' => $request->input('characteristics.print_speed'),
            'scanner_type' => $request->input('characteristics.scanner_type'),
            'resolution' => $request->input('characteristics.resolution'),
            'other_type' => $request->input('characteristics.other_type'),
            'details' => $request->input('characteristics.details'),
        ]);
    
        // Sauvegarde des données
        $caracteristique->save();
    
        return redirect()->route('equipement-index')->with('success', 'Équipement déclaré avec succès !');
    }
    
    public function index(Request $request)
    {
        $query = Equipement::select(
            'equipements.*', 
            'users.nom as user_nom', 
            'users.prenom as user_prenom', 
            'type_equipements.nom as type_nom',
            'caracteristiques.id as carac_id', // Ajout pour récupérer l'ID de caractéristiques
            'caracteristiques.marque',
            'caracteristiques.modele',
            'caracteristiques.processor',
            'caracteristiques.ram',
            'caracteristiques.storage',
            'caracteristiques.os',
            'caracteristiques.ecran',
            'caracteristiques.gpu',
            'caracteristiques.printer_type',
            'caracteristiques.print_speed',
            'caracteristiques.scanner_type',
            'caracteristiques.resolution',
            'caracteristiques.other_type',
            'caracteristiques.details'
        )
        ->leftJoin('users', 'equipements.user_id', '=', 'users.id')
        ->leftJoin('type_equipements', 'equipements.idTypeEquipement', '=', 'type_equipements.idTypeEquipement')
        ->leftJoin('caracteristiques', 'equipements.id', '=', 'caracteristiques.equipement_id');
    
        // Appliquer les filtres de recherche
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                $q->where('equipements.nomM', 'like', "%{$search}%")
                  ->orWhere('equipements.codification', 'like', "%{$search}%")
                  ->orWhere('users.nom', 'like', "%{$search}%")
                  ->orWhere('users.prenom', 'like', "%{$search}%")
                  ->orWhere('type_equipements.nom', 'like', "%{$search}%")
                  ->orWhere('equipements.etat', 'like', "%{$search}%");
            });
        }
    
        $equipements = $query->paginate(10);
    
        return view('admin.equipement-index', compact('equipements'));
    }
    
    
    public function editer($id)
    {
        // Récupérer l'équipement avec son type d'équipement et ses caractéristiques
        $equipement = Equipement::with('typeEquipement', 'caracteristique')->findOrFail($id);
        $users = User::all();
    
        // Récupérer toutes les catégories de type d'équipement pour le dropdown
        $typesEquipement = TypeEquipement::all();
        $caracteristiques = Caracteristique::all();
        return view('admin.equipement-edit', compact('equipement', 'typesEquipement', 'users'));
    }

    public function update(Request $request, Equipement $equipement)
{
    // Valider les données du formulaire
    $validatedData = $request->validate([
        'user_id' => 'required|integer',
        'nomM' => 'required|string|max:255',
        'codification' => 'required|string|max:255',
        'etat' => 'required|string|max:255',
        'date_acquisition' => 'required|date',
        'idTypeEquipement' => 'required|integer', // Assurez-vous que ce champ est validé
        'characteristics.marque' => 'nullable|string',
        'characteristics.modele' => 'nullable|string',
        'characteristics.processor' => 'nullable|string',
        'characteristics.ram' => 'nullable|string',
        'characteristics.storage' => 'nullable|string',
        'characteristics.os' => 'nullable|string',
        'characteristics.ecran' => 'nullable|string',
        'characteristics.gpu' => 'nullable|string',
        'characteristics.printer_type' => 'nullable|string',
        'characteristics.print_speed' => 'nullable|string',
        'characteristics.scanner_type' => 'nullable|string',
        'characteristics.resolution' => 'nullable|string',
        'characteristics.other_type' => 'nullable|string',
        'characteristics.details' => 'nullable|string',
    ]);

    // Mettre à jour l'équipement avec l'idTypeEquipement et user_id
    $equipement->user_id = $validatedData['user_id'];
    $equipement->nomM = $validatedData['nomM'];
    $equipement->codification = $validatedData['codification'];
    $equipement->etat = $validatedData['etat'];
    $equipement->date_acquisition = $validatedData['date_acquisition'];
    $equipement->idTypeEquipement = $validatedData['idTypeEquipement'];
    $equipement->save();

    // Récupérer l'ID de l'équipement
    $equipementId = $equipement->id;

    // Mettre à jour ou créer les caractéristiques associées
    $caracteristique = Caracteristique::updateOrCreate(
        ['equipement_id' => $equipementId],
        [
            'marque' => $request->input('characteristics.marque'),
            'modele' => $request->input('characteristics.modele'),
            'ram' => $request->input('characteristics.ram'),
            'storage' => $request->input('characteristics.storage'),
            'processor' => $request->input('characteristics.processor'),
            'os' => $request->input('characteristics.os'),
            'ecran' => $request->input('characteristics.ecran'),
            'gpu' => $request->input('characteristics.gpu'),
            'printer_type' => $request->input('characteristics.printer_type'),
            'print_speed' => $request->input('characteristics.print_speed'),
            'scanner_type' => $request->input('characteristics.scanner_type'),
            'resolution' => $request->input('characteristics.resolution'),
            'other_type' => $request->input('characteristics.other_type'),
            'details' => $request->input('characteristics.details'),
            'idTypeEquipement' => $validatedData['idTypeEquipement'], // Assurez-vous d'inclure idTypeEquipement ici
        ]
    );

    return redirect()->route('equipement-index')->with('success', 'Équipement mis à jour avec succès !');
}


    public function destroy(Equipement $equipement)
    {
        $equipement->delete();
        return redirect()->route('equipement-index')->with('success', 'Équipement supprimé avec succès !');
    }

/* public function details($id)
    {
        $equipement = Equipement::select(
            'equipements.*',
            'caracteristiques.id as carac_id',
            'caracteristiques.marque',
            'caracteristiques.modele',
            'caracteristiques.processor',
            'caracteristiques.ram',
            'caracteristiques.storage',
            'caracteristiques.os',
            'caracteristiques.ecran',
            'caracteristiques.gpu',
            'caracteristiques.printer_type',
            'caracteristiques.print_speed',
            'caracteristiques.scanner_type',
            'caracteristiques.resolution',
            'caracteristiques.other_type',
            'caracteristiques.details'
        )
            ->leftJoin('caracteristiques', 'equipements.id', '=', 'caracteristiques.equipement_id')
            ->findOrFail($id);

        return view('admin.details', compact('equipement'));
    }
     */

}
