<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori - PortoSantri</title>
    
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
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 via-purple-600 to-orange-500">DKV</span>
            </h1>

            

            <div class="flex flex-wrap justify-center gap-3">
                @foreach(['Logo & Branding'] as $sub)
                    <a href="#" class="glass-pill px-6 py-2.5 rounded-full text-sm font-bold text-slate-600 hover:bg-white hover:text-orange-600 hover:scale-105 transition-all duration-300 shadow-xl">
                        {{ $sub }}
                    </a>
                @endforeach
            </div>
        </div>
    </header>


    <main class="relative z-10 overflow-hidden pb-20">
    <div class="py-16  mb-20 relative">
            

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
        <div class="container mx-auto max-w-[1600px] px-6">

            @php
            $projects = [
                ['title' => 'Smart Garden IoT', 'auth' => 'Santri Tech', 'img' => 'https://picsum.photos/400/600?random=1'],
                ['title' => 'Branding Kit 2026', 'auth' => 'Multimedia', 'img' => 'https://picsum.photos/400/400?random=2'],
                ['title' => 'Dakwah Visual', 'auth' => 'Comic Studio', 'img' => 'https://picsum.photos/400/550?random=3'],
                ['title' => 'Masjid App UI', 'auth' => 'Fatih Dev', 'img' => 'https://picsum.photos/400/350?random=4'],
                ['title' => 'Photography Class', 'auth' => 'Lens Santri', 'img' => 'https://picsum.photos/400/650?random=5'],
                ['title' => 'Tahfidz Tracker', 'auth' => 'Mobile Div', 'img' => 'https://picsum.photos/400/450?random=6'],
                ['title' => 'Cinematic Profile', 'auth' => 'Cinema Club', 'img' => 'https://picsum.photos/400/300?random=7'],
                ['title' => '3D Kaligrafi', 'auth' => 'Art Lab', 'img' => 'https://picsum.photos/400/500?random=8'],
            ];
            @endphp

            <div class="columns-2 md:columns-3 lg:columns-4 gap-6 space-y-6">
                @foreach($projects as $item)
                    <div class="break-inside-avoid relative group rounded-3xl overflow-hidden cursor-pointer">
                        <img src="{{ $item['img'] }}" alt="{{ $item['title'] }}" class="w-full h-auto object-cover transform transition-transform duration-700 group-hover:scale-110">
                        
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-6">
                            <div class="transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                                <h3 class="text-white font-bold text-lg leading-tight mb-1 drop-shadow-md">{{ $item['title'] }}</h3>
                                <div class="flex items-center gap-2 text-slate-200">
                                    <span class="text-xs font-medium uppercase tracking-wider opacity-80">{{ $item['auth'] }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>


        </div>
        

    </main>
    <x-footer/>

    

    
</body>
</html>