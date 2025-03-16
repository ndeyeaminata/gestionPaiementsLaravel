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
use App\Http\Controllers\AuthController;
use App\Models\Utilisateur;




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

Route::prefix('admin')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::middleware('auth:sanctum')->group(function(){
        Route::apiResource('/utilisateurs', UtilisateurController::class);
        Route::post('/utilisateurs/{id}/assigner-role', [RoleController::class, 'assignerRole']);
        Route::get('/utilisateurs/{id}/role', [RoleController::class, 'voirRole']);
        Route::apiResource('/fichePresences', FichePresenceController::class);
        Route::apiResource('/mentors', MentorController::class);
        Route::apiResource('/consultants', ConsultantController::class);
        Route::apiResource('/roles', RoleController::class);
        Route::apiResource('/comptes', CompteController::class);
        Route::apiResource('/administrateurs', AdministrateurController::class);
        Route::apiResource('/cabinetComptables', CabinetComptableController::class);
        Route::apiResource('/etatFinanciers', EtatFinancierController::class);
        Route::apiResource('/rapports', RapportController::class);
        Route::apiResource('/serviceFinanciers', ServiceFinancierController::class);
        Route::apiResource('/unchks', UNCHKController::class);
        Route::post('/logout', [AuthController::class, 'logout']);

    });
});

Route::prefix('mentors')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/logout', [AuthController::class, 'logout']);
        Route::get('/fiche-presence', [FichePresenceController::class, 'index']);
        Route::get('/fiche-presence/{id}', [FichePresenceController::class, 'show']);
        Route::post('/fiche-presence', [FichePresenceController::class, 'store']);
        Route::put('/fiche-presence/{id}', [FichePresenceController::class, 'update']);
        Route::delete('/fiche-presence/{id}', [FichePresenceController::class, 'destroy']);
        Route::put('/profile/update', [MentorController::class, 'updateProfile']);
        Route::get('/profile', [MentorController::class, 'showProfile']);
    });
});

Route::prefix('consultants')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/logout', [AuthController::class, 'logout']);
        Route::get('/profile', [ConsultantController::class, 'showProfile']);
        Route::put('/profile/update', [ConsultantController::class, 'updateProfile']);
        Route::get('/rapports', [RapportController::class, 'index']);
        Route::get('/rapports/{id}', [RapportController::class, 'show']);
        Route::post('/rapports', [RapportController::class, 'store']);
        Route::put('/rapports/{id}', [RapportController::class, 'update']);
        Route::delete('/rapports/{id}', [RapportController::class, 'destroy']);
    });
});

Route::prefix('cabinets-comptables')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/logout', [AuthController::class, 'logout']);
        Route::get('/fiche-presence/en-attente', [FichePresenceController::class, 'fichePresenceEnAttente']);
        Route::post('/fiche-presence/valider/{id}', [FichePresenceController::class, 'validerFichePresence']);
        Route::get('/rapports/en-attente', [RapportController::class, 'rapportsEnAttente']);
        Route::post('/rapports/valider/{id}', [RapportController::class, 'validerRapport']);
        Route::get('/etat-financiers', [EtatFinancierController::class, 'index']);
        Route::post('/etat-financiers/signature/{id}', [EtatFinancierController::class, 'signerEtatFinancier']);
        Route::post('/etat-financiers/transferer/{id}', [EtatFinancierController::class, 'transfererVersUnchk']);
    });
});