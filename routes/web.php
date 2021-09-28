<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authentication\AuthenticationController;
use App\Http\Controllers\DashboardController;

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
    return view('authentication.authentication-signin');
});


// Gestion du tableau de bord
Route::get('dashboard', [dashboardController::class, 'retourneViewDashboard']);
// Fin gestion du tableau de board

// groupe de route autentication
Route::group(['prefix'=>'authentication'],function(){
    Route::get('/inscription',[AuthenticationController::class, 'retourneViewInscription']);
Route::get('/connexion',[AuthenticationController::class, 'retourneViewConnexion']);
Route::post('/connexion-traitement',[AuthenticationController::class, 'connexionTraitement']);
Route::get('/renitialise-mot-de-passe',[AuthenticationController::class, 'retourneViewReunitialiserMotDePasse']);
Route::post('/reinitialise-mot-de-passe-traitement',[AuthenticationController::class, 'reinitialiserMotDePasseTraitement']);
Route::get('/mot-de-passe-oublie',[AuthenticationController::class, 'retourneViewmMotDePasseOublie']);
Route::post('/mot-de-passe-oublie-traitement',[AuthenticationController::class, 'motDePasseOublieTraitement']);
Route::post('/enregister-user',[AuthenticationController::class, 'enregisterUser']);
});


