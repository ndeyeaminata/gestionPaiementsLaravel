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


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//routes pour Utilisateur controller 
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/liste_utilisateurs', [UtilisateurController::class, 'index']);
    Route::post('/create_utilisateurs', [UtilisateurController::class, 'create']);
    Route::get('/show_utilisateurs/{id}', [UtilisateurController::class, 'show']);
    Route::put('/update_utilisateurs/{id}', [UtilisateurController::class, 'update']);
     Route::delete('/delete_utilisateurs/{id}', [UtilisateurController::class, 'destroy']);
});


//routes pour roleController
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/liste_roles', [RoleController::class, 'index']);
    Route::post('/create_roles', [RoleController::class, 'create']);
    Route::get('/show_roles/{id}', [RoleController::class, 'show']);
    Route::put('/update_roles/{id}', [RoleController::class, 'update']);
    Route::delete('/delete_roles/{id}', [RoleController::class, 'destroy']);
});

//routes pour administrateurController
Route::middleware('auth:sanctum','admin')->group(function () {
    Route::get('/liste_administrateurs', [AdministrateurController::class, 'index']);
    Route::post('/create_administrateurs', [AdministrateurController::class, 'create']);
    Route::get('/show_administrateurs/{id}', [AdministrateurController::class, 'show']);
    Route::put('/update_administrateurs/{id}', [AdministrateurController::class, 'update']);
    Route::delete('/delete_administrateurs/{id}', [AdministrateurController::class, 'destroy']);
});

//routes pour cabinetComptableController
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/liste_cabinetComptables', [CabinetComptableController::class, 'index']);
    Route::post('/create_cabinetComptables', [CabinetComptableController::class, 'create']);
    Route::get('/show_cabinetComptables/{id}', [CabinetComptableController::class, 'show']);
    Route::put('/update_cabinetComptables/{id}', [CabinetComptableController::class, 'update']);
    Route::delete('/delete_cabinetComptables/{id}', [CabinetComptableController::class, 'destroy']);
});

//routes pour consultantController
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/liste_consultants', [ConsultantController::class, 'index']);
    Route::post('/create_consultants', [ConsultantController::class, 'create']);
    Route::get('/show_consultants/{id}', [ConsultantController::class, 'show']);
    Route::put('/update_consultants/{id}', [ConsultantController::class, 'update']);
    Route::delete('/delete_consultants/{id}', [ConsultantController::class, 'destroy']);
});

//routes pour compteController
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/liste_comptes', [CompteController::class, 'index']);
    Route::post('/create_comptes', [CompteController::class, 'create']);
    Route::get('/show_comptes/{id}', [CompteController::class, 'show']);
    Route::put('/update_comptes/{id}', [CompteController::class, 'update']);
    Route::delete('/delete_comptes/{id}', [CompteController::class, 'destroy']);
});

//routes pour etatFinancierController
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/liste_etatFinanciers', [EtatFinancierController::class, 'index']);
    Route::post('/create_etatFinanciers', [EtatFinancierController::class, 'create']);
    Route::get('/show_etatFinanciers/{id}', [EtatFinancierController::class, 'show']);
    Route::put('/update_etatFinanciers/{id}', [EtatFinancierController::class, 'update']);
    Route::delete('/delete_etatFinanciers/{id}', [EtatFinancierController::class, 'destroy']);
});

//routes pour fichePresenceController
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/liste_fichePresences', [FichePresenceController::class, 'index']);
    Route::post('/create_fichePresences', [FichePresenceController::class, 'create']);
    Route::get('/show_fichePresences/{id}', [FichePresenceController::class, 'show']);
    Route::put('/update_fichePresences/{id}', [FichePresenceController::class, 'update']);
    Route::delete('/delete_fichePresences/{id}', [FichePresenceController::class, 'destroy']);
});

//routes pour mentorController
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/liste_mentors', [MentorController::class, 'index']);
    Route::post('/create_mentors', [MentorController::class, 'create']);
    Route::get('/show_mentors/{id}', [MentorController::class, 'show']);
    Route::put('/update_mentors/{id}', [MentorController::class, 'update']);
    Route::delete('/delete_mentors/{id}', [MentorController::class, 'destroy']);
    });

//routes pour rapportController
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/liste_rapports', [RapportController::class, 'index']);
    Route::post('/create_rapports', [RapportController::class, 'create']);
    Route::get('/show_rapports/{id}', [RapportController::class, 'show']);
    Route::put('/update_rapports/{id}', [RapportController::class, 'update']);
    Route::delete('/delete_rapports/{id}', [RapportController::class, 'destroy']);
});

//routes pour serviceFinancierController
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/liste_serviceFinanciers', [ServiceFinancierController::class, 'index']);
    Route::post('/create_serviceFinanciers', [ServiceFinancierController::class, 'create']);
    Route::get('/show_serviceFinanciers/{id}', [ServiceFinancierController::class, 'show']);
    Route::put('/update_serviceFinanciers/{id}', [ServiceFinancierController::class, 'update']);
    Route::delete('/delete_serviceFinanciers/{id}', [ServiceFinancierController::class, 'destroy']);
});

//route pour UNCHKController
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/liste_UNCHKs', [UNCHKController::class, 'index']);
    Route::post('/create_UNCHKs', [UNCHKController::class, 'create']);
    Route::get('/show_UNCHKs/{id}', [UNCHKController::class, 'show']);
    Route::put('/update_UNCHKs/{id}', [UNCHKController::class, 'update']);
    Route::delete('/delete_UNCHKs/{id}', [UNCHKController::class, 'destroy']);
});

//Route pour la connexion
Route::post('/auth/login', [AuthController::class, 'login']); 
Route::post('/auth/logout', [AuthController::class, 'logout']); 