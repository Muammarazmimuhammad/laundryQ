@extends('layouts.dashboard') @section('title', 'Riwayat Pesanan - Admin')

@section('content')
    {{-- ===== HEADER ===== --}}
    <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-4 mb-8">
        <div>
            <div class="inline-flex items-center gap-2 bg-slate-100 text-slate-600 text-[11px] font-black px-3 py-1.5 rounded-full border border-slate-200 mb-3 uppercase tracking-widest">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                Arsip Data
            </div>
            <h1 class="text-3xl font-black text-slate-800 tracking-tight">Riwayat Pesanan Selesai</h1>
            <p class="text-slate-500 mt-1 text-sm">Kumpulan data cucian yang sudah selesai atau diarsipkan.</p>
        </div>
    </div>

    {{-- ===== TABEL RIWAYAT ===== --}}
    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
        <div class="p-6 border-b border-slate-100 flex justify-between items-center bg-slate-50/50">
            <h2 class="text-lg font-bold text-slate-800">Daftar Arsip</h2>
        </div>
        
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 text-slate-400 text-xs uppercase tracking-widest border-b border-slate-100">
                        <th class="p-4 font-black">No. Pesanan</th>
                        <th class="p-4 font-black">Tanggal Selesai</th>
                        <th class="p-4 font-black">Pelanggan</th>
                        <th class="p-4 font-black">Layanan</th>
                        <th class="p-4 font-black">Total</th>
                        <th class="p-4 font-black text-center">Status</th>
                    </tr>
                </thead>
                <tbody class="text-sm font-medium text-slate-600 divide-y divide-slate-50">
                    @forelse($riwayats as $item)
                        <tr class="hover:bg-slate-50/80 transition-colors">
                            <td class="p-4 font-bold text-slate-800">#{{ $item->booking_code }}</td>
                            <td class="p-4">{{ \Carbon\Carbon::parse($item->updated_at)->format('d M Y, H:i') }}</td>
                            <td class="p-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-black text-xs uppercase">
                                        {{ substr($item->user->name ?? 'U', 0, 1) }}
                                    </div>
                                    <span class="font-bold text-slate-800">{{ $item->user->name ?? 'Pelanggan' }}</span>
                                </div>
                            </td>
                            <td class="p-4 text-blue-600 font-bold">{{ $item->service->service_name ?? 'Layanan Laundry' }}</td>
                            <td class="p-4 font-black text-emerald-600">Rp{{ number_format($item->total_price ?? 0, 0, ',', '.') }}</td>
                            <td class="p-4 text-center">
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-slate-100 text-slate-500 border border-slate-200">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path></svg>
                                    Diarsipkan
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="p-8 text-center text-slate-400 font-medium">
                                Belum ada riwayat pesanan yang diarsipkan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection