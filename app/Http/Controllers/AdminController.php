<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\TrackingLog;
use Carbon\Carbon;

class AdminController extends Controller
{
    // Menampilkan Dashboard Admin
    public function index(Request $request)
    {
        // 1. Cek apakah ada aksi pencarian/filter (dari sidebar ATAU dari tanggal)
        $isFiltered = $request->has('service') || $request->filled('tanggal');

        // 2. Logika Pemanggilan Data
        if ($isFiltered) {
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
            // JALUR AMAN: Jika pertama dibuka tanpa filter, tampilkan semua data
            $bookings = Booking::with(['user', 'service', 'slot'])->orderBy('created_at', 'desc')->get(); 
            $isFiltered = true;
        }

        // 3. Statistik Kotak Atas tetep ngitung semua
        $allBookings = Booking::all(); 

        // ====================================================================
        // 🔥 ULTIMATE CHART ENGINE: SENIN - MINGGU DENGAN MESIN WAKTU (PEKAN)
        // ====================================================================
        // 1. Tangkap parameter '?pekan=-1' dari URL (Default 0 alias pekan ini)
        $weekOffset = (int) $request->get('pekan', 0);

        // 2. Kunci titik hari Senin 00:00 & Minggu 23:59 sesuai offset pekan
        $startOfWeek = Carbon::now('Asia/Jakarta')->addWeeks($weekOffset)->startOfWeek(Carbon::MONDAY);
        $endOfWeek   = Carbon::now('Asia/Jakarta')->addWeeks($weekOffset)->endOfWeek(Carbon::SUNDAY);

        // Subtitle Cantik di UI (Contoh: "22 Jun 2026 — 28 Jun 2026")
        $periodeLabel = $startOfWeek->translatedFormat('d M Y') . ' — ' . $endOfWeek->translatedFormat('d M Y');

        // 3. Buat kerangka 7 hari mutlak dari Senin s/d Minggu
        $weeklyCashflow = collect();
        $currentDay = $startOfWeek->copy();

        for ($i = 0; $i < 7; $i++) {
            $dateStr = $currentDay->toDateString();
            // Menghasilkan teks sumbu X: "Sen, 22 Jun"
            $labelStr = $currentDay->locale('id')->isoFormat('ddd, D MMM'); 
            
            $weeklyCashflow[$dateStr] = [
                'label' => $labelStr,
                'total' => 0
            ];
            $currentDay->addDay();
        }

        // 4. Tarik data database khusus rentang Senin - Minggu pada pekan tersebut
        $pendapatanDB = Booking::where('status', 'Selesai')
            ->whereBetween('updated_at', [$startOfWeek->startOfDay(), $endOfWeek->endOfDay()])
            ->selectRaw('DATE(updated_at) as tanggal, SUM(total_price) as total')
            ->groupBy('tanggal')
            ->pluck('total', 'tanggal');

        // 5. Timpa laci Rp0 dengan pendapatan asli jika harinya ada transaksi
        foreach ($pendapatanDB as $tgl => $total) {
            if (isset($weeklyCashflow[$tgl])) {
                $weeklyCashflow[$tgl]['total'] = $total;
            }
        }

        $chartLabels = $weeklyCashflow->pluck('label')->toArray();
        $chartValues = $weeklyCashflow->pluck('total')->toArray();

        // ====================================================================
        // 📦 PENANDA KIRI BAWAH (TETAP MENGHITUNG MINGGU INI & BULAN INI SECARA LIVE)
        // ====================================================================
        $revenueThisWeek = Booking::where('status', 'Selesai')
            ->whereBetween('updated_at', [Carbon::now('Asia/Jakarta')->startOfWeek(Carbon::MONDAY), Carbon::now('Asia/Jakarta')->endOfWeek(Carbon::SUNDAY)])
            ->sum('total_price');

        $revenueThisMonth = Booking::where('status', 'Selesai')
            ->whereYear('updated_at', Carbon::now('Asia/Jakarta')->year)
            ->whereMonth('updated_at', Carbon::now('Asia/Jakarta')->month)
            ->sum('total_price');
        // ====================================================================

        return view('admin.dashboard', compact(
            'bookings', 'allBookings', 'isFiltered', 
            'chartLabels', 'chartValues', 
            'revenueThisWeek', 'revenueThisMonth',
            'weekOffset', 'periodeLabel' 
        ));
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
        
        $totalPrice = $request->weight * ($booking->service->price ?? 0);

        $booking->update([
            'weight' => $request->weight,
            'total_price' => $totalPrice,
            'status' => $request->status,
        ]);

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
            $pesan .= "Terima kasih telah menggunakan layanan LaundryQ 👕✨";

            $curl = curl_init();
            curl_setopt_array($curl, array(
              CURLOPT_URL => 'https://api.fonnte.com/send',
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_CUSTOMREQUEST => 'POST',
              CURLOPT_POSTFIELDS => array(
                'target' => $booking->user->phone, 
                'message' => $pesan,
                'countryCode' => '62',
              ),
              CURLOPT_HTTPHEADER => array(
                'Authorization: wgreea6LtgF4kpX2j77h' 
              ),
            ));
            
            $response = curl_exec($curl);
            curl_close($curl);
        }

        return back()->with('success', 'Data pesanan ' . $booking->booking_code . ' berhasil diperbarui!');
    }

    public function riwayat()
    {
        $riwayats = Booking::with(['user', 'service', 'slot'])->whereIn('status', ['Selesai', 'Archived'])
                        ->orderBy('updated_at', 'desc')
                        ->get();

        return view('admin.riwayat', compact('riwayats'));
    }
}