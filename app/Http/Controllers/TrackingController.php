<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class TrackingController extends Controller
{
    public function index()
    {
        // Ambil pesanan khusus milik user yang sedang login
        // Beserta relasi layanan, slot, dan urutkan riwayat log-nya
        $bookings = Booking::with(['service', 'slot', 'trackingLogs' => function($query) {
            // Urutkan riwayat dari yang terbaru (ID terbesar) ke terlama
            $query->orderBy('id', 'desc'); 
        }])
        ->where('user_id', Auth::id())
        ->orderBy('created_at', 'desc')
        ->get();

        return view('tracking.index', compact('bookings'));
    }
}