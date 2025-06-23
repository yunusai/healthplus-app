<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ObatController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PoliController;
use App\Http\Controllers\Admin\DokterController;
use App\Http\Controllers\Admin\PasienController;

Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::prefix('data-dokter')->group(function () {
        Route::get('/', [DokterController::class, 'index'])->name('admin.data-dokter.index');
        Route::get('/create', [DokterController::class, 'create'])->name('admin.data-dokter.create');
        Route::post('/', [DokterController::class, 'store'])->name('admin.data-dokter.store');
        Route::get('/{id}/edit', [DokterController::class, 'edit'])->name('admin.data-dokter.edit');
        Route::patch('/{id}/update', [DokterController::class, 'update'])->name('admin.data-dokter.update');
        Route::delete('/{id}/destroy', [DokterController::class, 'destroy'])->name('admin.data-dokter.destroy');
    });

    Route::prefix('data-pasien')->group(function () {
        Route::get('/', [PasienController::class, 'index'])->name('admin.data-pasien.index');
        Route::get('/create', [PasienController::class, 'create'])->name('admin.data-pasien.create');
        Route::post('/', [PasienController::class, 'store'])->name('admin.data-pasien.store');
        Route::get('/{id}/edit', [PasienController::class, 'edit'])->name('admin.data-pasien.edit');
        Route::patch('/{id}/update', [PasienController::class, 'update'])->name('admin.data-pasien.update');
        Route::delete('/{id}/destroy', [PasienController::class, 'destroy'])->name('admin.data-pasien.destroy');
    });

    Route::prefix('obat')->group(function () {
        Route::get('/', [ObatController::class, 'index'])->name('admin.obat.index');
        Route::get('/create', [ObatController::class, 'create'])->name('admin.obat.create');
        Route::get('/restore', [ObatController::class, 'restore'])->name('admin.obat.restore');
        Route::post('/undelete/{id}', [ObatController::class, 'undelete'])->name('admin.obat.undelete');
        Route::post('/', [ObatController::class, 'store'])->name('admin.obat.store');
        Route::get('/{id}/edit', [ObatController::class, 'edit'])->name('admin.obat.edit');
        Route::patch('/{id}', [ObatController::class, 'update'])->name('admin.obat.update');
        Route::delete('/{id}', [ObatController::class, 'destroy'])->name('admin.obat.destroy');
    });

    Route::prefix('poli')->group(function () {
        Route::get('/', [PoliController::class, 'index'])->name('admin.poli.index');
        Route::get('/create', [PoliController::class, 'create'])->name('admin.poli.create');
        Route::post('/', [PoliController::class, 'store'])->name('admin.poli.store');
        Route::get('/{id}/edit', [PoliController::class, 'edit'])->name('admin.poli.edit');
        Route::patch('/{id}', [PoliController::class, 'update'])->name('admin.poli.update');
        Route::delete('/{id}', [PoliController::class, 'destroy'])->name('admin.poli.destroy');
    });
});
