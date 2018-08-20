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
Route::group(['middleware' => 'cors'], function () 
{ 

Route::resource('proyectos','ProyectoController');

Route::resource('usuarios','UserController');

Route::post('login','ApiAuthController@login');//->middleware('jwt.auth');

Route::resource('institutos','InstitutoController');










});
