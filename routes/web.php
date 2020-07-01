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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user/centre/ajouter', 'CentresController@create')->name('createCentre');
Route::post('/user/centre/ajouter/db', 'CentresController@store')->name('ajouterCentreDB');
Route::get('/centre/afficher/{id}', 'CentresController@show')->name('afficherCentre');
Route::post('/centre/commenter', 'CommentsController@store')->name('ajouterCommentaire');
Route::get('/user/me/centres', 'CentresController@mescentres')->name('mescentres');
Route::get('/centre/{id}/supprimer', 'CentresController@destroy')->name('supprimercentre');
Route::get('/centre/{id}/horraire/ajouter', 'HorrairesController@create')->name('ajouterHorraire');
Route::post('/centre/horraire/ajouterdb', 'HorrairesController@store')->name('ajouterHorraireDb');

route::post('/centre/chercher','CentresController@cherchercentre')->name('cherchercentre');

route::get('/centre/{id}/charges','PriseenchargesController@create')->name('ajoutercharge');
Route::post('/centre/charge/ajouter/db', 'PriseenchargesController@store')->name('ajouterchargeDB');
Route::get('/centre/charge/{id}/supprimer', 'PriseenchargesController@destroy')->name('supprimercharge');

Route::get('/user/me/reservations', 'ReservationsController@index')->name('mesreservations');

