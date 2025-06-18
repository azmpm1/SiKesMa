<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
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

Route::get('/dashboard', function () {
    // Arahkan admin ke dashboard admin, pengguna biasa ke dashboard biasa
    if (auth()->user()->is_admin) {
        return redirect()->route('admin.dashboard');
    }
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Grup Rute Khusus Admin
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    
    // Rute Baru untuk Kelola Antrian
    Route::get('/antrian', [AdminAntrianController::class, 'index'])->name('antrian.index');
    Route::get('/antrian/{antrian}/edit', [AdminAntrianController::class, 'edit'])->name('antrian.edit'); // Rute untuk menampilkan form edit
    Route::put('/antrian/{antrian}', [AdminAntrianController::class, 'update'])->name('antrian.update'); // Rute untuk memproses update
    Route::delete('/antrian/{antrian}', [AdminAntrianController::class, 'destroy'])->name('antrian.destroy');

    // Rute untuk Kelola Panggilan Ambulans
    Route::get('/ambulans', [AdminAmbulansController::class, 'index'])->name('ambulans.index');
    Route::get('/ambulans/{panggilanAmbulans}/edit', [AdminAmbulansController::class, 'edit'])->name('ambulans.edit'); // Rute form edit
    Route::put('/ambulans/{panggilanAmbulans}', [AdminAmbulansController::class, 'update'])->name('ambulans.update'); // Rute proses update
    Route::delete('/ambulans/{panggilanAmbulans}', [AdminAmbulansController::class, 'destroy'])->name('ambulans.destroy');

     // Rute Baru untuk Kelola Pengguna
    Route::get('/users', [AdminUserController::class, 'index'])->name('users.index');
    Route::get('/users/{user}/edit', [AdminUserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [AdminUserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [AdminUserController::class, 'destroy'])->name('users.destroy');
    // Nanti tambahkan rute lain untuk kelola antrian, ambulans, pengguna di sini
});
    
// Grup Rute Khusus User
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rute untuk Ambil Antrian
    Route::get('/antrian', [AntrianController::class, 'create'])->name('antrian.create');
    Route::post('/antrian', [AntrianController::class, 'store'])->name('antrian.store');
    
    // Rute baru untuk menampilkan tiket antrian
    Route::get('/antrian/{antrian}', [AntrianController::class, 'show'])->name('antrian.show');

    // Rute untuk Panggilan Ambulans
    Route::get('/ambulans', [AmbulansController::class, 'create'])->name('ambulans.create');
    Route::post('/ambulans', [AmbulansController::class, 'store'])->name('ambulans.store');
    Route::get('/ambulans/sukses', [AmbulansController::class, 'success'])->name('ambulans.success');

     // Rute Baru untuk Profil Dokter
    Route::get('/profil-dokter', [DoctorProfileController::class, 'index'])->name('doctors.index');

    // Rute untuk Artikel Kesehatan
    Route::get('/artikel-kesehatan', [ArticleController::class, 'index'])->name('articles.index');
    Route::get('/artikel-kesehatan/{slug}', [ArticleController::class, 'show'])->name('articles.show'); // Rute baru untuk detail

});

require __DIR__.'/auth.php';