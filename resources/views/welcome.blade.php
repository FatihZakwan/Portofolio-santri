<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PondokKarya - Modern Portfolio</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    
</head>
<body class="antialiased relative min-h-screen text-slate-800">

    <x-gradient/>

    <x-navbar />

    <header class="relative pt-44 pb-20 px-4 text-center z-10">
        <div class="max-w-4xl mx-auto">
            
            <h1 class="text-6xl md:text-8xl font-extrabold mb-8 tracking-tight text-slate-900 leading-tight">
                Galeri Karya <br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-purple-600 via-orange-500 to-red-500 animate-pulse">Santri Impian.</span>
            </h1>
            
            <p class="text-slate-500 text-xl md:text-2xl mb-12 max-w-2xl mx-auto font-light leading-relaxed">
                Wadah kreasi tanpa batas. Menampilkan inovasi teknologi dan seni terbaik dari lingkungan pesantren.
            </p>

            <div class="relative max-w-2xl mx-auto group mb-10">
                <div class="absolute inset-0 bg-gradient-to-r from-purple-200 to-orange-200 rounded-full blur-xl opacity-30 group-hover:opacity-50 transition duration-500"></div>
                <div class="relative bg-white/60 backdrop-blur-xl border border-white rounded-full p-2 flex items-center shadow-xl hover:shadow-2xl transition-all hover:scale-[1.01]">
                    <div class="pl-5 text-slate-400">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>
                    <input type="text" placeholder="Cari (cth: IoT System, Poster Dakwah...)" class="w-full bg-transparent border-none focus:ring-0 text-slate-800 placeholder-slate-400 px-4 py-3 outline-none text-lg">
                    <button class="bg-slate-900 text-white px-8 py-3 rounded-full font-bold shadow-lg hover:bg-orange-600 transition-colors">Cari</button>
                </div>
            </div>

            <div x-data="{ 
                activeCat: null, 
                categories: {
                    'Programming': ['Web Development', 'Mobile App', 'IoT System', 'Machine Learning'],
                    'DKV': ['Graphic Design', 'Logo & Branding', 'UI/UX Design', 'ilustrasi'],
                    'Game': ['2D Animation', '3D Modeling', 'Motion Graphic', 'VFX'],
                    'Media': ['Literasi', 'Foto', 'Video']
                }
            }" class="space-y-6">

                <div class="flex flex-wrap justify-center gap-3">
                    <template x-for="(subs, cat) in categories" :key="cat">
                        <button 
                            @click="activeCat = (activeCat === cat ? null : cat)"
                            :class="activeCat === cat ? 'bg-slate-900 text-white border-slate-900' : 'bg-white/40 text-slate-600 border-white/60 hover:bg-white/70'"
                            class="backdrop-blur-md border px-6 py-2.5 rounded-full text-sm font-bold transition-all duration-300 hover:scale-105 shadow-xl"
                            x-text="cat">
                        </button>
                    </template>
                </div>

                <div x-show="activeCat" 
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 -translate-y-4"
                     x-transition:enter-end="opacity-100 translate-y-0"
                     x-transition:leave="transition ease-in duration-200"
                     x-transition:leave-start="opacity-100 translate-y-0"
                     x-transition:leave-end="opacity-0 -translate-y-4"
                     class="relative">
                    
                    <div class="absolute left-1/2 -translate-x-1/2 -top-2 w-4 h-4 bg-white/40 backdrop-blur-md border-l border-t border-white/60 rotate-45"></div>

                    <div class="inline-flex flex-wrap justify-center gap-2 p-4 bg-white/40 backdrop-blur-xl border border-white/50 rounded-2xl shadow-lg max-w-3xl">
                        <template x-for="sub in categories[activeCat]" :key="sub">
                            <a href="#" class="px-4 py-1.5 rounded-full bg-white/60 hover:bg-orange-500 hover:text-white text-slate-600 text-xs font-semibold border border-white/50 transition-all duration-200 cursor-pointer" x-text="sub">
                            </a>
                        </template>
                    </div>
                </div>

            </div>
            </div>
    </header>

    <main class="px-4 md:px-8 pb-32 relative z-10">
        <div class="container mx-auto max-w-[1600px]">

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

            <div class="mt-20 text-center">
                <button class="bg-white border border-slate-200 text-slate-600 px-8 py-3 rounded-full font-bold hover:bg-slate-50 hover:border-orange-300 hover:text-orange-500 transition-all shadow-sm">
                    Muat Lebih Banyak
                </button>
            </div>
        </div>
    </main>

    <x-footer/>

    
</body>
</html>