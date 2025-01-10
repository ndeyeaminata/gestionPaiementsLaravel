<?php

use Illuminate\Support\Facades\Route;

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

//routes pour 
