<?php

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

Route::prefix('admin')->group(function(){
	Route::get('/', 'AdminController@index')->name('admin.dashboard');
	Route::get('/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');
	Route::post('/login','Auth\AdminLoginController@login')->name('admin.login.submit');

	// Actores
	Route::resource('/actores','ActorController');
	Route::post('/actores/cambiaestado','ActorController@cambiaEstado')->name('actores.cambiaEstado');
	
	//Generos
	Route::resource('/generos','GeneroController');
	Route::post('/generos/cambiaestado','GeneroController@cambiaEstado')->name('generos.cambiaEstado');

	//Directores
	Route::resource('/directores','DirectoreController');
	Route::post('/directores/cambiaestado','DirectoreController@cambiaEstado')->name('directores.cambiaEstado');

	//Formas De Pago
	Route::resource('/formasdepago','FormasDePagoController');
	Route::post('/formasdepago/cambiaestado','FormasDePagoController@cambiaEstado')->name('formasdepago.cambiaEstado');	

	//Base de Conocimiento
	Route::resource('/baseconocimientos','BaseConocimientoController');
	Route::post('/baseconocimientos/cambiaestado','BaseConocimientoController@cambiaEstado')->name('baseconocimientos.cambiaEstado');	
});

