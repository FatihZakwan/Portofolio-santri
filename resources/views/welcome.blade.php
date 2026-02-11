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
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-purple-600 via-orange-500 to-red-500 ">Santri Impian.</span>
            </h1>
            
            <p class="text-slate-500 text-xl md:text-2xl mb-12 max-w-2xl mx-auto font-light leading-relaxed">
                Wadah kreasi tanpa batas. Menampilkan inovasi teknologi dan seni terbaik dari lingkungan pesantren.
            </p>

            <form action="{{ route('welcome') }}" method="GET" class="relative max-w-2xl mx-auto group mb-10">
                <div class="absolute inset-0 bg-gradient-to-r from-purple-200 to-orange-200 rounded-full blur-xl opacity-30 group-hover:opacity-50 transition duration-500"></div>
                <div class="relative bg-white/60 backdrop-blur-xl border border-white rounded-full p-2 flex items-center shadow-xl hover:shadow-2xl transition-all hover:scale-[1.01]">
                    <div class="pl-5 text-slate-400">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>
                    
                    <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari (cth: IoT, Ahmad, Poster...)" 
                           class="w-full bg-transparent border-none focus:ring-0 text-slate-800 placeholder-slate-400 px-4 py-3 outline-none text-lg">
                    
                    <button type="submit" class="bg-slate-900 text-white px-8 py-3 rounded-full font-bold shadow-lg hover:bg-orange-600 transition-colors">Cari</button>
                </div>
            </form>

            <div x-data="{ 
                activeCat: null, 
                categories: {
                    'Programming': ['Web Development', 'Mobile App', 'IoT System'],
                    'DKV': ['Graphic Design', 'Logo & Branding', 'UI/UX Design', 'ilustrasi', '3D Design'],
                    'Game': ['2D Game', '3D Game'],
                    'Media': ['Literasi', 'Foto', 'Video']
                },
                getLink(mainCat, subCat) {
                    var baseUrl = '{{ route('project.index') }}';
                    return baseUrl + '?main=' + encodeURIComponent(mainCat) + '&cat=' + encodeURIComponent(subCat);
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
                     class="relative">
                    <div class="absolute left-1/2 -translate-x-1/2 -top-2 w-4 h-4 bg-white/40 backdrop-blur-md border-l border-t border-white/60 rotate-45"></div>
                    <div class="inline-flex flex-wrap justify-center gap-2 p-4 bg-white/40 backdrop-blur-xl border border-white/50 rounded-2xl shadow-lg max-w-3xl">
                        <template x-for="sub in categories[activeCat]" :key="sub">
                            <a :href="getLink(activeCat, sub)" 
                               class="px-4 py-1.5 rounded-full bg-white/60 hover:bg-orange-500 hover:text-white text-slate-600 text-xs font-semibold border border-white/50 transition-all duration-200 cursor-pointer" 
                               x-text="sub">
                            </a>
                        </template>
                    </div>
                </div>
            </div> 
        </div>
    </header>

    <main class="px-4 md:px-8 pb-32 relative z-10">
        <div class="container mx-auto max-w-[1600px]">

            @if(request('q'))
                <div class="mb-8 text-center">
                    <p class="text-slate-500 text-lg">
                        Menampilkan hasil pencarian untuk: <span class="font-bold text-slate-900">"{{ request('q') }}"</span>
                    </p>
                    <a href="{{ route('welcome') }}" class="text-orange-500 text-sm hover:underline mt-1 inline-block font-medium">Reset Pencarian</a>
                </div>
            @endif

            <div id="projects-container" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 w-full">
                
                @include('partials.project-list', ['projects' => $projects])

            </div>

            <div id="loading-spinner" class="text-center py-10 hidden">
                <div class="inline-flex items-center gap-2 text-orange-500 font-bold">
                    <svg class="animate-spin h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    <span>Memuat karya lainnya...</span>
                </div>
            </div>

            @if($projects->hasMorePages())
                <div class="mt-20 text-center" id="load-more-wrapper">
                    <button id="load-more-btn" 
                            data-next-page="{{ $projects->nextPageUrl() }}" 
                            class="bg-white border border-slate-200 text-slate-600 px-8 py-3 rounded-full font-bold hover:bg-slate-50 hover:border-orange-300 hover:text-orange-500 hover:shadow-lg transition-all shadow-sm group">
                        
                        <span>Tampilkan Lainnya</span>
                        
                        <svg class="w-4 h-4 inline-block ml-1 group-hover:translate-y-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                </div>
            @endif

            @if($projects->count() == 0)
                <div class="col-span-full text-center py-20">
                    <div class="inline-block p-6 rounded-full bg-slate-50 mb-4">
                        <svg class="w-12 h-12 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <p class="text-slate-500 text-lg font-medium">Belum ada karya yang ditemukan.</p>
                </div>
            @endif

        </div>
    </main>

    <x-footer/>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const loadMoreBtn = document.getElementById('load-more-btn');
            const container = document.getElementById('projects-container');
            const spinner = document.getElementById('loading-spinner');
            const wrapper = document.getElementById('load-more-wrapper');

            if (loadMoreBtn) {
                loadMoreBtn.addEventListener('click', function() {
                    const url = this.getAttribute('data-next-page');
                    
                    this.classList.add('hidden');
                    spinner.classList.remove('hidden');

                    fetch(url, {
                        headers: { 'X-Requested-With': 'XMLHttpRequest' }
                    })
                    .then(response => response.json())
                    .then(data => {
                        container.insertAdjacentHTML('beforeend', data.html);
                        spinner.classList.add('hidden');

                        if (data.next_page) {
                            loadMoreBtn.setAttribute('data-next-page', data.next_page);
                            loadMoreBtn.classList.remove('hidden');
                        } else {
                            wrapper.innerHTML = '<p class="text-slate-300 text-sm italic mt-10">Semua karya sudah ditampilkan.</p>';
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        spinner.classList.add('hidden');
                        loadMoreBtn.classList.remove('hidden');
                    });
                });
            }
        });
    </script>
    
</body>
</html>