<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VideojuegoController;
use App\Http\Controllers\CarritoController;

// Ruta de inicio pública
Route::get('/', function () {
    // Mostramos la vista de bienvenida para usuarios no logueados
    return view('welcome');
})->name('welcome');

// Ruta de bienvenida para usuarios logueados
Route::get('/welcomeLogeado', function () {
    // Mostramos una vista distinta si el usuario está autenticado
    return view('welcomeLogeado');
})->middleware('auth')->name('welcomeLogeado');

// Rutas de autenticación (login, registro, logout, etc.)
Auth::routes();

// Rutas CRUD de videojuegos usando el VideojuegoController
Route::resource('videojuego', VideojuegoController::class);

// Grupo de rutas que requieren que el usuario esté logueado
Route::middleware('auth')->group(function () {

    // Mostrar el carrito del usuario
    Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito.index');

    // Añadir un videojuego al carrito
    Route::post('/carrito/add/{videojuego}', [CarritoController::class, 'add'])->name('carrito.add');

    // Actualizar la cantidad de un item del carrito
    Route::patch('/carrito/update/{carrito}', [CarritoController::class, 'update'])->name('carrito.update');

    // Eliminar un videojuego del carrito
    Route::delete('/carrito/remove/{carrito}', [CarritoController::class, 'remove'])->name('carrito.remove');

    // Mostrar la vista para pagar el carrito
    Route::get('/carrito/pagar', [CarritoController::class, 'pagar'])->name('carrito.pagar');

    // Procesar el pago del carrito
    Route::post('/pago/procesar', [CarritoController::class, 'procesar'])->name('pago.procesar');
});