@extends('layouts.layout')

@section('content')

<!-- ============================================================
     DESIGN TOKENS (used consistently across every section below)
     - Section spacing : py-24
     - Section bg       : alternates bg-white / bg-slate-50, all with bg-grid-pattern
     - Section divider  : border-t border-gray-100 (skipped only on hero)
     - Ambient blobs    : two corner blobs, 600px, blur-120px, blue-100/cyan-50
     - Eyebrow badge    : pill, white bg, blue-100 border, blue-600 text, pulsing dot
     - Card radius      : rounded-3xl (pricing/small cards) · rounded-[2rem] (feature cards)
                           rounded-[2.5rem] (hero imagery / large media)
     - Card shadow      : shadow-xl shadow-blue-900/5 → hover:shadow-2xl shadow-blue-900/10
     - Primary CTA      : rounded-2xl, font-bold/black, gradient or solid blue, shadow-lg
     ============================================================ -->
<style>
    /* Pola garis halus tipis (grid pattern) */
    .bg-grid-pattern {
        background-size: 40px 40px;
        background-image:
            linear-gradient(to right, rgba(59, 130, 246, 0.04) 2px, transparent 2px),
            linear-gradient(to bottom, rgba(59, 130, 246, 0.04) 2px, transparent 2px);
    }

    /* Bouncing sangat lambat untuk ikon baju */
    @keyframes bounce-slow {
        0%, 100% { transform: translateY(-5%); }
        50% { transform: translateY(5%); }
    }
    .animate-bounce-slow {
        animation: bounce-slow 4s ease-in-out infinite;
    }

    /* Floating card, animasi dengan delay berbeda */
    @keyframes float-1 {
        0%, 100% { transform: translateY(0px) rotate(0deg); }
        50% { transform: translateY(-8px) rotate(-1deg); }
    }
    @keyframes float-2 {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-12px); }
    }
    @keyframes float-3 {
        0%, 100% { transform: translateY(0px) rotate(0deg); }
        50% { transform: translateY(-6px) rotate(1deg); }
    }
    .anim-float-1 { animation: float-1 4s ease-in-out infinite; }
    .anim-float-2 { animation: float-2 5s ease-in-out infinite 1s; }
    .anim-float-3 { animation: float-3 4.5s ease-in-out infinite 0.5s; }

    /* Pulse animasi untuk keunggulan */
    @keyframes pulse-slow {
        0%, 100% { transform: scale(1); opacity: 0.5; }
        50% { transform: scale(1.15); opacity: 0.9; }
    }
    .animate-pulse-slow {
        animation: pulse-slow 3s ease-in-out infinite;
    }
</style>

<!-- ============================================================
     1. HERO SECTION
     ============================================================ -->
<section class="relative w-full h-[75vh] min-h-[500px] bg-gray-950 overflow-hidden group" id="hero-carousel">

    <!-- Slide 1 -->
    <div class="carousel-item absolute inset-0 transition-opacity duration-1000 ease-in-out opacity-100 z-10">
        <img src="{{ asset('img/carousel1.png') }}" alt="Laundry untuk Mahasiswa" class="carousel-bg w-full h-full object-cover opacity-50 scale-105 transition-transform duration-[10000ms] ease-out">
        <div class="absolute inset-0 bg-gradient-to-t from-gray-950 via-gray-900/60 to-transparent"></div>
        <div class="absolute inset-0 flex flex-col justify-end pb-24 md:pb-32">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
                <div class="carousel-text transform translate-y-0 opacity-100 transition-all duration-1000 delay-300 ease-out">
                    <span class="inline-block px-4 py-1.5 bg-blue-600/90 backdrop-blur-sm border border-blue-400/30 text-white text-xs font-bold uppercase tracking-widest rounded-full mb-4 shadow-lg">Solusi Mahasiswa &amp; Pekerja</span>
                    <h2 class="text-4xl md:text-6xl lg:text-7xl font-black text-white leading-[1.1] tracking-tight drop-shadow-2xl">
                        Sibuk Kuliah atau Kerja?<br>
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-cyan-300">Biar Kami Yang Cuci.</span>
                    </h2>
                    <div class="mt-8 flex gap-4">
                        <a href="{{ route('booking.create') }}" class="px-8 py-4 bg-white text-blue-600 font-bold rounded-2xl shadow-lg hover:bg-gray-50 hover:-translate-y-1 transition-all flex items-center gap-2">
                            Pesan Sekarang
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Slide 2 -->
    <div class="carousel-item absolute inset-0 transition-opacity duration-1000 ease-in-out opacity-0 z-0">
        <img src="{{ asset('img/carousel2.png') }}" alt="Booking Online" class="carousel-bg w-full h-full object-cover opacity-50 scale-100 transition-transform duration-[10000ms] ease-out">
        <div class="absolute inset-0 bg-gradient-to-t from-gray-950 via-gray-900/60 to-transparent"></div>
        <div class="absolute inset-0 flex flex-col justify-end pb-24 md:pb-32">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
                <div class="carousel-text transform translate-y-8 opacity-0 transition-all duration-1000 delay-300 ease-out">
                    <span class="inline-block px-4 py-1.5 bg-cyan-500/90 backdrop-blur-sm border border-cyan-400/30 text-white text-xs font-bold uppercase tracking-widest rounded-full mb-4 shadow-lg">Booking Online</span>
                    <h2 class="text-4xl md:text-6xl lg:text-7xl font-black text-white leading-[1.1] tracking-tight drop-shadow-2xl">
                        Pangkas Waktu Antre<br>
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-300 to-emerald-300">Hingga 70%.</span>
                    </h2>
                    <div class="mt-8 flex gap-4">
                        <a href="{{ route('booking.create') }}" class="px-8 py-4 bg-cyan-500 text-white font-bold rounded-2xl shadow-lg shadow-cyan-500/30 hover:bg-cyan-400 hover:-translate-y-1 transition-all">
                            Amankan Kuota Hari Ini
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Slide 3 -->
    <div class="carousel-item absolute inset-0 transition-opacity duration-1000 ease-in-out opacity-0 z-0">
        <img src="{{ asset('img/carousel3.png') }}" alt="Tracking Cucian" class="carousel-bg w-full h-full object-cover opacity-50 scale-100 transition-transform duration-[10000ms] ease-out">
        <div class="absolute inset-0 bg-gradient-to-t from-gray-950 via-gray-900/60 to-transparent"></div>
        <div class="absolute inset-0 flex flex-col justify-end pb-24 md:pb-32">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
                <div class="carousel-text transform translate-y-8 opacity-0 transition-all duration-1000 delay-300 ease-out">
                    <span class="inline-block px-4 py-1.5 bg-emerald-500/90 backdrop-blur-sm border border-emerald-400/30 text-white text-xs font-bold uppercase tracking-widest rounded-full mb-4 shadow-lg">Transparansi 100%</span>
                    <h2 class="text-4xl md:text-6xl lg:text-7xl font-black text-white leading-[1.1] tracking-tight drop-shadow-2xl">
                        Pantau Status Cucian<br>
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-300 to-teal-300">Secara Real-time.</span>
                    </h2>
                    <div class="mt-8 flex gap-4">
                        <a href="#keunggulan" class="px-8 py-4 bg-white/10 backdrop-blur-md border border-white/30 text-white font-bold rounded-2xl hover:bg-white/20 transition-all">
                            Pelajari Sistem Kami
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Navigasi carousel -->
    <button id="prevBtn" class="absolute left-4 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full bg-white/10 backdrop-blur-md border border-white/20 text-white flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all hover:bg-white/20 hover:scale-110 z-20">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
    </button>
    <button id="nextBtn" class="absolute right-4 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full bg-white/10 backdrop-blur-md border border-white/20 text-white flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all hover:bg-white/20 hover:scale-110 z-20">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
    </button>

    <!-- Indikator carousel -->
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex gap-3 z-20">
        <button class="carousel-dot relative w-16 h-1.5 rounded-full bg-white/30 overflow-hidden transition-all group-dot active">
            <span class="absolute inset-0 bg-blue-500 w-full rounded-full progress-bar"></span>
        </button>
        <button class="carousel-dot relative w-16 h-1.5 rounded-full bg-white/30 overflow-hidden transition-all group-dot">
            <span class="absolute inset-0 bg-cyan-500 w-0 rounded-full progress-bar transition-all duration-[5000ms] ease-linear"></span>
        </button>
        <button class="carousel-dot relative w-16 h-1.5 rounded-full bg-white/30 overflow-hidden transition-all group-dot">
            <span class="absolute inset-0 bg-emerald-500 w-0 rounded-full progress-bar transition-all duration-[5000ms] ease-linear"></span>
        </button>
    </div>
</section>

<!-- ============================================================
     2. INTRO SECTION  ·  bg-white
     ============================================================ -->
<section class="relative py-24 bg-white bg-grid-pattern overflow-hidden">
    <div class="absolute top-0 left-0 w-[600px] h-[600px] bg-blue-100/40 rounded-full blur-[120px] -translate-x-1/3 -translate-y-1/3 pointer-events-none"></div>
    <div class="absolute bottom-0 right-0 w-[600px] h-[600px] bg-cyan-50/50 rounded-full blur-[120px] translate-x-1/3 translate-y-1/3 pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid lg:grid-cols-12 gap-12 lg:gap-8 items-center">

            <div class="lg:col-span-6 space-y-8 text-center lg:text-left">
                <div class="inline-flex items-center gap-2 bg-white border border-blue-100 px-4 py-1.5 rounded-full text-blue-600 text-xs font-bold uppercase tracking-widest shadow-sm">
                    <span class="w-1.5 h-1.5 rounded-full bg-blue-500 animate-pulse"></span>
                    Revolusi Laundry Digital Indonesia
                </div>

                <h1 class="text-5xl lg:text-7xl font-black text-gray-950 tracking-tight leading-[1.1]">
                    Cucian Numpuk?<br>
                    Nyuci Tanpa <span class="text-blue-500">Antre Lama.</span>
                </h1>

                <p class="text-lg text-gray-500 max-w-lg mx-auto lg:mx-0 leading-relaxed font-medium">
                    Nikmati waktu luangmu tanpa harus antre berjam-jam di lokasi. Amankan slot cucianmu secara online, bawa pakaian kotor ke outlet kami, dan pantau status pengerjaannya secara real-time. Praktis, bersih, dan hemat waktu.
                </p>

                <div class="flex flex-wrap items-center justify-center lg:justify-start gap-4 pt-2">
                    <a href="{{ route('booking.create') }}" class="px-8 py-4 bg-blue-600 text-white font-bold rounded-2xl shadow-lg shadow-blue-600/30 hover:bg-blue-700 hover:-translate-y-1 transition-all flex items-center gap-2 group">
                        Mulai Reservasi
                        <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                    <a href="#layanan" class="px-8 py-4 bg-white text-gray-800 font-bold rounded-2xl shadow-sm border border-gray-200 hover:border-blue-300 hover:text-blue-600 hover:bg-blue-50 transition-all">
                        Lihat Harga
                    </a>
                </div>
            </div>

            <div class="lg:col-span-6 relative flex justify-center items-center mt-12 lg:mt-0">
                <div class="w-64 h-64 sm:w-80 sm:h-80 lg:w-[400px] lg:h-[400px] bg-gradient-to-br from-[#00A8FF] to-[#0055FF] rounded-[2.5rem] rotate-[-5deg] shadow-2xl relative flex items-center justify-center transition-transform hover:rotate-0 duration-700 z-10 group">
                    <div class="absolute inset-0 bg-white/5 rounded-[2.5rem] blur-md pointer-events-none"></div>
                    <div class="z-10 animate-bounce-slow text-8xl sm:text-9xl drop-shadow-2xl filter group-hover:scale-110 transition-transform duration-500">
                        👕
                    </div>
                </div>

                <div class="absolute -top-6 left-0 sm:-left-4 lg:-left-8 bg-white p-4 lg:px-5 lg:py-4 rounded-2xl shadow-xl border border-gray-100 flex items-center gap-4 anim-float-1 z-20">
                    <div class="w-10 h-10 bg-blue-50 text-blue-500 rounded-lg flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <div>
                        <p class="text-[10px] text-gray-400 font-bold uppercase tracking-wider">Efisiensi</p>
                        <p class="text-sm font-black text-gray-900">-70% Waktu Tunggu</p>
                    </div>
                </div>

                <div class="absolute top-1/2 -right-4 sm:-right-8 lg:-right-12 bg-white p-4 lg:px-5 lg:py-4 rounded-2xl shadow-xl border border-gray-100 flex items-center gap-4 anim-float-2 z-20">
                    <div class="w-10 h-10 bg-emerald-50 text-emerald-500 rounded-lg flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <div>
                        <p class="text-[10px] text-gray-400 font-bold uppercase tracking-wider">Status</p>
                        <p class="text-sm font-black text-gray-900">Cuci Selesai ✨</p>
                    </div>
                </div>

                <div class="absolute -bottom-8 left-4 lg:left-0 bg-white p-4 lg:px-5 lg:py-4 rounded-2xl shadow-xl border border-gray-100 flex items-center gap-4 anim-float-3 z-20">
                    <div class="w-10 h-10 bg-orange-50 text-orange-500 rounded-lg flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                    </div>
                    <div>
                        <p class="text-[10px] text-gray-400 font-bold uppercase tracking-wider">Sistem</p>
                        <p class="text-sm font-black text-gray-900">Kuota Terjadwal</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ============================================================
     3. CEK SLOT ANTREAN SECTION  ·  bg-slate-50
     ============================================================ -->
<section class="relative py-24 bg-slate-50 bg-grid-pattern overflow-hidden border-t border-gray-100">
    <div class="absolute top-0 left-0 w-[600px] h-[600px] bg-blue-100/40 rounded-full blur-[120px] -translate-x-1/3 -translate-y-1/3 pointer-events-none"></div>
    <div class="absolute bottom-0 right-0 w-[600px] h-[600px] bg-cyan-50/50 rounded-full blur-[120px] translate-x-1/3 translate-y-1/3 pointer-events-none"></div>

    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

        <div class="text-center max-w-3xl mx-auto mb-16 space-y-3">
            <div class="inline-flex items-center gap-2 bg-white border border-blue-100 px-4 py-1.5 rounded-full text-blue-600 text-xs font-bold uppercase tracking-widest shadow-sm">
                <span class="w-1.5 h-1.5 rounded-full bg-blue-500 animate-pulse"></span>
                Sistem Antrean Pintar
            </div>
            <h2 class="text-4xl md:text-5xl font-black text-gray-900 tracking-tight">
                Cek Slot &amp; <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-cyan-500">Reservasi Sekarang</span>
            </h2>
            <p class="text-lg text-gray-500">
                Pilih tanggal untuk melihat kuota mesin yang tersedia. Tak perlu repot antre panjang, amankan slot cucianmu dari mana saja.
            </p>
        </div>

        <!-- Widget utama (gambar & form bersatu) -->
        <div class="bg-white rounded-[2.5rem] shadow-2xl shadow-slate-200/50 border border-slate-100 p-4 sm:p-5 flex flex-col lg:flex-row gap-8 lg:gap-10 items-center">

            <!-- Sisi kiri: gambar -->
            <div class="w-full lg:w-5/12 h-[350px] lg:h-[480px] relative rounded-[2rem] overflow-hidden shrink-0 group shadow-inner">
                <img src="{{ asset('img/slot.jpg') }}" alt="LaundryQ Happy Customer" class="object-cover w-full h-full transform transition-transform duration-700 group-hover:scale-105">

                <div class="absolute inset-0 bg-gradient-to-t from-slate-900/70 via-slate-900/10 to-transparent pointer-events-none"></div>
                <div class="absolute bottom-6 left-6 right-6">
                    <div class="bg-white/20 backdrop-blur-md border border-white/30 rounded-2xl p-4 sm:p-5 text-white shadow-lg">
                        <p class="text-[10px] sm:text-xs font-black text-blue-200 uppercase tracking-widest mb-1.5">LaundryQ Hemat Waktu</p>
                        <p class="text-sm sm:text-base font-medium leading-snug text-slate-50">"Mencuci jadi super gampang karena slotnya sudah dipesan dari rumah!"</p>
                    </div>
                </div>
            </div>

            <!-- Sisi kanan: form interaktif -->
            <div class="w-full lg:w-7/12 px-4 sm:px-6 py-4 lg:py-6 flex flex-col justify-center">

                <!-- Input tanggal -->
                <div class="mb-8">
                    <label class="block text-xs font-black text-slate-500 uppercase tracking-widest mb-3">Pilih Tanggal Booking</label>
                    <div class="relative group/input">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none text-slate-400 group-focus-within/input:text-blue-500 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <input type="date" id="tanggal-cek" min="{{ date('Y-m-d') }}" onchange="handleCekSlot()"
                               class="w-full pl-12 pr-4 py-4 bg-slate-50 border border-slate-200 text-slate-700 font-bold rounded-2xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:bg-white hover:bg-slate-100 outline-none transition-all cursor-pointer shadow-sm">
                    </div>
                </div>

                <!-- Area tampilan hasil slot -->
                <div id="hasil-slot-container" class="space-y-4 hidden min-h-[180px]">
                    <label class="block text-xs font-black text-slate-500 uppercase tracking-widest mb-2">Jadwal yang Tersedia</label>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4" id="grid-slot-waktu"></div>
                </div>

                <!-- Tampilan default sebelum pilih tanggal -->
                <div id="placeholder-slot" class="border-2 border-dashed border-slate-200 bg-slate-50/70 rounded-2xl p-8 sm:p-10 text-center text-slate-400 font-medium text-sm flex flex-col items-center justify-center gap-3 transition-colors hover:border-slate-300 hover:bg-slate-50 min-h-[180px]">
                    <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center shadow-sm border border-slate-100">
                        <svg class="w-6 h-6 text-slate-300 animate-bounce mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <p class="max-w-xs mx-auto">Tentukan tanggal terlebih dahulu untuk menampilkan data mesin.</p>
                </div>

                <!-- Tombol aksi dinamis -->
                <div class="mt-8 border-t border-slate-100 pt-6">
                    @auth
                        <a href="{{ route('booking.create') }}" class="w-full inline-flex items-center justify-center gap-2 bg-gradient-to-r from-blue-600 to-cyan-500 text-white py-4 px-6 rounded-2xl font-black text-sm shadow-lg shadow-blue-500/30 hover:shadow-blue-500/50 hover:-translate-y-0.5 transition-all duration-300">
                            Amankan Slot Antreanmu Sekarang
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="w-full inline-flex items-center justify-center gap-2 bg-gradient-to-r from-blue-600 to-cyan-500 text-white py-4 px-6 rounded-2xl font-black text-sm shadow-lg shadow-blue-500/30 hover:shadow-blue-500/50 hover:-translate-y-0.5 transition-all duration-300 group">
                            Login Untuk Reservasi Jadwal
                            <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path></svg>
                        </a>
                    @endauth
                </div>

            </div>
        </div>

    </div>
</section>

<!-- ============================================================
     4. KEUNGGULAN SECTION  ·  bg-white
     ============================================================ -->
<section id="keunggulan" class="relative py-24 bg-white bg-grid-pattern overflow-hidden border-t border-gray-100">
    <div class="absolute top-0 left-0 w-[600px] h-[600px] bg-blue-100/40 rounded-full blur-[120px] -translate-x-1/3 -translate-y-1/3 pointer-events-none"></div>
    <div class="absolute bottom-0 right-0 w-[600px] h-[600px] bg-cyan-50/50 rounded-full blur-[120px] translate-x-1/3 translate-y-1/3 pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center max-w-3xl mx-auto mb-16 space-y-3">
            <div class="inline-flex items-center gap-2 bg-white border border-blue-100 px-4 py-1.5 rounded-full text-blue-600 text-xs font-bold uppercase tracking-widest shadow-sm">
                <span class="w-1.5 h-1.5 rounded-full bg-blue-500 animate-pulse"></span>
                Keunggulan Sistem Kami
            </div>
            <h2 class="text-4xl md:text-5xl font-black text-gray-900 tracking-tight">Mengapa Harus LaundryQ?</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

            <!-- Card 1: Booking Slot Harian -->
            <div class="flex flex-col bg-white rounded-[2rem] overflow-hidden border border-gray-100 shadow-xl shadow-blue-900/5 hover:-translate-y-2 hover:shadow-2xl hover:shadow-blue-900/10 transition-all duration-500 group">
                <div class="w-full h-[320px] overflow-hidden relative">
                    <img src="{{ asset('img/keunggulan1.png') }}" alt="Booking Slot Harian" class="w-full h-full object-cover object-top transform transition-transform duration-700 group-hover:scale-105">
                </div>
                <div class="p-8 flex-1 flex flex-col justify-start">
                    <h3 class="text-2xl font-black text-gray-900 mb-3 group-hover:text-blue-600 transition-colors">Booking Slot Harian</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">
                        Tinggalkan cara lama yang mengharuskan Anda datang dan antre. Dengan sistem booking online kami, pesanan slot waktu pengerjaan menjadi fleksibel. Kuota dibatasi otomatis.
                    </p>
                </div>
            </div>

            <!-- Card 2: Pantauan Real-Time -->
            <div class="flex flex-col bg-white rounded-[2rem] overflow-hidden border border-gray-100 shadow-xl shadow-blue-900/5 hover:-translate-y-2 hover:shadow-2xl hover:shadow-blue-900/10 transition-all duration-500 group">
                <div class="w-full h-[320px] overflow-hidden relative">
                    <img src="{{ asset('img/keunggulan2.png') }}" alt="Pantauan Real-Time" class="w-full h-full object-cover object-top transform transition-transform duration-700 group-hover:scale-105">
                </div>
                <div class="p-8 flex-1 flex flex-col justify-start">
                    <h3 class="text-2xl font-black text-gray-900 mb-3 group-hover:text-blue-600 transition-colors">Pantauan Real-Time</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">
                        Transparansi adalah kunci. Anda dapat melihat langsung jumlah antrean di dashboard dan melacak status cucian Anda dari tahap "Diterima" hingga "Selesai".
                    </p>
                </div>
            </div>

            <!-- Card 3: Sistem Notifikasi -->
            <div class="flex flex-col bg-white rounded-[2rem] overflow-hidden border border-gray-100 shadow-xl shadow-blue-900/5 hover:-translate-y-2 hover:shadow-2xl hover:shadow-blue-900/10 transition-all duration-500 group">
                <div class="w-full h-[320px] overflow-hidden relative">
                    <img src="{{ asset('img/keunggulan3.png') }}" alt="Sistem Notifikasi" class="w-full h-full object-cover object-top transform transition-transform duration-700 group-hover:scale-105">
                </div>
                <div class="p-8 flex-1 flex flex-col justify-start">
                    <h3 class="text-2xl font-black text-gray-900 mb-3 group-hover:text-blue-600 transition-colors">Sistem Notifikasi</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">
                        Tidak perlu lagi repot bolak-balik ke outlet atau sekadar mengirim pesan untuk menanyakan status. Sistem akan mengirimkan notifikasi otomatis.
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ============================================================
     5. TENTANG SECTION  ·  bg-slate-50
     ============================================================ -->
<section class="relative py-24 bg-slate-50 bg-grid-pattern overflow-hidden border-t border-gray-100">
    <div class="absolute top-0 right-0 w-[600px] h-[600px] bg-blue-100/40 rounded-full blur-[120px] translate-x-1/3 -translate-y-1/3 pointer-events-none"></div>
    <div class="absolute bottom-0 left-0 w-[600px] h-[600px] bg-cyan-50/50 rounded-full blur-[120px] -translate-x-1/3 translate-y-1/3 pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid lg:grid-cols-2 gap-16 items-center">

            <div class="space-y-8">
                <div>
                    <div class="inline-flex items-center gap-2 bg-white border border-blue-100 px-4 py-1.5 rounded-full text-blue-600 text-xs font-bold uppercase tracking-widest shadow-sm mb-4">
                        <span class="w-1.5 h-1.5 rounded-full bg-blue-500 animate-pulse"></span>
                        Tentang LaundryQ
                    </div>
                    <h2 class="text-3xl md:text-5xl font-black text-gray-900 tracking-tight leading-[1.15]">
                        Lebih Dari Sekadar Tempat Mencuci, Kami <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-cyan-500">Menghargai Waktumu.</span>
                    </h2>
                </div>

                <div class="space-y-4 text-gray-500 leading-relaxed font-medium text-sm sm:text-base">
                    <p>
                        Dulu, pergi ke tempat laundry berarti harus siap membuang waktu. Mengantre panjang di lokasi yang ramai, hingga ketidakpastian kapan cucian akan selesai diproses.
                    </p>
                    <p>
                        <strong class="text-gray-900">LaundryQ</strong> hadir untuk merevolusi kebiasaan lama tersebut. Kami adalah pionir digitalisasi antrean laundry. Dengan sistem cerdas kami, kamu memegang kendali penuh dengan mem-booking slot waktu pencucian secara online dari smartphone.
                    </p>
                    <p>
                        Tidak perlu lagi menunggu lama di ruko. Cukup amankan kuota, bawa (drop-off) pakaian kotormu ke outlet sesuai jadwal, lalu pantau progres pengerjaannya secara real-time. Cepat, transparan, dan sangat higienis.
                    </p>
                </div>

                <div class="pt-4 flex items-center gap-4">
                    <div class="w-14 h-14 bg-gradient-to-tr from-blue-600 to-cyan-500 rounded-full flex items-center justify-center shadow-lg text-white font-bold text-xl">
                        Q
                    </div>
                    <div class="text-sm">
                        <p class="font-black text-gray-900">Inovasi Tim Kurma</p>
                        <p class="text-blue-600 font-bold">Terbukti memangkas 70% waktu tunggu pelanggan.</p>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 relative">
                <div class="bg-white border border-gray-100 rounded-[2rem] p-8 shadow-xl shadow-blue-900/5 transform sm:translate-y-12 hover:-translate-y-2 transition-transform duration-300">
                    <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h4 class="text-lg font-black text-gray-900 mb-2">Bebas Antrean Fisik</h4>
                    <p class="text-sm text-gray-500 leading-relaxed">Pesan slot sebelum datang ke outlet. Tinggal letakkan cucian, dan kamu bisa langsung kembali beraktivitas.</p>
                </div>

                <div class="bg-gradient-to-br from-blue-600 to-cyan-500 rounded-[2rem] p-8 text-white shadow-2xl shadow-blue-500/20 transform hover:-translate-y-2 transition-transform duration-300 relative overflow-hidden">
                    <div class="absolute -right-6 -top-6 w-24 h-24 bg-white/10 rounded-full blur-xl"></div>
                    <div class="w-12 h-12 bg-white/20 backdrop-blur-sm text-white rounded-xl flex items-center justify-center mb-6 border border-white/30 relative z-10">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                    </div>
                    <h4 class="text-lg font-black text-white mb-2 relative z-10">1 Mesin 1 Pelanggan</h4>
                    <p class="text-sm text-blue-50 leading-relaxed relative z-10">Higienitas maksimal adalah standar kami. Pakaianmu tidak akan pernah dicampur dengan pakaian orang lain.</p>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ============================================================
     6. LAYANAN SECTION  ·  bg-white
     ============================================================ -->
<section id="layanan" class="relative py-24 bg-white bg-grid-pattern overflow-hidden border-t border-gray-100">
    <div class="absolute top-0 left-0 w-[600px] h-[600px] bg-blue-100/40 rounded-full blur-[120px] -translate-x-1/3 -translate-y-1/3 pointer-events-none"></div>
    <div class="absolute bottom-0 right-0 w-[600px] h-[600px] bg-cyan-50/50 rounded-full blur-[120px] translate-x-1/3 translate-y-1/3 pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center max-w-3xl mx-auto mb-16 space-y-3">
            <div class="inline-flex items-center gap-2 bg-white border border-blue-100 px-4 py-1.5 rounded-full text-blue-600 text-xs font-bold uppercase tracking-widest shadow-sm">
                <span class="w-1.5 h-1.5 rounded-full bg-blue-500 animate-pulse"></span>
                Transparan &amp; Terjangkau
            </div>
            <h2 class="text-4xl md:text-5xl font-black text-gray-950 tracking-tight">Pilih Layanan Sesuai Kebutuhan</h2>
            <p class="text-lg text-gray-500">Kualitas cucian setara hotel bintang lima, namun dengan harga yang tetap ramah di kantong mahasiswa.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto">

            <!-- Paket 1: Reguler -->
            <div class="bg-white rounded-3xl border border-gray-100 p-8 shadow-xl shadow-blue-900/5 hover:shadow-2xl hover:shadow-blue-900/10 hover:-translate-y-2 transition-all duration-300 flex flex-col justify-between group">
                <div>
                    <div class="w-14 h-14 bg-gray-50 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-blue-50 transition-colors">
                        <span class="text-2xl">🧺</span>
                    </div>
                    <span class="text-xs font-bold uppercase tracking-widest text-gray-400 block mb-2">Harian</span>
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">Reguler Kiloan</h3>
                    <p class="text-sm text-gray-500 mb-6 leading-relaxed">Solusi ekonomis untuk pakaian harianmu. Estimasi pengerjaan selesai dalam 2-3 hari.</p>

                    <div class="flex items-baseline gap-1 mb-8">
                        <span class="text-4xl font-black text-gray-900">Rp 8.000</span>
                        <span class="text-gray-500 font-medium">/ kg</span>
                    </div>

                    <ul class="space-y-4 text-sm text-gray-600 mb-8 font-medium">
                        <li class="flex items-center gap-3"><span class="text-blue-500 font-bold">✓</span> Setrika Uap Rapi</li>
                        <li class="flex items-center gap-3"><span class="text-blue-500 font-bold">✓</span> Parfum Premium</li>
                        <li class="flex items-center gap-3"><span class="text-blue-500 font-bold">✓</span> Notifikasi Selesai</li>
                    </ul>
                </div>
                <a href="{{ route('booking.create') }}" class="w-full text-center py-4 rounded-2xl border-2 border-gray-100 text-gray-700 font-bold group-hover:border-blue-600 group-hover:text-blue-600 transition-colors">
                    Pilih Reguler
                </a>
            </div>

            <!-- Paket 2: Express (highlighted) -->
            <div class="bg-gradient-to-b from-blue-600 to-[#0055FF] rounded-3xl border border-blue-500 p-8 shadow-2xl shadow-blue-600/30 hover:-translate-y-2 transition-all duration-300 flex flex-col justify-between relative transform scale-100 md:scale-105 z-10">
                <div class="absolute -top-4 left-1/2 -translate-x-1/2 bg-gradient-to-r from-cyan-400 to-blue-400 text-white px-6 py-1.5 rounded-full text-xs font-black uppercase tracking-widest shadow-lg">
                    Paling Laris 🔥
                </div>
                <div>
                    <div class="w-14 h-14 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center mb-6">
                        <span class="text-2xl">⚡</span>
                    </div>
                    <span class="text-xs font-bold uppercase tracking-widest text-blue-200 block mb-2">Butuh Cepat</span>
                    <h3 class="text-2xl font-bold text-white mb-2">Express Kiloan</h3>
                    <p class="text-sm text-blue-100 mb-6 leading-relaxed">Prioritas antrean mesin. Pakaian kotor langsung dicuci dan maksimal 24 jam selesai.</p>

                    <div class="flex items-baseline gap-1 mb-8">
                        <span class="text-4xl font-black text-white">Rp 15.000</span>
                        <span class="text-blue-200 font-medium">/ kg</span>
                    </div>

                    <ul class="space-y-4 text-sm text-white mb-8 font-medium">
                        <li class="flex items-center gap-3"><span class="text-cyan-400 font-bold">✓</span> Lewati Antrean Reguler</li>
                        <li class="flex items-center gap-3"><span class="text-cyan-400 font-bold">✓</span> Penanganan Noda Khusus</li>
                        <li class="flex items-center gap-3"><span class="text-cyan-400 font-bold">✓</span> Langsung Masuk Mesin</li>
                    </ul>
                </div>
                <a href="{{ route('booking.create') }}" class="w-full text-center py-4 rounded-2xl bg-white text-blue-600 font-black shadow-lg hover:bg-gray-50 transition-colors">
                    Pilih Express
                </a>
            </div>

            <!-- Paket 3: Satuan Premium -->
            <div class="bg-white rounded-3xl border border-gray-100 p-8 shadow-xl shadow-blue-900/5 hover:shadow-2xl hover:shadow-emerald-900/10 hover:-translate-y-2 transition-all duration-300 flex flex-col justify-between group">
                <div>
                    <div class="w-14 h-14 bg-emerald-50 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-emerald-100 transition-colors">
                        <span class="text-2xl">💎</span>
                    </div>
                    <span class="text-xs font-bold uppercase tracking-widest text-gray-400 block mb-2">Per Item</span>
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">Satuan Premium</h3>
                    <p class="text-sm text-gray-500 mb-6 leading-relaxed">Khusus bedcover, selimut, jas, gaun, sepatu. Penanganan detail &amp; hati-hati.</p>

                    <div class="flex items-baseline gap-1 mb-8">
                        <span class="text-lg font-bold text-gray-400">Mulai</span>
                        <span class="text-4xl font-black text-gray-900">20k</span>
                        <span class="text-gray-500 font-medium">/ pcs</span>
                    </div>

                    <ul class="space-y-4 text-sm text-gray-600 mb-8 font-medium">
                        <li class="flex items-center gap-3"><span class="text-emerald-500 font-bold">✓</span> Detergen Khusus</li>
                        <li class="flex items-center gap-3"><span class="text-emerald-500 font-bold">✓</span> Hand-wash (Cuci Manual)</li>
                        <li class="flex items-center gap-3"><span class="text-emerald-500 font-bold">✓</span> Plastik &amp; Gantungan Eksklusif</li>
                    </ul>
                </div>
                <a href="{{ route('booking.create') }}" class="w-full text-center py-4 rounded-2xl border-2 border-gray-100 text-gray-700 font-bold group-hover:border-emerald-500 group-hover:text-emerald-600 transition-colors">
                    Pilih Satuan
                </a>
            </div>

        </div>
    </div>
</section>

<!-- ============================================================
     7. TESTIMONI SECTION  ·  bg-slate-50
     ============================================================ -->
<section id="testimoni" class="relative py-24 bg-slate-50 bg-grid-pattern overflow-hidden border-t border-gray-100">
    <div class="absolute top-0 left-0 w-[600px] h-[600px] bg-blue-100/40 rounded-full blur-[120px] -translate-x-1/3 -translate-y-1/3 pointer-events-none"></div>
    <div class="absolute bottom-0 right-0 w-[600px] h-[600px] bg-cyan-50/50 rounded-full blur-[120px] translate-x-1/3 translate-y-1/3 pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center max-w-3xl mx-auto mb-24 space-y-3">
            <div class="inline-flex items-center gap-2 bg-white border border-blue-100 px-4 py-1.5 rounded-full text-blue-600 text-xs font-bold uppercase tracking-widest shadow-sm">
                <span class="w-1.5 h-1.5 rounded-full bg-blue-500 animate-pulse"></span>
                Testimoni Pelanggan
            </div>
            <h2 class="text-4xl md:text-5xl font-black text-gray-900 tracking-tight">Apa Kata Pelanggan <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-cyan-500">Setia Kami?</span></h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-x-8 gap-y-16 lg:gap-y-0 pt-4">

            <!-- Review 1 -->
            <div class="relative bg-white border border-gray-100 rounded-[2rem] p-8 lg:p-10 shadow-xl shadow-blue-900/5 hover:-translate-y-2 hover:shadow-2xl hover:shadow-blue-900/10 transition-all duration-300 flex flex-col items-center text-center">
                <div class="text-blue-100 mb-4">
                    <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 24 24"><path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/></svg>
                </div>
                <p class="text-gray-500 text-sm leading-relaxed mb-6">
                    "Semenjak ada LaundryQ, nyuci baju nggak perlu drama antre lagi. Tinggal booking slot dari HP, pakaian dijemput, dan semuanya beres. Wanginya juga premium banget!"
                </p>
                <div class="flex gap-1 text-yellow-400 mb-8">
                    <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                </div>
                <div class="absolute -bottom-12 flex flex-col items-center">
                    <img src="https://ui-avatars.com/api/?name=Lillian+Bell&background=0D8ABC&color=fff&rounded=true" alt="Lillian Bell" class="w-16 h-16 rounded-full border-4 border-white shadow-md">
                    <span class="mt-3 font-bold text-gray-900 text-sm">Lillian Bell</span>
                </div>
            </div>

            <!-- Review 2 -->
            <div class="relative bg-white border border-gray-100 rounded-[2rem] p-8 lg:p-10 shadow-xl shadow-blue-900/5 hover:-translate-y-2 hover:shadow-2xl hover:shadow-blue-900/10 transition-all duration-300 flex flex-col items-center text-center">
                <div class="text-blue-100 mb-4">
                    <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 24 24"><path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/></svg>
                </div>
                <p class="text-gray-500 text-sm leading-relaxed mb-6">
                    "Fitur tracking cuciannya juara! Gak perlu lagi chat admin buat nanya 'Cucian saya udah selesai belum?'. Transparan banget dan sangat mempermudah hidup mahasiswa."
                </p>
                <div class="flex gap-1 text-yellow-400 mb-8">
                    <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                </div>
                <div class="absolute -bottom-12 flex flex-col items-center">
                    <img src="https://ui-avatars.com/api/?name=Arief+Fathur&background=11a9e1&color=fff&rounded=true" alt="Arief Fathur" class="w-16 h-16 rounded-full border-4 border-white shadow-md">
                    <span class="mt-3 font-bold text-gray-900 text-sm">Arief Fathur Rizqi</span>
                </div>
            </div>

            <!-- Review 3 -->
            <div class="relative bg-white border border-gray-100 rounded-[2rem] p-8 lg:p-10 shadow-xl shadow-blue-900/5 hover:-translate-y-2 hover:shadow-2xl hover:shadow-blue-900/10 transition-all duration-300 flex flex-col items-center text-center">
                <div class="text-blue-100 mb-4">
                    <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 24 24"><path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/></svg>
                </div>
                <p class="text-gray-500 text-sm leading-relaxed mb-6">
                    "Kemarin butuh jas cepet buat sidang, langsung pakai layanan Express dari LaundryQ. Beneran kilat, rapi, dan pelayanannya mantap. Sangat direkomendasikan!"
                </p>
                <div class="flex gap-1 text-yellow-400 mb-8">
                    <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                </div>
                <div class="absolute -bottom-12 flex flex-col items-center">
                    <img src="https://ui-avatars.com/api/?name=Merti+A&background=0fa9e6&color=fff&rounded=true" alt="Merti" class="w-16 h-16 rounded-full border-4 border-white shadow-md">
                    <span class="mt-3 font-bold text-gray-900 text-sm">Merti</span>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ============================================================
     SCRIPTS
     ============================================================ -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const items = document.querySelectorAll('.carousel-item');
        const dots = document.querySelectorAll('.carousel-dot');
        const texts = document.querySelectorAll('.carousel-text');
        const bgs = document.querySelectorAll('.carousel-bg');

        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');

        let currentIndex = 0;
        const intervalTime = 6000; // 6 detik per slide biar user sempat baca
        let slideInterval;

        function updateCarousel(index) {
            items.forEach((item, i) => {
                const text = texts[i];
                const bg = bgs[i];
                const dotProgress = dots[i].querySelector('.progress-bar');

                if (i === index) {
                    // Tampilkan slide
                    item.classList.remove('opacity-0', 'z-0');
                    item.classList.add('opacity-100', 'z-10');

                    // Animasi teks naik & muncul
                    text.classList.remove('translate-y-8', 'opacity-0');
                    text.classList.add('translate-y-0', 'opacity-100');

                    // Efek zoom-in background
                    bg.classList.remove('scale-100');
                    bg.classList.add('scale-105');

                    // Warna dot aktif
                    dots[i].classList.remove('bg-white/40');
                    dots[i].classList.add('bg-blue-600');

                    // Progress bar dot
                    dotProgress.style.transitionDuration = `${intervalTime}ms`;
                    dotProgress.style.width = '100%';
                } else {
                    // Sembunyikan slide
                    item.classList.remove('opacity-100', 'z-10');
                    item.classList.add('opacity-0', 'z-0');

                    // Reset animasi teks
                    text.classList.remove('translate-y-0', 'opacity-100');
                    text.classList.add('translate-y-8', 'opacity-0');

                    // Reset zoom background
                    bg.classList.remove('scale-105');
                    bg.classList.add('scale-100');

                    // Warna dot non-aktif
                    dots[i].classList.remove('bg-blue-600');
                    dots[i].classList.add('bg-white/40');

                    // Reset progress bar
                    dotProgress.style.transitionDuration = '0ms';
                    dotProgress.style.width = '0%';
                }
            });
        }

        function nextSlide() {
            currentIndex = (currentIndex + 1) % items.length;
            updateCarousel(currentIndex);
        }

        function prevSlide() {
            currentIndex = (currentIndex - 1 + items.length) % items.length;
            updateCarousel(currentIndex);
        }

        function resetInterval() {
            clearInterval(slideInterval);
            slideInterval = setInterval(nextSlide, intervalTime);
        }

        nextBtn.addEventListener('click', () => {
            nextSlide();
            resetInterval();
        });

        prevBtn.addEventListener('click', () => {
            prevSlide();
            resetInterval();
        });

        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
                currentIndex = index;
                updateCarousel(currentIndex);
                resetInterval();
            });
        });

        setTimeout(() => {
            updateCarousel(0);
            slideInterval = setInterval(nextSlide, intervalTime);
        }, 100);
    });
</script>

<script>
    function handleCekSlot() {
        const tanggalInput = document.getElementById('tanggal-cek').value;
        const placeholder = document.getElementById('placeholder-slot');
        const containerHasil = document.getElementById('hasil-slot-container');
        const gridSlot = document.getElementById('grid-slot-waktu');

        if (!tanggalInput) return;

        // Efek transisi pemuatan data
        placeholder.classList.add('hidden');
        containerHasil.classList.remove('hidden');
        gridSlot.innerHTML = `
            <div class="col-span-2 text-center text-slate-400 py-4 text-xs font-bold uppercase tracking-wider animate-pulse">
                Mencari slot di database...
            </div>
        `;

        // Ambil data asli dari database via route API Laravel
        fetch(`/api/cek-slot?tanggal=${tanggalInput}`)
            .then(response => response.json())
            .then(data => {
                gridSlot.innerHTML = ''; // bersihkan teks loading

                // Kalau ternyata hari itu libur / nggak ada slot di database
                if (data.length === 0) {
                    gridSlot.innerHTML = `
                        <div class="col-span-1 sm:col-span-2 p-4 text-center border border-dashed border-slate-200 rounded-xl text-slate-400 text-sm font-medium">
                            Yah, tidak ada jadwal operasional mesin untuk tanggal ini.
                        </div>`;
                    return;
                }

                // Render HTML asli dari database
                data.forEach(slot => {
                    let badgeClass = '';
                    let borderClass = '';

                    if (slot.color === 'emerald') {
                        badgeClass = 'bg-emerald-50 text-emerald-600 border-emerald-100';
                        borderClass = 'border-slate-100 bg-white';
                    } else if (slot.color === 'amber') {
                        badgeClass = 'bg-amber-50 text-amber-600 border-amber-100';
                        borderClass = 'border-slate-100 bg-white';
                    } else {
                        badgeClass = 'bg-rose-50 text-rose-500 border-rose-100';
                        borderClass = 'border-slate-100 bg-slate-50/50 opacity-60';
                    }

                    gridSlot.innerHTML += `
                        <div class="flex items-center justify-between p-3.5 border rounded-xl shadow-inner transition-all ${borderClass}">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                <span class="text-xs font-black text-slate-700">${slot.waktu}</span>
                            </div>
                            <span class="inline-flex items-center gap-1 px-2.5 py-1 text-[10px] font-black uppercase rounded-lg border ${badgeClass}">
                                ${slot.status} ${slot.sisa > 0 ? `(Sisa: ${slot.sisa})` : ''}
                            </span>
                        </div>
                    `;
                });
            })
            .catch(error => {
                gridSlot.innerHTML = `
                    <div class="col-span-1 sm:col-span-2 p-4 text-center border border-rose-100 bg-rose-50 rounded-xl text-rose-500 text-sm font-bold">
                        Gagal terhubung ke server. Silakan coba lagi.
                    </div>`;
                console.error("Error fetching slots:", error);
            });
    }
</script>

@endsection