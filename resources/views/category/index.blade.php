<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $activeMainCategory }} - PortoSantri</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        .glass-pill {
            background: rgba(255, 255, 255, 0.4);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.6);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }
        .glass-pill.active {
            background: #f97316;
            color: white;
            border-color: #f97316;
        }
        @keyframes marquee { 0% { transform: translateX(0); } 100% { transform: translateX(-50%); } }
        .animate-marquee { animation: marquee 40s linear infinite; }
        .animate-marquee:hover { animation-play-state: paused; }
    </style>
</head>
<body class="antialiased relative min-h-screen text-slate-800">

    <x-gradient/>
    <x-navbar />

    <header class="relative pt-40 pb-16 px-4 text-center z-10">
        <div class="max-w-5xl mx-auto">
            
            <h1 class="text-7xl md:text-9xl font-extrabold mb-8 tracking-tighter text-slate-900 leading-none">
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 via-purple-600 to-orange-500">
                    {{ $activeMainCategory }}
                </span>
            </h1>

            <div class="flex flex-wrap justify-center gap-3">
                <a href="{{ route('project.index', ['main' => $activeMainCategory]) }}" 
                   class="glass-pill px-6 py-2.5 rounded-full text-sm font-bold {{ !$filter ? 'active' : 'text-slate-600 hover:bg-white hover:text-orange-600' }}">
                    Semua
                </a>

                @foreach($subCategories as $sub)
                    <a href="{{ route('project.index', ['main' => $activeMainCategory, 'cat' => $sub]) }}" 
                       class="glass-pill px-6 py-2.5 rounded-full text-sm font-bold {{ $filter == $sub ? 'active' : 'text-slate-600 hover:bg-white hover:text-orange-600' }}">
                        {{ $sub }}
                    </a>
                @endforeach
            </div>
        </div>
    </header>

    <main class="relative z-10 overflow-hidden pb-20">
        
    <div class="py-16 mb-20 relative">
             <div class="flex gap-6 mb-6 w-max animate-marquee relative z-10">
                @php
                    // Ambil 10 project terbaru/acak untuk slider
                    $sliderProjects = $projects->count() > 5 ? $projects : $projects->merge($projects)->merge($projects); 
                @endphp

                @foreach($sliderProjects as $sliderItem)
                    <a href="{{ url('/detail-project/' . $sliderItem->id) }}" class="w-[300px] flex-shrink-0 h-[200px] rounded-2xl overflow-hidden relative group cursor-pointer shadow-sm border border-white/50 bg-white/30 backdrop-blur-sm block">
                        
                        <img src="{{ asset('storage/' . $sliderItem->thumbnail) }}" 
                             alt="{{ $sliderItem->title }}" 
                             class="w-full h-full object-cover filter grayscale-[30%] group-hover:grayscale-0 transition-all duration-500 transform group-hover:scale-110">
                        
                        <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-black/90 via-black/50 to-transparent p-4 pt-10 flex flex-col justify-end opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            
                            <span class="text-[10px] font-bold text-orange-400 uppercase tracking-wider mb-1">
                                {{ $sliderItem->sub_category }}
                            </span>

                            <h4 class="font-bold text-white text-sm line-clamp-1 leading-tight mb-1">
                                {{ $sliderItem->title }}
                            </h4>
                            
                            <span class="text-xs text-slate-300 font-medium truncate">
                                by {{ is_array($sliderItem->authors) ? $sliderItem->authors[0] : $sliderItem->authors }}
                            </span>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>

        <div class="container mx-auto max-w-[1600px] px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($projects as $project)
                    <a href="{{ url('/detail-project/' . $project->id) }}" class="group relative rounded-[2.5rem] overflow-hidden shadow-sm hover:shadow-2xl transition-all duration-500 block h-[450px] border border-slate-100 bg-white">
                        <img src="{{ asset('storage/' . $project->thumbnail) }}" alt="{{ $project->title }}" class="w-full h-full object-cover transform transition-transform duration-700 group-hover:scale-105">
                        
                        <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/40 to-transparent flex flex-col justify-end p-8">
                            <div class="transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                                <h3 class="text-white text-2xl font-bold mb-2 leading-tight group-hover:text-orange-400 transition-colors">{{ $project->title }}</h3>
                                <div class="flex items-center gap-2">
                                    <span class="text-white font-medium text-sm">
                                        {{ is_array($project->authors) ? $project->authors[0] : $project->authors }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </a>
                @empty
                    <div class="col-span-full text-center py-20">
                        <p class="text-slate-400 text-lg">Belum ada karya di kategori ini.</p>
                    </div>
                @endforelse
            </div>
        </div>

    </main>
    <x-footer/>
</body>
</html>