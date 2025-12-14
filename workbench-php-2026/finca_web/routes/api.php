<?php
use App\Http\Controllers\FincaController;
use App\Http\Controllers\ParcelaController;
use App\Http\Controllers\TipoCultivoController;

Route::middleware('auth:sanctum')->prefix('v1')->group(function () {
    Route::get('/fincas', [FincaController::class, 'apiIndex']);
    Route::get('/fincas/{id}', [FincaController::class, 'apiShow']);
    Route::post('/fincas', [FincaController::class, 'apiStore']);
    Route::put('/fincas/{id}', [FincaController::class, 'apiUpdate']);
    Route::delete('/fincas/{id}', [FincaController::class, 'apiDestroy']);
});




Route::prefix('v1')->group(function () {
    Route::get('/tipos-cultivo', [TipoCultivoController::class, 'apiIndex']);
});




Route::prefix('v1')->group(function () {
    Route::get('/fincas/{id}/parcelas', [ParcelaController::class, 'apiIndex']);
    Route::post('/parcelas', [ParcelaController::class, 'apiStore']);
    Route::put('/parcelas/{id}', [ParcelaController::class, 'apiUpdate']);
    Route::put('/parcelas/{id}/cambiar-cultivo', [ParcelaController::class, 'apiCambiarCultivo']);
    Route::delete('/parcelas/{id}', [ParcelaController::class, 'apiDestroy']);
});
