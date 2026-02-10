<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PondokKarya - Modern Portfolio</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        body { 
            font-family: 'Plus Jakarta Sans', sans-serif; 
            background-color: #ffffff; 
            overflow-x: hidden;
        }

        /* Blob Gradient Style */
        .gradient-blob {
            position: absolute;
            border-radius: 50%;
            filter: blur(80px); /* Blur tinggi biar nyatu kayak asap/awan */
            opacity: 0.6;        /* Transparansi biar gak nabrak teks */
            z-index: -1;         /* Pastikan di belakang */
        }

        .no-scrollbar::-webkit-scrollbar { display: none; }
    </style>
</head>
<body class="antialiased relative min-h-screen text-slate-800">

    <div class="fixed inset-0 w-full h-full overflow-hidden pointer-events-none bg-white">
        <div class="gradient-blob bg-purple-700 w-[300px] h-[300px] top-0 left-0" id="blob1"></div>
        <div class="gradient-blob bg-blue-500 w-[400px] h-[400px] top-0 right-0" id="blob2"></div>
        <div class="gradient-blob bg-orange-400 w-[450px] h-[450px] bottom-0 left-0" id="blob3"></div>
        <div class="gradient-blob bg-red-400 w-[350px] h-[350px] bottom-0 right-0" id="blob4"></div>
    </div>

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

            <div class="relative max-w-2xl mx-auto group">
                <div class="absolute inset-0 bg-gradient-to-r from-purple-200 to-orange-200 rounded-full blur-xl opacity-30 group-hover:opacity-50 transition duration-500"></div>
                <div class="relative bg-white/60 backdrop-blur-xl border border-white rounded-full p-2 flex items-center shadow-xl hover:shadow-2xl transition-all hover:scale-[1.01]">
                    <div class="pl-5 text-slate-400">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>
                    <input type="text" placeholder="Cari (cth: IoT System, Poster Dakwah...)" class="w-full bg-transparent border-none focus:ring-0 text-slate-800 placeholder-slate-400 px-4 py-3 outline-none text-lg">
                    <button class="bg-slate-900 text-white px-8 py-3 rounded-full font-bold shadow-lg hover:bg-orange-600 transition-colors">Cari</button>
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

    <footer class="text-center py-10 text-slate-400 text-sm relative z-10">
        &copy; 2026 PondokKarya.
    </footer>

    <script>
        // Kita seleksi semua elemen dengan class 'gradient-blob'
        const blobs = gsap.utils.toArray(".gradient-blob");

        blobs.forEach((blob) => {
            gsap.to(blob, {
                // Gerak Random X & Y (Jauh banget, rentang -400px sampai 400px dari posisi asal)
                x: "random(-400, 400)", 
                y: "random(-200, 800)",
                
                // Skala nafas (membesar mengecil random)
                scale: "random(0.8, 1.5)",
                
                // Durasi lambat (10-20 detik) biar smooth kayak air
                duration: "random(5, 10)",
                
                // Ease 'sine.inOut' bikin gerakan luwes kayak ombak
                ease: "sine.inOut",
                
                // Ulang selamanya
                repeat: -1,
                
                // PENTING: repeatRefresh: true bikin GSAP ngitung ulang koordinat random
                // setiap kali animasi selesai satu putaran. Jadi jalurnya GAK AKAN SAMA.
                repeatRefresh: true 
            });
        });
    </script>
</body>
</html>