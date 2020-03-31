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
Route::get('/products/{product}','ProductController@show')->name('product.show'); //Mostrar Informacion de de Los Productos

/**Para Agregar Productos al Carrito*/
Route::post('/cart','CartDetailController@store');
/**Para Eliminar Productos al Carrito*/
Route::delete('/cart','CartDetailController@destroy');
/**Para Realizar el Pedido de los Productos del Carrito*/
Route::post('/order','CartController@update');

Route::middleware(['auth','admin'])->prefix('admin')->namespace('Admin')->group(function () {
		Route::get('/products','ProductController@index'); //Listados de Los Productos
		Route::get('/products/create','ProductController@create'); //Formulario de Alta de Los Productos
		Route::post('/products','ProductController@store'); //Guardar el Alta de Los Productos
		Route::get('/products/{id}/edit','ProductController@edit'); //Formulario de Edicion de Los Productos
		Route::post('/products/{id}/edit','ProductController@update'); //Guardar la Edicion de Los Productos
		Route::delete('/products/{id}','ProductController@destroy'); //Formulario para Eliminar Los Productos

		Route::get('/products/{id}/images','ImageController@index'); //Listados de las Imagenes de Los Productos y formulario de edicion
		Route::post('/products/{id}/images','ImageController@store'); //Guarda las Imagenes de Los Productos
		Route::delete('/products/{id}/images','ImageController@destroy'); //Elimina las Imagenes de Los Productos
        Route::get('/products/{id}/images/select/{image}','ImageController@select'); //Destacar Imagenes de Los Productos

        /**Rutas Para Administrar las Categorias */
        Route::get('/categories','CategoryController@index'); //Listados de Los Categorias
		Route::get('/categories/create','CategoryController@create'); //Formulario de Alta de Los Categorias
		Route::post('/categories','CategoryController@store'); //Guardar el Alta de Los Categorias
		Route::get('/categories/{category}/edit','CategoryController@edit'); //Formulario de Edicion de Los Categorias
		Route::post('/categories/{category}/edit','CategoryController@update'); //Guardar la Edicion de Los Categorias
		Route::delete('/categories/{category}','CategoryController@destroy'); //Formulario para Eliminar Los Categorias
});
