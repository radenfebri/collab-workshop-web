<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Backend\BukuController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\KategoriBukuController;
use App\Http\Controllers\Backend\MetodeController;
use App\Http\Controllers\Backend\PesananController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\frontend\DashboardUserController;
use App\Http\Controllers\Frontend\HistoriPesananController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');

Route::middleware(['cekLogin', 'cekRole:Admin'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('kategori-buku', KategoriBukuController::class);
    Route::resource('buku', BukuController::class);
    Route::resource('pesanan', PesananController::class);
    Route::resource('metode-bayar', MetodeController::class);
    Route::resource('manajemen-user', UserController::class);
});

Route::middleware(['cekLogin', 'cekRole:User'])->group(function () {
    Route::get('user', [DashboardUserController::class, 'user'])->name('user');
    Route::get('histori-pesanan', [HistoriPesananController::class, 'index'])->name('histori-pesanan');
    Route::get('histori-pesanan/{id}', [HistoriPesananController::class, 'show'])->name('show.histori-pesanan');
    Route::get('histori-pesanan/{id}/destroy', [HistoriPesananController::class, 'destroy'])->name('destroy.histori-pesanan');
});



// Route::get('foo', function () {
//     return "hello world";
// });
