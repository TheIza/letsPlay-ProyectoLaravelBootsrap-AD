<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VideojuegoController;
use App\Http\Controllers\CarritoController;



Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/welcomeLogeado', function () {
    return view('welcomeLogeado');
})->middleware('auth')->name('welcomeLogeado');

Auth::routes();

// Videojuegos CRUD
Route::resource('videojuego', VideojuegoController::class);

Route::middleware('auth')->group(function () {
    Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito.index');
    Route::post('/carrito/add/{videojuego}', [CarritoController::class, 'add'])->name('carrito.add');
    Route::patch('/carrito/update/{carrito}', [CarritoController::class, 'update'])->name('carrito.update');
    Route::delete('/carrito/remove/{carrito}', [CarritoController::class, 'remove'])->name('carrito.remove');
});

