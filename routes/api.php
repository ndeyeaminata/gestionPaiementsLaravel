<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//routes pour Utilisateur controller 
Route::get('/liste_utilisateurs', [UtilisateurController::class, 'index']);
Route::post('/create_utilisateurs', [UtilisateurController::class, 'create']);
Route::get('/show_utilisateurs/{id}', [UtilisateurController::class, 'show']);
Route::put('/utilisateurs/{id}', [UtilisateurController::class, 'update']);
Route::delete('/utilisateurs/{id}', [UtilisateurController::class, 'destroy']);
Route::post('/utilisateurs/authentifier', [UtilisateurController::class, 'authentifier']);

//routes pour roleController
Route::get('/liste_roles', [RoleController::class, 'index']);
Route::post('/create_roles', [RoleController::class, 'create']);
Route::get('/show_roles/{id}', [RoleController::class, 'show']);
Route::put('/update_roles/{id}', [RoleController::class, 'update']);
Route::delete('/delete_roles/{id}', [RoleController::class, 'destroy']);

//routes pour administrateurController
Route::get('/liste_administrateurs', [AdministrateurController::class, 'index']);
Route::post('/create_administrateurs', [AdministrateurController::class, 'create']);
Route::get('/show_administrateurs/{id}', [AdministrateurController::class, 'show']);
Route::put('/update_administrateurs/{id}', [AdministrateurController::class, 'update']);
Route::delete('/delete_administrateurs/{id}', [AdministrateurController::class, 'destroy']);

//routes pour cabinetComptableController
Route::get('/liste_cabinetComptables', [CabinetComptableController::class, 'index']);
Route::post('/create_cabinetComptables', [CabinetComptableController::class, 'create']);
Route::get('/show_cabinetComptables/{id}', [CabinetComptableController::class, 'show']);
Route::put('/update_cabinetComptables/{id}', [CabinetComptableController::class, 'update']);
Route::delete('/delete_cabinetComptables/{id}', [CabinetComptableController::class, 'destroy']);

//routes pour consultantController
Route::get('/liste_consultants', [ConsultantController::class, 'index']);
Route::post('/create_consultants', [ConsultantController::class, 'create']);
Route::get('/show_consultants/{id}', [ConsultantController::class, 'show']);
Route::put('/update_consultants/{id}', [ConsultantController::class, 'update']);
Route::delete('/delete_consultants/{id}', [ConsultantController::class, 'destroy']);

//routes pour compteController
Route::get('/liste_comptes', [CompteController::class, 'index']);
Route::post('/create_comptes', [CompteController::class, 'create']);
Route::get('/show_comptes/{id}', [CompteController::class, 'show']);
Route::put('/update_comptes/{id}', [CompteController::class, 'update']);
Route::delete('/delete_comptes/{id}', [CompteController::class, 'destroy']);

//routes pour etatFinancierController
Route::get('/liste_etatFinanciers', [EtatFinancierController::class, 'index']);
Route::post('/create_etatFinanciers', [EtatFinancierController::class, 'create']);
Route::get('/show_etatFinanciers/{id}', [EtatFinancierController::class, 'show']);
Route::put('/update_etatFinanciers/{id}', [EtatFinancierController::class, 'update']);
Route::delete('/delete_etatFinanciers/{id}', [EtatFinancierController::class, 'destroy']);

//routes pour fichePresenceController
Route::get('/liste_fichePresences', [FichePresenceController::class, 'index']);
Route::post('/create_fichePresences', [FichePresenceController::class, 'create']);
Route::get('/show_fichePresences/{id}', [FichePresenceController::class, 'show']);
Route::put('/update_fichePresences/{id}', [FichePresenceController::class, 'update']);
Route::delete('/delete_fichePresences/{id}', [FichePresenceController::class, 'destroy']);

//routes pour mentorController
Route::get('/liste_mentors', [MentorController::class, 'index']);
Route::post('/create_mentors', [MentorController::class, 'create']);
Route::get('/show_mentors/{id}', [MentorController::class, 'show']);
Route::put('/update_mentors/{id}', [MentorController::class, 'update']);
Route::delete('/delete_mentors/{id}', [MentorController::class, 'destroy']);

//routes pour rapportController
Route::get('/liste_rapports', [RapportController::class, 'index']);
Route::post('/create_rapports', [RapportController::class, 'create']);
Route::get('/show_rapports/{id}', [RapportController::class, 'show']);
Route::put('/update_rapports/{id}', [RapportController::class, 'update']);
Route::delete('/delete_rapports/{id}', [RapportController::class, 'destroy']);

//routes pour serviceFinancierController
Route::get('/liste_serviceFinanciers', [ServiceFinancierController::class, 'index']);
Route::post('/create_serviceFinanciers', [ServiceFinancierController::class, 'create']);
Route::get('/show_serviceFinanciers/{id}', [ServiceFinancierController::class, 'show']);
Route::put('/update_serviceFinanciers/{id}', [ServiceFinancierController::class, 'update']);
Route::delete('/delete_serviceFinanciers/{id}', [ServiceFinancierController::class, 'destroy']);

//route pour UNCHKController
Route::get('/liste_UNCHKs', [UNCHKController::class, 'index']);
Route::post('/create_UNCHKs', [UNCHKController::class, 'create']);
Route::get('/show_UNCHKs/{id}', [UNCHKController::class, 'show']);
Route::put('/update_UNCHKs/{id}', [UNCHKController::class, 'update']);
Route::delete('/delete_UNCHKs/{id}', [UNCHKController::class, 'destroy']);