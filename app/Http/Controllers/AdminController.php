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
        // 1. Siapkan query dasar (ambil semua data dari yang terbaru)
        $query = \App\Models\Booking::with(['user', 'service', 'slot'])->orderBy('created_at', 'desc');

        // 2. FITUR FILTER: Cek apakah ada klik dari sidebar?
        if ($request->has('service')) {
            $filter = $request->service;
            // Saring tabel berdasarkan nama layanan yang diklik
            $query->whereHas('service', function($q) use ($filter) {
                $q->where('service_name', 'like', '%' . $filter . '%');
            });
        }

        // 3. Eksekusi query
        $bookings = $query->get();

        // (Opsional) Biar statistik Kotak Atas tetep ngitung semua antrean meskipun lagi difilter:
        $allBookings = \App\Models\Booking::all(); 
        
        // RETURN-NYA CUKUP SATU AJA DI PALING BAWAH SINI 👇
        return view('admin.dashboard', compact('bookings', 'allBookings'));
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
        $totalPrice = $request->weight * $booking->service->price_per_kg;

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
}