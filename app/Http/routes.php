<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::resource('terapeutas', 'TherapistsController');
Route::resource('pacientes', 'PatientsController');
Route::resource('supervisores', 'SupervisorsController');
Route::resource('consultorios', 'OfficesController');
Route::resource('dias_no_laborales', 'NonWorkingDaysController');
Route::resource('turnos_terapeutas', 'TherapistsGuardsController');

Route::get('calendario', 'CalendarsController@index');