<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Redirect::to('/welcome');
});

/*
Route::get('/welcome', function () {
    return view('welcome');
});
*/

Route::get('/template', function () {
    return view('template');
});

Route::middleware(['auth'])->group(function () {
Route::get('/welcome', function () {
        return view('welcome');
    })->name('welcome');

Route::get('/profil', "ProfilController@index");
Route::get('/profil/edit', "ProfilController@edit");
Route::patch('/profil/edit', "ProfilController@update");
Route::get('profil/change-password',"ProfilController@editPassword");
Route::patch('/profil/change-password', "ProfilController@updatePassword");

Route::get('/constructeurs', "ConstructeurController@index");
Route::get('/constructeurs/ajouter', "ConstructeurController@create");
Route::post('/constructeurs/ajouter', "ConstructeurController@store");
Route::get('/constructeurs/edit-{constructeur}', "ConstructeurController@edit");
Route::patch('/constructeurs/edit-{constructeur}', "ConstructeurController@update");
Route::get('/constructeurs/delete-{constructeur}', "ConstructeurController@destroy");

Route::get('/modeles', "ModeleController@index");
Route::get('/modeles/ajouter', "ModeleController@create");
Route::post('/modeles/ajouter', "ModeleController@store");
Route::get('/modeles/edit-{modele}', "ModeleController@edit");
Route::patch('/modeles/edit-{modele}', "ModeleController@update");
Route::get('/modeles/delete-{modele}', "ModeleController@destroy");

Route::get('/types-vehicule', "TypesVehiculeController@index");
Route::get('/types-vehicule/ajouter', "TypesVehiculeController@create");
Route::post('/types-vehicule/ajouter', "TypesVehiculeController@store");
Route::get('/types-vehicule/edit-{typeVehicule}', "TypesVehiculeController@edit");
Route::patch('/types-vehicule/edit-{typeVehicule}', "TypesVehiculeController@update");
Route::get('/types-vehicule/delete-{typeVehicule}', "TypesVehiculeController@destroy");

Route::get('/vehicules', "VehiculeController@index");
Route::get('/vehicules/ajouter', "VehiculeController@create");
Route::post('/vehicules/ajouter', "VehiculeController@store");
Route::get('/vehicules/edit-{vehicule}', "VehiculeController@edit");
Route::patch('/vehicules/edit-{vehicule}', "VehiculeController@update");
Route::get('/vehicules/delete-{vehicule}', "VehiculeController@destroy");

Route::get('/types-permis', "TypesPermisController@index");
Route::get('/types-permis/ajouter', "TypesPermisController@create");
Route::post('/types-permis/ajouter', "TypesPermisController@store");
Route::get('/types-permis/edit-{permis}', "TypesPermisController@edit");
Route::patch('/types-permis/edit-{permis}', "TypesPermisController@update");
Route::get('/types-permis/delete-{permis}', "TypesPermisController@destroy");

Route::get('/chauffeurs', "ChauffeurController@index");
Route::get('/chauffeurs/ajouter', "ChauffeurController@create");
Route::post('/chauffeurs/ajouter', "ChauffeurController@store");
Route::get('/chauffeurs/edit-{chauffeur}', "ChauffeurController@edit");
Route::patch('/chauffeurs/edit-{chauffeur}', "ChauffeurController@update");
Route::get('/chauffeurs/delete-{chauffeur}', "ChauffeurController@destroy");

Route::get('/fournisseurs-carburant', "FournisseursCarburantController@index");
Route::get('/fournisseurs-carburant/ajouter', "FournisseursCarburantController@create");
Route::post('/fournisseurs-carburant/ajouter', "FournisseursCarburantController@store");
Route::get('/fournisseurs-carburant/edit-{fournisseur}', "FournisseursCarburantController@edit");
Route::patch('/fournisseurs-carburant/edit-{fournisseur}', "FournisseursCarburantController@update");
Route::get('/fournisseurs-carburant/delete-{fournisseur}', "FournisseursCarburantController@destroy");

Route::get('/types-carburant', "TypesCarburantController@index");
Route::get('/types-carburant/ajouter', "TypesCarburantController@create");
Route::post('/types-carburant/ajouter', "TypesCarburantController@store");
Route::get('/types-carburant/edit-{carburant}', "TypesCarburantController@edit");
Route::patch('/types-carburant/edit-{carburant}', "TypesCarburantController@update");
Route::get('/types-carburant/delete-{carburant}', "TypesCarburantController@destroy");

Route::get('/cartes-carburant', "CartesCarburantController@index");
Route::get('/cartes-carburant/ajouter', "CartesCarburantController@create");
Route::post('/cartes-carburant/ajouter', "CartesCarburantController@store");
Route::get('/cartes-carburant/edit-{carte}', "CartesCarburantController@edit");
Route::patch('/cartes-carburant/edit-{carte}', "CartesCarburantController@update");
Route::get('/cartes-carburant/delete-{carte}', "CartesCarburantController@destroy");

Route::get('/factures',"ConsommationsCarburantFactureController@index");
/* Route::get('/factures/ajouter',"ConsommationsCarburantFactureController@create"); */
/* Route::post('/factures/ajouter',"ConsommationsCarburantFactureController@store"); */
Route::get('/factures/edit-{facture}',"ConsommationsCarburantFactureController@edit");
Route::patch('/factures/edit-{facture}',"ConsommationsCarburantFactureController@update");
Route::get('/factures/delete-{facture}',"ConsommationsCarburantFactureController@destroy");
Route::get('/factures/import',"ConsommationsCarburantFactureController@import");
Route::post('/factures/import',"ConsommationsCarburantFactureController@storeImport");

Route::get('/destinations', "DestinationController@index");
Route::get('/destinations/ajouter', "DestinationController@create");
Route::post('/destinations/ajouter', "DestinationController@store");
Route::get('/destinations/edit-{destination}', "DestinationController@edit");
Route::patch('/destinations/edit-{destination}', "DestinationController@update");
Route::get('/destinations/delete-{destination}', "DestinationController@destroy");

Route::get('/voyages', "VoyageController@index");
Route::get('/voyages/ajouter', "VoyageController@create");
Route::post('/voyages/ajouter', "VoyageController@store");
Route::get('/voyages/edit-{voyage}', "VoyageController@edit");
Route::patch('/voyages/edit-{voyage}', "VoyageController@update");
Route::get('/voyages/delete-{voyage}', "VoyageController@destroy");

Route::get('/utilisateurs', "UtilisateurController@index");
/* Create and Store method are in the RegisteredUserController because it's already existing in Laravel Breeze */
Route::get('/utilisateurs/edit-{user}', "UtilisateurController@edit");
Route::patch('/utilisateurs/edit-{user}', "UtilisateurController@update");
Route::get('/utilisateurs/delete-{user}', "UtilisateurController@destroy");

Route::get('/stats/consommations-vehicules', "Stats@consommationsVehicules");
Route::post('/stats/consommations-vehicules', "Stats@consommationsVehicules");

Route::get('/stats/consommations-carburants', "Stats@consommationsCarburants");
Route::post('/stats/consommations-carburants', "Stats@consommationsCarburants");

Route::get('/stats/consommations-chauffeurs', "Stats@consommationsChauffeurs");
Route::post('/stats/consommations-chauffeurs', "Stats@consommationsChauffeurs");

Route::get('/stats/primes', "Stats@primes");
Route::post('/stats/primes', "Stats@primes");
Route::post('/stats/primess', "Stats@send_data")->name('send.primes');

Route::get('/primes', "PrimesController@index");
Route::post('/primes', "PrimesController@index");
Route::get('/primes/edit-{prime}', "PrimesController@edit");
Route::patch('/primes/edit-{prime}', "PrimesController@update");

/*Route::get('/stats/primes', function(){
    return view('stats.primes');
});*/
/*Route::post('/stats/consommations-chauffeurs', "Stats@consommationsChauffeurs");*/

});





/*
Route::get('/welcome', function () {
    return view('welcome');
})->middleware(['auth'])->name('welcome');
*/
require __DIR__.'/auth.php';
