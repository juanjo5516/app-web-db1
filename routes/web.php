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
Route::get('register/response', function(){
	return view('auth.response');
});
Route::get('register/verify/{confirmation_code}', 'UserController@verify');
Route::post('user/complete/{id}','UserController@update');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('integrantes', function(){
	return view('integrantes');
});
Route::resource('insumos','InsumoController');
Route::get('getInsumos','InsumoController@getInsumos')->name('getInsumos');
Route::resource('laboratorios','LaboratorioController');
Route::get('getLaboratorios','LaboratorioController@getLaboratorios')->name('getLaboratorios');
Route::resource('bitacora','BitacoraController');