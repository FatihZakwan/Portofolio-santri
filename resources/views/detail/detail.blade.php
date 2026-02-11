<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ $project['judul'] }}</title>
    @vite('resources/css/app.css')

    <!-- Animasi custom -->
    <style>
        .slide-up {
            animation: slideUp 0.6s ease-out both;
        }
        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(40px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body class="bg-gray-50 overflow-x-hidden">

<!-- BACK BUBBLE -->
<a href="/"
   class="group fixed top-6 left-6 z-50
          flex items-center gap-2
          h-12 px-4
          bg-white text-gray-700
          rounded-full shadow-lg
          overflow-hidden
          hover:bg-black hover:text-white
          hover:-translate-y-1 hover:shadow-xl
          transition-all duration-300">

    <!-- Icon -->
    <span class="text-xl">←</span>

    <!-- Text -->
    <span class="whitespace-nowrap
                 max-w-0 opacity-0
                 group-hover:max-w-xs group-hover:opacity-100
                 transition-all duration-300">
        Back to Home
    </span>
</a>


<div class="max-w-5xl mx-auto px-6 py-12 slide-up">

    <!-- IMAGE -->
    <div class="mt-6 rounded-2xl overflow-hidden bg-gray-200 flex justify-center">
        <img
            src="{{ asset('images/' . $project['image']) }}"
            alt="{{ $project['judul'] }}"
            class="w-full max-h-[520px] object-contain transition duration-500"
        >
    </div>

    <!-- CONTENT -->
    <div class="mt-8 bg-white rounded-2xl shadow p-6 md:p-8">
        <span class="text-xs uppercase tracking-wider text-gray-400">
            {{ $project['kategori'] }}
        </span>

        <h1 class="text-3xl md:text-4xl font-bold mt-2">
            {{ $project['judul'] }}
        </h1>

<div class="text-gray-600 mt-6 leading-relaxed space-y-4 text-justify">

    <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor
        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
        nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
    </p>

    <p>
        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore
        eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident,
        sunt in culpa qui officia deserunt mollit anim id est laborum.
    </p>

    <p>
        Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius,
        turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis
        sollicitudin mauris.
    </p>

    <p>
        Integer in mauris eu nibh euismod gravida. Duis ac tellus et risus vulputate
        vehicula. Donec lobortis risus a elit. Etiam tempor.
    </p>

    <p>
        Ut ullamcorper, ligula eu tempor congue, eros est euismod turpis, id tincidunt
        sapien risus a quam. Maecenas fermentum consequat mi.
    </p>

</div>
    </div>

</div>

</body>
</html>
