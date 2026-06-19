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

      <a href="{{ route('booking.create') }}" class="inline-flex items-center justify-center gap-2 bg-gradient-to-r from-blue-600 to-cyan-500 text-white px-5 py-3 rounded-xl font-bold text-sm shadow-lg shadow-blue-500/30 hover:shadow-blue-500/50 hover:-translate-y-0.5 transition-all duration-300">
          Pesan Antrean Baru
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
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
                        <div class="bg-blue-600 h-2.5 rounded-full transition-all duration-1000" style="width: {{ $progress }}%;"></div>
                    </div>

                    {{-- STATUS SAAT INI & TOMBOL LIHAT STRUK --}}
                    <div class="flex flex-col sm:flex-row items-center justify-between gap-4 bg-white p-4 rounded-lg border border-slate-100">
                        <div class="flex items-center gap-3 w-full sm:w-auto">
                            <div class="w-10 h-10 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <div>
                                <p class="text-sm font-bold text-slate-800">Status Saat Ini:</p>
                                <p class="text-blue-600 font-medium text-sm">{{ $latestBooking->status }}</p>
                            </div>
                        </div>

                        {{-- TOMBOL LIHAT STRUK MUNCUL DI SINI --}}
                        @if($latestBooking->status === 'Selesai' || $latestBooking->status === 'Siap Diambil')
                            <button type="button" onclick="openStruk('{{ $latestBooking->id }}')" class="w-full sm:w-auto inline-flex items-center justify-center gap-1.5 bg-gradient-to-r from-emerald-500 to-teal-500 text-white px-4 py-2 rounded-lg font-bold text-xs shadow-md shadow-emerald-500/20 hover:shadow-emerald-500/40 hover:-translate-y-0.5 transition-all duration-300">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                Lihat Struk
                            </button>

                            {{-- PUSH STRUK KE LUAR LAYOUT --}}
                            @push('modals')
                                <div id="modal-struk-{{ $latestBooking->id }}" class="fixed inset-0 z-[9999] hidden flex items-center justify-center bg-slate-900/60 backdrop-blur-sm opacity-0 transition-opacity duration-300 p-4">
                                    <div class="absolute inset-0" onclick="closeStruk('{{ $latestBooking->id }}')"></div>

                                    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-sm mx-auto overflow-hidden transform scale-90 transition-transform duration-300 relative z-10" id="modal-content-{{ $latestBooking->id }}">
                                        
                                        <div class="bg-gradient-to-r from-blue-600 to-cyan-500 p-6 text-center relative">
                                            <div class="bg-white/95 px-4 py-2.5 rounded-2xl inline-block mx-auto mb-4 shadow-lg">
                                                <img src="{{ asset('img/logo.png') }}" alt="LaundryQ Logo" class="h-7 w-auto object-contain">
                                            </div>
                                            
                                            <h3 class="text-white font-black text-xl tracking-wide">E-Receipt</h3>
                                            <p class="text-blue-100 text-xs font-medium mt-1">Nota Digital Resmi LaundryQ</p>
                                            
                                            <button type="button" onclick="closeStruk('{{ $latestBooking->id }}')" class="absolute top-4 right-4 text-white/70 hover:text-white transition-colors p-1">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                            </button>
                                        </div>

                                        <div class="p-5 bg-slate-50 relative">
                                            
                                            <div class="absolute -top-2.5 left-0 w-full h-[10px] bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyMCIgaGVpZ2h0PSIxMCI+PHBhdGggZD0iTTAgMTBhNSA1IDAgMCAwIDEwIDBhNSA1IDAgMCAwIDEwIDBWMEgwdjEweiIgZmlsbD0iI2Y4ZmFmYyIvPjwvc3ZnPg==')] repeat-x z-20"></div>

                                            <div class="relative flex items-center justify-center pt-2 mb-4">
                                                <div class="absolute w-full border-t-2 border-dashed border-slate-200"></div>
                                                <div class="bg-slate-50 px-3 text-slate-300 relative z-10 flex items-center gap-1.5 opacity-80">
                                                    <svg class="w-4 h-4 -rotate-45" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.121 14.121L19 19m-7-7l7-7m-7 7l-2.879 2.879M12 12L9.121 9.121m0 5.758a3 3 0 10-4.243 4.243 3 3 0 004.243-4.243zm0-5.758a3 3 0 10-4.243-4.243 3 3 0 004.243 4.243z"></path></svg>
                                                    <span class="text-[9px] text-gray-400 font-black tracking-widest uppercase">E-Receipt</span>
                                                </div>
                                            </div>

                                            <div class="space-y-4 pt-2">
                                                <div class="flex justify-between items-center border-b border-dashed border-slate-300 pb-3">
                                                    <span class="text-xs text-slate-500 font-medium">Nama Pelanggan</span>
                                                    <span class="text-sm font-black text-slate-800 uppercase text-right">{{ $latestBooking->user->name ?? Auth::user()->name }}</span>
                                                </div>

                                                <div class="flex justify-between items-center border-b border-dashed border-slate-300 pb-3">
                                                    <span class="text-xs text-slate-500 font-medium">No. Pesanan</span>
                                                    <span class="text-sm font-bold text-slate-800">#{{ $latestBooking->booking_code }}</span>
                                                </div>
                                                
                                                <div class="flex justify-between items-start border-b border-dashed border-slate-300 pb-3">
                                                    <span class="text-xs text-slate-500 font-medium pt-0.5">Layanan</span>
                                                    <span class="text-sm font-bold text-blue-600 text-right max-w-[60%]">
                                                        {{ $latestBooking->service->service_name ?? 'Layanan Laundry' }}
                                                    </span>
                                                </div>
                                                
                                                <div class="flex justify-between items-center border-b border-dashed border-slate-300 pb-3">
                                                    <span class="text-xs text-slate-500 font-medium">Berat/Satuan</span>
                                                    <span class="text-sm font-bold text-slate-800">{{ $latestBooking->weight ?? '0' }} Kg</span>
                                                </div>

                                                <div class="flex justify-between items-center border-b border-dashed border-slate-300 pb-3">
                                                    <span class="text-xs text-slate-500 font-medium">Waktu Masuk</span>
                                                    <span class="text-xs font-bold text-slate-700 text-right">
                                                        {{ \Carbon\Carbon::parse($latestBooking->created_at)->format('d M Y, H:i') }} WIB
                                                    </span>
                                                </div>

                                                <div class="flex justify-between items-center border-b border-dashed border-slate-300 pb-3">
                                                    <span class="text-xs text-slate-500 font-medium">Waktu Selesai</span>
                                                    <span class="text-xs font-bold text-slate-700 text-right">
                                                        {{ $latestBooking->updated_at ? \Carbon\Carbon::parse($latestBooking->updated_at)->format('d M Y, H:i') . ' WIB' : '-' }}
                                                    </span>
                                                </div>
                                                
                                                <div class="pt-2">
                                                    <div class="flex justify-between items-center bg-emerald-50 p-4 rounded-xl border border-emerald-100 shadow-inner">
                                                        <span class="text-sm font-black text-slate-700">Total Bayar</span>
                                                        <span class="text-xl font-black text-emerald-600">Rp{{ number_format($latestBooking->total_price ?? 0, 0, ',', '.') }}</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mt-6 text-center">
                                                <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">Terima kasih telah menggunakan LaundryQ!</p>
                                            </div>
                                        </div>
                                        
                                        <div class="p-4 bg-white border-t border-slate-100">
                                            <button onclick="closeStruk('{{ $latestBooking->id }}')" class="w-full py-3 bg-slate-100 hover:bg-slate-200 text-slate-600 rounded-xl text-sm font-bold transition-colors">Tutup Struk</button>
                                        </div>
                                        
                                    </div>
                                </div>
                            @endpush
                        @endif

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
        <div class="bg-white rounded-2xl p-6 border border-slate-100 shadow-sm mt-6 lg:mt-0">
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
                            <div class="w-8 h-8 rounded-full {{ $color }} flex items-center justify-center text-xs font-black shadow-sm">
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

    {{-- SCRIPT UNTUK MODAL STRUK --}}
    <script>
        function openStruk(id) {
            const modal = document.getElementById('modal-struk-' + id);
            const content = document.getElementById('modal-content-' + id);
            
            modal.classList.remove('hidden');
            void modal.offsetWidth; 
            
            modal.classList.remove('opacity-0');
            content.classList.remove('scale-95');
            content.classList.add('scale-100');
        }

        function closeStruk(id) {
            const modal = document.getElementById('modal-struk-' + id);
            const content = document.getElementById('modal-content-' + id);
            
            modal.classList.add('opacity-0');
            content.classList.remove('scale-100');
            content.classList.add('scale-95');
            
            setTimeout(() => {
                modal.classList.add('hidden');
            }, 300);
        }
    </script>
    
@endsection