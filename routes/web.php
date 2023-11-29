<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\EvenementController;
use App\Http\Controllers\AssociationController;
use App\Http\Controllers\DashboardUserController;

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
Route::get('/',[ClientController::class,'login']);
Route::post('/loginClient',[ClientController::class,'authenticate']);
Route::get('/dashboardClient',[DashboardUserController::class,'index']);
Route::post('/deconnexionUser', [ClientController::class,'logout']);
Route::get('/inscription',[ClientController::class,'create']);
Route::post('/inscriptionClient',[ClientController::class,'store']);

//ASSOCIATION
Route::get('/inscriptionAssociation',[AssociationController::class,'create']);
Route::post('/inscriptionAssociation',[AssociationController::class,'store']);
Route::get('/connexionAssociation',[AssociationController::class,'login']);
Route::post('/connexionAssociation',[AssociationController::class,'authenticate']);
Route::get('/dashboardAssociation',[DashboardUserController::class,'create']);
Route::post('/deconnexionAssociation', [AssociationController::class,'logout']);

//EVENEMENT
Route::post('/insererEvenement',[AssociationController::class,'ajout_evenement']);
Route::get('/listeEvenement',[EvenementController::class,'index']);
Route::get('/detailEvenement/{id}',[EvenementController::class,'show']);