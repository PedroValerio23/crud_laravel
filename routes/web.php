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

/* Route::get('/', function () {
    return view('usuarios.listar');
}); */
Route::get('/','UserController@list');

/* Formulario de usuarios */
Route::get('/form','UserController@userform');
/* nombre para el from action
Guardar usuarios*/
Route::post('/save','UserController@save')->name('save');

/* Eliminar usuarios */
Route::delete('/delete/{id}', 'UserController@destroy')->name('destroy');

/* Formulario para actualizars */

Route::get('/editform/{id}','UserController@editform')->name('editform');
/* Edidicion de usuarios */

Route::patch('/edit/{id}','UserController@edit')->name('edit');
