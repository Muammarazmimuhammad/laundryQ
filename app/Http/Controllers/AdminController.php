<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\TrackingLog;

class AdminController extends Controller
{
   // Menampilkan Dashboard Admin
    public function index(\Illuminate\Http\Request $request)
    {
        // 1. Cek apakah ada aksi pencarian/filter (dari sidebar ATAU dari tanggal)
        $isFiltered = $request->has('service') || $request->filled('tanggal');

        // 2. Logika Pemanggilan Data
        if ($isFiltered) {
            // Jika admin melakukan filter, baru jalankan query ke database
            $query = \App\Models\Booking::with(['user', 'service', 'slot'])->orderBy('created_at', 'desc');

            if ($request->has('service')) {
                $filter = $request->service;
                $query->whereHas('service', function($q) use ($filter) {
                    $q->where('service_name', 'like', '%' . $filter . '%');
                });
            }

            if ($request->filled('tanggal')) {
                $query->whereDate('created_at', $request->tanggal);
            }

            $bookings = $query->get();
        } else {
            // Jika TIDAK ADA filter sama sekali, berikan koleksi kosong (jangan load data)
            $bookings = collect(); 
        }

        // 3. Statistik Kotak Atas tetep ngitung semua
        $allBookings = \App\Models\Booking::all(); 
        
        // 4. Return ke view dengan tambahan variabel $isFiltered
        return view('admin.dashboard', compact('bookings', 'allBookings', 'isFiltered'));
    }

    // Memperbarui Status, Berat, dan Harga
    public function update(Request $request, $id)
    {
        $request->validate([
            'weight' => 'numeric|min:0',
            'status' => 'required|in:Menunggu Antrean,Diterima,Proses Cuci,Pengeringan,Siap Diambil,Selesai'
        ]);

        $booking = Booking::findOrFail($id);
        $oldStatus = $booking->status;
        
        // Hitung total harga otomatis jika berat diinput
        $totalPrice = $request->weight * $booking->service->price;

        // Update data booking
        $booking->update([
            'weight' => $request->weight,
            'total_price' => $totalPrice,
            'status' => $request->status,
        ]);

        // Jika status berubah, catat ke tabel tracking_logs
        if ($oldStatus !== $request->status) {
            TrackingLog::create([
                'booking_id' => $booking->id,
                'status' => $request->status,
                'description' => 'Status pesanan diperbarui oleh Admin menjadi: ' . $request->status
            ]);
        }

        return back()->with('success', 'Data pesanan ' . $booking->booking_code . ' berhasil diperbarui!');
    }
    public function riwayat()
    {
        // Ambil data pesanan yang sudah 'Selesai' atau 'Archived'
        $riwayats = \App\Models\Booking::whereIn('status', ['Selesai', 'Archived'])
                        ->orderBy('updated_at', 'desc')
                        ->get();

        return view('admin.riwayat', compact('riwayats'));
    }
}