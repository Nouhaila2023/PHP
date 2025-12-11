<?php

use App\Http\Controllers\FincaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//RUTAS PROTEGIDAS LOGIN
Route::middleware(['auth'])->group(function () {
    //Una vez logueado o registrado
    Route::get('/home', function () {
        return view('home');
    })->name('home');

    Route::get('/fincas', [FincaController::class, 'index'])->name('fincas.index');
});
