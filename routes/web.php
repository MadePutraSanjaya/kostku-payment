<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenghuniController;
use App\Http\Controllers\KamarKostController;
use App\Http\Controllers\TagihanController;
use App\Http\Controllers\PembayaranController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Halaman dashboard
Route::get('/', function () {
    return view('welcome');
})->name('dashboard');

// Group routes untuk penghuni
Route::prefix('penghuni')->name('penghuni.')->group(function () {
    Route::get('/', [PenghuniController::class, 'index'])->name('index'); // List penghuni
    Route::get('/create', [PenghuniController::class, 'create'])->name('create'); // Form tambah penghuni
    Route::post('/', [PenghuniController::class, 'store'])->name('store'); // Proses tambah penghuni
    Route::get('/{id_penghuni}/edit', [PenghuniController::class, 'edit'])->name('edit'); // Form edit penghuni
    Route::put('/{id_penghuni}', [PenghuniController::class, 'update'])->name('update'); // Proses update penghuni
    Route::delete('/{id_penghuni}', [PenghuniController::class, 'destroy'])->name('destroy'); // Hapus penghuni
});

// Group routes untuk kamar kost
Route::prefix('kamar')->name('kamar.')->group(function () {
    Route::resource('kamar_kosts', KamarKostController::class);
    Route::get('/', [KamarKostController::class, 'index'])->name('index'); // List kamar
    Route::get('/create', [KamarKostController::class, 'create'])->name('create'); // Form tambah kamar
    Route::post('/', [KamarKostController::class, 'store'])->name('store'); // Proses tambah kamar
    Route::get('/{id_kamar}/edit', [KamarKostController::class, 'edit'])->name('edit'); // Form edit kamar
    Route::put('/{id_kamar}', [KamarKostController::class, 'update'])->name('update'); // Proses update kamar
    Route::delete('/{id_kamar}', [KamarKostController::class, 'destroy'])->name('destroy'); // Hapus kamar
});

// Group routes untuk tagihan
Route::prefix('tagihan')->name('tagihan.')->group(function () {
    Route::get('/', [TagihanController::class, 'index'])->name('index'); // List tagihan
    Route::get('/create', [TagihanController::class, 'create'])->name('create'); // Form tambah tagihan
    Route::post('/', [TagihanController::class, 'store'])->name('store'); // Proses tambah tagihan
    Route::get('/{id_tagihan}/edit', [TagihanController::class, 'edit'])->name('edit'); // Form edit tagihan
    Route::put('/{id_tagihan}', [TagihanController::class, 'update'])->name('update'); // Proses update tagihan
    Route::delete('/{id_tagihan}', [TagihanController::class, 'destroy'])->name('destroy'); // Hapus tagihan
});

// Group routes untuk pembayaran
Route::prefix('pembayaran')->name('pembayaran.')->group(function () {
    Route::get('/', [PembayaranController::class, 'index'])->name('index'); // List pembayaran
    Route::get('/create', [PembayaranController::class, 'create'])->name('create'); // Form tambah pembayaran
    Route::post('/', [PembayaranController::class, 'store'])->name('store'); // Proses tambah pembayaran
    Route::get('/{id_pembayaran}/edit', [PembayaranController::class, 'edit'])->name('edit'); // Form edit pembayaran
    Route::put('/{id_pembayaran}', [PembayaranController::class, 'update'])->name('update'); // Proses update pembayaran
    Route::delete('/{id_pembayaran}', [PembayaranController::class, 'destroy'])->name('destroy'); // Hapus pembayaran
});
