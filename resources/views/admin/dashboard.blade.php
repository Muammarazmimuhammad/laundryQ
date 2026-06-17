@extends('layouts.dashboard')

@section('title', 'Dashboard Admin')

@section('content')

    @if(session('success'))
        <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl mb-6 shadow-sm flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            <span class="font-medium">{{ session('success') }}</span>
        </div>
    @endif

    @php
        $total   = $bookings->count();
        $menunggu = $bookings->where('status', 'Menunggu Antrean')->count();
        $proses   = $bookings->whereIn('status', ['Diterima', 'Proses Cuci', 'Pengeringan'])->count();
        $siap     = $bookings->where('status', 'Siap Diambil')->count();
        $revenue  = $bookings->sum('total_price');

        $statusStyles = [
            'Menunggu Antrean' => 'bg-amber-50 text-amber-600 border-amber-200',
            'Diterima'         => 'bg-blue-50 text-blue-600 border-blue-200',
            'Proses Cuci'      => 'bg-indigo-50 text-indigo-600 border-indigo-200',
            'Pengeringan'      => 'bg-cyan-50 text-cyan-600 border-cyan-200',
            'Siap Diambil'     => 'bg-emerald-50 text-emerald-600 border-emerald-200',
            'Selesai'          => 'bg-slate-100 text-slate-500 border-slate-200',
        ];
    @endphp

    {{-- ===== HEADER ===== --}}
    <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-4 mb-8">
        <div>
            <div class="inline-flex items-center gap-2 bg-blue-50 text-blue-600 text-[11px] font-black px-3 py-1.5 rounded-full border border-blue-100 mb-3 uppercase tracking-widest">
                <span class="w-1.5 h-1.5 bg-blue-500 rounded-full animate-pulse"></span>
                Panel Admin
            </div>
            <h1 class="text-3xl font-black text-slate-800 tracking-tight">Kelola <span class="text-blue-600">Antrean</span> Laundry</h1>
            <p class="text-slate-500 mt-1 text-sm">Pantau dan perbarui status pesanan pelanggan secara real-time.</p>
        </div>
    </div>

    {{-- ===== STAT CARDS ===== --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">

        <div class="bg-white rounded-2xl p-5 border border-slate-100 shadow-sm hover:shadow-md transition-shadow relative overflow-hidden">
            <div class="absolute -right-6 -top-6 w-24 h-24 bg-blue-50 rounded-full"></div>
            <div class="relative z-10">
                <div class="w-10 h-10 rounded-xl bg-blue-600 flex items-center justify-center text-white mb-3 shadow-md shadow-blue-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                </div>
                <p class="text-2xl font-black text-slate-800">{{ $total }}</p>
                <p class="text-xs font-bold text-slate-400 mt-1">Total Antrean</p>
            </div>
        </div>

        <div class="bg-white rounded-2xl p-5 border border-slate-100 shadow-sm hover:shadow-md transition-shadow relative overflow-hidden">
            <div class="absolute -right-6 -top-6 w-24 h-24 bg-amber-50 rounded-full"></div>
            <div class="relative z-10">
                <div class="w-10 h-10 rounded-xl bg-amber-500 flex items-center justify-center text-white mb-3 shadow-md shadow-amber-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <p class="text-2xl font-black text-slate-800">{{ $menunggu }}</p>
                <p class="text-xs font-bold text-slate-400 mt-1">Menunggu Konfirmasi</p>
            </div>
        </div>

        <div class="bg-white rounded-2xl p-5 border border-slate-100 shadow-sm hover:shadow-md transition-shadow relative overflow-hidden">
            <div class="absolute -right-6 -top-6 w-24 h-24 bg-cyan-50 rounded-full"></div>
            <div class="relative z-10">
                <div class="w-10 h-10 rounded-xl bg-cyan-500 flex items-center justify-center text-white mb-3 shadow-md shadow-cyan-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                </div>
                <p class="text-2xl font-black text-slate-800">{{ $proses }}</p>
                <p class="text-xs font-bold text-slate-400 mt-1">Sedang Diproses</p>
            </div>
        </div>

        <div class="bg-white rounded-2xl p-5 border border-slate-100 shadow-sm hover:shadow-md transition-shadow relative overflow-hidden">
            <div class="absolute -right-6 -top-6 w-24 h-24 bg-emerald-50 rounded-full"></div>
            <div class="relative z-10">
                <div class="w-10 h-10 rounded-xl bg-emerald-500 flex items-center justify-center text-white mb-3 shadow-md shadow-emerald-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path></svg>
                </div>
                <p class="text-2xl font-black text-slate-800">Rp{{ number_format($revenue, 0, ',', '.') }}</p>
                <p class="text-xs font-bold text-slate-400 mt-1">Total Pendapatan</p>
            </div>
        </div>

    </div>

    {{-- ===== TABLE ===== --}}
    <div class="bg-white rounded-2xl overflow-hidden border border-slate-100 shadow-sm">
        <div class="p-6 border-b border-slate-100 flex flex-col sm:flex-row sm:justify-between sm:items-center gap-3 bg-gradient-to-r from-blue-50/60 to-transparent">
            <div>
                <h3 class="text-lg font-black text-slate-800">Daftar Antrean Masuk</h3>
                <p class="text-xs text-slate-400 mt-0.5">{{ $total }} pesanan tercatat dalam daftar ini</p>
            </div>
            @if($siap > 0)
                <span class="inline-flex items-center gap-2 text-xs font-bold text-emerald-600 bg-emerald-50 border border-emerald-200 px-3 py-1.5 rounded-full self-start sm:self-auto">
                    <span class="w-1.5 h-1.5 bg-emerald-500 rounded-full"></span>
                    {{ $siap }} siap diambil
                </span>
            @endif
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full leading-normal">
                <thead>
                    <tr>
                        <th class="px-6 py-4 border-b border-slate-100 bg-white text-left text-[11px] font-black text-slate-400 uppercase tracking-widest">Kode Booking</th>
                        <th class="px-6 py-4 border-b border-slate-100 bg-white text-left text-[11px] font-black text-slate-400 uppercase tracking-widest">Tanggal Masuk</th>
                        <th class="px-6 py-4 border-b border-slate-100 bg-white text-left text-[11px] font-black text-slate-400 uppercase tracking-widest">Jadwal Antrean</th>
                        <th class="px-6 py-4 border-b border-slate-100 bg-white text-left text-[11px] font-black text-slate-400 uppercase tracking-widest">Pelanggan</th>
                        <th class="px-6 py-4 border-b border-slate-100 bg-white text-left text-[11px] font-black text-slate-400 uppercase tracking-widest">Layanan</th>
                        <th class="px-6 py-4 border-b border-slate-100 bg-white text-left text-[11px] font-black text-slate-400 uppercase tracking-widest">Status</th>
                        <th class="px-6 py-4 border-b border-slate-100 bg-white text-left text-[11px] font-black text-slate-400 uppercase tracking-widest">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bookings as $booking)
                    <tr class="hover:bg-blue-50/30 transition-colors group">
                        <td class="py-5 px-6 whitespace-nowrap border-b border-slate-50">
                            <span class="text-sm font-extrabold text-gray-900">{{ $booking->booking_code }}</span>
                        </td>

                        <td class="py-5 px-6 whitespace-nowrap border-b border-slate-50">
                            <span class="text-xs text-slate-600 font-medium flex items-center gap-1.5">
                                <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                {{ \Carbon\Carbon::parse($booking->created_at)->translatedFormat('d M Y, H:i') }}
                            </span>
                        </td>

                        <td class="py-5 px-6 whitespace-nowrap border-b border-slate-50">
                            <span class="text-xs text-slate-600 font-medium flex items-center gap-1.5">
                                <svg class="w-4 h-4 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                {{ $booking->slot->time_slot ?? 'N/A' }}
                            </span>
                        </td>

                        <td class="px-6 py-5 border-b border-slate-50 text-sm">
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-blue-500 to-cyan-400 flex items-center justify-center text-white font-black text-xs shadow-sm shrink-0">
                                    {{ strtoupper(substr($booking->user->name ?? 'D', 0, 1)) }}
                                </div>
                                <p class="text-slate-800 whitespace-no-wrap font-bold">{{ $booking->user->name ?? 'Dummy User' }}</p>
                            </div>
                        </td>

                        <td class="px-6 py-5 border-b border-slate-50 text-sm">
                            <p class="text-slate-700 whitespace-no-wrap font-medium">{{ $booking->service->service_name ?? 'N/A' }}</p>
                            <p class="text-blue-600 text-sm font-black mt-1">Rp{{ number_format($booking->total_price, 0, ',', '.') }}</p>
                        </td>

                        <td class="px-6 py-5 border-b border-slate-50 text-sm">
                            <span class="inline-flex items-center gap-1.5 text-xs font-bold px-3 py-1.5 rounded-full border {{ $statusStyles[$booking->status] ?? 'bg-slate-50 text-slate-500 border-slate-200' }}">
                                <span class="w-1.5 h-1.5 rounded-full bg-current opacity-60"></span>
                                {{ $booking->status }}
                            </span>
                        </td>

                        <td class="px-6 py-5 border-b border-slate-50 text-sm">
                            <div class="flex items-center gap-3 opacity-90 group-hover:opacity-100 transition-opacity">
                                <form action="{{ route('admin.booking.update', $booking->id) }}" method="POST" class="flex items-center gap-2 bg-slate-50 p-1.5 rounded-xl border border-slate-200">
                                    @csrf
                                    <input type="number" step="0.1" name="weight" value="{{ $booking->weight }}" placeholder="Berat (Kg)" class="w-20 border border-slate-300 p-1.5 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none text-center font-medium" required>

                                    <select name="status" class="border border-slate-300 p-1.5 rounded-lg text-sm font-medium focus:ring-2 focus:ring-blue-500 outline-none bg-white">
                                        @php $statuses = ['Menunggu Antrean', 'Diterima', 'Proses Cuci', 'Pengeringan', 'Siap Diambil', 'Selesai']; @endphp
                                        @foreach($statuses as $status)
                                            <option value="{{ $status }}" {{ $booking->status == $status ? 'selected' : '' }}>{{ $status }}</option>
                                        @endforeach
                                    </select>

                                    <button type="submit" class="bg-blue-600 text-white px-3 py-1.5 rounded-lg text-sm font-bold hover:bg-blue-700 transition shadow-sm shadow-blue-200">Update</button>
                                </form>

                                <form action="{{ route('booking.destroy', $booking->id) }}" method="POST" onsubmit="return confirm('Yakin mau menghapus pesanan ini? Data yang dihapus tidak bisa dikembalikan.');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" title="Hapus Pesanan" class="bg-white text-rose-500 border border-rose-200 hover:bg-rose-500 hover:text-white hover:border-rose-500 p-2 rounded-xl transition shadow-sm flex items-center justify-center">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @if($bookings->isEmpty())
            <div class="p-16 text-center flex flex-col items-center justify-center bg-gradient-to-b from-blue-50/40 to-white">
                <div class="w-16 h-16 rounded-2xl bg-blue-50 border border-blue-100 flex items-center justify-center mb-4">
                    <svg class="w-8 h-8 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0l-2.5 2.5M4 13l2.5 2.5M12 13v4"></path></svg>
                </div>
                <p class="text-slate-600 font-bold text-lg">Belum ada antrean masuk saat ini.</p>
                <p class="text-slate-400 text-sm mt-1">Pesanan pelanggan akan otomatis muncul di sini.</p>
            </div>
        @endif
    </div>

@endsection