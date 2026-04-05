<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VideojuegoController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/welcomeLogeado', function () {
    return view('welcomeLogeado');
})->middleware('auth')->name('welcomeLogeado');

Auth::routes();


Route::resource('videojuego', VideojuegoController::class)->middleware('auth');