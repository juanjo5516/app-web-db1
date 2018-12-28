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

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

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