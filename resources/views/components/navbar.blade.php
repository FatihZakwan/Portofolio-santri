<nav class="fixed top-6 left-1/2 -translate-x-1/2 w-[95%] md:w-[85%] max-w-7xl z-[9999]">
    <div class="bg-white/80 backdrop-blur-lg border border-white/40 rounded-full px-6 py-4 flex justify-between items-center shadow-2xl">
        
        <a href="/" class="flex items-center gap-2 shrink-0">
            <div class="w-9 h-9 bg-gradient-to-tr from-orange-500 to-red-500 rounded-xl flex items-center justify-center text-white font-extrabold shadow-lg"><img src="{{ asset('storage/img/sekolah ku.png') }}" alt=""></div>
            <span class="font-bold text-slate-800 text-lg tracking-tight">Porto<span class="text-orange-500">Santri</span></span>
        </a>

        <div class="hidden md:flex items-center gap-2 lg:gap-4 text-sm font-bold text-slate-600">
            
            <div class="relative group">
                <a href="{{ route('project.index', ['main' => 'Programming']) }}" 
                   onclick="window.location.href='{{ route('project.index', ['main' => 'Programming']) }}'"
                   class="flex items-center gap-1 px-4 py-2 hover:text-orange-600 transition-all rounded-full hover:bg-orange-50 cursor-pointer">
                    Programming
                    <svg class="w-4 h-4 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </a>
                <div class="absolute top-full left-0 mt-2 w-56 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform scale-95 group-hover:scale-100 origin-top-left z-[10000]">
                    <div class="bg-white rounded-2xl shadow-2xl border border-slate-100 p-2 flex flex-col shadow-orange-500/10">
                        <a href="{{ route('project.index', ['main' => 'Programming', 'cat' => 'Web Development']) }}" onclick="window.location.href=this.href" class="px-4 py-3 hover:bg-orange-50 hover:text-orange-600 rounded-xl transition block">Web Development</a>
                        <a href="{{ route('project.index', ['main' => 'Programming', 'cat' => 'Mobile App']) }}" onclick="window.location.href=this.href" class="px-4 py-3 hover:bg-orange-50 hover:text-orange-600 rounded-xl transition block">Mobile Apps</a>
                        <a href="{{ route('project.index', ['main' => 'Programming', 'cat' => 'IoT System']) }}" onclick="window.location.href=this.href" class="px-4 py-3 hover:bg-orange-50 hover:text-orange-600 rounded-xl transition block">IoT System</a>
                    </div>
                </div>
            </div>

            <div class="relative group">
                <a href="{{ route('project.index', ['main' => 'DKV']) }}" 
                   onclick="window.location.href='{{ route('project.index', ['main' => 'DKV']) }}'"
                   class="flex items-center gap-1 px-4 py-2 hover:text-orange-600 transition-all rounded-full hover:bg-orange-50 cursor-pointer">
                    DKV
                    <svg class="w-4 h-4 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </a>
                <div class="absolute top-full left-0 mt-2 w-56 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform scale-95 group-hover:scale-100 origin-top-left z-[10000]">
                    <div class="bg-white rounded-2xl shadow-2xl border border-slate-100 p-2 flex flex-col">
                        <a href="{{ route('project.index', ['main' => 'DKV', 'cat' => 'Graphic Design']) }}" onclick="window.location.href=this.href" class="px-4 py-3 hover:bg-orange-50 hover:text-orange-600 rounded-xl transition block">Graphic Design</a>
                        <a href="{{ route('project.index', ['main' => 'DKV', 'cat' => 'Logo & Branding']) }}" onclick="window.location.href=this.href" class="px-4 py-3 hover:bg-orange-50 hover:text-orange-600 rounded-xl transition block">Logo & Branding</a>
                        <a href="{{ route('project.index', ['main' => 'DKV', 'cat' => 'UI/UX Design']) }}" onclick="window.location.href=this.href" class="px-4 py-3 hover:bg-orange-50 hover:text-orange-600 rounded-xl transition block">UI/UX Design</a>
                        <a href="{{ route('project.index', ['main' => 'DKV', 'cat' => 'ilustrasi']) }}" onclick="window.location.href=this.href" class="px-4 py-3 hover:bg-orange-50 hover:text-orange-600 rounded-xl transition block">Ilustrasi</a>
                        <a href="{{ route('project.index', ['main' => 'DKV', 'cat' => '3D Design']) }}" onclick="window.location.href=this.href" class="px-4 py-3 hover:bg-orange-50 hover:text-orange-600 rounded-xl transition block">3D Design</a>
                    </div>
                </div>
            </div>

            <div class="relative group">
                <a href="{{ route('project.index', ['main' => 'Game']) }}" 
                   onclick="window.location.href='{{ route('project.index', ['main' => 'Game']) }}'"
                   class="flex items-center gap-1 px-4 py-2 hover:text-orange-600 transition-all rounded-full hover:bg-orange-50 cursor-pointer">
                    Game
                    <svg class="w-4 h-4 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </a>
                <div class="absolute top-full left-0 mt-2 w-56 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform scale-95 group-hover:scale-100 origin-top-left z-[10000]">
                    <div class="bg-white rounded-2xl shadow-2xl border border-slate-100 p-2 flex flex-col">
                        <a href="{{ route('project.index', ['main' => 'Game', 'cat' => '2D Game']) }}" onclick="window.location.href=this.href" class="px-4 py-3 hover:bg-orange-50 hover:text-orange-600 rounded-xl transition block">2D Game</a>
                        <a href="{{ route('project.index', ['main' => 'Game', 'cat' => '3D Game']) }}" onclick="window.location.href=this.href" class="px-4 py-3 hover:bg-orange-50 hover:text-orange-600 rounded-xl transition block">3D Game</a>
                    </div>
                </div>
            </div>

            <div class="relative group">
                <a href="{{ route('project.index', ['main' => 'Media']) }}" 
                   onclick="window.location.href='{{ route('project.index', ['main' => 'Media']) }}'"
                   class="flex items-center gap-1 px-4 py-2 hover:text-orange-600 transition-all rounded-full hover:bg-orange-50 cursor-pointer">
                    Media
                    <svg class="w-4 h-4 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </a>
                <div class="absolute top-full left-0 mt-2 w-56 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform scale-95 group-hover:scale-100 origin-top-left z-[10000]">
                    <div class="bg-white rounded-2xl shadow-2xl border border-slate-100 p-2 flex flex-col">
                        <a href="{{ route('project.index', ['main' => 'Media', 'cat' => 'Literasi']) }}" onclick="window.location.href=this.href" class="px-4 py-3 hover:bg-orange-50 hover:text-orange-600 rounded-xl transition block">Literasi</a>
                        <a href="{{ route('project.index', ['main' => 'Media', 'cat' => 'Foto']) }}" onclick="window.location.href=this.href" class="px-4 py-3 hover:bg-orange-50 hover:text-orange-600 rounded-xl transition block">Foto</a>
                        <a href="{{ route('project.index', ['main' => 'Media', 'cat' => 'Video']) }}" onclick="window.location.href=this.href" class="px-4 py-3 hover:bg-orange-50 hover:text-orange-600 rounded-xl transition block">Video</a>
                    </div>
                </div>
            </div>

        </div>

        <!-- <div class="shrink-0">
            <a href="{{ route('project.create') }}" class="bg-slate-900 text-white px-6 py-2.5 rounded-full text-sm font-bold hover:bg-orange-600 transition-all shadow-lg block">
                Upload Karya
            </a>
        </div> -->

    </div>
</nav>