<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LaundryQ</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-800 flex flex-col min-h-screen">

    @include('layouts.navbar')

    <main class="flex-grow">
        @yield('content')
    </main>

    @include('layouts.footer')


<div id="welcomeModal" class="fixed inset-0 z-[100] hidden items-center justify-center transition-opacity duration-500 opacity-0 px-4">
    <div class="absolute inset-0 bg-gray-900/60 backdrop-blur-sm" id="modalBackdrop"></div>

    <div class="relative bg-white w-full max-w-4xl rounded-[2rem] shadow-2xl transform scale-95 transition-transform duration-500 overflow-hidden flex flex-col md:flex-row" id="modalContent">
        
        <button id="closeModalBtn" class="absolute top-4 right-4 md:top-6 md:right-6 text-gray-400 hover:text-gray-800 hover:bg-gray-100 p-2 rounded-full transition-all duration-300 focus:outline-none z-20">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
        </button>

        <div class="w-full md:w-1/2 relative h-48 md:h-auto hidden sm:block">
            <img src="{{ asset('img/welcome.jpg') }}" alt="LaundryQ Service" class="w-full h-full object-cover">
            
            <div class="absolute inset-0 bg-gradient-to-t from-blue-900/90 via-blue-900/20 to-transparent flex flex-col justify-end p-8">
                <div class="flex items-center gap-2 mb-2">
                    
                    <span class="text-2xl font-black text-white tracking-tight drop-shadow-md">
                        Laundry<span class="text-cyan-300">Q</span>
                    </span>
                </div>
                <p class="text-blue-100 text-sm font-medium">Bebas antre, pakaian bersih maksimal.</p>
            </div>
        </div>

        <div class="w-full sm:w-full md:w-1/2 p-8 md:p-12 flex flex-col justify-center relative bg-white">
            <span class="inline-block px-3 py-1 bg-blue-50 text-blue-600 rounded-full text-xs font-bold uppercase tracking-wider w-max mb-6 border border-blue-100">
                Pengguna Baru ✨
            </span>
            
            <h3 class="text-3xl lg:text-4xl font-black text-gray-900 mb-4 tracking-tight leading-tight">
                Selamat Datang di <br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-cyan-500">LaundryQ!</span>
            </h3>
            
            <p class="text-gray-500 text-sm leading-relaxed mb-8">
                Solusi cerdas buat kamu yang sibuk. Tinggalkan cara lama, mulai booking slot cucianmu secara online dan pantau statusnya langsung dari genggaman. Siap mencoba?
            </p>

            <div class="space-y-3 mt-auto">
                <a href="{{ route('booking.create') }}" class="flex items-center justify-center gap-2 w-full py-4 px-4 bg-gradient-to-r from-blue-600 to-cyan-500 text-white font-black rounded-xl shadow-lg shadow-blue-500/30 hover:shadow-blue-500/50 hover:-translate-y-0.5 transition-all">
                    Pesan Antrean Sekarang
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </a>
                <button id="exploreBtn" class="block w-full py-4 px-4 bg-gray-50 text-gray-600 font-bold rounded-xl border border-gray-200 hover:bg-gray-100 hover:text-blue-600 transition-colors">
                    Nanti Saja, Jelajahi Dulu
                </button>
            </div>
        </div>

    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const modal = document.getElementById('welcomeModal');
        const modalContent = document.getElementById('modalContent');
        const closeModalBtn = document.getElementById('closeModalBtn');
        const exploreBtn = document.getElementById('exploreBtn');
        const modalBackdrop = document.getElementById('modalBackdrop');

        function closeModal() {
            modal.classList.remove('opacity-100');
            modal.classList.add('opacity-0');
            modalContent.classList.remove('scale-100');
            modalContent.classList.add('scale-95');
            
            setTimeout(() => {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
            }, 500);
        }

        // --- GANTI KEY MENJADI v3 UNTUK TESTING ---
        const hasVisited = localStorage.getItem('laundryq_visited_v3');

        if (!hasVisited) {
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            
            setTimeout(() => {
                modal.classList.remove('opacity-0');
                modal.classList.add('opacity-100');
                modalContent.classList.remove('scale-95');
                modalContent.classList.add('scale-100');
            }, 100);

            // Simpan ingatan baru
            localStorage.setItem('laundryq_visited_v3', 'true');
        }

        closeModalBtn.addEventListener('click', closeModal);
        exploreBtn.addEventListener('click', closeModal);
        modalBackdrop.addEventListener('click', closeModal);
    });
</script>

</body>
</html>