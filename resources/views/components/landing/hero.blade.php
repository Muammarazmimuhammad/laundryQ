<!-- ============================================================
     1. HERO SECTION (CAROUSEL)
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