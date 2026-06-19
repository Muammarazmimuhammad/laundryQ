<!-- ============================================================
     2. INTRO SECTION  ·  bg-white
     ============================================================ -->
<section class="relative py-24 bg-white bg-grid-pattern overflow-hidden">
    <div class="absolute top-0 left-0 w-[600px] h-[600px] bg-blue-100/40 rounded-full blur-[120px] -translate-x-1/3 -translate-y-1/3 pointer-events-none z-0"></div>
    <div class="absolute bottom-0 right-0 w-[600px] h-[600px] bg-cyan-50/50 rounded-full blur-[120px] translate-x-1/3 translate-y-1/3 pointer-events-none z-0"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid lg:grid-cols-12 gap-12 lg:gap-8 items-center">

            <div class="lg:col-span-6 space-y-8 text-center lg:text-left relative">
                <div class="inline-flex items-center gap-2 bg-white border border-blue-100 px-4 py-1.5 rounded-full text-blue-600 text-xs font-bold uppercase tracking-widest shadow-sm">
                    <span class="w-1.5 h-1.5 rounded-full bg-blue-500"></span>
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
                        Mulai Booking
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
                    
                    <!-- Gambar Utama Mesin Cuci -->
                  <div class="z-10 w-40 h-40 sm:w-56 sm:h-56 lg:w-72 lg:h-72 drop-shadow-2xl filter group-hover:scale-105 transition-transform duration-500 animate-float-subtle">
                        <img src="{{ asset('img/mesin-cuci.png') }}" alt="Mesin Cuci LaundryQ" class="w-full h-full object-contain">
                    </div>
                </div>

                <!-- Kartu Status (Solid, tanpa animasi melayang) -->
                <div class="absolute -top-6 left-0 sm:-left-4 lg:-left-8 bg-white p-4 lg:px-5 lg:py-4 rounded-2xl shadow-xl border border-gray-100 flex items-center gap-4 z-20">
                    <div class="w-10 h-10 bg-blue-50 text-blue-500 rounded-lg flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <div>
                        <p class="text-[10px] text-gray-400 font-bold uppercase tracking-wider">Efisiensi</p>
                        <p class="text-sm font-black text-gray-900">-70% Waktu Tunggu</p>
                    </div>
                </div>

                <div class="absolute top-1/2 -right-4 sm:-right-8 lg:-right-12 bg-white p-4 lg:px-5 lg:py-4 rounded-2xl shadow-xl border border-gray-100 flex items-center gap-4 z-20">
                    <div class="w-10 h-10 bg-emerald-50 text-emerald-500 rounded-lg flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <div>
                        <p class="text-[10px] text-gray-400 font-bold uppercase tracking-wider">Status</p>
                        <p class="text-sm font-black text-gray-900">Cuci Selesai ✨</p>
                    </div>
                </div>

                <div class="absolute -bottom-8 left-4 lg:left-0 bg-white p-4 lg:px-5 lg:py-4 rounded-2xl shadow-xl border border-gray-100 flex items-center gap-4 z-20">
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