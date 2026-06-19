<nav class="sticky top-0 z-50 w-full bg-white/90 backdrop-blur-md border-b border-gray-100 shadow-sm transition-all duration-300">
    <div class="w-full px-4 sm:px-8 lg:px-12">
        <div class="flex justify-between items-center h-20 relative">
            
            <div class="flex items-center gap-10">
                <a href="{{ route('home') }}" class="flex items-center group">
                    <img src="{{ asset('img/logo.png') }}" alt="LaundryQ Logo" class="h-13 w-auto object-contain transform group-hover:scale-105 transition-transform duration-300 drop-shadow-sm">
                </a>
                
                <div class="hidden md:flex items-center gap-1">
                    <a href="{{ route('home') }}" class="px-4 py-2 rounded-full text-gray-600 font-medium hover:text-blue-600 hover:bg-blue-50 transition-all duration-300">Beranda</a>
                    <a href="{{ route('home') }}#cara-kerja" class="px-4 py-2 rounded-full text-gray-600 font-medium hover:text-blue-600 hover:bg-blue-50 transition-all duration-300">Cara Kerja</a>
                    <a href="{{ route('home') }}#cek-slot" class="px-4 py-2 rounded-full text-gray-600 font-medium hover:text-blue-600 hover:bg-blue-50 transition-all duration-300">Cek Slot</a>
                    <a href="{{ route('home') }}#keunggulan" class="px-4 py-2 rounded-full text-gray-600 font-medium hover:text-blue-600 hover:bg-blue-50 transition-all duration-300">Keunggulan</a>
                    <a href="{{ route('home') }}#layanan" class="px-4 py-2 rounded-full text-gray-600 font-medium hover:text-blue-600 hover:bg-blue-50 transition-all duration-300">Layanan</a>
                    <a href="{{ route('home') }}#testimoni" class="px-4 py-2 rounded-full text-gray-600 font-medium hover:text-blue-600 hover:bg-blue-50 transition-all duration-300">Testimoni</a>
                </div>
            </div>

            <div class="hidden md:flex items-center gap-4">
                @auth
                    <div class="flex items-center gap-2 mr-2 border-r border-gray-200 pr-6">
                        <a href="{{ route('booking.create') }}" class="flex items-center gap-2 text-sm font-bold text-gray-700 hover:text-blue-600 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            Pesan Antrean
                        </a>
                        <span class="text-gray-300 mx-1">•</span>
                        <a href="{{ route('tracking.index') }}" class="flex items-center gap-2 text-sm font-bold text-gray-700 hover:text-blue-600 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                            Pesanan Saya
                        </a>
                    </div>
                    
                    <div class="flex items-center gap-2.5 mr-2 bg-gray-50 px-3 py-1.5 rounded-full border border-gray-100">
                        <div class="bg-blue-100 rounded-full p-1.5">
                            <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        </div>
                        <span class="font-bold tracking-wide text-gray-700 text-sm truncate max-w-[120px]">
                            Hai, {{ explode(' ', Auth::user()->name)[0] }}
                        </span>
                    </div>

                    @if(Auth::user()->role === 'admin')
                        <a href="{{ route('admin.dashboard') }}" class="bg-gradient-to-r from-red-500 to-orange-500 hover:from-red-600 hover:to-orange-600 text-white px-4 py-2 rounded-xl text-sm font-bold shadow-lg shadow-red-500/20 hover:-translate-y-0.5 transition-all flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            Area Admin
                        </a>
                    @endif
                    
                    <form action="{{ route('logout') }}" method="POST" class="inline m-0 p-0">
                        @csrf
                        <button type="submit" class="bg-gray-50 hover:bg-red-50 text-gray-600 hover:text-red-600 border border-gray-200 hover:border-red-200 px-5 py-2 rounded-xl text-sm font-bold transition-all duration-300">
                            Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="group relative bg-gradient-to-r from-blue-600 to-cyan-500 px-6 py-2.5 rounded-xl shadow-lg shadow-blue-500/30 hover:shadow-blue-500/50 hover:-translate-y-0.5 transition-all duration-300 flex items-center gap-2 overflow-hidden">
                        <div class="absolute inset-0 -translate-x-full bg-gradient-to-r from-transparent via-white/30 to-transparent group-hover:animate-[shimmer_1.5s_infinite]"></div>
                        
                        <span class="relative text-white font-black text-sm tracking-wide">
                            Login / Daftar
                        </span>
                        <svg class="relative w-4 h-4 text-white group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </a>
                @endauth
            </div>

            <div class="md:hidden flex items-center">
                <button id="mobile-menu-btn" class="text-gray-600 hover:text-blue-600 focus:outline-none p-2 transition-colors">
                    <svg id="icon-menu" class="w-7 h-7 block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                    <svg id="icon-close" class="w-7 h-7 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

        </div>
    </div>

    <div id="mobile-menu" class="hidden md:hidden absolute top-20 left-0 w-full bg-white/95 backdrop-blur-lg border-b border-gray-100 shadow-xl overflow-y-auto max-h-[80vh]">
        <div class="px-4 pt-4 pb-6 space-y-2">
            <a href="{{ route('home') }}" class="block px-4 py-3 rounded-xl text-base font-bold text-blue-600 bg-blue-50">Beranda</a>
            <a href="{{ route('home') }}#cara-kerja" class="block px-4 py-3 rounded-xl text-base font-medium text-gray-600 hover:text-blue-600 hover:bg-blue-50">Cara Kerja</a>
            <a href="{{ route('home') }}#cek-slot" class="block px-4 py-3 rounded-xl text-base font-medium text-gray-600 hover:text-blue-600 hover:bg-blue-50">Cek Slot</a>
            <a href="{{ route('home') }}#keunggulan" class="block px-4 py-3 rounded-xl text-base font-medium text-gray-600 hover:text-blue-600 hover:bg-blue-50">Keunggulan</a>
            <a href="{{ route('home') }}#layanan" class="block px-4 py-3 rounded-xl text-base font-medium text-gray-600 hover:text-blue-600 hover:bg-blue-50">Layanan</a>
            <a href="{{ route('home') }}#testimoni" class="block px-4 py-3 rounded-xl text-base font-medium text-gray-600 hover:text-blue-600 hover:bg-blue-50">Testimoni</a>
            
            <div class="border-t border-gray-100 mt-4 pt-4">
                @auth
                    <div class="flex items-center gap-3 px-4 py-3 bg-gray-50 rounded-xl mb-3 border border-gray-100">
                        <div class="bg-blue-100 rounded-full p-2">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        </div>
                        <div>
                            <p class="text-xs text-gray-400 font-bold uppercase tracking-wider">Masuk Sebagai</p>
                            <p class="font-black text-gray-800">{{ Auth::user()->name }}</p>
                        </div>
                    </div>

                    <a href="{{ route('booking.create') }}" class="block px-4 py-3 rounded-xl text-base font-bold text-gray-700 hover:text-blue-600 hover:bg-blue-50 flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        Pesan Antrean Baru
                    </a>
                    
                    <a href="{{ route('tracking.index') }}" class="block px-4 py-3 rounded-xl text-base font-bold text-gray-700 hover:text-blue-600 hover:bg-blue-50 flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                        Lacak Pesanan Saya
                    </a>

                    @if(Auth::user()->role === 'admin')
                        <a href="{{ route('admin.dashboard') }}" class="block px-4 py-3 rounded-xl text-base font-bold text-orange-600 bg-orange-50 hover:bg-orange-100 flex items-center gap-2 mt-1">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            Masuk Area Admin
                        </a>
                    @endif

                    <form action="{{ route('logout') }}" method="POST" class="mt-4">
                        @csrf
                        <button type="submit" class="w-full bg-rose-50 text-rose-600 hover:bg-rose-100 font-bold px-4 py-3 rounded-xl text-center transition-colors">
                            Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="block w-full text-center px-4 py-3 rounded-xl text-base font-bold bg-gradient-to-r from-blue-600 to-cyan-500 text-white shadow-md">
                        Login / Daftar
                    </a>
                @endauth
            </div>
        </div>
    </div>
</nav>

<style>
    @keyframes shimmer {
        100% { transform: translateX(100%); }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const btn = document.getElementById('mobile-menu-btn');
        const menu = document.getElementById('mobile-menu');
        const iconMenu = document.getElementById('icon-menu');
        const iconClose = document.getElementById('icon-close');

        // Fungsi klik tombol hamburger
        if(btn && menu) {
            btn.addEventListener('click', () => {
                menu.classList.toggle('hidden');
                
                // Tukar Icon Garis 3 dan Silang (Close)
                if(menu.classList.contains('hidden')) {
                    iconMenu.classList.remove('hidden');
                    iconMenu.classList.add('block');
                    iconClose.classList.add('hidden');
                    iconClose.classList.remove('block');
                } else {
                    iconMenu.classList.add('hidden');
                    iconMenu.classList.remove('block');
                    iconClose.classList.remove('hidden');
                    iconClose.classList.add('block');
                }
            });
        }

        // Fitur Tambahan: Tutup menu otomatis kalau user nge-klik salah satu link
        const mobileLinks = menu.querySelectorAll('a');
        mobileLinks.forEach(link => {
            link.addEventListener('click', () => {
                menu.classList.add('hidden');
                iconMenu.classList.remove('hidden');
                iconMenu.classList.add('block');
                iconClose.classList.add('hidden');
                iconClose.classList.remove('block');
            });
        });
    });
</script>