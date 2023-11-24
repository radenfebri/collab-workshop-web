<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Buku\BukuController;
use App\Http\Controllers\Api\Buku\KategoriBukuController;
use App\Http\Controllers\Api\Order\MetodeController;
use App\Http\Controllers\Api\Order\OrderController;
use Illuminate\Support\Facades\Route;


// AUTH 
Route::post('auth/register', [AuthController::class, 'register']);
Route::post('auth/login', [AuthController::class, 'login']);
Route::middleware(['auth:sanctum'])->group(function () {
    // API GET DATA LOGIN
    Route::get('auth/show', [AuthController::class, 'show']);
    Route::post('auth/refresh', [AuthController::class, 'refreshToken']);
    Route::post('auth/logout', [AuthController::class, 'logout']);

    // API KATEGORI BUKU
    Route::get('kategori-buku', [KategoriBukuController::class, 'show']);
    Route::get('kategori-buku/{id}', [KategoriBukuController::class, 'getid']);

    // API BUKU
    // Route::get('buku', [BukuController::class, 'show']);
    Route::get('buku/{id}', [BukuController::class, 'getid']);

    // API PESANAN
    Route::post('checkout', [OrderController::class, 'checkout']);
    Route::get('pesanan', [OrderController::class, 'pesanan']);
    Route::delete('pesanan/{id}/delete', [OrderController::class, 'delete']);

    // API METODE BAYAR
    Route::get('metode-bayar', [MetodeController::class, 'show']);
    Route::get('metode-bayar/{id}', [MetodeController::class, 'getid']);
});

Route::get('buku', [BukuController::class, 'show']);

