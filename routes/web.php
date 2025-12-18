<?php

use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', [PengaduanController::class, 'index'])->name('pengaduan.index');
Route::post('/pengaduan', [PengaduanController::class, 'store'])->name('pengaduan.store');

// Auth Routes
Auth::routes(['register' => false]);

// Redirect /home ke admin dashboard
Route::get('/home', function() {
    return redirect()->route('admin.dashboard');
});

// Admin Routes
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/pengaduan/{id}', [DashboardController::class, 'show'])->name('pengaduan.show');
    Route::put('/pengaduan/{id}/status', [DashboardController::class, 'updateStatus'])->name('pengaduan.updateStatus');
    Route::delete('/pengaduan/{id}', [DashboardController::class, 'destroy'])->name('pengaduan.destroy');
});