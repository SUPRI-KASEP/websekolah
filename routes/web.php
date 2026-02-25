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

    // Fasilitas Management Routes
    Route::get('/admin/fasilitas', [AdminController::class, 'fasilitasIndex'])->name('admin.fasilitas');
    Route::post('/admin/fasilitas', [AdminController::class, 'fasilitasStore'])->name('admin.fasilitas.store');
    Route::put('/admin/fasilitas/{id}', [AdminController::class, 'fasilitasUpdate'])->name('admin.fasilitas.update');
    Route::delete('/admin/fasilitas/{id}', [AdminController::class, 'fasilitasDestroy'])->name('admin.fasilitas.destroy');

    // Prestasi Management Routes
    Route::get('/admin/prestasi', [AdminController::class, 'prestasiIndex'])->name('admin.prestasi');
    Route::post('/admin/prestasi', [AdminController::class, 'prestasiStore'])->name('admin.prestasi.store');
    Route::put('/admin/prestasi/{id}', [AdminController::class, 'prestasiUpdate'])->name('admin.prestasi.update');
    Route::delete('/admin/prestasi/{id}', [AdminController::class, 'prestasiDestroy'])->name('admin.prestasi.destroy');
});

Route::get('/sambutan', [ProfilController::class, 'sambutan'])->name('profil.sambutan');

Route::get('/visi-misi', [ProfilController::class, 'vm'])->name('profil.vm');

Route::get('/profil', [ProfilController::class, 'dashboard'])->name('profil.dashboard');

Route::get('/profil/{slug}', [ProfilController::class, 'menu'])->name('profil.menu');

Route::get('/fasilitas', [FasilitasController::class, 'index'])->name('fasilitas.index');

Route::get('/prestasi', [PrestasiController::class, 'index'])->name('prestasi.index');
