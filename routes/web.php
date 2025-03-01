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
