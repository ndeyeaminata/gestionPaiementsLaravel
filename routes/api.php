<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FichePresenceController; // Correction : Importation correcte du contrôleur
use App\Http\Controllers\MentorController; // Correction : Importation correcte du contrôleur
use App\Http\Controllers\EtatFinancierController; // Correction : Importation correcte du contrôleur
use App\Http\Controllers\UtilisateurController; // Importation correcte du contrôleur
use App\Http\Controllers\RoleController; // Importation correcte du contrôleur
use App\Http\Controllers\ConsultantController; // Importation correcte du contrôleur
use App\Http\Controllers\CompteController; // Importation correcte du contrôleur
use App\Http\Controllers\AdministrateurController; // Importation correcte du contrôleur
use App\Http\Controllers\RapportController; // Importation correcte du contrôleur
use App\Http\Controllers\CabinetComptableController; // Importation correcte du contrôleur
use App\Http\Controllers\ServiceFinancierController; // Importation correcte du contrôleur
use App\Http\Controllers\UNCHKController; // Importation correcte du contrôleur

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


//Enregistrer les itinéraires Passport (uniquement s'ils ne sont pas ignorés dans AuthServiceProvider)
//Passport::routes();

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



// Endpoint pour obtenir l'utilisateur authentifié
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


// Groupe des routes avec auth:api middleware
Route::group(['middleware' => ['auth:api']], function () {

// Routes organisées sous un préfixe  et suivent les conventions REST pour les opérations CRUD.    
    Route::prefix('utilisateurs')->group(function () {
        Route::get('/', [UtilisateurController::class, 'index']);
        Route::post('/', [UtilisateurController::class, 'store']);
        Route::get('/{id}', [UtilisateurController::class, 'show']);
        Route::put('/{id}', [UtilisateurController::class, 'update']);
        Route::delete('/{id}', [UtilisateurController::class, 'destroy']);
        Route::post('/authentifier', [UtilisateurController::class, 'authentifier']);
    });

    Route::prefix('roles')->group(function () {
        Route::get('/', [RoleController::class, 'index']);
        Route::post('/', [RoleController::class, 'store']);
        Route::get('/{id}', [RoleController::class, 'show']);
        Route::put('/{id}', [RoleController::class, 'update']);
        Route::delete('/{id}', [RoleController::class, 'destroy']);
    });

    Route::prefix('administrateurs')->group(function () {
        Route::get('/', [AdministrateurController::class, 'index']);
        Route::post('/', [AdministrateurController::class, 'store']);
        Route::get('/{id}', [AdministrateurController::class, 'show']);
        Route::put('/{id}', [AdministrateurController::class, 'update']);
        Route::delete('/{id}', [AdministrateurController::class, 'destroy']);
    });

    Route::prefix('cabinet-comptables')->group(function () {
        Route::get('/', [CabinetComptableController::class, 'index']);
        Route::post('/', [CabinetComptableController::class, 'store']);
        Route::get('/{id}', [CabinetComptableController::class, 'show']);
        Route::put('/{id}', [CabinetComptableController::class, 'update']);
        Route::delete('/{id}', [CabinetComptableController::class, 'destroy']);
    });
    
    Route::prefix('consultants')->group(function () {
        Route::get('/', [ConsultantController::class, 'index']);
        Route::post('/', [ConsultantController::class, 'store']);
        Route::get('/{id}', [ConsultantController::class, 'show']);
        Route::put('/{id}', [ConsultantController::class, 'update']);
        Route::delete('/{id}', [ConsultantController::class, 'destroy']);
    });

    Route::prefix('comptes')->group(function () {
        Route::get('/', [CompteController::class, 'index']);
        Route::post('/', [CompteController::class, 'store']);
        Route::get('/{id}', [CompteController::class, 'show']);
        Route::put('/{id}', [CompteController::class, 'update']);
        Route::delete('/{id}', [CompteController::class, 'destroy']);
    });

    Route::prefix('etat-financiers')->group(function () {
        Route::get('/', [EtatFinancierController::class, 'index']);
        Route::post('/', [EtatFinancierController::class, 'store']);
        Route::get('/{id}', [EtatFinancierController::class, 'show']);
        Route::put('/{id}', [EtatFinancierController::class, 'update']);
        Route::delete('/{id}', [EtatFinancierController::class, 'destroy']);
    });

    Route::prefix('fiche-presences')->group(function () {
        Route::get('/', [FichePresenceController::class, 'index']);
        Route::post('/', [FichePresenceController::class, 'store']);
        Route::get('/{id}', [FichePresenceController::class, 'show']);
        Route::put('/{id}', [FichePresenceController::class, 'update']);
        Route::delete('/{id}', [FichePresenceController::class, 'destroy']);
    });

    Route::prefix('mentors')->group(function () {
        Route::get('/', [MentorController::class, 'index']);
        Route::post('/', [MentorController::class, 'store']);
        Route::get('/{id}', [MentorController::class, 'show']);
        Route::put('/{id}', [MentorController::class, 'update']);
        Route::delete('/{id}', [MentorController::class, 'destroy']);
    });

    Route::prefix('rapports')->group(function () {
        Route::get('/', [RapportController::class, 'index']);
        Route::post('/', [RapportController::class, 'store']);
        Route::get('/{id}', [RapportController::class, 'show']);
        Route::put('/{id}', [RapportController::class, 'update']);
        Route::delete('/{id}', [RapportController::class, 'destroy']);
    });

    Route::prefix('service-financiers')->group(function () {
        Route::get('/', [ServiceFinancierController::class, 'index']);
        Route::post('/', [ServiceFinancierController::class, 'store']);
        Route::get('/{id}', [ServiceFinancierController::class, 'show']);
        Route::put('/{id}', [ServiceFinancierController::class, 'update']);
        Route::delete('/{id}', [ServiceFinancierController::class, 'destroy']);
    });
    
    Route::prefix('unchks')->group(function () {
        Route::get('/', [UNCHKController::class, 'index']);
        Route::post('/', [UNCHKController::class, 'store']);
        Route::get('/{id}', [UNCHKController::class, 'show']);
        Route::put('/{id}', [UNCHKController::class, 'update']);
        Route::delete('/{id}', [UNCHKController::class, 'destroy']);
    });


//*********************OU ENCORS************************
/* 
    Route::get('/liste_utilisateurs', [UtilisateurController::class, 'index']);
    Route::post('/create_utilisateurs', [UtilisateurController::class, 'create']);
    Route::get('/show_utilisateurs/{id}', [UtilisateurController::class, 'show']);
<<<<<<< Updated upstream
    Route::put('/utilisateurs/{id}', [UtilisateurController::class, 'update']);
    Route::delete('/utilisateurs/{id}', [UtilisateurController::class, 'destroy']);
    Route::post('/utilisateurs/authentifier', [UtilisateurController::class, 'authentifier']);
=======
    Route::put('/update_utilisateurs/{id}', [UtilisateurController::class, 'update']);
    Route::delete('/delete_utilisateurs/{id}', [UtilisateurController::class, 'destroy']);
});
>>>>>>> Stashed changes

    
    Route::get('/liste_roles', [RoleController::class, 'index']);
    Route::post('/create_roles', [RoleController::class, 'create']);
    Route::get('/show_roles/{id}', [RoleController::class, 'show']);
    Route::put('/update_roles/{id}', [RoleController::class, 'update']);
    Route::delete('/delete_roles/{id}', [RoleController::class, 'destroy']);

    
    Route::get('/liste_administrateurs', [AdministrateurController::class, 'index']);
    Route::post('/create_administrateurs', [AdministrateurController::class, 'create']);
    Route::get('/show_administrateurs/{id}', [AdministrateurController::class, 'show']);
    Route::put('/update_administrateurs/{id}', [AdministrateurController::class, 'update']);
    Route::delete('/delete_administrateurs/{id}', [AdministrateurController::class, 'destroy']);

    
    Route::get('/liste_cabinetComptables', [CabinetComptableController::class, 'index']);
    Route::post('/create_cabinetComptables', [CabinetComptableController::class, 'create']);
    Route::get('/show_cabinetComptables/{id}', [CabinetComptableController::class, 'show']);
    Route::put('/update_cabinetComptables/{id}', [CabinetComptableController::class, 'update']);
    Route::delete('/delete_cabinetComptables/{id}', [CabinetComptableController::class, 'destroy']);

    
    Route::get('/liste_consultants', [ConsultantController::class, 'index']);
    Route::post('/create_consultants', [ConsultantController::class, 'create']);
    Route::get('/show_consultants/{id}', [ConsultantController::class, 'show']);
    Route::put('/update_consultants/{id}', [ConsultantController::class, 'update']);
    Route::delete('/delete_consultants/{id}', [ConsultantController::class, 'destroy']);

    
    Route::get('/liste_comptes', [CompteController::class, 'index']);
    Route::post('/create_comptes', [CompteController::class, 'create']);
    Route::get('/show_comptes/{id}', [CompteController::class, 'show']);
    Route::put('/update_comptes/{id}', [CompteController::class, 'update']);
    Route::delete('/delete_comptes/{id}', [CompteController::class, 'destroy']);

    
    Route::get('/liste_etatFinanciers', [EtatFinancierController::class, 'index']);
    Route::post('/create_etatFinanciers', [EtatFinancierController::class, 'create']);
    Route::get('/show_etatFinanciers/{id}', [EtatFinancierController::class, 'show']);
    Route::put('/update_etatFinanciers/{id}', [EtatFinancierController::class, 'update']);
    Route::delete('/delete_etatFinanciers/{id}', [EtatFinancierController::class, 'destroy']);

    
    Route::get('/liste_fichePresences', [FichePresenceController::class, 'index']);
    Route::post('/create_fichePresences', [FichePresenceController::class, 'create']);
    Route::get('/show_fichePresences/{id}', [FichePresenceController::class, 'show']);
    Route::put('/update_fichePresences/{id}', [FichePresenceController::class, 'update']);
    Route::delete('/delete_fichePresences/{id}', [FichePresenceController::class, 'destroy']);

    
    Route::get('/liste_mentors', [MentorController::class, 'index']);
    Route::post('/create_mentors', [MentorController::class, 'create']);
    Route::get('/show_mentors/{id}', [MentorController::class, 'show']);
    Route::put('/update_mentors/{id}', [MentorController::class, 'update']);
    Route::delete('/delete_mentors/{id}', [MentorController::class, 'destroy']);

    
    Route::get('/liste_rapports', [RapportController::class, 'index']);
    Route::post('/create_rapports', [RapportController::class, 'create']);
    Route::get('/show_rapports/{id}', [RapportController::class, 'show']);
    Route::put('/update_rapports/{id}', [RapportController::class, 'update']);
    Route::delete('/delete_rapports/{id}', [RapportController::class, 'destroy']);

    
    Route::get('/liste_serviceFinanciers', [ServiceFinancierController::class, 'index']);
    Route::post('/create_serviceFinanciers', [ServiceFinancierController::class, 'create']);
    Route::get('/show_serviceFinanciers/{id}', [ServiceFinancierController::class, 'show']);
    Route::put('/update_serviceFinanciers/{id}', [ServiceFinancierController::class, 'update']);
    Route::delete('/delete_serviceFinanciers/{id}', [ServiceFinancierController::class, 'destroy']);

    
    Route::get('/liste_UNCHKs', [UNCHKController::class, 'index']);
    Route::post('/create_UNCHKs', [UNCHKController::class, 'create']);
    Route::get('/show_UNCHKs/{id}', [UNCHKController::class, 'show']);
    Route::put('/update_UNCHKs/{id}', [UNCHKController::class, 'update']);
    Route::delete('/delete_UNCHKs/{id}', [UNCHKController::class, 'destroy']);
    
*/

});