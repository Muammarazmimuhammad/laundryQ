<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\LaundrySlot;
use App\Models\Service;
use App\Models\TrackingLog;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    // Menampilkan halaman form booking
    public function create()
    {
        $services = Service::all();
        
        $slots = LaundrySlot::where('available_date', '>=', now()->toDateString())
                    ->whereColumn('current_quota', '<', 'max_quota')
                    ->get();

        // TAMBAHAN: Ambil riwayat pesanan khusus user yang sedang login
        $bookings = Booking::with(['service', 'slot', 'trackingLogs' => function($query) {
            $query->orderBy('id', 'desc'); 
        }])
        ->where('user_id', Auth::id())
        ->orderBy('created_at', 'desc')
        ->get();

        // Lempar data services, slots, dan bookings ke halaman
        return view('booking.create', compact('services', 'slots', 'bookings'));
    }

    // Memproses data saat user klik 'Submit Booking'
    public function store(Request $request)
    {
        // 1. Validasi inputan form
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'slot_id' => 'required|exists:laundry_slots,id',
        ]);

        $slot = LaundrySlot::findOrFail($request->slot_id);

        // 2. Validasi Overbooking (Pencegahan jika ada pelanggan yang klik bersamaan)
        if ($slot->current_quota >= $slot->max_quota) {
            return back()->with('error', 'Maaf, slot waktu ini baru saja penuh. Silakan pilih jadwal lain.');
        }

        // 3. Simpan data ke tabel bookings
        // Catatan: Karena fitur login belum jadi, kita pakai ID user dummy (misal ID 2 = Budi)
        $booking = Booking::create([
            'booking_code' => 'LQ-' . date('Ymd') . '-' . rand(100, 999),
            'user_id' => Auth::id(),
            'service_id' => $request->service_id,
            'slot_id' => $request->slot_id,
            'status' => 'Menunggu Antrean',
        ]);

        // 4. Tambah jumlah kuota yang terpakai di tabel laundry_slots
        $slot->increment('current_quota');

        // 5. Catat riwayat awal ke tracking_logs
        TrackingLog::create([
            'booking_id' => $booking->id,
            'status' => 'Menunggu Antrean',
            'description' => 'Pesanan berhasil dibuat secara online.'
        ]);

        return back()->with('success', 'Booking berhasil! Kode Anda: ' . $booking->booking_code);
    }
}