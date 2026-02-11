<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Our Project</title>
    @vite('resources/css/app.css')
</head>

<body class="min-h-screen bg-gradient-to-br
             from-pink-100 via-purple-100 to-blue-100
             overflow-x-hidden">

<div class="max-w-7xl mx-auto px-6 py-20">

    <!-- HEADER -->
    <div class="text-center mb-14">
        <h1 class="text-6xl font-extrabold tracking-tight">
            <span class="text-gray-900">Our</span>
            <span class="bg-gradient-to-r from-indigo-500 via-purple-500 to-orange-500
                         bg-clip-text text-transparent">
                Project.
            </span>
        </h1>

        <!-- TOGGLE -->
        <div class="mt-8 flex justify-center gap-4">
            <button class="px-6 py-2 rounded-full bg-white shadow font-medium">
                Shots
            </button>
            <button class="px-6 py-2 rounded-full bg-white/60 hover:bg-white shadow font-medium">
                Creator
            </button>
        </div>

        <!-- SEARCH -->
        <div class="mt-8 max-w-xl mx-auto">
            <div class="flex items-center bg-white rounded-full shadow px-5 py-3">
                <input
                    type="text"
                    placeholder="What kind of work would you like to explore?"
                    class="w-full outline-none text-gray-600"
                >
                <span class="text-gray-400 text-xl">🔍</span>
            </div>
        </div>
    </div>

    <!-- FILTER -->
    <div class="flex flex-wrap justify-center gap-3 mb-12">
        @foreach (['Design','Programmer','IoT','Photography','Videography','DKV'] as $cat)
            <span class="px-5 py-2 rounded-full
                         bg-white/70 backdrop-blur
                         shadow hover:bg-white cursor-pointer
                         text-sm font-medium">
                {{ $cat }}
            </span>
        @endforeach
    </div>

    <!-- GRID PROJECT -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">

        @for ($i = 1; $i <= 8; $i++)
            <a href="#"
               class="group bg-white/70 backdrop-blur
                      rounded-2xl shadow-lg
                      hover:shadow-2xl hover:-translate-y-1
                      transition-all duration-300 overflow-hidden">

                <!-- IMAGE -->
                <div class="aspect-[4/3] bg-gray-200 overflow-hidden">
                    <img
                        src="{{ asset('images/placeholder.jpg') }}"
                        alt="Project {{ $i }}"
                        class="w-full h-full object-cover group-hover:scale-105 transition duration-300"
                    >
                </div>

                <!-- INFO -->
                <div class="p-4">
                    <h3 class="font-semibold text-sm text-gray-800">
                        Creative Project {{ $i }}
                    </h3>
                    <p class="text-xs text-gray-500 mt-1">
                        Muhammad Fitra
                    </p>
                </div>

            </a>
        @endfor

    </div>

</div>

</body>
</html>
