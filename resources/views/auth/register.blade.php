<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - LaundryQ Premium</title>
    @vite(['resources/css/app.css'])

    <style>
        /* 1. Animasi Background Gradien Bergerak */
        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* 2. Animasi Masuk (Fade Up) berurutan */
        @keyframes fadeUp {
            0% { opacity: 0; transform: translateY(20px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        /* 3. Animasi Elemen Melayang (Floating) */
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-8px); }
        }

        body {
            background: linear-gradient(-45deg, #1e3a8a, #2563eb, #0891b2, #0e7490);
            background-size: 400% 400%;
            animation: gradientShift 15s ease infinite;
            background-attachment: fixed;
        }

        /* Pola Grid Halus di Latar Belakang */
        .bg-grid-overlay {
            background-size: 40px 40px;
            background-image: 
                linear-gradient(to right, rgba(255, 255, 255, 0.04) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(255, 255, 255, 0.04) 1px, transparent 1px);
            mask-image: radial-gradient(circle at center, black 40%, transparent 100%);
            -webkit-mask-image: radial-gradient(circle at center, black 40%, transparent 100%);
        }

        /* Kartu Super Premium */
        .super-card {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(40px);
            -webkit-backdrop-filter: blur(40px);
            border: 1px solid rgba(255, 255, 255, 0.6);
            box-shadow: 
                0 40px 80px -20px rgba(0, 0, 0, 0.4), 
                0 0 40px rgba(255, 255, 255, 0.1),
                inset 0 1px 0 rgba(255, 255, 255, 0.8),
                inset 1px 0 0 rgba(255, 255, 255, 0.3);
        }

        /* Kelas Staggered Animation */
        .stagger-1 { animation: fadeUp 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards; opacity: 0; animation-delay: 0.1s; }
        .stagger-2 { animation: fadeUp 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards; opacity: 0; animation-delay: 0.2s; }
        .stagger-3 { animation: fadeUp 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards; opacity: 0; animation-delay: 0.3s; }
        .stagger-4 { animation: fadeUp 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards; opacity: 0; animation-delay: 0.4s; }

        /* Floating Icon Class */
        .animate-float-slow { animation: float 6s ease-in-out infinite; }
        .animate-float-fast { animation: float 4s ease-in-out infinite; animation-delay: 1s; }

        /* Custom Input Glow */
        .input-glow:focus-within {
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.15), 0 10px 15px -3px rgba(59, 130, 246, 0.1);
            border-color: #3b82f6;
            background-color: #ffffff;
        }

        /* Tombol Shimmer */
        .btn-shimmer {
            background-size: 200% auto;
            background-image: linear-gradient(to right, #2563eb 0%, #06b6d4 50%, #2563eb 100%);
            transition: 0.5s;
        }
        .btn-shimmer:hover {
            background-position: right center;
            transform: translateY(-2px);
            box-shadow: 0 15px 30px -5px rgba(6, 182, 212, 0.4);
        }
    </style>
</head>
<body class="relative min-h-screen flex flex-col items-center justify-center font-sans overflow-hidden px-4 py-10 lg:py-0">

    <div class="absolute inset-0 bg-grid-overlay z-0 pointer-events-none"></div>
    <div class="absolute top-[-10%] right-[-5%] w-[800px] h-[800px] bg-blue-400/20 rounded-full blur-[150px] pointer-events-none z-0 mix-blend-screen"></div>
    <div class="absolute bottom-[-10%] left-[-10%] w-[800px] h-[800px] bg-cyan-400/20 rounded-full blur-[150px] pointer-events-none z-0 mix-blend-screen"></div>

    <a href="{{ route('home') }}" class="stagger-1 absolute top-6 left-6 md:top-10 md:left-10 z-30 flex items-center gap-2 text-white/80 hover:text-white font-bold text-sm transition-all group bg-white/10 hover:bg-white/20 px-5 py-2.5 rounded-full border border-white/20 backdrop-blur-md shadow-2xl">
        <svg class="w-4 h-4 group-hover:-translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
        Kembali
    </a>

    <div class="relative z-20 w-full max-w-[1040px] super-card rounded-[2.5rem] flex flex-col md:flex-row overflow-hidden min-h-[600px] stagger-1">
        
        <div class="hidden md:flex w-5/12 relative flex-col justify-between overflow-hidden">
            <div class="absolute inset-0 z-0">
                <img src="https://images.unsplash.com/photo-1582735689369-4fe89db7114c?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" alt="Laundry Modern" class="w-full h-full object-cover transform hover:scale-105 transition-transform duration-[20s] ease-out">
                <div class="absolute inset-0 bg-gradient-to-t from-slate-900/95 via-blue-900/80 to-blue-600/40"></div>
            </div>

            <div class="relative z-10 p-12 h-full flex flex-col justify-center">
                
                <div class="stagger-2 mb-12">
                    <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-white/10 border border-white/20 backdrop-blur-md mb-6 text-xs font-bold text-cyan-200 tracking-widest uppercase">
                        <span class="w-1.5 h-1.5 rounded-full bg-cyan-400 animate-pulse"></span>
                        Gratis Selamanya
                    </div>
                    <h2 class="text-4xl font-black text-white leading-[1.15] mb-5 tracking-tight drop-shadow-xl">
                        Mulai perjalanan<br>
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-300 to-blue-200">bebas antre.</span>
                    </h2>
                    <p class="text-blue-100/80 text-sm font-medium leading-relaxed drop-shadow-md max-w-sm">
                        Daftar sekali, booking kapan saja. Tidak perlu lagi datang hanya untuk mengecek apakah mesin cuci sedang kosong.
                    </p>
                </div>

                <div class="relative space-y-4 stagger-3">
                    <div class="flex items-center gap-4 text-sm text-white font-bold bg-white/5 p-3.5 rounded-2xl border border-white/10 backdrop-blur-sm animate-float-slow w-max">
                        <div class="w-8 h-8 rounded-xl bg-white/20 flex items-center justify-center shrink-0 shadow-lg border border-white/30 text-xs">1</div>
                        Buat akun dalam 1 menit
                    </div>
                    <div class="flex items-center gap-4 text-sm text-white font-bold bg-white/5 p-3.5 rounded-2xl border border-white/10 backdrop-blur-sm animate-float-fast w-max ml-6">
                        <div class="w-8 h-8 rounded-xl bg-white/20 flex items-center justify-center shrink-0 shadow-lg border border-white/30 text-xs">2</div>
                        Pilih jadwal & booking
                    </div>
                    <div class="flex items-center gap-4 text-sm text-white font-bold bg-white/5 p-3.5 rounded-2xl border border-white/10 backdrop-blur-sm animate-float-slow w-max ml-12" style="animation-delay: 0.5s;">
                        <div class="w-8 h-8 rounded-xl bg-white/20 flex items-center justify-center shrink-0 shadow-lg border border-white/30 text-xs">3</div>
                        Terima notifikasi selesai
                    </div>
                </div>

            </div>
        </div>

        <div class="w-full md:w-7/12 p-8 sm:p-12 lg:px-16 flex flex-col justify-center bg-white relative z-10">
            
            <div class="text-center md:text-left mb-8 stagger-2">
                <h2 class="text-3xl lg:text-4xl font-black text-slate-900 tracking-tight mb-3">Daftar Gratis ✨</h2>
                <p class="text-slate-500 font-medium text-sm">Lengkapi data diri Anda di bawah untuk mulai menggunakan layanan.</p>
            </div>

            @if ($errors->any())
                <div class="stagger-2 bg-rose-50 border border-rose-100 text-rose-600 p-4 rounded-2xl mb-8 flex items-start gap-3 text-sm shadow-sm">
                    <svg class="w-5 h-5 shrink-0 mt-0.5 text-rose-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span class="font-bold">{{ $errors->first() }}</span>
                </div>
            @endif

            <form action="{{ route('register.submit') }}" method="POST" class="space-y-5 stagger-3">
                @csrf
                
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    
                    <div>
                        <label class="block text-[11px] font-black text-slate-400 uppercase tracking-widest mb-2 pl-1">Nama Lengkap</label>
                        <div class="relative group input-glow rounded-2xl bg-slate-50 border-2 border-slate-100 transition-all duration-300">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400 group-focus-within:text-blue-500 transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            </div>
                            <input type="text" name="name" value="{{ old('name') }}" class="w-full pl-11 pr-4 py-3.5 rounded-2xl bg-transparent outline-none text-sm font-bold text-slate-800 placeholder-slate-300" placeholder="Nama Anda" required>
                        </div>
                    </div>

                    <div>
                        <label class="block text-[11px] font-black text-slate-400 uppercase tracking-widest mb-2 pl-1">No. WhatsApp</label>
                        <div class="relative group input-glow rounded-2xl bg-slate-50 border-2 border-slate-100 transition-all duration-300">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400 group-focus-within:text-blue-500 transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                            </div>
                            <input type="tel" name="phone" value="{{ old('phone') }}" class="w-full pl-11 pr-4 py-3.5 rounded-2xl bg-transparent outline-none text-sm font-bold text-slate-800 placeholder-slate-300" placeholder="08xx-xxxx" required>
                        </div>
                    </div>

                </div>

                <div>
                    <label class="block text-[11px] font-black text-slate-400 uppercase tracking-widest mb-2 pl-1">Email Aktif</label>
                    <div class="relative group input-glow rounded-2xl bg-slate-50 border-2 border-slate-100 transition-all duration-300">
                        <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none text-slate-400 group-focus-within:text-blue-500 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path></svg>
                        </div>
                        <input type="email" name="email" value="{{ old('email') }}" class="w-full pl-12 pr-4 py-4 rounded-2xl bg-transparent outline-none text-sm font-bold text-slate-800 placeholder-slate-300" placeholder="nama@email.com" required>
                    </div>
                </div>

                <div>
                    <label class="block text-[11px] font-black text-slate-400 uppercase tracking-widest mb-2 pl-1">Kata Sandi Baru</label>
                    <div class="relative group input-glow rounded-2xl bg-slate-50 border-2 border-slate-100 transition-all duration-300">
                        <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none text-slate-400 group-focus-within:text-blue-500 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                        </div>
                        <input type="password" name="password" id="passwordInput" class="w-full pl-12 pr-12 py-4 rounded-2xl bg-transparent outline-none text-sm font-bold text-slate-800 placeholder-slate-300" placeholder="Minimal 6 karakter" required minlength="6">
                        <button type="button" onclick="togglePassword()" class="absolute inset-y-0 right-0 pr-5 flex items-center text-slate-300 hover:text-blue-600 transition-colors focus:outline-none">
                            <svg id="eyeIcon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                        </button>
                    </div>
                </div>

                <button type="submit" class="btn-shimmer w-full text-white font-black py-4 rounded-2xl flex justify-center items-center gap-2 mt-8 text-sm tracking-wide">
                    DAFTAR SEKARANG
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </button>
            </form>

            <div class="stagger-4 text-center mt-8">
                <p class="text-sm text-slate-500 font-medium">
                    Sudah punya akun? 
                    <a href="{{ route('login') }}" class="text-blue-600 font-black hover:text-blue-800 transition-colors ml-1 border-b-2 border-transparent hover:border-blue-600 pb-0.5">Masuk di sini</a>
                </p>
            </div>
        </div>
    </div>

    {{-- Script Lihat/Sembunyikan Password --}}
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