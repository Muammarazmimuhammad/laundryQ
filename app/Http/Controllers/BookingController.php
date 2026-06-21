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
    public function create()
    {
        $services = Service::all();
        
        $daysToGenerate = 3;
        $defaultSlots = ['08:00 - 10:00', '10:00 - 12:00', '13:00 - 15:00', '15:00 - 17:00'];

        for ($i = 0; $i < $daysToGenerate; $i++) {

            $date = now('Asia/Jakarta')->addDays($i)->toDateString(); 

            $exists = LaundrySlot::where('available_date', $date)->exists();

            if (!$exists) {
                foreach ($defaultSlots as $time) {
                    LaundrySlot::create([
                        'available_date' => $date,
                        'time_slot' => $time,
                        'max_quota' => 5,
                        'current_quota' => 0
                    ]);
                }
            }
        }

        // 2. PAKSA juga timezone Jakarta di dalam query filter agar akurat memakai tanggal 16
        $slots = LaundrySlot::where('available_date', '>=', now('Asia/Jakarta')->toDateString())
                    ->whereColumn('current_quota', '<', 'max_quota')
                    ->orderBy('available_date', 'asc')
                    ->orderBy('time_slot', 'asc')
                    ->get();

            $bookings = Booking::with(['service', 'slot', 'trackingLogs' => function($query) {
            $query->orderBy('created_at', 'desc'); // <-- UBAH DI SINI BOS
        }])
        ->where('user_id', Auth::id())
        ->orderBy('created_at', 'desc')
        ->get();

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

        // 2. Validasi Overbooking
        if ($slot->current_quota >= $slot->max_quota) {
            return back()->with('error', 'Maaf, slot waktu ini baru saja penuh. Silakan pilih jadwal lain.');
        }

        // 3. Simpan data ke tabel bookings
        // Karena kamu sudah bikin fitur login, kita ambil langsung Auth::id()
        $booking = Booking::create([
            'booking_code' => 'LQ-' . date('Ymd') . '-' . rand(100, 999),
            'user_id' => Auth::id(),
            'service_id' => $request->service_id,
            'slot_id' => $request->slot_id,
            'status' => 'Menunggu Antrean',
        ]);

        // 4. Tambah jumlah kuota yang terpakai
        $slot->increment('current_quota');

        // 5. Catat riwayat awal ke tracking_logs
        TrackingLog::create([
            'booking_id' => $booking->id,
            'status' => 'Menunggu Antrean',
            'description' => 'Pesanan berhasil dibuat secara online. Menunggu konfirmasi admin.'
        ]);

        return back()->with('success', 'Booking berhasil! Kode Antrean Anda: ' . $booking->booking_code);
    }

    // Menghapus pesanan
    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        
        // Kembalikan kuota slot sebelum dihapus
        $slot = LaundrySlot::find($booking->slot_id);
        if($slot && $slot->current_quota > 0) {
            $slot->decrement('current_quota');
        }

        $booking->delete();

        return redirect()->back()->with('success', 'Pesanan berhasil dibatalkan dan dihapus dari sistem!');
    }


    // API: Cek ketersediaan slot secara real-time di halaman depan (Welcome/Landing Page)
    public function cekSlotRealtime(Request $request)
    {
        $tanggal = $request->tanggal; // Menangkap tanggal dari parameter URL (?tanggal=)

        // Mengambil data menggunakan nama model asli 'LaundrySlot' dan kolom 'available_date'
        $slots = LaundrySlot::whereDate('available_date', $tanggal)->get();

        // Format datanya menjadi JSON objek terstruktur untuk dibaca JavaScript
        $formattedSlots = $slots->map(function ($slot) {
            
            // Rumus hitung sisa slot: Kuota Maksimal dikurangi Kuota Terpakai Saat Ini
            $sisa = $slot->max_quota - $slot->current_quota; 

            // Logika Status & Warna Badge di UI Frontend
            if ($sisa > 2) {
                $status = 'Tersedia';
                $color = 'emerald'; // Hijau
            } elseif ($sisa > 0) {
                $status = 'Tersedia';
                $color = 'amber';   // Kuning/Oranye
            } else {
                $status = 'Penuh';
                $color = 'rose';    // Merah
            }

            return [
                'waktu' => $slot->time_slot,
                'status' => $status,
                'sisa' => $sisa,
                'color' => $color
            ];
        });

        return response()->json($formattedSlots);
    }
}