<nav class="sticky top-0 z-50 w-full bg-white/90 backdrop-blur-md border-b border-gray-100 shadow-sm transition-all duration-300">
    <div class="w-full px-4 sm:px-8 lg:px-12">
        <div class="flex justify-between items-center h-20">
            
            <div class="flex items-center gap-10">
                <a href="{{ route('home') }}" class="flex items-center group">
                    <img src="{{ asset('img/logo.png') }}" alt="LaundryQ Logo" class="h-13 w-auto object-contain transform group-hover:scale-105 transition-transform duration-300 drop-shadow-sm">
                </a>
                
                <div class="hidden md:flex items-center gap-1">
                    <a href="{{ route('home') }}" class="px-4 py-2 rounded-full text-gray-600 font-medium hover:text-blue-600 hover:bg-blue-50 transition-all duration-300">Beranda</a>
                    <a href="{{ route('home') }}#keunggulan" class="px-4 py-2 rounded-full text-gray-600 font-medium hover:text-blue-600 hover:bg-blue-50 transition-all duration-300">Tentang Kami</a>
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
                <button class="text-gray-600 hover:text-blue-600 focus:outline-none p-2 transition-colors">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>

        </div>
    </div>
</nav>

<style>
    @keyframes shimmer {
        100% { transform: translateX(100%); }
    }
</style>