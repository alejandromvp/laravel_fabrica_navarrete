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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/productos', 'Seccion_panel\ProductosController@index')->name('GetProductos');
Route::get('/productos/{id}', 'Seccion_panel\ProductosController@show')->name('GetProductosId');
Route::get('/panel_control', 'Seccion_panel\PanelControlController@index')->name('GetData');

Route::post('/productos', 'Seccion_panel\ProductosController@show')->name('InsertProducto');
//->middleware('auth', 'role:admin')
// rutas Secciones Panel
Route::resource('categorias', 'Seccion_panel\CategoriaController');

Route::apiResource('pensamientos', 'API\PensamientoController');
