<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PenghuniController;
use App\Http\Controllers\KamarKostController;
use App\Http\Controllers\TagihanController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\Riwayat;
use Illuminate\Support\Facades\Route;
use App\Http\Enums\Role;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('welcome');
})->name('dashboard')->middleware('auth');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin routes
Route::prefix('penghuni')->name('penghuni.')->group(function () {
    Route::get('/', [PenghuniController::class, 'index'])->name('index');
    Route::get('/create', [PenghuniController::class, 'create'])->name('create');
    Route::post('/', [PenghuniController::class, 'store'])->name('store');
    Route::get('/{id_penghuni}/edit', [PenghuniController::class, 'edit'])->name('edit');
    Route::put('/{id_penghuni}', [PenghuniController::class, 'update'])->name('update');
    Route::delete('/{id_penghuni}', [PenghuniController::class, 'destroy'])->name('destroy');
})->middleware('auth');

Route::prefix('kamar')->name('kamar.')->group(function () {
    Route::get('/', [KamarKostController::class, 'index'])->name('index');
    Route::get('/create', [KamarKostController::class, 'create'])->name('create');
    Route::post('/', [KamarKostController::class, 'store'])->name('store');
    Route::get('/{id_kamar}/edit', [KamarKostController::class, 'edit'])->name('edit');
    Route::put('/{id_kamar}', [KamarKostController::class, 'update'])->name('update');
    Route::delete('/{id_kamar}', [KamarKostController::class, 'destroy'])->name('destroy');
})->middleware('auth');

Route::prefix('tagihan')->name('tagihan.')->group(function () {
    Route::get('/', [TagihanController::class, 'index'])->name('index');
    Route::get('/create', [TagihanController::class, 'create'])->name('create');
    Route::post('/', [TagihanController::class, 'store'])->name('store');
    Route::get('/{id_tagihan}/edit', [TagihanController::class, 'edit'])->name('edit');
    Route::put('/{id_tagihan}', [TagihanController::class, 'update'])->name('update');
    Route::delete('/{id_tagihan}', [TagihanController::class, 'destroy'])->name('destroy');
})->middleware('auth');

Route::prefix('pembayaran')->name('pembayaran.')->middleware('auth')->group(function () {
    Route::get('/', [PembayaranController::class, 'index'])->name('index'); // Daftar pembayaran
    Route::get('/{id}/edit', [PembayaranController::class, 'edit'])->name('edit'); // Edit status pembayaran
    Route::put('/{id}', [PembayaranController::class, 'update'])->name('update'); // Update status pembayaran
})->middleware('auth');


// Penghuni routes
Route::prefix('riwayat')->name('riwayat.')->group(function () {
    Route::get('/', [Riwayat::class, 'index'])->name('index');
    Route::get('/create', [Riwayat::class, 'create'])->name('create');
    Route::post('/', [Riwayat::class, 'store'])->name('store');
    Route::get('/{id_riwayat}/edit', [Riwayat::class, 'edit'])->name('edit');
    Route::put('/{id_riwayat}', [Riwayat::class, 'update'])->name('update');
    Route::delete('/{id_riwayat}', [Riwayat::class, 'destroy'])->name('destroy');
});
