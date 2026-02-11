import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

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