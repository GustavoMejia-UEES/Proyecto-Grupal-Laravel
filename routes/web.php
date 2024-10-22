<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\PrestamoController;
use App\Http\Controllers\ResenaController;

Route::resource('usuarios', UsuarioController::class);
Route::resource('libros', LibroController::class);
Route::resource('autores', AutorController::class);
Route::resource('categorias', CategoriaController::class);
Route::resource('prestamos', PrestamoController::class);
Route::resource('resenas', ResenaController::class);
