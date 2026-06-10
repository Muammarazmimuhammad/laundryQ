<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\TrackingLog;

class AdminController extends Controller
{
    // Menampilkan Dashboard Admin
    public function index()
    {
        // Ambil semua data booking beserta relasinya, urutkan dari yang terbaru
        $bookings = Booking::with(['user', 'service', 'slot'])->orderBy('created_at', 'desc')->get();
        return view('admin.dashboard', compact('bookings'));
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