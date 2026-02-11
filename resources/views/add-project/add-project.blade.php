<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Karya | PondokKarya</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="//unpkg.com/alpinejs" defer></script>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        body { 
            font-family: 'Plus Jakarta Sans', sans-serif; 
            background-color: #f8fafc;
        }
        .gradient-blob {
            position: absolute;
            border-radius: 50%;
            filter: blur(80px);
            opacity: 0.6;
            z-index: -1;
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.65);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.8);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.05);
        }
        .modern-input {
            background: rgba(255, 255, 255, 0.5);
            border: 1px solid rgba(203, 213, 225, 0.6);
            transition: all 0.3s ease;
        }
        .modern-input:focus {
            background: white;
            border-color: #F97316;
            box-shadow: 0 0 0 4px rgba(249, 115, 22, 0.1);
        }
        /* Style saat tombol disabled */
        button:disabled {
            background-color: #cbd5e1;
            cursor: not-allowed;
            transform: none !important;
            box-shadow: none !important;
        }
    </style>
</head>
<body class="antialiased relative min-h-screen text-slate-800 pb-20">

    <div class="fixed inset-0 w-full h-full overflow-hidden pointer-events-none bg-slate-50">
        <div class="gradient-blob bg-purple-400 w-[600px] h-[600px] top-[-100px] left-[-100px]" id="blob1"></div>
        <div class="gradient-blob bg-orange-300 w-[500px] h-[500px] bottom-[-50px] right-[-100px]" id="blob2"></div>
        <div class="gradient-blob bg-blue-300 w-[400px] h-[400px] top-[40%] left-[30%]" id="blob3"></div>
    </div>

    <x-navbar />

    <div class="container mx-auto px-4 pt-36 max-w-4xl relative z-10">
        
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-orange-500 font-bold tracking-widest text-xs uppercase mb-2 block">Create New Project</span>
            <h1 class="text-4xl md:text-5xl font-extrabold text-slate-900 mb-4 tracking-tight">Upload Karya Santri</h1>
            <p class="text-slate-500 text-lg max-w-xl mx-auto">Waktunya menunjukkan inovasimu. Isi detail proyek dengan lengkap agar lebih menarik.</p>
        </div>

        <div class="glass-card rounded-[2.5rem] p-8 md:p-14 relative overflow-hidden" 
             x-data="{ 
                 title: '', 
                 category: '', 
                 hasAuthors: false, 
                 thumbnail: null,
                 
                 // Cek apakah semua field wajib terisi
                 get isValid() {
                     return this.title.length > 0 && 
                            this.category.length > 0 && 
                            this.hasAuthors && 
                            this.thumbnail !== null;
                 }
             }">
            
            <form action="#" method="POST" enctype="multipart/form-data" class="space-y-10">
                @csrf

                <div>
                    <h3 class="text-lg font-bold text-slate-800 mb-6 flex items-center gap-2">
                        <span class="w-8 h-8 rounded-full bg-orange-100 text-orange-600 flex items-center justify-center text-sm">1</span>
                        Informasi Proyek <span class="text-red-500 text-sm ml-1">*</span>
                    </h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="space-y-2 group">
                            <label class="text-sm font-bold text-slate-600 ml-1">Judul Proyek</label>
                            <input type="text" name="title" x-model="title" required
                                   placeholder="Misal: Sistem Monitoring Hidroponik" 
                                   class="modern-input w-full px-6 py-4 rounded-2xl outline-none font-medium text-slate-700 placeholder-slate-400">
                        </div>

                        <div class="space-y-2 group">
                            <label class="text-sm font-bold text-slate-600 ml-1">Kategori</label>
                            <div class="relative">
                                <select name="category" x-model="category" required 
                                        class="modern-input w-full px-6 py-4 rounded-2xl outline-none font-medium text-slate-700 appearance-none cursor-pointer">
                                    <option value="" disabled selected>Pilih Kategori...</option>
                                    <option value="Programming">Programming & Web</option>
                                    <option value="IoT">IoT & Robotics</option>
                                    <option value="Multimedia">Multimedia & Design</option>
                                    <option value="Animasi">Animasi & 3D</option>
                                </select>
                                <svg class="w-5 h-5 text-slate-400 absolute right-5 top-1/2 -translate-y-1/2 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </div>
                        </div>
                    </div>
                </div>

                <div x-data="authorTagInput()" x-effect="hasAuthors = authors.length > 0">
                    <h3 class="text-lg font-bold text-slate-800 mb-6 flex items-center gap-2">
                        <span class="w-8 h-8 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center text-sm">2</span>
                        Tim Pengembang <span class="text-red-500 text-sm ml-1">*</span>
                    </h3>

                    <div class="space-y-2">
                        <label class="text-sm font-bold text-slate-600 ml-1">Nama Anggota Tim</label>
                        
                        <div class="modern-input w-full px-4 py-3 rounded-2xl flex flex-wrap items-center gap-2 min-h-[60px]" 
                             :class="{'border-red-300': !hasAuthors && title.length > 0}"
                             @click="$refs.authInput.focus()">
                            
                            <template x-for="(author, index) in authors" :key="index">
                                <span class="bg-orange-100 text-orange-700 px-3 py-1.5 rounded-xl text-sm font-bold flex items-center gap-2 animate-pop-in">
                                    <span x-text="author"></span>
                                    <button type="button" @click="removeAuthor(index)" class="hover:text-red-500 transition">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                    </button>
                                    <input type="hidden" name="authors[]" :value="author">
                                </span>
                            </template>

                            <input x-ref="authInput" type="text" 
                                   @keydown.enter.prevent="addAuthor()" 
                                   @keydown.backspace="removeLastIfEmpty()"
                                   x-model="newAuthor"
                                   placeholder="Ketik nama lalu tekan Enter..." 
                                   class="bg-transparent outline-none flex-1 min-w-[150px] text-slate-700 placeholder-slate-400 py-1">
                        </div>
                        <p class="text-xs text-slate-400 ml-2" x-show="!hasAuthors">Wajib diisi minimal satu nama.</p>
                    </div>
                </div>

                <div>
                    <h3 class="text-lg font-bold text-slate-800 mb-6 flex items-center gap-2">
                        <span class="w-8 h-8 rounded-full bg-purple-100 text-purple-600 flex items-center justify-center text-sm">3</span>
                        Media & Berkas
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        
                        <div>
                            <label class="text-sm font-bold text-slate-600 ml-1 mb-2 block">
                                Thumbnail Utama <span class="text-red-500">*</span>
                            </label>
                            <div class="relative group h-64">
                                <input type="file" name="thumbnail" accept="image/*" required
                                       class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-20" 
                                       @change="thumbnail = $event.target.files[0]; previewImage($event, 'thumbPreview', 'thumbPlaceholder')">
                                
                                <div class="modern-input w-full h-full rounded-3xl flex flex-col items-center justify-center text-center p-4 bg-white/50 border-dashed border-2 hover:border-orange-400 hover:bg-orange-50 transition-all group-hover:scale-[1.02]">
                                    <div id="thumbPlaceholder">
                                        <div class="w-12 h-12 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-3 text-slate-400">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                        </div>
                                        <span class="text-sm font-bold text-slate-500 block">Upload Thumbnail</span>
                                        <span class="text-xs text-slate-400">(Wajib)</span>
                                    </div>
                                    <img id="thumbPreview" class="absolute inset-0 w-full h-full object-cover hidden rounded-3xl z-10" />
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="flex justify-between items-center mb-2">
                                <label class="text-sm font-bold text-slate-600 ml-1">Foto Tambahan</label>
                                <span class="text-[10px] font-bold bg-slate-200 text-slate-500 px-2 py-0.5 rounded-full uppercase">Opsional</span>
                            </div>
                            
                            <div class="relative group h-64">
                                <input type="file" name="gallery[]" multiple accept="image/*" 
                                       class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-20"
                                       @change="handleGalleryPreview($event)">
                                
                                <div class="modern-input w-full h-full rounded-3xl flex flex-col items-center justify-center text-center p-4 bg-white/50 border-dashed border-2 hover:border-blue-400 hover:bg-blue-50 transition-all group-hover:scale-[1.02]">
                                    <div id="galleryPlaceholder">
                                        <div class="w-12 h-12 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-3 text-slate-400">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                                        </div>
                                        <span class="text-sm font-bold text-slate-500 block">Pilih Banyak Foto</span>
                                        <span class="text-xs text-slate-400" id="galleryCounter">(Klik atau Drag)</span>
                                    </div>
                                    <div id="galleryPreviewContainer" class="absolute inset-0 w-full h-full hidden bg-white rounded-3xl p-2 overflow-auto grid grid-cols-3 gap-2 z-10">
                                        </div>
                                </div>
                            </div>
                        </div>

                        <div class="md:col-span-2 space-y-2 mt-4">
                            <div class="flex justify-between items-center">
                                <label class="text-sm font-bold text-slate-600 ml-1">Deskripsi Proyek</label>
                                <span class="text-[10px] font-bold bg-slate-200 text-slate-500 px-2 py-0.5 rounded-full uppercase">Opsional</span>
                            </div>
                            <textarea name="description" rows="5" placeholder="Ceritakan detail menarik tentang karyamu..." 
                                      class="modern-input w-full px-6 py-4 rounded-3xl outline-none font-medium text-slate-700 placeholder-slate-400 resize-none"></textarea>
                        </div>
                    </div>
                </div>

                <div class="pt-6">
                    <button type="submit" 
                            :disabled="!isValid"
                            class="w-full bg-slate-900 text-white font-bold text-lg py-5 rounded-2xl shadow-xl hover:bg-orange-600 hover:shadow-orange-500/40 hover:-translate-y-1 transition-all duration-300 flex items-center justify-center gap-3 group disabled:opacity-50 disabled:cursor-not-allowed">
                        <span>Publikasikan Karya</span>
                        <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </button>
                    <p x-show="!isValid" class="text-center text-xs text-red-400 mt-3 font-medium animate-pulse">
                        *Harap lengkapi semua field bertanda bintang (*)
                    </p>
                </div>

            </form>
        </div>
    </div>

    <script>
        // GSAP Blob Animation
        const blobs = gsap.utils.toArray(".gradient-blob");
        blobs.forEach((blob) => {
            gsap.to(blob, {
                x: "random(-100, 100)", y: "random(-100, 100)",
                scale: "random(0.8, 1.2)", duration: "random(10, 20)",
                ease: "sine.inOut", repeat: -1, repeatRefresh: true 
            });
        });

        // Function Preview Image Single (Thumbnail)
        function previewImage(event, previewId, placeholderId) {
            const input = event.target;
            const preview = document.getElementById(previewId);
            const placeholder = document.getElementById(placeholderId);
            
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                    placeholder.classList.add('hidden');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        // Function Preview Gallery (Multiple Images)
        function handleGalleryPreview(event) {
            const input = event.target;
            const container = document.getElementById('galleryPreviewContainer');
            const placeholder = document.getElementById('galleryPlaceholder');
            const counter = document.getElementById('galleryCounter');
            
            container.innerHTML = ''; // Reset preview

            if (input.files && input.files.length > 0) {
                placeholder.classList.add('hidden');
                container.classList.remove('hidden');
                
                // Loop through selected files
                Array.from(input.files).forEach(file => {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.className = 'w-full h-20 object-cover rounded-xl border border-slate-200';
                        container.appendChild(img);
                    }
                    reader.readAsDataURL(file);
                });
            } else {
                placeholder.classList.remove('hidden');
                container.classList.add('hidden');
            }
        }

        // Alpine.js Logic for Authors
        function authorTagInput() {
            return {
                newAuthor: '',
                authors: [],
                addAuthor() {
                    if (this.newAuthor.trim() !== '') {
                        this.authors.push(this.newAuthor.trim());
                        this.newAuthor = '';
                    }
                },
                removeAuthor(index) {
                    this.authors.splice(index, 1);
                },
                removeLastIfEmpty() {
                    if (this.newAuthor === '' && this.authors.length > 0) {
                        this.authors.pop();
                    }
                }
            }
        }
    </script>

    <style>
        @keyframes popIn {
            0% { transform: scale(0.8); opacity: 0; }
            100% { transform: scale(1); opacity: 1; }
        }
        .animate-pop-in {
            animation: popIn 0.2s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }
    </style>
</body>
</html>