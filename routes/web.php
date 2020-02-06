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
//backend

//cards
Route::get('admin/index','admin\HomeController@index');
Route::get('admin/cards/create','admin\HomeController@create');
Route::post('admin/cards/store','admin\HomeController@store');

//dande
Route::get('admin/dande/index','admin\DandeController@index');
//frontend
Route::get('/index','HomeController@index');


