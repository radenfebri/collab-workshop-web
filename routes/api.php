<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\PengalamanKerja\PengalamanKerjaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// AUTH 
Route::post('auth/register', [AuthController::class, 'register'])->name('register');
Route::post('auth/login', [AuthController::class, 'login'])->name('login');
Route::middleware(['auth:sanctum'])->group(function () {
    // GET DATA LOGIN
    Route::get('auth/show', [AuthController::class, 'show'])->name('show');
    Route::post('auth/refresh', [AuthController::class, 'refreshToken'])->name('refreshToken');
    Route::post('auth/logout', [AuthController::class, 'logout'])->name('logout');

    // CRUD PENGALAMAN KERJA
    Route::get('pengalaman-kerja', [PengalamanKerjaController::class, 'show'])->name('show-pengalaman');
    Route::get('pengalaman-kerja/{id}', [PengalamanKerjaController::class, 'getid'])->name('getid-pengalaman');
    Route::post('pengalaman-kerja/create', [PengalamanKerjaController::class, 'create'])->name('create-pengalaman');
    Route::put('pengalaman-kerja/{id}/update', [PengalamanKerjaController::class, 'update'])->name('update-pengalaman');
    Route::delete('pengalaman-kerja/{id}/delete', [PengalamanKerjaController::class, 'delete'])->name('delete-pengalaman');
});
