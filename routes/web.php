<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


//Ruta para mostrar el panel

Route::get('/', 'App\Http\Controllers\PanelController@index')->name("panel.controller");

//Todas las rutas que vamos a crear son de tipo get ya que se solicitan datos a la base de datos

Route::get('/annual_consumption', 'App\Http\Controllers\GraphicsController@compararAño') ->name("comparar.año");

