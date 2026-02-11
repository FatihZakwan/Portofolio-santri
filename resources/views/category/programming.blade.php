<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori - Programming | PondokKarya</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>

        /* 2. GLASS EFFECT UTILITY */
        .glass-pill {
            background: rgba(255, 255, 255, 0.4);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.6);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        }

        /* 3. MARQUEE ANIMATION (Carousel Jalan) */
        @keyframes marquee {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
        @keyframes marquee-reverse {
            0% { transform: translateX(-50%); }
            100% { transform: translateX(0); }
        }
        .animate-marquee {
            animation: marquee 40s linear infinite;
        }
        .animate-marquee-reverse {
            animation: marquee-reverse 40s linear infinite;
        }
        /* Pause saat di-hover */
        .animate-marquee:hover, 
        .animate-marquee-reverse:hover {
            animation-play-state: paused;
        }

        
    </style>
</head>
<body class="antialiased relative min-h-screen text-slate-800">

    <x-gradient/>

    <x-navbar />

    <header class="relative pt-40 pb-16 px-4 text-center z-10">
        <div class="max-w-5xl mx-auto">
            
           

            <h1 class="text-7xl md:text-9xl font-extrabold mb-8 tracking-tighter text-slate-900 leading-none">
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 via-purple-600 to-orange-500">Programming</span>
            </h1>

            

            <div class="flex flex-wrap justify-center gap-3">
                @foreach(['Web Development'] as $sub)
                    <a href="#" class="glass-pill px-6 py-2.5 rounded-full text-sm font-bold text-slate-600 hover:bg-white hover:text-orange-600 hover:scale-105 transition-all duration-300 shadow-lg">
                        {{ $sub }}
                    </a>
                @endforeach
            </div>
        </div>
    </header>


    <main class="relative z-10 overflow-hidden pb-20">
        <div class="container mx-auto max-w-[1600px] px-4 md:px-10">

            <div class="mb-24">
                

                @php
                $topProjects = [
                    ['title' => 'Sistem Smart Garden AI', 'desc' => 'Otomasi penyiraman dengan machine learning.', 'auth' => 'Santri Tech', 'img' => 'https://picsum.photos/800/600?random=1'],
                    ['title' => 'E-Tahfidz Pro', 'desc' => 'Platform manajemen hafalan Quran realtime.', 'auth' => 'Mobile Div', 'img' => 'https://picsum.photos/800/600?random=2'],
                    ['title' => 'Masjid Super App', 'desc' => 'Integrasi infaq, jadwal, dan kajian.', 'auth' => 'Fatih Dev', 'img' => 'https://picsum.photos/800/600?random=3'],
                    ['title' => 'Robot Pemadam Api', 'desc' => 'Juara 1 Kontes Robotik Nasional 2025.', 'auth' => 'Robo Squad', 'img' => 'https://picsum.photos/800/600?random=4'],
                    ['title' => 'Film Pendek: "Pulang"', 'desc' => 'Sinematografi kehidupan santri modern.', 'auth' => 'Cinema Club', 'img' => 'https://picsum.photos/800/600?random=5'],
                    ['title' => 'Poster Dakwah Viral', 'desc' => 'Koleksi aset visual dakwah instagram.', 'auth' => 'DKV Team', 'img' => 'https://picsum.photos/800/600?random=6'],
                ];
                @endphp

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($topProjects as $index => $top)
                        <a href="/project" class="group relative rounded-[2.5rem] overflow-hidden shadow-sm hover:shadow-2xl transition-all duration-500 block h-[450px] border border-slate-100">
                            <img src="{{ $top['img'] }}" alt="{{ $top['title'] }}" class="w-full h-full object-cover transform transition-transform duration-700 group-hover:scale-105">
                            
                            

                            <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/40 to-transparent flex flex-col justify-end p-8">
                                <div class="transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                                    <h3 class="text-white text-2xl font-bold mb-2 leading-tight group-hover:text-orange-400 transition-colors">{{ $top['title'] }}</h3>
                                    <p class="text-slate-300 text-sm line-clamp-2 mb-4 opacity-0 group-hover:opacity-100 transition-opacity duration-500 delay-75">{{ $top['desc'] }}</p>
                                    
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center gap-2">
                                            <div class="w-6 h-6 rounded-full bg-orange-500 flex items-center justify-center text-white text-[10px] font-bold">{{ substr($top['auth'], 0, 1) }}</div>
                                            <span class="text-white font-medium text-sm">{{ $top['auth'] }}</span>
                                        </div>
                                        <div class="bg-white text-slate-900 w-10 h-10 rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all duration-300 transform translate-x-4 group-hover:translate-x-0">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>

        </div> <div class="py-16  mb-20 relative">
            
            <div class="container mx-auto max-w-[1600px] px-4 md:px-10 mb-10 text-center">
               
                <h2 class="text-2xl font-bold text-slate-800 mt-2">Karya Lainnya</h2>
            </div>

            <div class="flex gap-6 mb-6 w-max animate-marquee relative z-10">
                @foreach(range(1, 12) as $i)
                    <div class="w-[300px] flex-shrink-0 h-[200px] rounded-2xl overflow-hidden relative group cursor-default shadow-sm">
                        <img src="https://picsum.photos/300/200?random={{ $i + 100 }}" class="w-full h-full object-cover filter grayscale-[30%] group-hover:grayscale-0 transition-all duration-500">
                        
                        

                        <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-black/90 via-black/50 to-transparent p-4 pt-10 flex flex-col justify-end opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <h4 class="font-bold text-white text-sm line-clamp-1 leading-tight mb-1">Project Santri #{{ $i }}</h4>
                            <span class="text-xs text-slate-300 font-medium">by Kelas {{ rand(10,12) }}</span>
                        </div>
                    </div>
                @endforeach
                @foreach(range(1, 12) as $i)
                    <div class="w-[300px] flex-shrink-0 h-[200px] rounded-2xl overflow-hidden relative group cursor-default shadow-sm">
                        <img src="https://picsum.photos/300/200?random={{ $i + 100 }}" class="w-full h-full object-cover filter grayscale-[30%] group-hover:grayscale-0 transition-all duration-500">
                        <div class="absolute top-3 right-3 bg-slate-900/80 backdrop-blur-sm text-white text-[10px] font-bold px-2.5 py-1 rounded-md opacity-0 group-hover:opacity-100 transition-opacity z-20">
                            Showcase
                        </div>
                        <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-black/90 via-black/50 to-transparent p-4 pt-10 flex flex-col justify-end opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <h4 class="font-bold text-white text-sm line-clamp-1 leading-tight mb-1">Project Santri #{{ $i }}</h4>
                            <span class="text-xs text-slate-300 font-medium">by Kelas {{ rand(10,12) }}</span>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="flex gap-6 w-max animate-marquee-reverse relative z-10">
                @foreach(range(1, 12) as $i)
                    <div class="w-[300px] flex-shrink-0 h-[200px] rounded-2xl overflow-hidden relative group cursor-default shadow-sm">
                        <img src="https://picsum.photos/300/200?random={{ $i + 200 }}" class="w-full h-full object-cover filter grayscale-[30%] group-hover:grayscale-0 transition-all duration-500">
                        <div class="absolute top-3 right-3 bg-slate-900/80 backdrop-blur-sm text-white text-[10px] font-bold px-2.5 py-1 rounded-md opacity-0 group-hover:opacity-100 transition-opacity z-20">
                            Showcase
                        </div>
                        <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-black/90 via-black/50 to-transparent p-4 pt-10 flex flex-col justify-end opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <h4 class="font-bold text-white text-sm line-clamp-1 leading-tight mb-1">Karya Digital #{{ $i }}</h4>
                            <span class="text-xs text-slate-300 font-medium">by Multimedia</span>
                        </div>
                    </div>
                @endforeach
                @foreach(range(1, 12) as $i)
                    <div class="w-[300px] flex-shrink-0 h-[200px] rounded-2xl overflow-hidden relative group cursor-default shadow-sm">
                        <img src="https://picsum.photos/300/200?random={{ $i + 200 }}" class="w-full h-full object-cover filter grayscale-[30%] group-hover:grayscale-0 transition-all duration-500">
                        <div class="absolute top-3 right-3 bg-slate-900/80 backdrop-blur-sm text-white text-[10px] font-bold px-2.5 py-1 rounded-md opacity-0 group-hover:opacity-100 transition-opacity z-20">
                            Showcase
                        </div>
                        <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-black/90 via-black/50 to-transparent p-4 pt-10 flex flex-col justify-end opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <h4 class="font-bold text-white text-sm line-clamp-1 leading-tight mb-1">Karya Digital #{{ $i }}</h4>
                            <span class="text-xs text-slate-300 font-medium">by Multimedia</span>
                        </div>
                    </div>
                @endforeach
            </div>

            
        </div>

    </main>
    <x-footer/>

    

    
</body>
</html>