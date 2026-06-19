<!-- ============================================================
     4. CEK SLOT ANTREAN SECTION  ·  bg-white
     ============================================================ -->
<section class="relative py-24 bg-white bg-grid-pattern overflow-hidden border-t border-gray-100">
    <div class="absolute top-0 left-0 w-[600px] h-[600px] bg-blue-100/40 rounded-full blur-[120px] -translate-x-1/3 -translate-y-1/3 pointer-events-none"></div>
    <div class="absolute bottom-0 right-0 w-[600px] h-[600px] bg-cyan-50/50 rounded-full blur-[120px] translate-x-1/3 translate-y-1/3 pointer-events-none"></div>

    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center max-w-3xl mx-auto mb-16 space-y-3">
            <div class="inline-flex items-center gap-2 bg-white border border-blue-100 px-4 py-1.5 rounded-full text-blue-600 text-xs font-bold uppercase tracking-widest shadow-sm">
                <span class="w-1.5 h-1.5 rounded-full bg-blue-500"></span>
                Sistem Antrean Pintar
            </div>
            <h2 class="text-4xl md:text-5xl font-black text-gray-900 tracking-tight">
                Cek Slot &amp; <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-cyan-500">Booking Sekarang</span>
            </h2>
            <p class="text-lg text-gray-500">
                Pilih tanggal untuk melihat kuota mesin yang tersedia. Tak perlu repot antre panjang, amankan slot cucianmu dari mana saja.
            </p>
        </div>

        <div class="bg-white rounded-[2.5rem] shadow-xl border border-slate-100 p-4 sm:p-5 flex flex-col lg:flex-row gap-8 lg:gap-10 items-center hover:shadow-2xl transition-shadow duration-300">
            <div class="w-full lg:w-5/12 h-[350px] lg:h-[480px] relative rounded-[2rem] overflow-hidden shrink-0">
                <img src="{{ asset('img/slot.jpg') }}" alt="LaundryQ Happy Customer" class="object-cover w-full h-full">
                <div class="absolute inset-0 bg-gradient-to-t from-slate-900/70 via-slate-900/10 to-transparent pointer-events-none"></div>
                <div class="absolute bottom-6 left-6 right-6">
                    <div class="bg-white/20 backdrop-blur-md border border-white/30 rounded-2xl p-4 sm:p-5 text-white shadow-lg">
                        <p class="text-[10px] sm:text-xs font-black text-blue-200 uppercase tracking-widest mb-1.5">LaundryQ Hemat Waktu</p>
                        <p class="text-sm sm:text-base font-medium leading-snug text-slate-50">"Mencuci jadi super gampang karena slotnya sudah dipesan dari rumah!"</p>
                    </div>
                </div>
            </div>

            <div class="w-full lg:w-7/12 px-4 sm:px-6 py-4 lg:py-6 flex flex-col justify-center">
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

                <div id="hasil-slot-container" class="space-y-4 hidden min-h-[180px]">
                    <label class="block text-xs font-black text-slate-500 uppercase tracking-widest mb-2">Jadwal yang Tersedia</label>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4" id="grid-slot-waktu"></div>
                </div>

                <div id="placeholder-slot" class="border-2 border-dashed border-slate-200 bg-slate-50/70 rounded-2xl p-8 sm:p-10 text-center text-slate-400 font-medium text-sm flex flex-col items-center justify-center gap-3 min-h-[180px]">
                    <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center shadow-sm border border-slate-100">
                        <svg class="w-6 h-6 text-slate-300 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <p class="max-w-xs mx-auto">Tentukan tanggal terlebih dahulu untuk menampilkan data mesin.</p>
                </div>

                <div class="mt-8 border-t border-slate-100 pt-6">
                    @auth
                        <a href="{{ route('booking.create') }}" class="w-full inline-flex items-center justify-center gap-2 bg-gradient-to-r from-blue-600 to-cyan-500 text-white py-4 px-6 rounded-2xl font-black text-sm shadow-md hover:bg-blue-700 transition-all">
                            Amankan Slot Antreanmu Sekarang
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="w-full inline-flex items-center justify-center gap-2 bg-gradient-to-r from-blue-600 to-cyan-500 text-white py-4 px-6 rounded-2xl font-black text-sm shadow-md hover:bg-blue-700 transition-all group">
                            Login Untuk Booking Jadwal
                            <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 013-3h7a3 3 0 013 3v1"></path></svg>
                        </a>
                    @endauth
                </div>
            </div>
        </div>

    </div>
</section>