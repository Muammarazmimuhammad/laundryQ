<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - LaundryQ</title>
    @vite(['resources/css/app.css'])
</head>
<body class="relative min-h-screen flex items-center justify-center font-sans overflow-hidden">

    <div class="absolute inset-0 z-0">
        <img src="{{ asset('img/background-laundry.jpg') }}" alt="Background Laundry" class="w-full h-full object-cover">
        
        <div class="absolute inset-0 bg-gradient-to-r from-[#0061ff]/100 via-[#00c6ff]/70 to-[#f0f9ff]/95"></div>
    </div>

    <a href="{{ route('home') }}" class="absolute top-6 left-6 lg:top-10 lg:left-10 z-20 flex items-center gap-2 text-white/90 hover:text-white font-semibold text-sm transition-colors bg-white/10 hover:bg-white/20 px-4 py-2 rounded-full backdrop-blur-md border border-white/20">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
        Kembali
    </a>

    <div class="relative z-10 w-full max-w-7xl mx-auto px-6 lg:px-12 flex flex-col lg:flex-row items-center justify-between gap-12 pt-20 lg:pt-0">
        
        <div class="w-full lg:w-1/2 text-white">
            <h1 class="text-4xl lg:text-6xl font-black leading-[1.1] mb-6 tracking-tight drop-shadow-lg">
                Sistem Cerdas,<br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-100 to-cyan-100">Revolusi Cara Mencuci.</span>
            </h1>
            <p class="text-white/90 text-lg mb-8 max-w-lg leading-relaxed drop-shadow-md">
                Masuk sekarang untuk mengatur slot waktumu. Tinggalkan kebiasaan antre panjang dan mulai pantau cucian dari genggaman.
            </p>

            <div class="flex flex-wrap gap-4">
                <div class="flex items-center gap-3 text-sm font-bold bg-white/20 px-4 py-2.5 rounded-xl border border-white/20 backdrop-blur-md shadow-lg">
                    <svg class="w-5 h-5 text-white-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    Bebas Antrean Fisik
                </div>
                <div class="flex items-center gap-3 text-sm font-bold bg-white/20 px-4 py-2.5 rounded-xl border border-white/20 backdrop-blur-md shadow-lg">
                    <svg class="w-5 h-5 text-white-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                    Pantauan Real-Time
                </div>
            </div>
        </div>

        <div class="w-full lg:w-5/12 max-w-md flex justify-end">
            <div class="w-full bg-white/95 backdrop-blur-xl rounded-3xl shadow-2xl border border-slate-100 p-8 sm:p-10">
                
                <div class="mb-8">
                    <img src="{{ asset('img/logo.png') }}" alt="Logo LaundryQ" class="h-14 object-contain mb-6">
                    <h2 class="text-3xl font-black text-slate-800 tracking-tight mb-2">Selamat Datang 👋</h2>
                    <p class="text-slate-500 font-medium">Silakan masuk ke akun Anda.</p>
                </div>

                @error('email')
                    <div class="bg-rose-50 border border-rose-100 text-rose-600 p-4 rounded-xl mb-6 flex items-start gap-3 text-sm">
                        <svg class="w-5 h-5 shrink-0 mt-0.5 text-rose-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span class="font-bold">{{ $message }}</span>
                    </div>
                @enderror

                <form action="{{ route('login.submit') }}" method="POST" class="space-y-5">
                    @csrf
                    
                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">Alamat Email</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path></svg>
                            </div>
                            <input type="email" name="email" value="{{ old('email') }}" class="w-full pl-11 pr-4 py-3.5 rounded-xl border-2 border-slate-100 bg-slate-50 focus:bg-white focus:border-[#0061ff] focus:ring-0 outline-none transition-all text-sm font-bold text-slate-800 placeholder-slate-400" placeholder="nama@email.com" required>
                        </div>
                    </div>

                    <div>
                        <div class="flex justify-between items-center mb-2">
                            <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest">Kata Sandi</label>
                            <a href="#" class="text-xs font-bold text-[#0061ff] hover:text-[#0055e6] transition-colors">Lupa sandi?</a>
                        </div>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                            </div>
                            <input type="password" name="password" id="passwordInput" class="w-full pl-11 pr-12 py-3.5 rounded-xl border-2 border-slate-100 bg-slate-50 focus:bg-white focus:border-[#0061ff] focus:ring-0 outline-none transition-all text-sm font-bold text-slate-800 placeholder-slate-400" placeholder="••••••••" required>
                            <button type="button" onclick="togglePassword()" class="absolute inset-y-0 right-0 pr-4 flex items-center text-slate-400 hover:text-[#0061ff] transition-colors focus:outline-none">
                                <svg id="eyeIcon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                            </button>
                        </div>
                    </div>

                    <div class="pt-1 flex items-center gap-3">
                        <input type="checkbox" name="remember" id="remember" class="w-4 h-4 rounded text-[#0061ff] focus:ring-[#0061ff] border-slate-300 cursor-pointer">
                        <label for="remember" class="text-sm font-bold text-slate-500 hover:text-slate-800 cursor-pointer select-none transition-colors">Tetap masuk di perangkat ini</label>
                    </div>

                    <button type="submit" class="w-full bg-gradient-to-r from-[#0061ff] to-[#00c6ff] hover:from-[#0055e6] hover:to-[#00b2e6] text-white font-black py-4 rounded-xl flex justify-center items-center gap-2 mt-6 text-[15px] tracking-wide transition-transform transform hover:-translate-y-0.5 shadow-lg shadow-blue-500/30">
                        MASUK SEKARANG
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </button>
                </form>

                <div class="text-center mt-8">
                    <p class="text-sm text-slate-500 font-medium">
                        Pengguna baru? 
                        <a href="{{ route('register') }}" class="text-[#0061ff] font-black hover:text-[#0055e6] transition-colors ml-1 border-b-2 border-transparent hover:border-[#0061ff] pb-0.5">Daftar Akun Gratis</a>
                    </p>
                </div>
            </div>
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