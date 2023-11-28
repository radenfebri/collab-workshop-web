<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Backend\BukuController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\ExportLaporanController;
use App\Http\Controllers\Backend\FaqController;
use App\Http\Controllers\Backend\KategoriBukuController;
use App\Http\Controllers\Backend\MetodeController;
use App\Http\Controllers\Backend\PesananController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Frontend\AboutUserController;
use App\Http\Controllers\Frontend\FaqUserController;
use App\Http\Controllers\Frontend\HalamanUserController;
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
    Route::get('buku/stok-habis', [DashboardController::class, 'stok'])->name('stok');
    Route::get('manajemen-user/user', [DashboardController::class, 'user'])->name('total-user');
    Route::get('manajemen-user/admin', [DashboardController::class, 'admin'])->name('total-admin');
    Route::get('pesanan/selesai', [DashboardController::class, 'selesai'])->name('trx-selesai');
    Route::get('pesanan/diproses', [DashboardController::class, 'proses'])->name('trx-proses');
    Route::get('pesanan/export-pdf', [ExportLaporanController::class, 'exportPDF'])->name('exportPDF');
    Route::get('pesanan/export-pdf-succes', [ExportLaporanController::class, 'exportPDFSucces'])->name('exportPDFSuc');
    Route::get('pesanan/export-pdf-pending', [ExportLaporanController::class, 'exportPDFPending'])->name('exportPDFPend');

    Route::resource('kategori-buku', KategoriBukuController::class);
    Route::resource('buku', BukuController::class);
    Route::resource('pesanan', PesananController::class);
    Route::resource('metode-bayar', MetodeController::class);
    Route::resource('manajemen-user', UserController::class);
    Route::resource('manajemen-faq', FaqController::class);
    Route::resource('manajemen-about', AboutController::class);
});

Route::middleware(['cekLogin', 'cekRole:User'])->group(function () {
    Route::get('user', [HalamanUserController::class, 'user'])->name('user');
    Route::get('faq', [FaqUserController::class, 'index'])->name('faq');
    Route::get('about', [AboutUserController::class, 'index'])->name('about');
    Route::get('histori-pesanan', [HistoriPesananController::class, 'index'])->name('histori-pesanan');
    Route::get('histori-pesanan/sukses', [HistoriPesananController::class, 'sukses'])->name('histori-pesanan-sukses');
    Route::get('histori-pesanan/pending', [HistoriPesananController::class, 'pending'])->name('histori-pesanan-pending');
    Route::get('histori-pesanan/{id}', [HistoriPesananController::class, 'show'])->name('show.histori-pesanan');
    Route::get('histori-pesanan/{id}/destroy', [HistoriPesananController::class, 'destroy'])->name('destroy.histori-pesanan');
});
