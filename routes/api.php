<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PeliculaController;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

// Rutas de autenticación API
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

// Rutas protegidas con Sanctum
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});

// Rutas de películas
Route::get('/peliculas/buscar', [PeliculaController::class, 'buscarPorTitulo']);
Route::apiResource('peliculas', PeliculaController::class);
