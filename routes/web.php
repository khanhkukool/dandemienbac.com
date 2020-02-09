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
Route::get('admin/cards/errors','admin\HomeController@errors');

//dande
Route::get('admin/dande/index','admin\DandeController@index');
Route::get('admin/dande/create','admin\DandeController@create');
Route::post('admin/dande/store','admin\DandeController@store');
Route::get('admin/dande/edit/{id}','admin\DandeController@edit');
Route::post('admin/dande/update/{id}','admin\DandeController@update');

//frontend
Route::get('/index','HomeController@index');
Route::post('/create','HomeController@create');

Route::group(['middleware' => ['web']], function(){
     Route::get('Session',function (){
        Session::put('Check');
     });
});

//Login
Route::get('login','HomeController@getLogin');
Route::post('login','HomeController@postLogin');
