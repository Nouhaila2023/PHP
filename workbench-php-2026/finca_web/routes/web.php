<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ParcelaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\TipoCultivoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FincaController;

Route::get('/', function () {
    $url = asset('img/img1.jpg'); // <-- Aquí accedes a la imagen local
    return view('welcome', compact('url'));
});

// RUTAS PROTEGIDAS LOGIN
Route::middleware(['auth'])->group(function () {


    Route::get('/home', function () {
        return view('home');
    })->name('home');



    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');



    Route::resource('fincas', FincaController::class);
    Route::resource('cultivos', TipoCultivoController::class);
    Route::get('/parcelas/{parcela}', [ParcelaController::class, 'show'])->name('parcelas.show');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/fincas/{finca}/parcelas', [ParcelaController::class, 'index'])->name('parcelas.index');
    Route::get('/fincas/{finca}/parcelas/create', [ParcelaController::class, 'create'])->name('parcelas.create');
    Route::post('/fincas/{finca}/parcelas', [ParcelaController::class, 'store'])->name('parcelas.store');
    Route::get('/parcelas/{parcela}/edit', [ParcelaController::class, 'edit'])->name('parcelas.edit');
    Route::put('/parcelas/{parcela}', [ParcelaController::class, 'update'])->name('parcelas.update');
    Route::delete('/parcelas/{parcela}', [ParcelaController::class, 'destroy'])->name('parcelas.destroy');
    Route::get('/cultivos', [TipoCultivoController::class, 'index'])->name('cultivos.index');
    Route::get('/cultivos/create', [TipoCultivoController::class, 'create'])->name('cultivos.create');
    Route::post('/cultivos', [TipoCultivoController::class, 'store'])->name('cultivos.store');
    Route::get('/cultivos/{cultivo}/edit', [TipoCultivoController::class, 'edit'])->name('cultivos.edit');
    Route::put('/cultivos/{cultivo}', [TipoCultivoController::class, 'update'])->name('cultivos.update');
    Route::delete('/cultivos/{cultivo}', [TipoCultivoController::class, 'destroy'])->name('cultivos.destroy');
});
