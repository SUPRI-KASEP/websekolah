<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\ProfilController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

// Route Login
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route Admin dengan Middleware
Route::middleware(['auth.admin:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    
    // User Management Routes
    Route::get('/admin/user', [AdminController::class, 'userIndex'])->name('admin.user');
    Route::post('/admin/user', [AdminController::class, 'userStore'])->name('admin.user.store');
    Route::put('/admin/user/{id}', [AdminController::class, 'userUpdate'])->name('admin.user.update');
    Route::delete('/admin/user/{id}', [AdminController::class, 'userDestroy'])->name('admin.user.destroy');

    // Eskul Management Routes
    Route::get('/admin/eskul', [AdminController::class, 'eskulIndex'])->name('admin.eskul');
    Route::post('/admin/eskul', [AdminController::class, 'eskulStore'])->name('admin.eskul.store');
    Route::put('/admin/eskul/{id}', [AdminController::class, 'eskulUpdate'])->name('admin.eskul.update');
    Route::delete('/admin/eskul/{id}', [AdminController::class, 'eskulDestroy'])->name('admin.eskul.destroy');
});

Route::get('/sambutan', [ProfilController::class, 'sambutan'])->name('profil.sambutan');

Route::get('/fasilitas', [FasilitasController::class, 'index'])->name('fasilitas.index');

Route::get('/prestasi', [PrestasiController::class, 'index'])->name('prestasi.index');
