@extends('layouts.dashboard')

@section('title', 'Buat Pesanan Baru')

@section('content')
<div class="max-w-4xl mx-auto relative mt-4">

    <div class="absolute top-20 left-10 w-72 h-72 bg-blue-500/30 rounded-full blur-[80px] pointer-events-none z-0"></div>
    <div class="absolute bottom-10 right-10 w-80 h-80 bg-cyan-400/20 rounded-full blur-[100px] pointer-events-none z-0"></div>

    <div class="text-center mb-10 relative z-10">
        <span class="inline-flex items-center gap-2 py-1.5 px-4 rounded-full bg-blue-100 border border-blue-200 text-blue-700 text-xs font-black uppercase tracking-widest mb-4 shadow-sm">
            <span class="w-2 h-2 rounded-full bg-blue-600 animate-pulse"></span>
            Reservasi Kilat
        </span>
        <h1 class="text-4xl md:text-5xl font-black text-slate-900 tracking-tight mb-3">
            Amankan Slot <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-cyan-500">Antreanmu</span>
        </h1>
        <p class="text-slate-500 font-medium max-w-lg mx-auto">
            Pilih paket layanan dan jadwal untuk drop-off pakaian kotormu hari ini tanpa perlu repot antre di lokasi.
        </p>
    </div>

    <div class="relative z-10 bg-white/90 backdrop-blur-xl p-8 md:p-10 rounded-[2.5rem] shadow-2xl shadow-blue-900/10 border border-white overflow-hidden mb-10 ring-1 ring-blue-50">
        
        <div class="absolute top-0 left-0 w-full h-1.5 bg-gradient-to-r from-blue-600 to-cyan-400"></div>

        @if(session('success'))
            <div class="bg-emerald-50 border border-emerald-100 p-4 rounded-2xl mb-8 flex items-start gap-4 shadow-sm">
                <div class="bg-emerald-100 text-emerald-600 p-2 rounded-xl shrink-0 mt-0.5">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                </div>
                <div>
                    <h4 class="text-emerald-800 font-bold">Berhasil!</h4>
                    <p class="text-emerald-600 text-sm font-medium mt-1">{{ session('success') }}</p>
                </div>
            </div>
        @endif

        @if(session('error'))
            <div class="bg-rose-50 border border-rose-100 p-4 rounded-2xl mb-8 flex items-start gap-4 shadow-sm">
                <div class="bg-rose-100 text-rose-600 p-2 rounded-xl shrink-0 mt-0.5">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <div>
                    <h4 class="text-rose-800 font-bold">Oops, ada masalah!</h4>
                    <p class="text-rose-600 text-sm font-medium mt-1">{{ session('error') }}</p>
                </div>
            </div>
        @endif

        <form action="{{ route('booking.store') }}" method="POST">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-10">
                
                <div class="space-y-3">
                    <label class="block text-xs font-black text-blue-900 uppercase tracking-widest pl-1">Paket Layanan</label>
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none text-blue-400 group-focus-within:text-blue-600 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                        </div>
                        <select name="service_id" class="w-full appearance-none border-2 border-blue-100 bg-blue-50/30 text-blue-900 font-bold py-4 pl-14 pr-10 rounded-2xl focus:bg-white focus:ring-4 focus:ring-blue-500/20 focus:border-blue-500 hover:border-blue-300 transition-all cursor-pointer outline-none shadow-sm" required>
                            <option value="" class="text-gray-400 font-medium">-- Pilih Jenis Paket --</option>
                            @foreach($services as $service)
                               <option value="{{ $paket->id }}">
                                    {{ $paket->service_name }} (Rp{{ $paket->price }}/kg)
                                </option>
                            @endforeach
                        </select>
                        <div class="absolute inset-y-0 right-0 pr-5 flex items-center pointer-events-none text-blue-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </div>
                    </div>
                </div>

                <div class="space-y-3">
                    <label class="block text-xs font-black text-blue-900 uppercase tracking-widest pl-1">Jadwal Kedatangan</label>
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none text-blue-400 group-focus-within:text-blue-600 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        </div>
                        <select name="slot_id" class="w-full appearance-none border-2 border-blue-100 bg-blue-50/30 text-blue-900 font-bold py-4 pl-14 pr-10 rounded-2xl focus:bg-white focus:ring-4 focus:ring-blue-500/20 focus:border-blue-500 hover:border-blue-300 transition-all cursor-pointer outline-none shadow-sm" required>
                            <option value="" class="text-gray-400 font-medium">-- Pilih Jam --</option>
                            @foreach($slots as $slot)
                                <option value="{{ $slot->id }}">
                                    {{ \Carbon\Carbon::parse($slot->available_date)->translatedFormat('d M') }} | {{ $slot->time_slot }} 
                                    (Sisa: {{ $slot->max_quota - $slot->current_quota }})
                                </option>
                            @endforeach
                        </select>
                        <div class="absolute inset-y-0 right-0 pr-5 flex items-center pointer-events-none text-blue-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </div>
                    </div>
                </div>

            </div>

            <div class="flex flex-col lg:flex-row items-center justify-between gap-6 pt-8 border-t border-blue-50">
                
                <button type="submit" class="w-full lg:w-auto px-10 py-4 bg-gradient-to-r from-blue-600 to-blue-500 text-white font-black rounded-xl shadow-xl shadow-blue-600/30 hover:shadow-blue-600/50 hover:-translate-y-1 transition-all flex items-center justify-center gap-2 group">
                    Konfirmasi Pesanan
                    <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </button>

                <div class="flex items-start gap-3 bg-gradient-to-r from-blue-50 to-blue-100/50 p-4 rounded-xl border border-blue-200/60 max-w-md w-full">
                    <div class="bg-blue-200/50 text-blue-700 p-1.5 rounded-lg shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <p class="text-xs text-blue-900 font-medium leading-relaxed mt-0.5">
                        Pastikan datang ke outlet membawa pakaian kotor <span class="font-bold bg-blue-200 px-1 rounded">sesuai rentang waktu</span> yang dipilih agar langsung masuk mesin cuci.
                    </p>
                </div>

            </div>

        </form>
    </div>

</div>
@endsection