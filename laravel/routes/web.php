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
Route::get('/registrar','HomeController@getregistrar');
Route::post('/registrar','HomeController@postregistrar');

Route::group(['middleware' => 'admin', 'namespace' => 'Admin'], function (){
    Route::get('/usuarios', 'UserController@index');
    Route::post('/usuarios','UserController@store');
    Route::get('/usuarios/{id}', 'UserController@edit');
    Route::post('/usuarios/{id}', 'UserController@update');





});

