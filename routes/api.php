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
Route::put('/roles/{id}', [RoleController::class, 'update']);
Route::delete('/roles/{id}', [RoleController::class, 'destroy']);
