<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/',[App\Http\Controllers\AdminController::class, 'index']);


//desabilitar ruta register con 404
//Auth::routes(['register'=>false]);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::get('/miembros', [App\Http\Controllers\MiembroController::class, 'index']);
//Route::get('/miembros/create', [App\Http\Controllers\MiembroController::class, 'create']);
Route::resource('/miembros',\App\Http\Controllers\MiembroController::class);
Route::resource('/departamentos',\App\Http\Controllers\DepartamentoController::class);
Route::resource('/usuarios',\App\Http\Controllers\UserController::class);
Route::resource('/asistencias',\App\Http\Controllers\AsistenciaController::class);