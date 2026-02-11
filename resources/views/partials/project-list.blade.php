@foreach($projects as $project)
    <a href="{{ route('project.detail', $project->id) }}" class="break-inside-avoid relative group rounded-3xl overflow-hidden cursor-pointer block shadow-md h-[400px] border border-slate-100">
        <img src="{{ asset('storage/' . $project->thumbnail) }}" 
             alt="{{ $project->title }}" 
             class="w-full h-full object-cover transform transition-transform duration-700 group-hover:scale-110">
        
        <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-6">
            <div class="transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                <span class="inline-block px-2 py-1 bg-orange-500 text-white text-[10px] font-bold rounded-md mb-2">
                    {{ $project->sub_category ?? $project->category }}
                </span>

                <h3 class="text-white font-bold text-lg leading-tight mb-1 drop-shadow-md">
                    {{ $project->title }}
                </h3>
                <div class="flex items-center gap-2 text-slate-200">
                    <span class="text-xs font-medium uppercase tracking-wider opacity-80">
                        @if(is_array($project->authors))
                            {{ $project->authors[0] }} @if(count($project->authors) > 1) +{{ count($project->authors) - 1 }} others @endif
                        @else
                            {{ $project->authors }}
                        @endif
                    </span>
                </div>
            </div>
        </div>
    </a>
@endforeach