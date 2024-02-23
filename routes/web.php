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

Route::get('/monthly_consumption', 'App\Http\Controllers\GraphicsController@compararMes') ->name("comparar.mes");

Route::get('/weekly_consumption', 'App\Http\Controllers\GraphicsController@compararSemana') ->name("comparar.semana");

Route::get('/daily_consumption', 'App\Http\Controllers\GraphicsController@compararDia') ->name("comparar.dia");

