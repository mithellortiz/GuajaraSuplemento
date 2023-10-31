<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\personaController;
use App\Http\Controllers\clienteController;
use App\Http\Controllers\usuarioController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/persona', function () {
    return view('template.index');
});

Route::get('/cliente', function () {
    return view('template.index');
});

Route::get('usuario', function () {
    return view('template.index');
});

//USUARIO
Route::get('usuario', [usuarioController::class, "index"])->name('usuario.index');
Route::get('usuario/create', [usuarioController::class, "create"])->name('usuario.create');
Route::post('usuario', [usuarioController::class, "store"])->name('usuario.store');
Route::get('usuario/{id}/edit', [usuarioController::class, "edit"])->name('usuario.edit');
Route::post('usuario/{id}', [usuarioController::class, "update"])->name('usuario.update');
Route::get('usuario/{id}/destroy', [usuarioController::class, "destroy"])->name('usuario.destroy');
//PERSONA
Route::get('persona', [personaController::class, "index"])->name('persona.index');
Route::get('persona/create', [personaController::class, "create"])->name('persona.create');
Route::post('persona', [personaController::class, "store"])->name('persona.store');
Route::get('persona/{id}/edit', [personaController::class, "edit"])->name('persona.edit');
Route::post('persona/{id}', [personaController::class, "update"])->name('persona.update');
Route::get('persona/{id}/destroy', [personaController::class, "destroy"])->name('persona.destroy');
//CLIENTE
Route::get('cliente', [clienteController::class, "index"])->name('cliente.index');
Route::get('cliente/create', [clienteController::class, "create"])->name('cliente.create');
Route::post('cliente', [clienteController::class, "store"])->name('cliente.store');
Route::get('cliente/{id}/edit', [clienteController::class, "edit"])->name('cliente.edit');
Route::post('cliente/{id}', [clienteController::class, "update"])->name('cliente.update');
Route::get('cliente/{id}/destroy', [clienteController::class, "destroy"])->name('cliente.destroy');

