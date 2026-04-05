<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VideojuegoController;
use App\Http\Controllers\CarritoController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/welcomeLogeado', function () {
    return view('welcomeLogeado');
})->middleware('auth')->name('welcomeLogeado');

Route::get('/carrito', function () {
    return view('carrito');
})->middleware('auth')->name('carrito');

Auth::routes();


Route::resource('videojuego', VideojuegoController::class)->middleware('auth');
