<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $project->title }} - PortoSantri</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        /* Perbaikan agar shadow tidak terpotong */
        .swiper {
            padding: 20px 10px 50px 10px !important; /* Top Right Bottom Left */
        }
        .swiper-pagination-bullet-active {
            background-color: #f97316 !important; /* Orange */
        }
    </style>
</head>
<body class="antialiased relative min-h-screen text-slate-800">

    <x-gradient/>
    <x-navbar />

    <header class="relative pt-36 pb-10 px-4 text-center z-10">
        <div class="max-w-4xl mx-auto">
            
            <div class="mb-6 flex justify-center items-center gap-2 text-sm font-semibold text-slate-400">
                <a href="{{ route('project.index', ['main' => $project->category]) }}" class="uppercase tracking-widest hover:text-orange-500 transition">{{ $project->category }}</a>
                <span>•</span>
                <a href="{{ route('project.index', ['main' => $project->category, 'cat' => $project->sub_category]) }}" class="uppercase tracking-widest hover:text-orange-500 transition">{{ $project->sub_category }}</a>
            </div>

            <h1 class="text-4xl md:text-6xl font-extrabold mb-6 tracking-tight text-slate-900 leading-tight">
                {{ $project->title }}
            </h1>

            <div class="items-center justify-center mb-10">
                <div class="text-sm text-slate-400 font-medium mb-4">
                    <span class="block text-xs text-slate-400 font-bold uppercase tracking-wider mb-2">Created by</span>
                    <span class="block text-m text-slate-800 uppercase font-extrabold tracking-wider">
                        @if(is_array($project->authors))
                            {{ implode(', ', $project->authors) }}
                        @else
                            {{ $project->authors }}
                        @endif
                    </span>
                </div>
            </div>

        </div>
    </header>

    <main class="px-4 md:px-8 pb-20 relative z-10">
        <div class="container mx-auto max-w-6xl">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6 mb-10">
                <div class="col-span-1 md:col-span-2 h-[400px] md:h-[600px] rounded-[2.5rem] overflow-hidden shadow-xl border border-slate-100 group">
                    <img src="{{ asset('storage/' . $project->thumbnail) }}" alt="{{ $project->title }}" class="w-full h-full object-cover transform transition-transform duration-1000 group-hover:scale-105">
                </div>

                @if(isset($project->gallery) && is_array($project->gallery) && count($project->gallery) > 0)
                    @foreach(array_slice($project->gallery, 0, 2) as $galleryImage)
                        <div class="h-[300px] md:h-[400px] rounded-[2rem] overflow-hidden shadow-lg border border-slate-100 group">
                            <img src="{{ asset('storage/' . $galleryImage) }}" class="w-full h-full object-cover transform transition-transform duration-700 group-hover:scale-110">
                        </div>
                    @endforeach
                @endif
            </div>

            <div class="max-w-3xl mx-auto text-center mb-24">
                <p class="text-slate-600 text-lg md:text-xl leading-relaxed whitespace-pre-line">
                    {{ $project->description ?? 'Tidak ada deskripsi untuk proyek ini.' }}
                </p>
            </div>

            <div class="border-t border-slate-200 pt-16">
                
                <div class="flex flex-col items-center justify-center gap-6 mb-12 px-4 text-center">
                    <div>
                        <span class="text-orange-500 font-bold tracking-widest text-xs uppercase mb-2 block">Explore More</span>
                        <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900 leading-tight">
                            Karya {{ $project->category }} Lainnya
                        </h2>
                    </div>

                    <div class="flex-shrink-0">
                        <a href="{{ route('project.index', ['main' => $project->category]) }}" class="group inline-flex items-center gap-2 px-8 py-3 bg-white border border-slate-200 rounded-full shadow-md hover:border-orange-500 hover:shadow-xl hover:bg-orange-50 transition-all duration-300">
                            <span class="text-sm font-bold text-slate-600 group-hover:text-orange-600 transition-colors">Lihat Semua</span>
                            <div class="w-6 h-6 rounded-full bg-slate-100 flex items-center justify-center group-hover:bg-orange-500 transition-colors group-hover:translate-x-1 duration-300">
                                <svg class="w-3 h-3 text-slate-500 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>
                            </div>
                        </a>
                    </div>
                </div>

                @if($related->count() > 0)
                    <div class="swiper mySwiper w-full !px-4">
                        <div class="swiper-wrapper pb-10">
                            @foreach($related as $item)
                                <div class="swiper-slide h-auto">
                                    <a href="{{ route('project.detail', $item->id) }}" class="group relative block rounded-[2.5rem] overflow-hidden h-[350px] shadow-md hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 border border-slate-100">
                                        <img src="{{ asset('storage/' . $item->thumbnail) }}" class="w-full h-full object-cover transform transition-transform duration-700 group-hover:scale-110">
                                        
                                        <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-8">
                                            <div class="transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                                                <span class="inline-block px-3 py-1 bg-orange-500 text-white text-[10px] font-bold rounded-full mb-3 shadow-lg">
                                                    {{ $item->sub_category }}
                                                </span>
                                                <h3 class="font-bold text-xl text-white leading-tight mb-2 drop-shadow-md">
                                                    {{ $item->title }}
                                                </h3>
                                                <div class="flex items-center gap-2 text-slate-300 text-sm">
                                                    <span class="font-medium text-xs uppercase tracking-wide">
                                                        {{ is_array($item->authors) ? $item->authors[0] : $item->authors }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                @else
                    <div class="text-center py-12 bg-slate-50 rounded-3xl border border-dashed border-slate-200">
                        <p class="text-slate-400 font-medium">Belum ada karya lain di kategori ini.</p>
                    </div>
                @endif

            </div>

        </div>
    </main>

    <x-footer/>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 1, 
            spaceBetween: 24, // Jarak diperlebar agar tidak mepet
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
                dynamicBullets: true,
            },
            breakpoints: {
                640: {
                    slidesPerView: 2,
                    spaceBetween: 24,
                },
                1024: {
                    slidesPerView: 3, 
                    spaceBetween: 32, // Di layar besar jarak lebih lebar
                },
            },
        });
    </script>
</body>
</html>