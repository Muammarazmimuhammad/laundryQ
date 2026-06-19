<!-- ============================================================
     7. LAYANAN SECTION  ·  bg-slate-50
     ============================================================ -->
<section id="layanan" class="relative py-24 bg-slate-50 bg-grid-pattern overflow-hidden border-t border-gray-100">
    <div class="absolute top-1/2 left-0 w-[600px] h-[600px] bg-blue-100/40 rounded-full blur-[120px] -translate-y-1/2 -translate-x-1/3 pointer-events-none z-0"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center max-w-3xl mx-auto mb-16 space-y-4">
            <span class="inline-block px-4 py-1.5 bg-white border border-blue-100 text-blue-600 text-xs font-bold uppercase tracking-widest rounded-full shadow-sm">Transparan &amp; Terjangkau</span>
            <h2 class="text-4xl md:text-5xl font-black text-gray-950 tracking-tight">Pilih Layanan Sesuai Kebutuhan</h2>
            <p class="text-lg text-gray-500">Kualitas cucian setara hotel bintang lima, namun dengan harga yang tetap ramah di kantong mahasiswa.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto">

            <div class="bg-white rounded-3xl border border-gray-100 p-8 shadow-md hover:shadow-xl hover:-translate-y-2 transition-all duration-300 flex flex-col justify-between group">
                <div>
                    <div class="w-14 h-14 bg-gray-50 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-blue-50 transition-colors">
                        <svg class="w-7 h-7 text-blue-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                        </svg>
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

            <div class="bg-gradient-to-b from-blue-600 to-[#0055FF] rounded-3xl border border-blue-500 p-8 shadow-lg hover:shadow-xl hover:-translate-y-2 transition-all duration-300 flex flex-col justify-between relative transform scale-100 md:scale-105 z-10">
                <div class="absolute -top-4 left-1/2 -translate-x-1/2 bg-gradient-to-r from-cyan-400 to-blue-400 text-white px-6 py-1.5 rounded-full text-xs font-black uppercase tracking-widest shadow-md">
                    Paling Laris 🔥
                </div>
                <div>
                    <div class="w-14 h-14 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/>
                        </svg>
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
                <a href="{{ route('booking.create') }}" class="w-full text-center py-4 rounded-2xl bg-white text-blue-600 font-black shadow-md hover:bg-gray-50 transition-colors">
                    Pilih Express
                </a>
            </div>

            <div class="bg-white rounded-3xl border border-gray-100 p-8 shadow-md hover:shadow-xl hover:-translate-y-2 transition-all duration-300 flex flex-col justify-between group">
                <div>
                    <div class="w-14 h-14 bg-emerald-50 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-emerald-100 transition-colors">
                        <svg class="w-7 h-7 text-emerald-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 8l7-5 7 5-7 11L5 8z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 8h14M12 3v16"/>
                        </svg>
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