<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PeriksaController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Auth\Notifications\ResetPassword;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dokter', [HomeController::class, 'dokter'])->name('dokter');

Route::prefix('dokter')->group(function () {
    Route::resource('obat', ObatController::class);
    Route::resource('periksa', PeriksaController::class,);
});

Route::get('/pasien', [HomeController::class, 'pasien'])->name('pasien');

Route::prefix('pasien')->group(function () {
    Route::resource('periksa', PeriksaController::class);
    // Route::resource('riwayat', PeriksaController::class);
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
Auth::routes();

// ✅ Pakai POST
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
