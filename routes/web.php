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
/** 
*    1.Buat Rooting
*    2.Buat Controller
*    3.Definisikan method pada kontroller.
*/

Route::get('/todos','TodoController@index')->name('todos.index');
Route::get('/todos/{todo}','TodoController@show')->name('todos.show');
Route::post('/todos','TodoController@store')->name('todos.store');
Route::put('/todos/{todo}','TodoController@update')->name('todos.update');
Route::delete('/todos/{todo}','TodoController@destroy')->name('todos.destroy');
