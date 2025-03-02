<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// Ruta de inicio
Route::get('/', function () {
    return view('welcome');
});

// Rutas de autenticación web
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.store');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Ruta protegida de ejemplo (dashboard)
Route::get('/', function () {
    return view('welcome');
})->middleware('auth')->name('welcome');


// Rutas de SWAPI
Route::get('/swapi', [App\Http\Controllers\SwapiController::class, 'index'])->name('swapi.index');
Route::post('/swapi/detalles', [App\Http\Controllers\SwapiController::class, 'showFilmDetails'])->name('swapi.details');
