<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AntrianController;
use App\Http\Controllers\AmbulansController;
use App\Http\Controllers\DoctorProfileController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AdminController; // Import AdminController
use App\Http\Controllers\Admin\AntrianController as AdminAntrianController;
use App\Http\Controllers\Admin\AmbulansController as AdminAmbulansController;
use App\Http\Controllers\Admin\UserController as AdminUserController;


Route::get('/', function () {
    return view('welcome');
});

// Rute Dashboard Utama (akan mengarahkan ke admin jika user adalah admin)
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('dashboard');

// Grup Rute Khusus Admin
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    
    // Kelola Antrian
    Route::get('/antrian', [AdminAntrianController::class, 'index'])->name('antrian.index');
    Route::get('/antrian/{antrian}/edit', [AdminAntrianController::class, 'edit'])->name('antrian.edit');
    Route::put('/antrian/{antrian}', [AdminAntrianController::class, 'update'])->name('antrian.update');
    Route::delete('/antrian/{antrian}', [AdminAntrianController::class, 'destroy'])->name('antrian.destroy');

    // Kelola Panggilan Ambulans
    Route::get('/ambulans', [AdminAmbulansController::class, 'index'])->name('ambulans.index');
    Route::get('/ambulans/{panggilanAmbulans}/edit', [AdminAmbulansController::class, 'edit'])->name('ambulans.edit');
    Route::put('/ambulans/{panggilanAmbulans}', [AdminAmbulansController::class, 'update'])->name('ambulans.update');
    Route::delete('/ambulans/{panggilanAmbulans}', [AdminAmbulansController::class, 'destroy'])->name('ambulans.destroy');

    // Kelola Pengguna
    Route::get('/users', [AdminUserController::class, 'index'])->name('users.index');
    Route::get('/users/{user}/edit', [AdminUserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [AdminUserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [AdminUserController::class, 'destroy'])->name('users.destroy');
});
    
// Grup Rute untuk Pengguna yang Terautentikasi
Route::middleware('auth')->group(function () {
    // Profil Pengguna
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Fitur Pengguna
    Route::get('/antrian', [AntrianController::class, 'create'])->name('antrian.create');
    Route::post('/antrian', [AntrianController::class, 'store'])->name('antrian.store');
    Route::get('/antrian/{antrian}', [AntrianController::class, 'show'])->name('antrian.show');
    
    Route::get('/ambulans', [AmbulansController::class, 'create'])->name('ambulans.create');
    Route::post('/ambulans', [AmbulansController::class, 'store'])->name('ambulans.store');
    Route::get('/ambulans/{panggilanAmbulans}', [AmbulansController::class, 'show'])->name('ambulans.show');
    
    Route::get('/profil-dokter', [DoctorProfileController::class, 'index'])->name('doctors.index');
    
    Route::get('/artikel-kesehatan', [ArticleController::class, 'index'])->name('articles.index');
    Route::get('/artikel-kesehatan/{slug}', [ArticleController::class, 'show'])->name('articles.show');
});

require __DIR__.'/auth.php';