<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dokter\JadwalPeriksaController;
use App\Http\Controllers\Dokter\PeriksaController;
use App\Http\Controllers\Dokter\RiwayatPasienController;

Route::middleware(['auth', 'role:dokter'])->prefix('dokter')->group(function () {
    Route::get('/dashboard', function () {
        return view('dokter.dashboard');
    })->name('dokter.dashboard');


    Route::prefix('jadwal-periksa')->group(function () {
        Route::get('/', [JadwalPeriksaController::class, 'index'])->name('dokter.jadwal-periksa.index');
        Route::get('/create', [JadwalPeriksaController::class, 'create'])->name('dokter.jadwal-periksa.create');
        Route::post('/', [JadwalPeriksaController::class, 'store'])->name('dokter.jadwal-periksa.store');
        Route::get('/{id}/edit', [JadwalPeriksaController::class, 'edit'])->name('dokter.jadwal-periksa.edit');
        Route::patch('/{id}', [JadwalPeriksaController::class, 'update'])->name('dokter.jadwal-periksa.update');
        Route::patch('/{id}/update', [JadwalPeriksaController::class, 'changeJadwal'])->name('dokter.jadwal-periksa.change');
        Route::delete('/{id}', [JadwalPeriksaController::class, 'destroy'])->name('dokter.jadwal-periksa.destroy');
    });

    Route::prefix('memeriksa')->group(function () {
        Route::get('/', [PeriksaController::class, 'index'])->name('dokter.memeriksa.index');
        Route::get('/edit/{id}', [PeriksaController::class, 'edit'])->name('dokter.memeriksa.edit');
        Route::get('/periksa/{id}', [PeriksaController::class, 'periksa'])->name('dokter.memeriksa.periksa');
        Route::post('/', [PeriksaController::class, 'store'])->name('dokter.memeriksa.store');
        Route::patch('/{id}', [PeriksaController::class, 'update'])->name('dokter.memeriksa.update');
    });


    Route::prefix('riwayat-pasien')->group(function () {
        Route::get('/', [RiwayatPasienController::class, 'index'])->name('dokter.riwayat-pasien.index');
        Route::get('/{id}/riwayat', [RiwayatPasienController::class, 'riwayat'])->name('dokter.riwayat-pasien.riwayat');
    });
});
