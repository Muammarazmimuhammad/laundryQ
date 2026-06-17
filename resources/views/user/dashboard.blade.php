@extends('layouts.dashboard')

@section('title', 'Dashboard Pelanggan')

@section('content')

    {{-- ===== HEADER ===== --}}
    <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-4 mb-8">
        <div>
            <div class="inline-flex items-center gap-2 bg-blue-50 text-blue-600 text-[11px] font-black px-3 py-1.5 rounded-full border border-blue-100 mb-3 uppercase tracking-widest">
                <span class="w-1.5 h-1.5 bg-blue-500 rounded-full animate-pulse"></span>
                Ringkasan Akun
            </div>
            <h1 class="text-3xl font-black text-slate-800 tracking-tight">
                Halo, {{ explode(' ', Auth::user()->name)[0] }}! <span class="inline-block">👋</span>
            </h1>
            <p class="text-slate-500 mt-1 text-sm">Pantau progres cucianmu dan nikmati hari yang santai.</p>
        </div>

        <a href="{{ route('booking.create') }}" class="inline-flex items-center justify-center gap-2 bg-blue-600 text-white px-5 py-3 rounded-xl font-bold text-sm shadow-sm shadow-blue-200 hover:bg-blue-700 transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"></path></svg>
            Pesan Antrean Baru
        </a>
    </div>

    {{-- ===== STAT CARDS ===== --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">

        <div class="bg-white rounded-2xl p-5 border border-slate-100 shadow-sm hover:shadow-md transition-shadow relative overflow-hidden">
            <div class="absolute -right-6 -top-6 w-24 h-24 bg-blue-50 rounded-full"></div>
            <div class="relative z-10">
                <div class="w-10 h-10 rounded-xl bg-blue-600 flex items-center justify-center text-white mb-3 shadow-md shadow-blue-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                </div>
                <p class="text-2xl font-black text-slate-800">{{ $totalPesanan }}</p>
                <p class="text-xs font-bold text-slate-400 mt-1">Total Pesanan</p>
            </div>
            <div class="relative z-10 border-t border-slate-100 pt-3 mt-4">
                <a href="{{ route('tracking.index') }}" class="text-blue-600 text-xs font-bold flex items-center gap-1.5 hover:gap-2.5 transition-all w-max">
                    Lihat Riwayat <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </a>
            </div>
        </div>

        <div class="bg-white rounded-2xl p-5 border border-slate-100 shadow-sm hover:shadow-md transition-shadow relative overflow-hidden">
            <div class="absolute -right-6 -top-6 w-24 h-24 bg-cyan-50 rounded-full"></div>
            <div class="relative z-10">
                <div class="w-10 h-10 rounded-xl bg-cyan-500 flex items-center justify-center text-white mb-3 shadow-md shadow-cyan-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <p class="text-2xl font-black text-slate-800">{{ $pesananSelesai }}<span class="text-base text-slate-300 font-bold ml-1">%</span></p>
                <p class="text-xs font-bold text-slate-400 mt-1">Cucian Selesai</p>
            </div>
            <div class="relative z-10 border-t border-slate-100 pt-3 mt-4">
                <a href="{{ route('tracking.index') }}" class="text-cyan-600 text-xs font-bold flex items-center gap-1.5 hover:gap-2.5 transition-all w-max">
                    Cek Pesanan <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </a>
            </div>
        </div>

        <div class="bg-gradient-to-br from-blue-600 to-cyan-500 rounded-2xl p-5 border border-white/10 shadow-md shadow-blue-200 hover:shadow-lg hover:shadow-blue-300 transition-shadow relative overflow-hidden">
            <div class="absolute -right-6 -top-6 w-24 h-24 bg-white/10 rounded-full"></div>
            <div class="relative z-10">
                <div class="w-10 h-10 rounded-xl bg-white/20 backdrop-blur-sm border border-white/30 flex items-center justify-center text-white mb-3">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <p class="text-2xl font-black text-white">{{ $pesananAktif }}</p>
                <p class="text-xs font-bold text-cyan-100 mt-1">Sedang Diproses</p>
            </div>
            <div class="relative z-10 border-t border-white/20 pt-3 mt-4">
                <a href="{{ route('tracking.index') }}" class="text-white text-xs font-bold flex items-center gap-1.5 hover:gap-2.5 transition-all w-max">
                    Lacak Status <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </a>
            </div>
        </div>

        <div class="bg-white rounded-2xl p-5 border border-slate-100 shadow-sm hover:shadow-md transition-shadow relative overflow-hidden">
            <div class="absolute -right-6 -top-6 w-24 h-24 bg-slate-100 rounded-full"></div>
            <div class="relative z-10">
                <div class="w-10 h-10 rounded-xl bg-green-400 flex items-center justify-center text-white mb-3 shadow-md shadow-slate-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path><path stroke-linecap="round" stroke-linejoin="round" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path></svg>
                </div>
                <p class="text-2xl font-black text-slate-800">Rp{{ number_format($totalPengeluaran / 1000, 0, ',', '.') }}<span class="text-sm text-slate-300 font-bold ml-1">Rb</span></p>
                <p class="text-xs font-bold text-slate-400 mt-1">Pengeluaran</p>
            </div>
            <div class="relative z-10 border-t border-slate-100 pt-3 mt-4">
                <a href="#" class="text-slate-500 text-xs font-bold flex items-center gap-1.5 hover:gap-2.5 transition-all w-max">
                    Detail Transaksi <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </a>
            </div>
        </div>

    </div>

{{-- ===== AREA TRACKING (Split 2 Kolom ala Referensi) ===== --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        {{-- KOLOM KIRI (Lebar): Status Pesanan Terkini --}}
        <div class="lg:col-span-2 bg-white rounded-2xl p-6 border border-slate-100 shadow-sm flex flex-col">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h2 class="text-lg font-bold text-slate-800">Pesanan Terkini</h2>
                    <p class="text-sm text-slate-500">Status cucian aktifmu saat ini</p>
                </div>
                <a href="{{ route('tracking.index') }}" class="text-blue-600 bg-blue-50 hover:bg-blue-100 text-xs font-bold px-4 py-2 rounded-full transition-colors">
                    Lihat Semua
                </a>
            </div>

            @if($latestBooking)
                <div class="flex-1 bg-slate-50 rounded-xl p-6 border border-slate-100 flex flex-col justify-center">
                    <div class="flex flex-col md:flex-row justify-between items-center gap-4 mb-8">
                        <div>
                            <p class="text-sm text-slate-500 font-medium mb-1">Kode Antrean</p>
                            <h3 class="text-2xl font-black text-blue-600">{{ $latestBooking->booking_code }}</h3>
                        </div>
                        <div class="text-right">
                            <p class="text-sm text-slate-500 font-medium mb-1">Total Biaya</p>
                            <h3 class="text-xl font-bold text-slate-800">Rp{{ number_format($latestBooking->total_price ?? 0, 0, ',', '.') }}</h3>
                        </div>
                    </div>

                    <div class="mb-2 flex justify-between text-xs font-bold text-slate-500">
                        <span>Menunggu</span>
                        <span class="text-blue-600">Proses Cuci</span>
                        <span>Selesai</span>
                    </div>
                    <div class="w-full bg-slate-200 rounded-full h-2.5 mb-6">
                        @php
                            $progress = 10;
                            if($latestBooking->status == 'Diterima') $progress = 30;
                            if($latestBooking->status == 'Proses Cuci') $progress = 60;
                            if($latestBooking->status == 'Pengeringan') $progress = 80;
                            if($latestBooking->status == 'Siap Diambil' || $latestBooking->status == 'Selesai') $progress = 100;
                        @endphp
                        <div class="bg-blue-600 h-2.5 rounded-full transition-all duration-1000" @style(['width: ' . $progress . '%'])></div>
                    </div>

                    <div class="flex items-center gap-3 bg-white p-4 rounded-lg border border-slate-100">
                        <div class="w-10 h-10 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <div>
                            <p class="text-sm font-bold text-slate-800">Status Saat Ini:</p>
                            <p class="text-blue-600 font-medium text-sm">{{ $latestBooking->status }}</p>
                        </div>
                    </div>
                </div>
            @else
                <div class="flex-1 bg-slate-50 rounded-xl border border-dashed border-slate-300 flex flex-col items-center justify-center text-center p-8">
                    <p class="text-slate-500 font-medium mb-4">Belum ada pesanan yang sedang aktif.</p>
                    <a href="{{ route('booking.create') }}" class="bg-blue-600 text-white px-6 py-2.5 rounded-xl font-bold text-sm shadow-md shadow-blue-200 hover:bg-blue-700">
                        Buat Pesanan Sekarang
                    </a>
                </div>
            @endif
        </div>

        {{-- KOLOM KANAN (Sempit): Log Aktivitas Terakhir --}}
        <div class="bg-white rounded-2xl p-6 border border-slate-100 shadow-sm">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h2 class="text-lg font-bold text-slate-800">Aktivitas Terakhir</h2>
                    <p class="text-sm text-slate-500">Log sistem terbaru</p>
                </div>
            </div>

            <div class="space-y-6">
                @forelse($latestLogs as $log)
                    <div class="flex gap-4">
                        <div class="flex-shrink-0 mt-1">
                            @php
                                $color = 'bg-slate-200 text-slate-600'; // Default
                                if(str_contains(strtolower($log->status), 'selesai')) $color = 'bg-emerald-100 text-emerald-600';
                                if(str_contains(strtolower($log->status), 'proses')) $color = 'bg-blue-100 text-blue-600';
                                if(str_contains(strtolower($log->status), 'menunggu')) $color = 'bg-orange-100 text-orange-600';
                            @endphp
                            <div class="w-8 h-8 rounded-full {{ $color }} flex items-center justify-center text-xs font-black">
                                {{ substr($log->status, 0, 1) }}
                            </div>
                        </div>
                        <div>
                            <p class="text-sm font-bold text-slate-800">{{ $log->status }}</p>
                            <p class="text-xs text-slate-500 mt-0.5 line-clamp-1">{{ $log->description }}</p>
                            <p class="text-xs font-semibold text-slate-400 mt-1">{{ \Carbon\Carbon::parse($log->changed_at)->diffForHumans() }}</p>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-10">
                        <p class="text-sm text-slate-400">Tidak ada log aktivitas.</p>
                    </div>
                @endforelse
            </div>
        </div>

    </div>

@endsection