<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - LaundryQ</title>
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
                src="https://images.unsplash.com/photo-1582735689369-4fe89db7114c?w=1400&q=85&auto=format&fit=crop"
                alt="Laundry register background"
                class="w-full h-full object-cover"
                onerror="this.src='https://images.unsplash.com/photo-1469504512102-900f29606341?w=1400&q=85&auto=format&fit=crop'"
            >
        </div>

        {{-- Overlay --}}
        <div class="absolute inset-0 bg-gradient-to-br from-cyan-900/80 via-slate-900/70 to-blue-900/60"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/90 via-transparent to-transparent"></div>

        <div class="relative z-10 flex flex-col justify-between p-12 w-full">

            {{-- Logo --}}
            <div class="slide-up flex items-center gap-3">
                <div class="w-10 h-10 bg-gradient-to-br from-cyan-400 to-blue-500 rounded-2xl flex items-center justify-center font-black text-white text-xl shadow-lg shadow-cyan-500/40">
                    Q
                </div>
                <span class="text-2xl font-black text-white tracking-tight">LaundryQ</span>
            </div>

            {{-- Center copy --}}
            <div class="slide-up-delay">
                <div class="inline-flex items-center gap-2 glass rounded-full px-4 py-1.5 mb-6">
                    <div class="w-2 h-2 bg-cyan-400 rounded-full"></div>
                    <span class="text-xs text-white/80 font-semibold tracking-wider uppercase">Gratis Selamanya</span>
                </div>
                <h2 class="text-4xl font-black text-white leading-tight mb-4 tracking-tight">
                    Mulai perjalanan<br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-300 to-blue-300">
                        bebas antre.
                    </span>
                </h2>
                <p class="text-white/60 text-sm leading-relaxed max-w-xs">
                    Daftar sekali, booking kapan saja. Tidak perlu lagi datang hanya untuk mengecek mesin kosong.
                </p>
            </div>

            {{-- Steps --}}
            <div class="slide-up-delay-2 space-y-3">
                <div class="flex items-center gap-4">
                    <div class="w-8 h-8 glass rounded-xl flex items-center justify-center shrink-0 text-white font-black text-xs">1</div>
                    <span class="text-sm text-white/70 font-medium">Buat akun gratis dalam 1 menit</span>
                </div>
                <div class="flex items-center gap-4">
                    <div class="w-8 h-8 glass rounded-xl flex items-center justify-center shrink-0 text-white font-black text-xs">2</div>
                    <span class="text-sm text-white/70 font-medium">Pilih jadwal & booking mesin</span>
                </div>
                <div class="flex items-center gap-4">
                    <div class="w-8 h-8 glass rounded-xl flex items-center justify-center shrink-0 text-white font-black text-xs">3</div>
                    <span class="text-sm text-white/70 font-medium">Terima notifikasi saat cucian selesai</span>
                </div>
            </div>
        </div>
    </div>

    {{-- ===================== RIGHT PANEL ===================== --}}
    <div class="w-full md:w-1/2 bg-slate-50 flex items-center justify-center p-6 sm:p-10 relative overflow-hidden">

        <div class="absolute top-0 right-0 w-80 h-80 bg-cyan-100/50 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2 pointer-events-none"></div>
        <div class="absolute bottom-0 left-0 w-60 h-60 bg-blue-100/50 rounded-full blur-3xl translate-y-1/2 -translate-x-1/2 pointer-events-none"></div>

        <a href="{{ route('home') }}" class="absolute top-6 left-6 z-20 flex items-center gap-1.5 text-slate-500 hover:text-slate-800 font-semibold text-xs transition-colors group">
            <svg class="w-4 h-4 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Kembali
        </a>

        <div class="relative z-10 w-full max-w-md slide-up">

            {{-- Mobile logo --}}
            <div class="md:hidden flex items-center gap-2 mb-8">
                <div class="w-9 h-9 bg-gradient-to-br from-cyan-500 to-blue-600 text-white rounded-xl flex items-center justify-center font-black text-lg shadow-lg shadow-blue-500/30">Q</div>
                <span class="text-xl font-black text-slate-900 tracking-tight">LaundryQ</span>
            </div>

            <div class="mb-8">
                <p class="text-xs font-bold text-blue-600 uppercase tracking-widest mb-2">Buat Akun Baru</p>
                <h1 class="text-3xl font-black text-slate-900 tracking-tight mb-2">Daftar Gratis ✨</h1>
                <p class="text-sm text-slate-500">Lengkapi data di bawah untuk mulai booking.</p>
            </div>

            @if ($errors->any())
                <div class="bg-rose-50 border border-rose-200 text-rose-700 p-4 rounded-2xl mb-6 flex items-start gap-3 text-sm">
                    <svg class="w-5 h-5 shrink-0 mt-0.5 text-rose-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span class="font-semibold">{{ $errors->first() }}</span>
                </div>
            @endif

            <form action="{{ route('register.submit') }}" method="POST" class="space-y-4">
                @csrf

                {{-- Nama & WhatsApp --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="group">
                        <label class="block text-xs font-black text-slate-600 uppercase tracking-widest mb-2">Nama Lengkap</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-4 flex items-center pointer-events-none text-slate-400 group-focus-within:text-blue-500 transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <input
                                type="text" name="name" value="{{ old('name') }}"
                                class="w-full pl-11 pr-4 py-3.5 rounded-2xl bg-white border-2 border-slate-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all outline-none text-sm font-semibold text-slate-800 placeholder-slate-400 shadow-sm"
                                placeholder="Nama Anda" required
                            >
                        </div>
                    </div>

                    <div class="group">
                        <label class="block text-xs font-black text-slate-600 uppercase tracking-widest mb-2">No. WhatsApp</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-4 flex items-center pointer-events-none text-slate-400 group-focus-within:text-blue-500 transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                            </div>
                            <input
                                type="tel" name="phone" value="{{ old('phone') }}"
                                class="w-full pl-11 pr-4 py-3.5 rounded-2xl bg-white border-2 border-slate-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all outline-none text-sm font-semibold text-slate-800 placeholder-slate-400 shadow-sm"
                                placeholder="08xx-xxxx" required
                            >
                        </div>
                    </div>
                </div>

                {{-- Email --}}
                <div class="group">
                    <label class="block text-xs font-black text-slate-600 uppercase tracking-widest mb-2">Email Aktif</label>
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

                {{-- Password --}}
                <div class="group">
                    <label class="block text-xs font-black text-slate-600 uppercase tracking-widest mb-2">Kata Sandi</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-4 flex items-center pointer-events-none text-slate-400 group-focus-within:text-blue-500 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                        </div>
                        <input
                            type="password" name="password" id="passwordInput"
                            class="w-full pl-11 pr-12 py-3.5 rounded-2xl bg-white border-2 border-slate-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all outline-none text-sm font-semibold text-slate-800 placeholder-slate-400 shadow-sm"
                            placeholder="Minimal 6 karakter" required minlength="6"
                        >
                        <button type="button" onclick="togglePassword()" class="absolute inset-y-0 right-4 flex items-center text-slate-400 hover:text-slate-700 transition-colors">
                            <svg id="eyeIcon" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                        </button>
                    </div>
                    <p class="text-xs text-slate-400 mt-1.5 pl-1">Gunakan minimal 6 karakter.</p>
                </div>

                {{-- Submit --}}
                <button type="submit" class="shimmer-btn w-full text-white font-black py-4 rounded-2xl shadow-lg shadow-blue-500/25 hover:shadow-xl hover:shadow-blue-500/35 hover:-translate-y-0.5 active:translate-y-0 transition-all flex justify-center items-center gap-2 text-sm mt-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                    </svg>
                    Daftar Sekarang
                </button>
            </form>

            <div class="flex items-center gap-3 my-5">
                <div class="flex-1 h-px bg-slate-200"></div>
                <span class="text-xs text-slate-400 font-medium">atau</span>
                <div class="flex-1 h-px bg-slate-200"></div>
            </div>

            <p class="text-center text-sm text-slate-500 font-medium">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="text-blue-600 font-black hover:underline ml-1">Masuk di sini →</a>
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