<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/debug-example', function () {
    $name = request('name', 'World');
    $message = "Hello, {$name}!";

    $uppercaseMessage = strtoupper($message);

    return $uppercaseMessage;
});
Route::get('/swapi', [App\Http\Controllers\SwapiController::class, 'index'])->name('swapi.index');
Route::post('/swapi/detalles', [App\Http\Controllers\SwapiController::class, 'showFilmDetails'])->name('swapi.details');
