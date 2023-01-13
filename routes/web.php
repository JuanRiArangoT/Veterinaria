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
    return view('index');
});



Route::get('/index', [App\Http\Controllers\EventoController::class, 'index']);

Route::get('/index/consultar', [App\Http\Controllers\EventoController::class, 'show']);

Route::get('/index/prueba/', [App\Http\Controllers\EventoController::class, 'create']);


Route::post('/index/agregar', [App\Http\Controllers\EventoController::class, 'store']);
Route::post('/index/editar/{id}', [App\Http\Controllers\EventoController::class, 'edit']);
Route::post('/index/actualizar/{evento}', [App\Http\Controllers\EventoController::class, 'update']);
Route::post('/index/eliminar/{id}', [App\Http\Controllers\EventoController::class, 'destroy']);
