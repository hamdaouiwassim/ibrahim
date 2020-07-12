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
Route::get('/profile', function () {
    return view('patients.profile');
});


Auth::routes();
Route::get('/users', 'HomeController@users')->name('users');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user/centre/ajouter', 'CentresController@create')->name('createCentre');
Route::post('/user/centre/ajouter/db', 'CentresController@store')->name('ajouterCentreDB');
Route::get('/centre/afficher/{id}', 'CentresController@show')->name('afficherCentre');
Route::post('/centre/commenter', 'CommentsController@store')->name('ajouterCommentaire');
Route::get('/user/me/centres', 'CentresController@mescentres')->name('mescentres');
Route::get('/centre/{id}/supprimer', 'CentresController@destroy')->name('supprimercentre');
Route::get('/centre/{id}/horraire/ajouter', 'HorrairesController@create')->name('ajouterHorraire');
Route::post('/centre/horraire/ajouterdb', 'HorrairesController@store')->name('ajouterHorraireDb');
Route::get('/centre/{id}/modifier', 'CentresController@edit')->name('ModifierCentre');
Route::post('/centre/modifierdb', 'CentresController@update')->name('ModifierCentreDB');
Route::get('/centre/{id}/show', 'CentresController@show')->name('ShowCentre');
route::post('/centre/chercher','CentresController@cherchercentre')->name('cherchercentre');
route::post('/centre/avi/addBd','CommentsController@store')->name('AddComment');
route::post('/centre/reservationDb','ReservationsController@store')->name('AddReservation');
route::get('/centre/{id}/charges','PriseenchargesController@create')->name('ajoutercharge');
Route::post('/centre/charge/ajouter/db', 'PriseenchargesController@store')->name('ajouterchargeDB');
Route::get('/centre/charge/{id}/supprimer', 'PriseenchargesController@destroy')->name('supprimercharge');

Route::get('/user/me/reservations', 'ReservationsController@index')->name('mesreservations');
Route::get('/patient/centres', 'CentresController@patientsCentres')->name('patientsCentres'); 
Route::get('/patient/reservations', 'CentresController@patientsReservations')->name('patientsReservations'); 

// Admin Actions
Route::get('/admin/centres', 'CentresController@admincentres')->name('admincentres');
Route::get('/admin/reservations', 'CentresController@adminreservations')->name('adminreservations');
Route::get('/admin/historiques', 'CentresController@adminhistoriques')->name('adminhistoriques');
Route::get('/admin/professionels', 'CentresController@adminprofessionels')->name('adminprofessionels');

Route::get('/admin/centre/{id}/accepter', 'CentresController@AccepterCentre')->name('AccepterCentre');
Route::get('/admin/centre/{id}/refuser', 'CentresController@RefuserCentre')->name('RefuserCentre');


Route::get('/centre/reservation/{id}/accepter', 'ReservationsController@AccepterReservation')->name('AccepterReservation');
Route::get('/centre/reservation/{id}/refuser', 'ReservationsController@RefuserReservation')->name('RefuserReservation');

Route::get('/DropAllCentres','CentresController@DropAllCentres')->name('DropAllCentres');
Route::get('/DropHorraire/{id}','CentresController@DropHorraire')->name('DropHorraire');
Route::post('/ImageUpload','HomeController@ImageUpload')->name('ImageUpload');


