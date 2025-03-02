<?php

use App\Http\Controllers\PeliculaController;
use Illuminate\Support\Facades\Route;

// B    uscar películas por título
Route::get('/peliculas/buscar', [PeliculaController::class, 'buscarPorTitulo']);

Route::apiResource('peliculas', PeliculaController::class);

