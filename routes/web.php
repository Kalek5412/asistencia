<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AsistenciaController;

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

Route::get('/',[App\Http\Controllers\AdminController::class, 'index'])->name('index')->middleware('auth');
Route::get('/asistencias/reportes', [AsistenciaController::class, 'reportes'])->name('reportes')->middleware('auth');
Route::get('/asistencias/pdf', [AsistenciaController::class, 'pdf'])->name('pdf')->middleware('auth');
Route::get('/asistencias/pdf_fechas', [AsistenciaController::class, 'pdf_fechas'])->name('pdf_fechas')->middleware('auth');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');



//desabilitar ruta register con 404
//Auth::routes(['register'=>false]);
Auth::routes();

Route::resource('/miembros',\App\Http\Controllers\MiembroController::class)->middleware('can:miembros');
Route::resource('/departamentos',\App\Http\Controllers\DepartamentoController::class)->middleware('can:departamentos');
Route::resource('/usuarios',\App\Http\Controllers\UserController::class)->middleware('can:usuarios');
Route::resource('/asistencias',\App\Http\Controllers\AsistenciaController::class)->middleware('auth');
