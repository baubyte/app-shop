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

Route::get('/', 'TestController@welcome');

/*Route::get('/prueba',function(){
	return 'Hola soy la ruta prueba';
});*/
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::middleware(['auth','admin'])->prefix('admin')->group(function () {
		Route::get('/products','ProductController@index'); //Listados de Los Productos
		Route::get('/products/create','ProductController@create'); //Formulario de Alta de Los Productos
		Route::post('/products','ProductController@store'); //Guardar el Alta de Los Productos
		Route::get('/products/{id}/edit','ProductController@edit'); //Formulario de Edicion de Los Productos
		Route::post('/products/{id}/edit','ProductController@update'); //Guardar la Edicion de Los Productos
		Route::delete('/products/{id}','ProductController@destroy'); //Formulario para Eliminar Los Productos

		Route::get('/products/{id}/images','ImageController@index'); //Listados de las Imagenes de Los Productos y formulario de edicion 
		Route::post('/products/{id}/images','ImageController@store'); //Guarda las Imagenes de Los Productos
		Route::delete('/products/{id}/images','ImageController@destroy'); //Elimina las Imagenes de Los Productos
		Route::get('/products/{id}/images/select/{{image}}','ImageController@select'); //Destacar Imagenes de Los Productos
});