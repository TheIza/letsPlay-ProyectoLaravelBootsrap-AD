<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumneController;
use App\Http\Controllers\CentreController;
use App\Http\Controllers\EnsenyamentController;
use App\Http\Controllers\VideojuegoController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/welcomeLogeado', function () {
    return view('welcomeLogeado');
})->middleware('auth');

Auth::routes();

Route::resource('alumne', AlumneController::class)->middleware('auth');
Route::resource('centre', CentreController::class)->middleware('auth');
Route::resource('ensenyament', EnsenyamentController::class)->middleware('auth');
Route::resource('videojuego', VideojuegoController::class)->middleware('auth');