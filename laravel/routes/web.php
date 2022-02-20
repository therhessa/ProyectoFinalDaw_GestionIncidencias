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

Route::get('/', 'HomeController@index')->name('home');
Route::get('seleccionar/proyecto/{id}','HomeController@seleccionarProyecto');
Route::get('/configuracion', 'HomeController@config')->name('config');
Route::post('/user/update2', 'HomeController@update')->name('user.update');
Route::get('/user/avatar/{filename}', 'HomeController@getImage')->name('user.avatar');
//incidencias
Route::get('/registrar','IncidenciaController@create');
Route::post('/registrar','IncidenciaController@store');
Route::get('/listaincidencias','IncidenciaController@listincident');
Route::get('/ver/{id}','IncidenciaController@show');
Route::get('/incidencia/{id}/atender', 'IncidenciaController@attend');
Route::get('/incidencia/{id}/resolver', 'IncidenciaController@solve');
Route::get('/incidencia/{id}/abrir', 'IncidenciaController@open');
Route::get('/incidencia/{id}/derivar', 'IncidenciaController@nextsoporte');
Route::get('/incidencia/{id}/editar', 'IncidenciaController@edit');
Route::post('/incidencia/{id}/editar', 'IncidenciaController@update');

Route::group(['middleware' => 'admin', 'namespace' => 'Admin'], function (){

    //usuarios
    Route::get('/usuarios', 'UserController@index');
    Route::post('/usuarios','UserController@store');
    Route::get('/usuario/{id}', 'UserController@edit');
    Route::post('/usuario/{id}', 'UserController@update');
    Route::get('/usuario/{id}/eliminar','UserController@delete');
 

    //proyectos
    Route::get('/proyectos', 'ProyectoController@index');
    Route::post('/proyectos','ProyectoController@store');
    Route::get('/proyecto/{id}', 'ProyectoController@edit');
    Route::post('/proyecto/{id}', 'ProyectoController@update');
    Route::get('/proyecto/{id}/eliminar', 'proyectoController@delete');
    Route::get('/proyecto/{id}/restaurar', 'proyectoController@restore');

    //categoria
    Route::post('/categorias','CategoriaController@store');
    Route::post('/categoria/editar', 'CategoriaController@update');
    Route::get('/categoria/{id}/eliminar', 'CategoriaController@delete');

    //soporte
    Route::post('/soportes','SoporteController@store');
    Route::post('/soporte/editar', 'SoporteController@update');
    Route::get('/soporte/{id}/eliminar', 'SoporteController@delete');

    //proyecto usuario
    Route::post('/proyecto-usuario', 'ProyectoUserController@store');
    Route::get('/proyecto-usuario/{id}/eliminar', 'ProyectoUserController@delete');














});

