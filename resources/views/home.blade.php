@extends('layouts.layout')

@section('content')

<!-- ============================================================
     DESIGN TOKENS & STYLES (CLEAN & ELEGANT)
     ============================================================ -->
<style>
    /* Pola garis halus tipis (grid pattern) untuk background */
    .bg-grid-pattern {
        background-size: 40px 40px;
        background-image:
            linear-gradient(to right, rgba(59, 130, 246, 0.04) 2px, transparent 2px),
            linear-gradient(to bottom, rgba(59, 130, 246, 0.04) 2px, transparent 2px);
    }

    /* Floating sangat halus khusus untuk mesin cuci */
    @keyframes float-subtle {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-12px); }
    }
    .animate-float-subtle {
        animation: float-subtle 3s ease-in-out infinite;
    }

    /* Menyembunyikan scrollbar bawaan browser biar rapi (untuk slider) */
    .hide-scrollbar::-webkit-scrollbar {
        display: none;
    }
    .hide-scrollbar {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
</style>

<!-- ============================================================
     KOMPONEN LANDING PAGE (DIPANGGIL DARI FOLDER COMPONENTS)
     ============================================================ -->
@include('components.landing.hero')
@include('components.landing.intro')
@include('components.landing.cara-kerja')
@include('components.landing.cek-slot')
@include('components.landing.keunggulan')
@include('components.landing.tentang')
@include('components.landing.layanan')
@include('components.landing.testimoni')

<!-- ============================================================
     FLOATING SUPPORT WIDGET (WHATSAPP ADMIN)
     ============================================================ -->
<div class="fixed bottom-6 right-6 z-50 flex items-center gap-3 group">
    <div class="bg-white text-slate-800 text-xs font-black px-4 py-2.5 rounded-xl shadow-2xl border border-slate-100 opacity-0 translate-x-4 group-hover:opacity-100 group-hover:translate-x-0 transition-all duration-300 pointer-events-none whitespace-nowrap uppercase tracking-widest">
        Butuh Bantuan?
    </div>
    
    <a href="https://wa.me/6289234" target="_blank" title="Hubungi Bantuan Admin"
       class="w-14 h-14 bg-gradient-to-r from-blue-600 to-cyan-500 text-white rounded-full flex items-center justify-center shadow-lg shadow-blue-500/40 hover:shadow-blue-500/60 hover:scale-110 active:scale-95 transition-all duration-300">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3 18v-6a9 9 0 0118 0v6M4 16h2a1 1 0 011 1v3a1 1 0 01-1 1H4a1 1 0 01-1-1v-3a1 1 0 011-1zm14 0h2a1 1 0 011 1v3a1 1 0 01-1 1h-2a1 1 0 01-1-1v-3a1 1 0 011-1z" />
            <path stroke-linecap="round" stroke-linejoin="round" d="M7 19h2a2 2 0 002-2v-1" />
        </svg>
    </a>
</div>

<!-- ============================================================
     SCRIPTS GLOBAL (UNTUK SEMUA KOMPONEN)
     ============================================================ -->

<!-- Script Testimoni Slider -->
<script>
    function scrollTesti(direction) {
        const container = document.getElementById('testimoni-container');
        if(!container) return; // Mencegah error jika elemen belum dimuat
        
        // Ambil lebar 1 card (card pertama)
        const cardWidth = container.children[0].offsetWidth; 
        // Tambahkan gap (24px atau 1.5rem dari gap-6 Tailwind)
        const scrollAmount = cardWidth + 24; 
        
        container.scrollBy({
            left: direction * scrollAmount,
            behavior: 'smooth'
        });
    }
</script>

<!-- Script Hero Carousel -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const items = document.querySelectorAll('.carousel-item');
        if(items.length === 0) return; // Mencegah error jika elemen belum dimuat
        
        const dots = document.querySelectorAll('.carousel-dot');
        const texts = document.querySelectorAll('.carousel-text');
        const bgs = document.querySelectorAll('.carousel-bg');

        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');

        let currentIndex = 0;
        const intervalTime = 6000;
        let slideInterval;

        function updateCarousel(index) {
            items.forEach((item, i) => {
                const text = texts[i];
                const bg = bgs[i];
                const dotProgress = dots[i].querySelector('.progress-bar');

                if (i === index) {
                    item.classList.remove('opacity-0', 'z-0');
                    item.classList.add('opacity-100', 'z-10');

                    text.classList.remove('translate-y-8', 'opacity-0');
                    text.classList.add('translate-y-0', 'opacity-100');

                    bg.classList.remove('scale-100');
                    bg.classList.add('scale-105');

                    dots[i].classList.remove('bg-white/40');
                    dots[i].classList.add('bg-blue-600');

                    dotProgress.style.transitionDuration = `${intervalTime}ms`;
                    dotProgress.style.width = '100%';
                } else {
                    item.classList.remove('opacity-100', 'z-10');
                    item.classList.add('opacity-0', 'z-0');

                    text.classList.remove('translate-y-0', 'opacity-100');
                    text.classList.add('translate-y-8', 'opacity-0');

                    bg.classList.remove('scale-105');
                    bg.classList.add('scale-100');

                    dots[i].classList.remove('bg-blue-600');
                    dots[i].classList.add('bg-white/40');

                    dotProgress.style.transitionDuration = '0ms';
                    dotProgress.style.width = '0%';
                }
            });
        }

        function nextSlide() {
            currentIndex = (currentIndex + 1) % items.length;
            updateCarousel(currentIndex);
        }

        function prevSlide() {
            currentIndex = (currentIndex - 1 + items.length) % items.length;
            updateCarousel(currentIndex);
        }

        function resetInterval() {
            clearInterval(slideInterval);
            slideInterval = setInterval(nextSlide, intervalTime);
        }

        if(nextBtn && prevBtn) {
            nextBtn.addEventListener('click', () => {
                nextSlide();
                resetInterval();
            });

            prevBtn.addEventListener('click', () => {
                prevSlide();
                resetInterval();
            });
        }

        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
                currentIndex = index;
                updateCarousel(currentIndex);
                resetInterval();
            });
        });

        setTimeout(() => {
            updateCarousel(0);
            slideInterval = setInterval(nextSlide, intervalTime);
        }, 100);
    });
</script>

<!-- Script Cek Slot AJAX -->
<script>
    function handleCekSlot() {
        const tanggalInput = document.getElementById('tanggal-cek').value;
        const placeholder = document.getElementById('placeholder-slot');
        const containerHasil = document.getElementById('hasil-slot-container');
        const gridSlot = document.getElementById('grid-slot-waktu');

        if (!tanggalInput) return;

        placeholder.classList.add('hidden');
        containerHasil.classList.remove('hidden');
        gridSlot.innerHTML = `
            <div class="col-span-1 sm:col-span-2 text-center text-slate-400 py-4 text-xs font-bold uppercase tracking-wider">
                Mencari slot di database...
            </div>
        `;

        fetch(`/api/cek-slot?tanggal=${tanggalInput}`)
            .then(response => response.json())
            .then(data => {
                gridSlot.innerHTML = '';

                if (data.length === 0) {
                    gridSlot.innerHTML = `
                        <div class="col-span-1 sm:col-span-2 p-4 text-center border border-dashed border-slate-200 rounded-xl text-slate-400 text-sm font-medium">
                            Yah, tidak ada jadwal operasional mesin untuk tanggal ini.
                        </div>`;
                    return;
                }

                data.forEach(slot => {
                    let badgeClass = '';
                    let borderClass = '';

                    if (slot.color === 'emerald') {
                        badgeClass = 'bg-emerald-50 text-emerald-600 border-emerald-100';
                        borderClass = 'border-slate-100 bg-white';
                    } else if (slot.color === 'amber') {
                        badgeClass = 'bg-amber-50 text-amber-600 border-amber-100';
                        borderClass = 'border-slate-100 bg-white';
                    } else {
                        badgeClass = 'bg-rose-50 text-rose-500 border-rose-100';
                        borderClass = 'border-slate-100 bg-slate-50/50 opacity-60';
                    }

                    gridSlot.innerHTML += `
                        <div class="flex items-center justify-between p-3.5 border rounded-xl shadow-sm transition-all ${borderClass}">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                <span class="text-xs font-black text-slate-700">${slot.waktu}</span>
                            </div>
                            <span class="inline-flex items-center gap-1 px-2.5 py-1 text-[10px] font-black uppercase rounded-lg border ${badgeClass}">
                                ${slot.status} ${slot.sisa > 0 ? `(Sisa: ${slot.sisa})` : ''}
                            </span>
                        </div>
                    `;
                });
            })
            .catch(error => {
                gridSlot.innerHTML = `
                    <div class="col-span-1 sm:col-span-2 p-4 text-center border border-rose-100 bg-rose-50 rounded-xl text-rose-500 text-sm font-bold">
                        Gagal terhubung ke server. Silakan coba lagi.
                    </div>`;
                console.error("Error fetching slots:", error);
            });
    }
</script>

@endsection