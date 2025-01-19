<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Passport\Passport;
use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\FichePresenceController;
use App\Http\Controllers\MentorController;
use App\Http\Controllers\ConsultantController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\CompteController;
use App\Http\Controllers\AdministrateurController;
use App\Http\Controllers\CabinetComptableController;
use App\Http\Controllers\EtatFinancierController;
use App\Http\Controllers\RapportController;
use App\Http\Controllers\ServiceFinancierController;
use App\Http\Controllers\UNCHKController;


use Laravel\Passport\Http\Controllers\AccessTokenController;
use Laravel\Passport\Http\Controllers\AuthorizationController;
use Laravel\Passport\Http\Controllers\ApproveAuthorizationController;
use Laravel\Passport\Http\Controllers\DenyAuthorizationController;
use Laravel\Passport\Http\Controllers\ClientController;
use Laravel\Passport\Http\Controllers\PersonalAccessTokenController;
use Laravel\Passport\Http\Controllers\TransientTokenController;

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

//Enregistrer les itinéraires Passport manuellement (uniquement s'ils sont ignorés dans AuthServiceProvider)

Route::group(['prefix' => 'oauth'], function () {
    // Route pour obtenir un token d'accès
    Route::post('/token', [AccessTokenController::class, 'issueToken'])->name('passport.token');
    
    // Route pour l'autorisation des clients
    Route::get('/authorize', [AuthorizationController::class, 'authorize'])->name('passport.authorizations.authorize');
    Route::post('/authorize', [ApproveAuthorizationController::class, 'approve'])->name('passport.authorizations.approve');
    Route::delete('/authorize', [DenyAuthorizationController::class, 'deny'])->name('passport.authorizations.deny');
    
    // Routes pour les clients
    Route::post('/clients', [ClientController::class, 'store'])->name('passport.clients.store');
    Route::put('/clients/{client_id}', [ClientController::class, 'update'])->name('passport.clients.update');
    Route::delete('/clients/{client_id}', [ClientController::class, 'destroy'])->name('passport.clients.destroy');
    Route::get('/clients', [ClientController::class, 'forUser'])->name('passport.clients.index');

     // Routes pour les tokens personnels
     Route::get('/personal-access-tokens', [PersonalAccessTokenController::class, 'forUser'])->name('passport.personal.tokens.index');
     Route::post('/personal-access-tokens', [PersonalAccessTokenController::class, 'store'])->name('passport.personal.tokens.store');
     Route::delete('/personal-access-tokens/{token_id}', [PersonalAccessTokenController::class, 'destroy'])->name('passport.personal.tokens.destroy');
    
     // Route pour les tokens transitoires
      Route::post('/token/refresh', [TransientTokenController::class, 'refresh'])->name('passport.token.refresh');
});

    
    



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//routes pour Utilisateur controller 
Route::middleware('auth:api')->get('/liste_utilisateurs', [UtilisateurController::class, 'index']);
Route::middleware('auth:api')->post('/create_utilisateurs', [UtilisateurController::class, 'create']);
Route::middleware('auth:api')->get('/show_utilisateurs/{id}', [UtilisateurController::class, 'show']);
Route::middleware('auth:api')->put('/utilisateurs/{id}', [UtilisateurController::class, 'update']);
Route::middleware('auth:api')->delete('/utilisateurs/{id}', [UtilisateurController::class, 'destroy']);
Route::middleware('auth:api')->post('/utilisateurs/authentifier', [UtilisateurController::class, 'authentifier']);

//routes pour roleController
Route::middleware('auth:api')->get('/liste_roles', [RoleController::class, 'index']);
Route::middleware('auth:api')->post('/create_roles', [RoleController::class, 'create']);
Route::middleware('auth:api')->get('/show_roles/{id}', [RoleController::class, 'show']);
Route::middleware('auth:api')->put('/update_roles/{id}', [RoleController::class, 'update']);
Route::middleware('auth:api')->delete('/delete_roles/{id}', [RoleController::class, 'destroy']);

//routes pour administrateurController
Route::middleware('auth:api')->get('/liste_administrateurs', [AdministrateurController::class, 'index']);
Route::middleware('auth:api')->post('/create_administrateurs', [AdministrateurController::class, 'create']);
Route::middleware('auth:api')->get('/show_administrateurs/{id}', [AdministrateurController::class, 'show']);
Route::middleware('auth:api')->put('/update_administrateurs/{id}', [AdministrateurController::class, 'update']);
Route::middleware('auth:api')->delete('/delete_administrateurs/{id}', [AdministrateurController::class, 'destroy']);

//routes pour cabinetComptableController
Route::middleware('auth:api')->get('/liste_cabinetComptables', [CabinetComptableController::class, 'index']);
Route::middleware('auth:api')->post('/create_cabinetComptables', [CabinetComptableController::class, 'create']);
Route::middleware('auth:api')->get('/show_cabinetComptables/{id}', [CabinetComptableController::class, 'show']);
Route::middleware('auth:api')->put('/update_cabinetComptables/{id}', [CabinetComptableController::class, 'update']);
Route::middleware('auth:api')->delete('/delete_cabinetComptables/{id}', [CabinetComptableController::class, 'destroy']);

//routes pour consultantController
Route::middleware('auth:api')->get('/liste_consultants', [ConsultantController::class, 'index']);
Route::middleware('auth:api')->post('/create_consultants', [ConsultantController::class, 'create']);
Route::middleware('auth:api')->get('/show_consultants/{id}', [ConsultantController::class, 'show']);
Route::middleware('auth:api')->put('/update_consultants/{id}', [ConsultantController::class, 'update']);
Route::middleware('auth:api')->delete('/delete_consultants/{id}', [ConsultantController::class, 'destroy']);

//routes pour compteController
Route::middleware('auth:api')->get('/liste_comptes', [CompteController::class, 'index']);
Route::middleware('auth:api')->post('/create_comptes', [CompteController::class, 'create']);
Route::middleware('auth:api')->get('/show_comptes/{id}', [CompteController::class, 'show']);
Route::middleware('auth:api')->put('/update_comptes/{id}', [CompteController::class, 'update']);
Route::middleware('auth:api')->delete('/delete_comptes/{id}', [CompteController::class, 'destroy']);

//routes pour etatFinancierController
Route::middleware('auth:api')->get('/liste_etatFinanciers', [EtatFinancierController::class, 'index']);
Route::middleware('auth:api')->post('/create_etatFinanciers', [EtatFinancierController::class, 'create']);
Route::middleware('auth:api')->get('/show_etatFinanciers/{id}', [EtatFinancierController::class, 'show']);
Route::middleware('auth:api')->put('/update_etatFinanciers/{id}', [EtatFinancierController::class, 'update']);
Route::middleware('auth:api')->delete('/delete_etatFinanciers/{id}', [EtatFinancierController::class, 'destroy']);

//routes pour fichePresenceController
Route::middleware('auth:api')->get('/liste_fichePresences', [FichePresenceController::class, 'index']);
Route::middleware('auth:api')->post('/create_fichePresences', [FichePresenceController::class, 'create']);
Route::middleware('auth:api')->get('/show_fichePresences/{id}', [FichePresenceController::class, 'show']);
Route::middleware('auth:api')->put('/update_fichePresences/{id}', [FichePresenceController::class, 'update']);
Route::middleware('auth:api')->delete('/delete_fichePresences/{id}', [FichePresenceController::class, 'destroy']);

//routes pour mentorController
Route::middleware('auth:api')->get('/liste_mentors', [MentorController::class, 'index']);
Route::middleware('auth:api')->post('/create_mentors', [MentorController::class, 'create']);
Route::middleware('auth:api')->get('/show_mentors/{id}', [MentorController::class, 'show']);
Route::middleware('auth:api')->put('/update_mentors/{id}', [MentorController::class, 'update']);
Route::middleware('auth:api')->delete('/delete_mentors/{id}', [MentorController::class, 'destroy']);

//routes pour rapportController
Route::middleware('auth:api')->get('/liste_rapports', [RapportController::class, 'index']);
Route::middleware('auth:api')->post('/create_rapports', [RapportController::class, 'create']);
Route::middleware('auth:api')->get('/show_rapports/{id}', [RapportController::class, 'show']);
Route::middleware('auth:api')->put('/update_rapports/{id}', [RapportController::class, 'update']);
Route::middleware('auth:api')->delete('/delete_rapports/{id}', [RapportController::class, 'destroy']);

//routes pour serviceFinancierController
Route::middleware('auth:api')->get('/liste_serviceFinanciers', [ServiceFinancierController::class, 'index']);
Route::middleware('auth:api')->post('/create_serviceFinanciers', [ServiceFinancierController::class, 'create']);
Route::middleware('auth:api')->get('/show_serviceFinanciers/{id}', [ServiceFinancierController::class, 'show']);
Route::middleware('auth:api')->put('/update_serviceFinanciers/{id}', [ServiceFinancierController::class, 'update']);
Route::middleware('auth:api')->delete('/delete_serviceFinanciers/{id}', [ServiceFinancierController::class, 'destroy']);

//route pour UNCHKController
Route::middleware('auth:api')->get('/liste_UNCHKs', [UNCHKController::class, 'index']);
Route::middleware('auth:api')->post('/create_UNCHKs', [UNCHKController::class, 'create']);
Route::middleware('auth:api')->get('/show_UNCHKs/{id}', [UNCHKController::class, 'show']);
Route::middleware('auth:api')->put('/update_UNCHKs/{id}', [UNCHKController::class, 'update']);
Route::middleware('auth:api')->delete('/delete_UNCHKs/{id}', [UNCHKController::class, 'destroy']);