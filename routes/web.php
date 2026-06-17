<?php
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TrackingController;
use App\Http\Middleware\IsAdmin;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

// 1. RUTE PUBLIK
Route::get('/', [HomeController::class, 'index'])->name('home');

// 2. RUTE GUEST (Hanya untuk yang belum login)
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
});

// 3. RUTE AUTH (Wajib Login)
Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Dashboard Pelanggan (Menghitung 4 Statistik AdminLTE)
    Route::get('/dashboard', function() {
        $userId = Auth::id();
        $user = Auth::user();
        
        $totalPesanan = Booking::where('user_id', $userId)->count();
        $pesananSelesai = Booking::where('user_id', $userId)->where('status', 'Selesai')->count();
        $pesananAktif = Booking::where('user_id', $userId)->where('status', '!=', 'Selesai')->count();
        $totalPengeluaran = Booking::where('user_id', $userId)->sum('total_price');

        return view('user.dashboard', compact('user', 'totalPesanan', 'pesananSelesai', 'pesananAktif', 'totalPengeluaran'));
    })->name('user.dashboard');

    // Fitur Pelanggan
    Route::get('/pesanan-saya', [TrackingController::class, 'index'])->name('tracking.index');
    Route::get('/booking', [BookingController::class, 'create'])->name('booking.create');
    Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');

    // 4. RUTE KHUSUS ADMIN
    Route::middleware([IsAdmin::class])->group(function () {
        Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
        Route::post('/admin/booking/{id}', [AdminController::class, 'update'])->name('admin.booking.update');
        Route::delete('/admin/booking/{id}', [BookingController::class, 'destroy'])->name('booking.destroy');
    });
});

// Dashboard Pelanggan
    Route::get('/dashboard', function() {
        $userId = Auth::id();
        $user = Auth::user();
        
        $totalPesanan = Booking::where('user_id', $userId)->count();
        $pesananSelesai = Booking::where('user_id', $userId)->where('status', 'Selesai')->count();
        $pesananAktif = Booking::where('user_id', $userId)->where('status', '!=', 'Selesai')->count();
        $totalPengeluaran = Booking::where('user_id', $userId)->sum('total_price');

        // AMBIL DATA PESANAN TERAKHIR (Untuk area tracking)
        $latestBooking = Booking::with('service', 'slot')
                                ->where('user_id', $userId)
                                ->latest()
                                ->first();

        // AMBIL LOG PELACAKAN DARI PESANAN TERAKHIR TERSEBUT
        $latestLogs = collect();
        if ($latestBooking) {
            $latestLogs = \App\Models\TrackingLog::where('booking_id', $latestBooking->id)
                                                ->orderBy('changed_at', 'desc')
                                                ->take(5) // Ambil 5 aktivitas terakhir
                                                ->get();
        }

        return view('user.dashboard', compact(
            'user', 'totalPesanan', 'pesananSelesai', 'pesananAktif', 'totalPengeluaran',
            'latestBooking', 'latestLogs'
        ));
    })->name('user.dashboard');