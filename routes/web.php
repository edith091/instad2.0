<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\AdminDemandeController;
use App\Http\Controllers\Admin\ProfilUserController;
use App\Http\Controllers\EquipementController;
use App\Http\Controllers\DemandeController;
use App\Http\Controllers\DeclarerEquipementController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TechnicianController;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


/*Admin*/
Route::middleware(['admin', 'verified'])->prefix('admin')->group(function () {
Route::get('/dashboard', [AdminController::class, 'dashboard'])
->name('admin_dashboard');

});
Route::prefix('admin')->group(function () {

Route::get('/login', [AdminController::class, 'login'])
->name('admin_login');
Route::post('/login-submit', [AdminController::class, 'login_submit'])
->name('admin_login_submit');
Route::post('/logout', [AdminController::class, 'logout'])
->name('admin_logout');
Route::get('/forget_password', [AdminController::class, 'forget_password'])
->name('admin_forget_password');
Route::post('/forget-password-submit', [AdminController::class, 'forget_password_submit'])
->name('admin_forget_password_submit');

Route::get('/reset-password/{token}/{email}', [AdminController::class, 'reset_password'])
->name('admin_reset_password');

Route::post('/reset-password-submit', [AdminController::class, 'reset_password_submit'])
->name('admin_reset_password_submit');


});

Route::get('/admin/declare-equipement', [DeclarerEquipementController::class, 'create'])
    ->name('declare-equipement');
    Route::get('/equipement/details/{id}', [DeclarerEquipementController::class, 'details'])
    ->name('equipement.details');

    Route::get('admin/equipement-index', [DeclarerEquipementController::class, 'index'])->name('equipement-index');
Route::post('admin/declare-equipement.index', [DeclarerEquipementController::class, 'store'])
    ->name('declare-equipement.store');

Route::get('admin/get-characteristics/{idTypeEquipement}', [DeclarerEquipementController::class, 'getCharacteristics'])
    ->name('get-characteristics');
    
Route::put('admin/equipements/{equipement}', [DeclarerEquipementController::class, 'update'])
->name('admin-equipement.update');
    
Route::get('admin/equipements/{equipement}/edit', [DeclarerEquipementController::class, 'editer'])
->name('equipement.editer');
Route::delete('admin/equipements/{equipement}', [DeclarerEquipementController::class, 'supprimer'])
->name('equipement.supprimer'); 


// routes/web.php


Route::get('/admin/users', [ProfilUserController::class, 'index'])->name('admin.manage_users');
Route::get('/admin/users/{user}/edit', [ProfilUserController::class, 'edit'])->name('admin.users.edit');
Route::put('/admin/users/{user}', [ProfilUserController::class, 'update'])->name('admin.users.update');
Route::delete('/admin/users/{user}', [ProfilUserController::class, 'destroy'])->name('admin.users.destroy');
Route::post('/admin/demandes/{id}/indisponibilite', [AdminDemandeController::class, 'declareIndisponibilite'])->name('admin.demandes.indisponibilite');

Route::prefix('admin')->group(function () {
    
    Route::get('/admin/demandes', [AdminDemandeController::class, 'index'])->name('admin.demandes.index');
    
    // Route to show the form for creating a new demande
    Route::get('/admin/demandes/create', [AdminDemandeController::class, 'create'])->name('admin.demandes.create');
    
    // Route to store a new demande
    Route::post('/admin/demandes', [AdminDemandeController::class, 'store'])->name('admin.demandes.store');
    
    // Route to show the form for editing a demande
    Route::get('/admin/demandes/{id}/edit', [AdminDemandeController::class, 'edit'])->name('admin.demandes.edit');
    
    // Route to update an existing demande
    Route::put('/admin/demandes/{demande}', [AdminDemandeController::class, 'update'])->name('admin.demandes.update');
    
    // Route to delete a demande
    Route::delete('/admin/demandes/{demande}', [AdminDemandeController::class, 'destroy'])->name('admin.demandes.destroy');
});


/*Admin*/

// routes/web.php



    Route::resource('demandes', AdminDemandeController::class);
    Route::post('demandes/assign/{id}', [AdminDemandeController::class, 'assign'])->name('admin.demandes.assign');

Route::get('/home',[HomeController::class, 'index'])->name('home');//
//utilisateur creation d'equipements
Route::get('/declare-equipment', [EquipementController::class, 'create'])->name('declare-equipment');//
Route::post('/declare-equipment/store', [EquipementController::class, 'store'])->name('declare-equipment.store');
Route::get('/equipement/fields', [EquipementController::class, 'getEquipmentFields'])->name('equipement.fields');// Exemple de route pour l'index des équipements utilisateur
Route::get('user/equipements-index', [EquipementController::class, 'index'])->name('user.equipements-index'); 
Route::get('/equipement/{equipement}/edit', [EquipementController::class, 'edit'])->name('equipement.edit');
Route::put('/equipement/{equipement}', [EquipementController::class, 'update'])->name('equipement.update');
Route::delete('/equipement/{equipement}', [EquipementController::class, 'destroy'])->name('equipement.destroy');


//utilisateur creation de la demande
// Routes pour les demandes
Route::get('/demandes', [DemandeController::class, 'index'])->name('demandes.index');
Route::post('/demandes', [DemandeController::class, 'store'])->name('demandes.store');
Route::get('/demandes/{demande}/edit', [DemandeController::class, 'edit'])->name('demandes.edit');
Route::put('/demandes/{demande}', [DemandeController::class, 'update'])->name('demandes.update');
Route::delete('/demandes/{demande}', [DemandeController::class, 'destroy'])->name('demandes.destroy');
Route::get('demandes/create', [DemandeController::class, 'create'])->name('user.faire-demande');
Route::post('demandes', [DemandeController::class, 'store'])->name('demandes.store');


// Routes pour les techniciens
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/technician/dashboard', [TechnicianController::class, 'index'])->name('technician.dashboard');
});

Route::get('/mes_taches', [TechnicianController::class, 'show'])->name('my-tasks');
Route::post('/taches/update-date-debut', [TechnicianController::class, 'updateDateDebut'])->name('taches.update_date_debut');
Route::get('/historiques_taches', [TechnicianController::class, 'voirToutLesTachesAffectées'])->name('historiques-taches');


Route::post('/tache/update-status/{id}', [TechnicianController::class, 'updateStatus'])->name('update.status');

Route::get('equipement_taches/editer/{id}', [TechnicianController::class, 'edit'])->name('equipement_taches.editer');
Route::put('equipement_taches/{id}', [TechnicianController::class, 'update'])->name('equipement_taches.update');

Route::delete('equipement_taches/{id}', [TechnicianController::class, 'destroy'])->name('equipement_taches.supprimer');

Route::post('/technicien/taches/{id}/declare-indisponible', [TechnicianController::class, 'declareIndisponible'])
    ->name('technicien.declareIndisponible');

    use App\Http\Controllers\RapportController;

    // Routes pour gérer les rapports
    Route::middleware('auth')->group(function () {
        Route::get('rapports/create', [RapportController::class, 'create'])->name('rapports.create');
        Route::post('rapports', [RapportController::class, 'store'])->name('rapports.store');
    });
    



// Routes pour les utilisateurs
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/user/dashboard', [UserController::class, 'index'])->name('user.dashboard');
});
