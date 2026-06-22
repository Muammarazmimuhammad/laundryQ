<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\TrackingLog;

class AdminController extends Controller
{
    // Menampilkan Dashboard Admin
    public function index(Request $request)
    {
        // 1. Cek apakah ada aksi pencarian/filter (dari sidebar ATAU dari tanggal)
        $isFiltered = $request->has('service') || $request->filled('tanggal');

        // 2. Logika Pemanggilan Data
        if ($isFiltered) {
            // Jika admin melakukan filter, baru jalankan query ke database
            $query = Booking::with(['user', 'service', 'slot'])->orderBy('created_at', 'desc');

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
            // JALUR AMAN: Jika pertama dibuka tanpa filter, tampilkan semua data biar dashboard admin gak kosong melompong
            $bookings = Booking::with(['user', 'service', 'slot'])->orderBy('created_at', 'desc')->get(); 
            $isFiltered = true;
        }

        // 3. Statistik Kotak Atas tetep ngitung semua
        $allBookings = Booking::all(); 
        
        // 4. Return ke view dengan tambahan variabel $isFiltered
        return view('admin.dashboard', compact('bookings', 'allBookings', 'isFiltered'));
    }

    // Memperbarui Status, Berat, dan Harga
    public function update(Request $request, $id)
    {
        $request->validate([
            'weight' => 'required|numeric|min:0',
            'status' => 'required|in:Menunggu Antrean,Diterima,Proses Cuci,Pengeringan,Siap Diambil,Selesai'
        ]);

        $booking = Booking::with('service')->findOrFail($id);
        $oldStatus = $booking->status;
        
        // Hitung total harga otomatis berdasarkan harga paket layanan yang aktif
        $totalPrice = $request->weight * ($booking->service->price ?? 0);

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

       if ($request->status == 'Siap Diambil' && $oldStatus !== 'Siap Diambil') {
            
            $pesan = "Halo Kak *" . $booking->user->name . "* 🌊\n\n";
            $pesan .= "Cucianmu dengan resi *" . $booking->booking_code . "* sudah selesai, wangi, dan siap diambil ya!\n";
            $pesan .= "Total biaya: *Rp" . number_format($booking->total_price, 0, ',', '.') . "*.\n\n";
            $pesan .= "Terima kasih telah menggunakan layanan LaundryQ Kelompok Kurma! 👕✨";

            $curl = curl_init();
            curl_setopt_array($curl, array(
              CURLOPT_URL => 'https://api.fonnte.com/send',
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_CUSTOMREQUEST => 'POST',
              CURLOPT_POSTFIELDS => array(
                'target' => $booking->user->phone, // <-- JALUR OTOMATIS AKTIF!
                'message' => $pesan,
                'countryCode' => '62',
              ),
              CURLOPT_HTTPHEADER => array(
                'Authorization: wgreea6LtgF4kpX2j77h' // Token Fonnte
              ),
            ));
            
            $response = curl_exec($curl);
            curl_close($curl);
        }

        return back()->with('success', 'Data pesanan ' . $booking->booking_code . ' berhasil diperbarui!');
    }

    public function riwayat()
    {
        // Ambil data pesanan yang sudah 'Selesai' atau 'Archived' ditambah eager loading biar makin ngebut
        $riwayats = Booking::with(['user', 'service', 'slot'])->whereIn('status', ['Selesai', 'Archived'])
                        ->orderBy('updated_at', 'desc')
                        ->get();

        return view('admin.riwayat', compact('riwayats'));
    }
}