<?php

use App\Http\Controllers\ReservaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $url = asset('img/img1.jpg'); // <-- Aquí accedes a la imagen local
    return view('welcome', compact('url'));
});

// RUTAS PROTEGIDAS LOGIN
Route::middleware(['auth'])->group(function () {
    Route::get('/home', function () {
        return view('home');
    })->name('home');


});
