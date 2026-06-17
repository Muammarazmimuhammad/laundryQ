@extends('layouts.dashboard')

@section('title', 'Riwayat Pesanan Saya')

@section('content')

@php
    $statusStyles = [
        'Menunggu Antrean' => ['badge' => 'bg-amber-50 text-amber-600 border-amber-200', 'dot' => 'bg-amber-500', 'chip' => 'bg-amber-500'],
        'Diterima'         => ['badge' => 'bg-blue-50 text-blue-600 border-blue-200', 'dot' => 'bg-blue-500', 'chip' => 'bg-blue-600'],
        'Proses Cuci'      => ['badge' => 'bg-indigo-50 text-indigo-600 border-indigo-200', 'dot' => 'bg-indigo-500', 'chip' => 'bg-indigo-500'],
        'Pengeringan'      => ['badge' => 'bg-cyan-50 text-cyan-600 border-cyan-200', 'dot' => 'bg-cyan-500', 'chip' => 'bg-cyan-500'],
        'Siap Diambil'     => ['badge' => 'bg-emerald-50 text-emerald-600 border-emerald-200', 'dot' => 'bg-emerald-500', 'chip' => 'bg-emerald-500'],
        'Selesai'          => ['badge' => 'bg-slate-100 text-slate-500 border-slate-200', 'dot' => 'bg-slate-400', 'chip' => 'bg-slate-500'],
    ];
    $default = ['badge' => 'bg-slate-50 text-slate-500 border-slate-200', 'dot' => 'bg-slate-400', 'chip' => 'bg-slate-500'];
@endphp

<div class="max-w-5xl mx-auto pb-12">

    {{-- ===== HEADER ===== --}}
    <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-4 mb-8">
        <div>
            <div class="inline-flex items-center gap-2 bg-blue-50 text-blue-600 text-[11px] font-black px-3 py-1.5 rounded-full border border-blue-100 mb-3 uppercase tracking-widest">
                <span class="w-1.5 h-1.5 bg-blue-500 rounded-full animate-pulse"></span>
                Transparansi Real-Time
            </div>
            <h1 class="text-3xl font-black text-slate-800 tracking-tight">
                Lacak <span class="text-blue-600">Pesanan Saya</span>
            </h1>
            <p class="text-slate-500 mt-1 text-sm">Pantau setiap tahap pencucian pakaianmu langsung dari sini.</p>
        </div>

        <a href="{{ route('booking.create') }}" class="inline-flex items-center justify-center gap-2 bg-blue-600 text-white px-5 py-3 rounded-xl font-bold text-sm shadow-sm shadow-blue-200 hover:bg-blue-700 transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"></path></svg>
            Buat Pesanan Baru
        </a>
    </div>

    {{-- ===== LIST ===== --}}
    <div class="space-y-5">
        @if($bookings->isEmpty())
            <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-16 text-center flex flex-col items-center bg-gradient-to-b from-blue-50/40 to-white">
                <div class="w-16 h-16 rounded-2xl bg-blue-50 border border-blue-100 flex items-center justify-center mb-4">
                    <svg class="w-8 h-8 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                </div>
                <h3 class="text-lg font-black text-slate-800 mb-1">Belum Ada Pesanan</h3>
                <p class="text-slate-400 text-sm max-w-sm mx-auto">Kamu belum memiliki riwayat pesanan cucian. Yuk, amankan slot antreanmu sekarang juga!</p>
            </div>
        @else
            @foreach($bookings as $booking)
                @php $style = $statusStyles[$booking->status] ?? $default; @endphp

                <div class="bg-white rounded-2xl border border-slate-100 shadow-sm hover:shadow-md transition-shadow overflow-hidden">

                    {{-- header card --}}
                    <div class="flex flex-col sm:flex-row justify-between sm:items-center gap-4 p-6 border-b border-slate-100 bg-gradient-to-r from-blue-50/50 to-transparent">
                        <div class="flex items-center gap-4">
                            <div class="w-11 h-11 rounded-xl {{ $style['chip'] }} flex items-center justify-center text-white shadow-md shadow-slate-200 shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                            </div>
                            <div>
                                <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-0.5">Kode Booking</p>
                                <h2 class="text-xl font-black text-slate-800 tracking-tight">{{ $booking->booking_code }}</h2>
                                <div class="flex items-center gap-2 mt-1.5">
                                    <span class="text-xs font-bold text-slate-600 bg-slate-100 px-2 py-0.5 rounded-md">{{ $booking->service->service_name ?? 'Layanan Tidak Diketahui' }}</span>
                                    <span class="text-slate-300">•</span>
                                    <span class="text-xs font-black text-slate-800">Rp{{ number_format($booking->total_price, 0, ',', '.') }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-row sm:flex-col items-center sm:items-end justify-between sm:justify-center gap-2">
                            <span class="inline-flex items-center gap-1.5 text-xs font-bold px-3 py-1.5 rounded-full border {{ $style['badge'] }}">
                                <span class="w-1.5 h-1.5 rounded-full bg-current opacity-60"></span>
                                {{ $booking->status }}
                            </span>
                            <p class="text-xs font-bold text-slate-500 bg-slate-50 border border-slate-100 px-3 py-1 rounded-lg">Berat: <span class="text-slate-800">{{ $booking->weight }} Kg</span></p>
                        </div>
                    </div>

                    {{-- timeline --}}
                    <div class="p-6">
                        @if($booking->trackingLogs->isEmpty())
                            <div class="text-sm text-slate-400 italic bg-slate-50 p-4 rounded-xl border border-slate-100">
                                Cucianmu belum diserahkan ke outlet / belum ada riwayat pemrosesan.
                            </div>
                        @else
                            <div class="relative border-l-2 border-slate-100 ml-4 pl-8 space-y-7">
                                @foreach($booking->trackingLogs as $index => $log)
                                    @php $logStyle = $statusStyles[$log->status] ?? $default; @endphp
                                    <div class="relative">
                                        @if($index === 0)
                                            <span class="absolute flex items-center justify-center w-6 h-6 rounded-full -left-[45px] ring-4 ring-white {{ $logStyle['chip'] }} shadow-md shadow-slate-200">
                                                @if($log->status === 'Selesai')
                                                    <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>
                                                @else
                                                    <span class="w-2 h-2 bg-white rounded-full animate-pulse"></span>
                                                @endif
                                            </span>
                                        @else
                                            <span class="absolute flex items-center justify-center w-4 h-4 rounded-full -left-[41px] top-1 ring-4 ring-white {{ $logStyle['dot'] }} opacity-40"></span>
                                        @endif

                                        <div>
                                            <h3 class="flex items-center gap-2 text-sm sm:text-base font-black tracking-tight {{ $index === 0 ? 'text-slate-800' : 'text-slate-400' }}">
                                                {{ $log->status }}
                                                @if($index === 0)
                                                    <span class="px-2 py-0.5 bg-blue-50 text-blue-600 text-[10px] rounded border border-blue-100 uppercase tracking-widest font-bold">Terbaru</span>
                                                @endif
                                            </h3>
                                            <p class="text-xs sm:text-sm mt-1 leading-relaxed {{ $index === 0 ? 'text-slate-600 font-medium' : 'text-slate-400' }}">
                                                {{ $log->description }}
                                            </p>
                                            @if(isset($log->created_at))
                                                <p class="text-[10px] text-slate-300 font-bold mt-1.5 uppercase tracking-wider">
                                                    {{ \Carbon\Carbon::parse($log->created_at)->diffForHumans() }}
                                                </p>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>

                </div>
            @endforeach
        @endif
    </div>
</div>

@endsection