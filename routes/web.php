<?php

use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PenerimaanController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SumberDanaController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});



Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');



Route::resource('sumber_dana', SumberDanaController::class);
Route::resource('kegiatans', KegiatanController::class);
Route::resource('penerimaans', PenerimaanController::class);
Route::resource('pengeluarans', PengeluaranController::class)->except(['show']);

// Route::get('/pengeluarans/sumber-dana/{id}', [PengeluaranController::class, 'bySumberDana'])
//     ->name('pengeluarans.bySumberDana');

Route::get('/pengeluarans/filter', [PengeluaranController::class, 'filterForm'])->name('pengeluarans.filterForm');
Route::get('/pengeluarans/by-sumber-dana', [PengeluaranController::class, 'bySumberDana'])->name('pengeluarans.bySumberDana');

Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
Route::get('/laporan1', [LaporanController::class, 'laporan1'])->name('laporan1.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
