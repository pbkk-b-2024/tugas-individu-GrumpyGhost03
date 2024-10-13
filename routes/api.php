<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;

// API routes for cars
Route::get('/cars', [CarController::class, 'index'])->name('api.cars.index');
Route::get('/cars/{id}', [CarController::class, 'show'])->name('api.cars.show');
Route::post('/cars', [CarController::class, 'store'])->name('api.cars.store');
Route::put('/cars/{id}', [CarController::class, 'update'])->name('api.cars.update');
Route::delete('/cars/{id}', [CarController::class, 'destroy'])->name('api.cars.destroy');

