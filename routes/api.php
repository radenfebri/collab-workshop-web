<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Buku\BukuController;
use App\Http\Controllers\Api\Buku\KategoriBukuController;
use App\Http\Controllers\Api\PengalamanKerja\PengalamanKerjaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// AUTH 
Route::post('auth/register', [AuthController::class, 'register']);
Route::post('auth/login', [AuthController::class, 'login']);
Route::middleware(['auth:sanctum'])->group(function () {
    // GET DATA LOGIN
    Route::get('auth/show', [AuthController::class, 'show']);
    Route::post('auth/refresh', [AuthController::class, 'refreshToken']);
    Route::post('auth/logout', [AuthController::class, 'logout']);

    // CRUD KATEGORI BUKU
    Route::get('kategori-buku', [KategoriBukuController::class, 'show']);
    Route::get('kategori-buku/{id}', [KategoriBukuController::class, 'getid']);
    // Route::post('kategori-buku/create', [KategoriBukuController::class, 'create']);
    // Route::put('kategori-buku/{id}/update', [KategoriBukuController::class, 'update']);
    // Route::delete('kategori-buku/{id}/delete', [KategoriBukuController::class, 'delete']);

    // CRUD BUKU
    Route::get('buku', [BukuController::class, 'show']);
    Route::get('buku/{id}', [BukuController::class, 'getid']);
    // Route::post('buku/create', [BukuController::class, 'create']);
    // Route::put('buku/{id}/update', [BukuController::class, 'update']);
    // Route::delete('buku/{id}/delete', [BukuController::class, 'delete']);

});
