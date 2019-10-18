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

// Route::get('/', function () {
// 	return view('welcome');
// });

Auth::routes();

Route::get('/', 'HomeController@index');

Route::post('/equipo', 'EquiposController@store');

Route::get('/createTecnicos/{equipo}', 'EquiposController@createTecnicos');
Route::get('/tecnicos', 'HomeController@index');
Route::post('/tecnicos', 'EquiposController@storeTecnicos');

Route::post('/clinicos', 'EquiposController@storeClinicos');
Route::get('/clinicos', 'HomeController@index');

Route::get('/showEquipos', 'EquiposController@showEquipos');
Route::get('/info', 'EquiposController@create');
//Route::post('/score', 'EquiposController@calcularScore');
