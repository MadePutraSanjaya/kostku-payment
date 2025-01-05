<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

// Admin Routes
Route::prefix('admin')->group(function () {
    Route::get('manage-kamar', [AdminController::class, 'manageKamar'])->name('admin.manageKamar');
    Route::get('manage-penghuni', [AdminController::class, 'managePenghuni'])->name('admin.managePenghuni');
    Route::get('assign-kamar', [AdminController::class, 'assignKamar'])->name('admin.assignKamar');
    Route::post('assign-kamar', [AdminController::class, 'storeAssignKamar'])->name('admin.storeAssignKamar');
    Route::get('posting-tagihan', [AdminController::class, 'postingTagihan'])->name('admin.postingTagihan');
    Route::get('laporan-pembayaran', [AdminController::class, 'laporanPembayaran'])->name('admin.laporanPembayaran');
});

// User Routes
Route::prefix('user')->group(function () {
    Route::get('riwayat-pembayaran/{id_penghuni}', [UserController::class, 'riwayatPembayaran'])->name('user.riwayatPembayaran');
    Route::get('tagihan-belum-bayar/{id_penghuni}', [UserController::class, 'tagihanBelumBayar'])->name('user.tagihanBelumBayar');
});

