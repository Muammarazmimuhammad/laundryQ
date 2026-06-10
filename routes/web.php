<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TrackingController;
use App\Http\Middleware\IsAdmin;

// Rute untuk menampilkan halaman form booking
Route::get('/booking', [BookingController::class, 'create'])->name('booking.create');

// Rute untuk memproses pengiriman data form booking
Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');


// Rute Admin Dashboard
Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
Route::post('/admin/booking/{id}', [AdminController::class, 'update'])->name('admin.booking.update');

// Rute Autentikasi
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// Rute Tracking Pelanggan (Hanya bisa diakses kalau sudah login)
Route::get('/pesanan-saya', [TrackingController::class, 'index'])->name('tracking.index');


// BUNGKUS RUTE ADMIN SEPERTI INI:
Route::middleware(['auth', IsAdmin::class])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::post('/admin/booking/{id}', [AdminController::class, 'update'])->name('admin.booking.update');
});

// BUNGKUS JUGA RUTE TRACKING AGAR HANYA BISA DIAKSES JIKA SUDAH LOGIN:
Route::middleware(['auth'])->group(function () {
    Route::get('/pesanan-saya', [TrackingController::class, 'index'])->name('tracking.index');
    Route::get('/booking', [BookingController::class, 'create'])->name('booking.create');
    Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
});