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

Route::get('admin/setup', 'ImportarController@index');
Route::get('admin/setup/importarData/{codigo}/{nombre}', 'ImportarController@all');

Route::get('admin/home', 'HomeController@index')->name('home');
Route::get('admin/paralelos/estudiantes/create/{periodoLectivo}/{carrera}', 'ParaleloController@create')->name('crearParalelos');

Route::get('admin/distributivo/home', 'DistributivoController@index');

Route::get('/signup', 'HomeController@index')->middleware('guest');

