<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Buku\BukuController;
use App\Http\Controllers\Api\Buku\KategoriBukuController;
use App\Http\Controllers\Api\Buku\SearchBukuController;
use App\Http\Controllers\Api\Order\MetodeController;
use App\Http\Controllers\Api\Order\OrderController;
use App\Http\Controllers\Api\Setting\AboutController;
use App\Http\Controllers\Api\Setting\FaqController;
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
    Route::get('buku', [BukuController::class, 'show']);
    Route::get('buku/{id}', [BukuController::class, 'getid']);
    Route::get('buku/search/{keyword}', [BukuController::class, 'search']);

    // API PESANAN
    Route::post('checkout', [OrderController::class, 'checkout']);
    Route::get('pesanan', [OrderController::class, 'pesanan']);
    Route::post('pesanan/upload-bukti', [OrderController::class, 'uploadBukti']);
    Route::delete('pesanan/{id}/delete', [OrderController::class, 'delete']);

    // API METODE BAYAR
    Route::get('metode-bayar', [MetodeController::class, 'show']);
    Route::get('metode-bayar/{id}', [MetodeController::class, 'getid']);

    // API SETTING WEBSITE
    Route::get('about', [AboutController::class, 'show']);
    Route::get('faq', [FaqController::class, 'show']);
});
