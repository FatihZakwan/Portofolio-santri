<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projek - PortoSantri</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    
</head>
<body class="antialiased relative min-h-screen text-slate-800">

    <x-gradient/>

    <x-navbar />

    <header class="relative pt-32 pb-10 px-4 text-center z-10">
        <div class="max-w-4xl mx-auto">
            
            <div class="mb-6 flex justify-center items-center gap-2 text-sm font-semibold text-slate-400">
                <span class="uppercase tracking-widest">Programming</span>
                <span>•</span>
                <span class="uppercase tracking-widest">IoT System</span>
            </div>

            <h1 class="text-4xl md:text-6xl font-extrabold mb-6 tracking-tight text-slate-900 leading-tight">
                Sistem Smart Garden <br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-600 to-purple-500">Berbasis AI & IoT</span>
            </h1>

            <div class="items-center justify-center mb-10">
                <div class="text-sm text-slate-400 font-medium mb-4">
                    <span class="block text-xs text-slate-400 font-bold uppercase tracking-wider mb-2">Created by</span>
                    <span class="block text-m text-slate-800 uppercase font-extrabold tracking-wider">Ihsan Ramadhan Al - arif</span>
                </div>
            </div>

        </div>
    </header>

    <main class="px-4 md:px-8 pb-20 relative z-10">
        <div class="container mx-auto max-w-6xl">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6 mb-10">
                <div class="col-span-1 md:col-span-2 h-[400px] md:h-[600px] rounded-[2.5rem] overflow-hidden shadow-xl border border-slate-100 group">
                    <img src="https://picsum.photos/1200/800?random=1" class="w-full h-full object-cover transform transition-transform duration-1000 group-hover:scale-105">
                </div>
                <div class="h-[300px] md:h-[400px] rounded-[2rem] overflow-hidden shadow-lg border border-slate-100 group">
                    <img src="https://picsum.photos/600/600?random=2" class="w-full h-full object-cover transform transition-transform duration-700 group-hover:scale-110">
                </div>
                <div class="h-[300px] md:h-[400px] rounded-[2rem] overflow-hidden shadow-lg border border-slate-100 group">
                    <img src="https://picsum.photos/600/600?random=3" class="w-full h-full object-cover transform transition-transform duration-700 group-hover:scale-110">
                </div>
            </div>

            <p class="text-slate-600 text-lg md:text-xl leading-relaxed max-w-2xl mx-auto text-center mb-20">
                Projek ini menggabungkan sensor kelembaban tanah dengan mikrokontroler ESP32 untuk mengotomatisasi penyiraman tanaman di kebun pondok. Dilengkapi dashboard monitoring realtime.
            </p>

            <div class="">
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-10 px-2">
                
                <div class="flex-1 flex items-center gap-4 overflow-hidden">
                    <div>
                        <span class="inline-flex text-sm font-bold text-orange-500 px-6 py-2 bg-white border border-slate-200 rounded-full shadow-sm hover:border-orange-500 hover:shadow-md hover:bg-orange-500 hover:text-white transition-all duration-300 ">Explore More</span>
                        <h2 class="text-2xl md:text-3xl font-extrabold text-slate-900 whitespace-nowrap">
                            Karya Programming Lainnya
                        </h2>
                    </div>
                    
                    
                </div>

                <div class="flex-shrink-0">
                    <a href="#" class="group inline-flex items-center gap-2 px-6 py-2.5 bg-white border border-slate-200 rounded-full shadow-xl hover:border-orange-500 hover:shadow-2xl hover:bg-orange-50 transition-all duration-300">
                        <span class="text-sm font-bold text-slate-600 group-hover:text-orange-600 transition-colors">Lihat Semua</span>
                        
                        <div class="w-6 h-6 rounded-full bg-slate-100 flex items-center justify-center group-hover:bg-orange-500 transition-colors group-hover:translate-x-1 duration-300">
                            <svg class="w-3 h-3 text-slate-500 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </div>
                    </a>
                </div>

            </div>

                @php
                    // Tambah data dummy jadi banyak biar bisa dislide
                    $related = [
                        ['title' => 'E-Tahfidz Mobile', 'auth' => 'Mobile Div', 'img' => 'https://picsum.photos/400/300?random=10'],
                        ['title' => 'Robot Line Follower', 'auth' => 'Robo Squad', 'img' => 'https://picsum.photos/400/300?random=11'],
                        ['title' => 'Web Profil Pondok', 'auth' => 'Web Team', 'img' => 'https://picsum.photos/400/300?random=12'],
                        ['title' => 'Absensi QR Code', 'auth' => 'System Admin', 'img' => 'https://picsum.photos/400/300?random=13'],
                        ['title' => 'Kantin Cashless', 'auth' => 'Fintech Club', 'img' => 'https://picsum.photos/400/300?random=14'],
                        ['title' => 'Perpus Digital', 'auth' => 'Library Team', 'img' => 'https://picsum.photos/400/300?random=15'],
                    ];
                @endphp

                <div class="swiper mySwiper w-full pb-10">
                    <div class="swiper-wrapper">
                        @foreach($related as $item)
                            <div class="swiper-slide">
                                <a href="#" class="group relative block rounded-[2rem] overflow-hidden h-72 shadow-sm hover:shadow-2xl transition-all duration-300">
                                    <img src="{{ $item['img'] }}" class="w-full h-full object-cover transform transition-transform duration-700 group-hover:scale-110">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-6">
                                        <div class="transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                                            <h3 class="font-bold text-xl text-white leading-tight mb-1">
                                                {{ $item['title'] }}
                                            </h3>
                                            <div class="flex items-center gap-2 text-slate-300 text-sm">
                                                <span class="font-medium text-xs">{{ $item['auth'] }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                   
                </div>

            </div>

        </div>
    </main>

    <x-footer/>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 1, // Default HP: 1 slide
            spaceBetween: 20,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next-custom",
                prevEl: ".swiper-button-prev-custom",
            },
            breakpoints: {
                640: {
                    slidesPerView: 2, // Tablet: 2 slide
                    spaceBetween: 20,
                },
                1024: {
                    slidesPerView: 3, // Laptop: 3 slide
                    spaceBetween: 30,
                },
            },
        });
    </script>
</body>
</html>