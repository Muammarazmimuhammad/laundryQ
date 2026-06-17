<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel - LaundryQ</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        ::-webkit-scrollbar { width: 6px; height: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #e2e8f0; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #cbd5e1; }
    </style>
</head>
<body class="bg-slate-50 font-sans flex h-screen overflow-hidden selection:bg-blue-100 selection:text-blue-900">

    <aside class="w-72 bg-white flex flex-col relative z-20 border-r border-slate-100">

        <div class="h-20 flex items-center justify-center border-b border-slate-100">
            <a href="{{ route('home') }}" class="flex items-center gap-2 group">
                <div class="w-9 h-9 bg-blue-600 rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-transform shadow-md shadow-blue-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <rect x="5" y="3" width="14" height="18" rx="2" ry="2"></rect>
                        <path d="M5 7h14"></path>
                        <circle cx="12" cy="14" r="3"></circle>
                    </svg>
                </div>
                <span class="text-xl font-black text-slate-800 tracking-tight">
                    Laundry<span class="text-blue-600">Q</span>
                </span>
            </a>
        </div>

        <nav class="flex-1 px-4 py-8 space-y-1.5 overflow-y-auto">
            <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-4 px-3">Menu Panel</p>

            @if(Auth::user()->role === 'admin')
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3.5 rounded-xl bg-blue-50 text-blue-700 font-bold border border-blue-100">
                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                    Dashboard Admin
                </a>
            @else
                <a href="{{ route('user.dashboard') }}" class="flex items-center gap-3 px-4 py-3.5 rounded-xl transition-all duration-300 {{ request()->routeIs('user.dashboard') ? 'bg-blue-50 text-blue-700 font-bold border border-blue-100' : 'text-slate-500 font-medium hover:bg-slate-50 hover:text-slate-800' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                    Dashboard Saya
                </a>

                <a href="{{ route('booking.create') }}" class="flex items-center gap-3 px-4 py-3.5 rounded-xl transition-all duration-300 {{ request()->routeIs('booking.create') ? 'bg-blue-50 text-blue-700 font-bold border border-blue-100' : 'text-slate-500 font-medium hover:bg-slate-50 hover:text-slate-800' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    Buat Pesanan Baru
                </a>

                <a href="{{ route('tracking.index') }}" class="flex items-center gap-3 px-4 py-3.5 rounded-xl transition-all duration-300 {{ request()->routeIs('tracking.index') ? 'bg-blue-50 text-blue-700 font-bold border border-blue-100' : 'text-slate-500 font-medium hover:bg-slate-50 hover:text-slate-800' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                    Riwayat Cucian
                </a>
            @endif
            
            {{-- ====== LOGIKA PENGHITUNG OTOMATIS ====== --}}
            @php
                $baseQuery = \App\Models\Booking::where('status', '!=', 'Selesai');
                if (Auth::user()->role !== 'admin') {
                    $baseQuery->where('user_id', Auth::id());
                }

                $countReguler = (clone $baseQuery)->whereHas('service', function($q) {
                    $q->where('service_name', 'like', '%Reguler%');
                })->count();

                $countExpress = (clone $baseQuery)->whereHas('service', function($q) {
                    $q->where('service_name', 'like', '%Express%');
                })->count();

                $countPremium = (clone $baseQuery)->whereHas('service', function($q) {
                    $q->where('service_name', 'like', '%Premium%');
                })->count();
            @endphp

            <div class="mt-10 mb-6">                
                {{-- ====== LOGIKA PENGHITUNG OTOMATIS (KHUSUS ADMIN) ====== --}}
            @if(Auth::user()->role === 'admin')
                @php
                    $baseQuery = \App\Models\Booking::where('status', '!=', 'Selesai');
                    
                    $countReguler = (clone $baseQuery)->whereHas('service', function($q) {
                        $q->where('service_name', 'like', '%Reguler%');
                    })->count();

                    $countExpress = (clone $baseQuery)->whereHas('service', function($q) {
                        $q->where('service_name', 'like', '%Express%');
                    })->count();

                    $countPremium = (clone $baseQuery)->whereHas('service', function($q) {
                        $q->where('service_name', 'like', '%Premium%');
                    })->count();

                    $activeFilter = request('service');
                @endphp

                <div class="mt-10 mb-6">
                    <p class="text-xs font-black text-gray-400 uppercase tracking-widest mb-4 px-3">Filter Antrean</p>
                    
                    <div class="space-y-3 px-2">
                        
                        @if($activeFilter)
                            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2 px-3 py-2 mx-1 mb-4 rounded-lg bg-slate-100 text-slate-600 hover:bg-slate-200 text-xs font-bold transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                                Tampilkan Semua Antrean
                            </a>
                        @endif

                        <a href="{{ route('admin.dashboard', ['service' => 'reguler']) }}" 
                           class="flex items-center justify-between p-3 rounded-xl transition-all duration-300 {{ $activeFilter == 'reguler' ? 'bg-blue-50 text-blue-700 border border-blue-100 shadow-sm ring-1 ring-blue-500' : 'bg-white border border-gray-100 hover:border-blue-300 shadow-sm hover:bg-blue-50/30' }}">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-lg {{ $activeFilter == 'reguler' ? 'bg-blue-600 text-white' : 'bg-blue-50 text-blue-600' }} flex items-center justify-center flex-shrink-0 transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                                </div>
                                <div>
                                    <p class="text-sm font-bold {{ $activeFilter == 'reguler' ? 'text-blue-800' : 'text-gray-700' }}">Reguler</p>
                                    <p class="text-[10px] {{ $activeFilter == 'reguler' ? 'text-blue-500' : 'text-gray-400' }} font-medium">Est. 2-3 Hari</p>
                                </div>
                            </div>
                            <div class="{{ $activeFilter == 'reguler' ? 'bg-blue-600 text-white' : 'bg-blue-50 text-blue-700 border border-blue-100' }} font-black px-2.5 py-1 rounded-lg text-xs transition-colors">
                                {{ $countReguler }}
                            </div>
                        </a>

                        <a href="{{ route('admin.dashboard', ['service' => 'express']) }}" 
                           class="flex items-center justify-between p-3 rounded-xl transition-all duration-300 {{ $activeFilter == 'express' ? 'bg-cyan-50 text-cyan-800 border border-cyan-100 shadow-sm ring-1 ring-cyan-500' : 'bg-white border border-gray-100 hover:border-cyan-300 shadow-sm hover:bg-cyan-50/30' }}">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-lg {{ $activeFilter == 'express' ? 'bg-cyan-500 text-white' : 'bg-cyan-50 text-cyan-600' }} flex items-center justify-center flex-shrink-0 transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                                </div>
                                <div>
                                    <p class="text-sm font-bold {{ $activeFilter == 'express' ? 'text-cyan-900' : 'text-gray-700' }}">Express</p>
                                    <p class="text-[10px] {{ $activeFilter == 'express' ? 'text-cyan-600' : 'text-gray-400' }} font-medium">Selesai 1 Hari</p>
                                </div>
                            </div>
                            <div class="{{ $activeFilter == 'express' ? 'bg-cyan-500 text-white' : 'bg-cyan-50 text-cyan-700 border border-cyan-100' }} font-black px-2.5 py-1 rounded-lg text-xs transition-colors">
                                {{ $countExpress }}
                            </div>
                        </a>

                        <a href="{{ route('admin.dashboard', ['service' => 'premium']) }}" 
                           class="flex items-center justify-between p-3 rounded-xl transition-all duration-300 {{ $activeFilter == 'premium' ? 'bg-emerald-50 text-emerald-800 border border-emerald-100 shadow-sm ring-1 ring-emerald-500' : 'bg-white border border-gray-100 hover:border-emerald-300 shadow-sm hover:bg-emerald-50/30' }}">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-lg {{ $activeFilter == 'premium' ? 'bg-emerald-500 text-white' : 'bg-emerald-50 text-emerald-600' }} flex items-center justify-center flex-shrink-0 transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                                </div>
                                <div>
                                    <p class="text-sm font-bold {{ $activeFilter == 'premium' ? 'text-emerald-900' : 'text-gray-700' }}">Premium</p>
                                    <p class="text-[10px] {{ $activeFilter == 'premium' ? 'text-emerald-600' : 'text-gray-400' }} font-medium">Satuan Khusus</p>
                                </div>
                            </div>
                            <div class="{{ $activeFilter == 'premium' ? 'bg-emerald-500 text-white' : 'bg-emerald-50 text-emerald-700 border border-emerald-100' }} font-black px-2.5 py-1 rounded-lg text-xs transition-colors">
                                {{ $countPremium }}
                            </div>
                        </a>

                    </div>
                </div>
            @endif
            {{-- ====== AKHIR LOGIKA KHUSUS ADMIN ====== --}}
                
            </div>
        </nav>

        <div class="p-4 border-t border-slate-100">
            <div class="bg-slate-50 rounded-xl p-4 border border-slate-100">
                <p class="text-xs text-slate-700 font-bold mb-1">Butuh Bantuan?</p>
                <p class="text-[10px] text-slate-400 mb-3">Tim kami siap membantu!</p>
                <a href="#" class="text-xs font-bold text-white bg-blue-600 hover:bg-blue-700 block text-center py-2 rounded-lg transition-colors">Hubungi Admin</a>
            </div>
        </div>
    </aside>

    <div class="flex-1 flex flex-col h-screen overflow-hidden relative bg-gradient-to-br from-blue-50/70 via-slate-50 to-cyan-50/40">
        <div class="absolute top-0 right-0 w-[28rem] h-[28rem] bg-blue-100/50 rounded-full blur-[120px] pointer-events-none"></div>
        <div class="absolute bottom-0 left-1/3 w-96 h-96 bg-cyan-100/40 rounded-full blur-[100px] pointer-events-none"></div>

        <header class="h-20 bg-white/70 backdrop-blur-md border-b border-slate-100 flex items-center justify-between px-8 sticky top-0 z-10">
            <h2 class="text-2xl font-black text-slate-800 tracking-tight">@yield('title', 'Dashboard')</h2>

            <div class="flex items-center gap-6">
                <div class="flex items-center gap-3 bg-white px-2 py-1.5 rounded-full border border-slate-100 hover:bg-slate-50 transition-colors cursor-pointer">
                    <div class="bg-white rounded-full p-2 border border-slate-200 text-blue-600">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    </div>
                    <span class="font-bold text-slate-700 text-sm pr-3">{{ explode(' ', Auth::user()->name)[0] }}</span>
                </div>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="flex items-center gap-2 text-sm font-bold text-rose-500 hover:text-white bg-rose-50 hover:bg-rose-500 border border-rose-100 px-4 py-2.5 rounded-xl transition-all duration-300 group">
                        <span>Keluar</span>
                        <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                    </button>
                </form>
            </div>
        </header>

        <main class="flex-1 overflow-y-auto p-6 md:p-8 relative z-10">
            @yield('content')
        </main>

    </div>
</body>
</html>