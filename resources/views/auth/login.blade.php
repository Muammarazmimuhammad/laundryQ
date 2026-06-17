<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - LaundryQ</title>
    @vite(['resources/css/app.css'])

    <style>
        @keyframes slideUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes shimmer {
            0% { background-position: -200% center; }
            100% { background-position: 200% center; }
        }
        .slide-up { animation: slideUp 0.6s ease forwards; }
        .slide-up-delay { animation: slideUp 0.6s ease 0.1s forwards; opacity: 0; }
        .slide-up-delay-2 { animation: slideUp 0.6s ease 0.2s forwards; opacity: 0; }
        .shimmer-btn {
            background: linear-gradient(110deg, #2563eb 40%, #38bdf8 50%, #2563eb 60%);
            background-size: 200% auto;
            animation: shimmer 2.5s linear infinite;
        }
        .glass {
            background: rgba(255,255,255,0.08);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255,255,255,0.15);
        }
    </style>
</head>
<body class="min-h-screen flex items-stretch font-sans overflow-hidden">

    {{-- ===================== LEFT PANEL ===================== --}}
    <div class="hidden md:flex w-1/2 relative overflow-hidden">

        <div class="absolute inset-0">
            <img 
                src="https://images.unsplash.com/photo-1610557892470-55d9e80c0bce?w=1400&q=85&auto=format&fit=crop"
                alt="Laundry background"
                class="w-full h-full object-cover"
                onerror="this.src='https://images.unsplash.com/photo-1517677129300-07b130802f46?w=1400&q=85&auto=format&fit=crop'"
            >
        </div>

        <div class="absolute inset-0 bg-gradient-to-br from-blue-900/80 via-slate-900/70 to-cyan-900/60"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/90 via-transparent to-transparent"></div>

        <div class="relative z-10 flex flex-col justify-between p-12 w-full">

            {{-- Logo --}}
            <div class="slide-up flex items-center gap-3">
                <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-cyan-400 rounded-2xl flex items-center justify-center font-black text-white text-xl shadow-lg shadow-blue-500/40">
                    Q
                </div>
                <span class="text-2xl font-black text-white tracking-tight">LaundryQ</span>
            </div>

            {{-- Center quote --}}
            <div class="slide-up-delay">
                <div class="inline-flex items-center gap-2 glass rounded-full px-4 py-1.5 mb-6">
                    <div class="w-2 h-2 bg-emerald-400 rounded-full"></div>
                    <span class="text-xs text-white/80 font-semibold tracking-wider uppercase">Tersedia Sekarang</span>
                </div>
                <h2 class="text-4xl font-black text-white leading-tight mb-4 tracking-tight">
                    Cucian bersih,<br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-300 to-cyan-300">
                        tanpa repot.
                    </span>
                </h2>
                <p class="text-white/60 text-sm leading-relaxed max-w-xs">
                    Booking mesin cuci dari HP-mu, pantau status real-time, dan ambil cucian tepat waktu.
                </p>
            </div>

            {{-- Stats --}}
            <div class="slide-up-delay-2 flex items-center gap-4">
                <div class="glass rounded-2xl px-5 py-3 text-center">
                    <div class="text-2xl font-black text-white">50+</div>
                    <div class="text-xs text-white/50 font-medium">Pengguna Aktif</div>
                </div>
                <div class="glass rounded-2xl px-5 py-3 text-center">
                    <div class="text-2xl font-black text-white">98%</div>
                    <div class="text-xs text-white/50 font-medium">Kepuasan</div>
                </div>
                <div class="glass rounded-2xl px-5 py-3 text-center">
                    <div class="text-2xl font-black text-white">24/7</div>
                    <div class="text-xs text-white/50 font-medium">Layanan</div>
                </div>
            </div>
        </div>
    </div>

    {{-- ===================== RIGHT PANEL ===================== --}}
    <div class="w-full md:w-1/2 bg-slate-50 flex items-center justify-center p-6 sm:p-10 relative overflow-hidden">

        <div class="absolute top-0 right-0 w-80 h-80 bg-blue-100/50 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2 pointer-events-none"></div>
        <div class="absolute bottom-0 left-0 w-60 h-60 bg-cyan-100/50 rounded-full blur-3xl translate-y-1/2 -translate-x-1/2 pointer-events-none"></div>

        <a href="{{ route('home') }}" class="absolute top-6 left-6 z-20 flex items-center gap-1.5 text-slate-500 hover:text-slate-800 font-semibold text-xs transition-colors group">
            <svg class="w-4 h-4 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Kembali
        </a>

        <div class="relative z-10 w-full max-w-md slide-up">

            {{-- Mobile logo --}}
            <div class="md:hidden flex items-center gap-2 mb-8">
                <div class="w-9 h-9 bg-gradient-to-br from-blue-600 to-cyan-500 text-white rounded-xl flex items-center justify-center font-black text-lg shadow-lg shadow-blue-500/30">Q</div>
                <span class="text-xl font-black text-slate-900 tracking-tight">LaundryQ</span>
            </div>

            <div class="mb-8">
                <p class="text-xs font-bold text-blue-600 uppercase tracking-widest mb-2">Portal Pengguna</p>
                <h1 class="text-3xl font-black text-slate-900 tracking-tight mb-2">Selamat Datang 👋</h1>
                <p class="text-sm text-slate-500">Masuk untuk mulai booking mesin cucianmu.</p>
            </div>

            @error('email')
                <div class="bg-rose-50 border border-rose-200 text-rose-700 p-4 rounded-2xl mb-6 flex items-start gap-3 text-sm">
                    <svg class="w-5 h-5 shrink-0 mt-0.5 text-rose-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span class="font-semibold">{{ $message }}</span>
                </div>
            @enderror

            <form action="{{ route('login.submit') }}" method="POST" class="space-y-5">
                @csrf

                <div class="group">
                    <label class="block text-xs font-black text-slate-600 uppercase tracking-widest mb-2">Email</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-4 flex items-center pointer-events-none text-slate-400 group-focus-within:text-blue-500 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                            </svg>
                        </div>
                        <input 
                            type="email" name="email" value="{{ old('email') }}"
                            class="w-full pl-11 pr-4 py-3.5 rounded-2xl bg-white border-2 border-slate-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all outline-none text-sm font-semibold text-slate-800 placeholder-slate-400 shadow-sm"
                            placeholder="nama@email.com" required
                        >
                    </div>
                </div>

                <div class="group">
                    <div class="flex justify-between items-center mb-2">
                        <label class="block text-xs font-black text-slate-600 uppercase tracking-widest">Password</label>
                        <a href="#" class="text-xs font-bold text-blue-600 hover:text-blue-700 hover:underline transition-colors">Lupa sandi?</a>
                    </div>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-4 flex items-center pointer-events-none text-slate-400 group-focus-within:text-blue-500 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                        </div>
                        <input 
                            type="password" name="password" id="passwordInput"
                            class="w-full pl-11 pr-12 py-3.5 rounded-2xl bg-white border-2 border-slate-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all outline-none text-sm font-semibold text-slate-800 placeholder-slate-400 shadow-sm"
                            placeholder="••••••••" required
                        >
                        <button type="button" onclick="togglePassword()" class="absolute inset-y-0 right-4 flex items-center text-slate-400 hover:text-slate-700 transition-colors">
                            <svg id="eyeIcon" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <label class="flex items-center gap-3 cursor-pointer group">
                    <input type="checkbox" name="remember" class="w-4 h-4 rounded border-slate-300 text-blue-600 accent-blue-600">
                    <span class="text-sm text-slate-600 font-medium group-hover:text-slate-800 transition-colors">Ingat saya di perangkat ini</span>
                </label>

                <button type="submit" class="shimmer-btn w-full text-white font-black py-4 rounded-2xl shadow-lg shadow-blue-500/25 hover:shadow-xl hover:shadow-blue-500/35 hover:-translate-y-0.5 active:translate-y-0 transition-all flex justify-center items-center gap-2 text-sm mt-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                    </svg>
                    Masuk Sekarang
                </button>
            </form>

            <div class="flex items-center gap-3 my-6">
                <div class="flex-1 h-px bg-slate-200"></div>
                <span class="text-xs text-slate-400 font-medium">atau</span>
                <div class="flex-1 h-px bg-slate-200"></div>
            </div>

            <p class="text-center text-sm text-slate-500 font-medium">
                Belum punya akun?
                <a href="{{ route('register') }}" class="text-blue-600 font-black hover:underline ml-1">Daftar Gratis →</a>
            </p>
        </div>
    </div>

    <script>
        function togglePassword() {
            const input = document.getElementById('passwordInput');
            const icon = document.getElementById('eyeIcon');
            if (input.type === 'password') {
                input.type = 'text';
                icon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"></path>`;
            } else {
                input.type = 'password';
                icon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>`;
            }
        }
    </script>

</body>
</html>