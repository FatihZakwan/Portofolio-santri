<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    $projects = [
        [
            'slug' => 'smart-feeder',
            'judul' => 'Design Poster',
            'kategori' => 'DKV',
            'image' => 'ariq.jpg',
        ],
    ];

    return view('welcome', compact('projects'));
});

Route::get('/detail/{slug}', function ($slug) {

    $projects = [
        'dkv-branding' => [
            'judul' => 'Branding Poster Pesantren',
            'kategori' => 'DKV',
            'image' => 'ariq.jpg',
            'deskripsi' =>
                'Proyek branding visual yang menampilkan identitas pesantren
                dalam bentuk poster modern. Fokus pada tipografi, warna,
                dan komposisi agar pesan tersampaikan dengan kuat dan elegan.',
        ],

        'web-portfolio' => [
            'judul' => 'Portfolio Website Santri',
            'kategori' => 'Programmer',
            'image' => 'prog1.jpg',
            'deskripsi' =>
                'Website portofolio interaktif yang menampilkan karya santri
                dari berbagai bidang. Dibangun dengan Laravel dan Tailwind
                untuk menghasilkan tampilan bersih, modern, dan responsif.',
        ],

        'smart-feeder' => [
            'judul' => 'Smart Feeder IoT',
            'kategori' => 'IoT',
            'image' => 'iot1.jpg',
            'deskripsi' =>
                'Alat pemberi pakan ikan otomatis berbasis ESP32.
                Sistem ini mampu bekerja terjadwal dan dikontrol
                secara efisien untuk kebutuhan budidaya.',
        ],

        '2d-platformer' => [
            'judul' => '2D Platformer Game',
            'kategori' => 'Game Dev',
            'image' => 'game1.jpg',
            'deskripsi' =>
                'Game 2D bertema petualangan dengan mekanik lompat,
                rintangan, dan level progresif. Dibuat sebagai
                eksplorasi logika, desain level, dan gameplay.',
        ],
    ];

    if (!isset($projects[$slug])) {
        abort(404);
    }

    return view('detail.detail', [
        'project' => $projects[$slug]
    ]);
});
