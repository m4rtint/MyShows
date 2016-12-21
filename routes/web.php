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

Route::get('/home', 'HomeController@index');

Route::get('/mainmenu', 'MainMenuController@index');
Route::get('/random', 'MainMenuController@random');
Route::post('/delete', 'MainMenuController@delete');

Route::get('/logs', 'LogController@index');

Route::get('/add', 'AddShowController@index');
Route::post('/add', 'AddShowController@addNewShow');

Route::get('/edit', 'AddShowController@index_edit');
Route::post('/editShow', 'AddShowController@editShow');
