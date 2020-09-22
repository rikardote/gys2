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

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');
Route::resource('/empleados', 'EmpleadosController');
Route::resource('/suplentes', 'SuplentesController');
Route::get('/get_suplentes', 'SuplentesController@getSuplentes')->name('datatable.suplentes');

Route::resource('/servicios', 'ServiciosController');
Route::resource('/unidades', 'UnidadesController');
Route::resource('/puestos', 'PuestosController');
Route::resource('/incidencias', 'IncidenciasController');