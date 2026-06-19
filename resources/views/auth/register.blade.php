<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - LaundryQ</title>
    @vite(['resources/css/app.css'])
</head>
<body class="relative min-h-screen flex items-center justify-center font-sans overflow-hidden bg-slate-50">

    <div class="absolute inset-0 z-0">
        <img src="{{ asset('img/background-laundry.jpg') }}" alt="Background Laundry" class="w-full h-full object-cover">
        
        <div class="absolute inset-0 bg-gradient-to-r from-[#0061ff]/100 via-[#00c6ff]/80 to-[#f0f9ff]/95"></div>
    </div>

    <a href="{{ route('home') }}" class="absolute top-6 left-6 lg:top-10 lg:left-10 z-20 flex items-center gap-2 text-white/90 hover:text-white font-semibold text-sm transition-colors bg-white/10 hover:bg-white/20 px-4 py-2 rounded-full backdrop-blur-md border border-white/20">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
        Kembali
    </a>

    <div class="relative z-10 w-full max-w-7xl mx-auto px-6 lg:px-12 flex flex-col lg:flex-row items-center justify-between gap-12 pt-20 lg:pt-0">
        
        <div class="w-full lg:w-1/2 text-white">
            <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-white/10 border border-white/20 backdrop-blur-md mb-6 text-xs font-bold text-cyan-100 tracking-widest uppercase shadow-lg">
                <span class="w-1.5 h-1.5 rounded-full bg-cyan-300 animate-pulse"></span>
                Gratis Selamanya
            </div>
            
            <h1 class="text-4xl lg:text-6xl font-black leading-[1.1] mb-6 tracking-tight drop-shadow-lg">
                Mulai perjalanan<br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-100 to-cyan-100">bebas antre.</span>
            </h1>
            
            <p class="text-white/90 text-lg mb-8 max-w-lg leading-relaxed drop-shadow-md">
                Daftar sekali, booking kapan saja. Tidak perlu lagi datang hanya untuk mengecek apakah mesin cuci sedang kosong.
            </p>

            <div class="flex flex-col gap-4">
                <div class="flex items-center gap-4 text-sm font-bold bg-white/10 px-5 py-3.5 rounded-2xl border border-white/20 backdrop-blur-md shadow-lg w-max">
                    <div class="w-8 h-8 rounded-xl bg-white/20 flex items-center justify-center shrink-0 shadow-sm border border-white/30 text-xs">1</div>
                    Buat akun dalam 1 menit
                </div>
                <div class="flex items-center gap-4 text-sm font-bold bg-white/10 px-5 py-3.5 rounded-2xl border border-white/20 backdrop-blur-md shadow-lg w-max lg:ml-6">
                    <div class="w-8 h-8 rounded-xl bg-white/20 flex items-center justify-center shrink-0 shadow-sm border border-white/30 text-xs">2</div>
                    Pilih jadwal & booking
                </div>
                <div class="flex items-center gap-4 text-sm font-bold bg-white/10 px-5 py-3.5 rounded-2xl border border-white/20 backdrop-blur-md shadow-lg w-max lg:ml-12">
                    <div class="w-8 h-8 rounded-xl bg-white/20 flex items-center justify-center shrink-0 shadow-sm border border-white/30 text-xs">3</div>
                    Terima notifikasi selesai
                </div>
            </div>
        </div>

        <div class="w-full lg:w-5/12 max-w-md flex justify-end pb-10 lg:pb-0">
            <div class="w-full bg-white/95 backdrop-blur-xl rounded-3xl shadow-2xl border border-slate-100 p-8 sm:p-10">
                
                <div class="mb-8">
                    <img src="{{ asset('img/logo.png') }}" alt="Logo LaundryQ" class="h-14 object-contain mb-6">
                    <h2 class="text-3xl font-black text-slate-800 tracking-tight mb-2">Daftar Gratis ✨</h2>
                    <p class="text-slate-500 font-medium">Lengkapi data diri Anda di bawah ini.</p>
                </div>

                @if ($errors->any())
                    <div class="bg-rose-50 border border-rose-100 text-rose-600 p-4 rounded-xl mb-6 flex items-start gap-3 text-sm">
                        <svg class="w-5 h-5 shrink-0 mt-0.5 text-rose-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span class="font-bold">{{ $errors->first() }}</span>
                    </div>
                @endif

                <form action="{{ route('register.submit') }}" method="POST" class="space-y-4">
                    @csrf
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        
                        <div>
                            <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-1.5 pl-1">Nama Lengkap</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                </div>
                                <input type="text" name="name" value="{{ old('name') }}" class="w-full pl-10 pr-3 py-3 rounded-xl border-2 border-slate-100 bg-slate-50 focus:bg-white focus:border-[#0061ff] focus:ring-0 outline-none transition-all text-sm font-bold text-slate-800 placeholder-slate-400" placeholder="Nama Anda" required>
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-1.5 pl-1">No. WhatsApp</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                                </div>
                                <input type="tel" name="phone" value="{{ old('phone') }}" class="w-full pl-10 pr-3 py-3 rounded-xl border-2 border-slate-100 bg-slate-50 focus:bg-white focus:border-[#0061ff] focus:ring-0 outline-none transition-all text-sm font-bold text-slate-800 placeholder-slate-400" placeholder="08xx-xxxx" required>
                            </div>
                        </div>

                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-1.5 pl-1">Email Aktif</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path></svg>
                            </div>
                            <input type="email" name="email" value="{{ old('email') }}" class="w-full pl-11 pr-4 py-3.5 rounded-xl border-2 border-slate-100 bg-slate-50 focus:bg-white focus:border-[#0061ff] focus:ring-0 outline-none transition-all text-sm font-bold text-slate-800 placeholder-slate-400" placeholder="nama@email.com" required>
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-1.5 pl-1">Kata Sandi Baru</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                            </div>
                            <input type="password" name="password" id="passwordInput" class="w-full pl-11 pr-12 py-3.5 rounded-xl border-2 border-slate-100 bg-slate-50 focus:bg-white focus:border-[#0061ff] focus:ring-0 outline-none transition-all text-sm font-bold text-slate-800 placeholder-slate-400" placeholder="Minimal 6 karakter" required minlength="6">
                            <button type="button" onclick="togglePassword()" class="absolute inset-y-0 right-0 pr-4 flex items-center text-slate-400 hover:text-[#0061ff] transition-colors focus:outline-none">
                                <svg id="eyeIcon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                            </button>
                        </div>
                    </div>

                    <button type="submit" class="w-full bg-gradient-to-r from-[#0061ff] to-[#00c6ff] hover:from-[#0055e6] hover:to-[#00b2e6] text-white font-black py-4 rounded-xl flex justify-center items-center gap-2 mt-6 text-[15px] tracking-wide transition-transform transform hover:-translate-y-0.5 shadow-lg shadow-blue-500/30">
                        DAFTAR SEKARANG
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </button>
                </form>

                <div class="text-center mt-8">
                    <p class="text-sm text-slate-500 font-medium">
                        Sudah punya akun? 
                        <a href="{{ route('login') }}" class="text-[#0061ff] font-black hover:text-[#0055e6] transition-colors ml-1 border-b-2 border-transparent hover:border-[#0061ff] pb-0.5">Masuk di sini</a>
                    </p>
                </div>
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