@extends('layouts.front')
@section('title', $article->title)

@section('content')

<!-- 1. KITA PAKSA LOAD CSS LANGSUNG DI DALAM KONTEN -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<style>
    .swiper-button-next, .swiper-button-prev {
        background-color: #00923F !important;
        color: white !important;
        width: 48px !important;
        height: 48px !important;
        border-radius: 50%;
        box-shadow: 0 4px 12px rgba(0, 146, 63, 0.4);
        transition: all 0.3s ease;
    }
    .swiper-button-next:hover, .swiper-button-prev:hover {
        background-color: #007a35 !important;
        transform: scale(1.1);
    }
    .swiper-button-next::after, .swiper-button-prev::after {
        font-size: 20px !important;
        font-weight: 900;
    }
    .swiper-pagination-bullet-active {
        background-color: #00923F !important;
    }
</style>

<div class="max-w-4xl mx-auto px-4 py-12">
    <!-- Breadcrumb -->
    <nav class="flex text-sm text-gray-500 mb-8 font-medium">
        <a href="{{ url('/') }}" class="hover:text-[#00923F] transition">Beranda</a>
        <span class="mx-3">/</span>
        <a href="{{ url('/berita') }}" class="hover:text-[#00923F] transition">Berita</a>
        <span class="mx-3">/</span>
        <span class="text-gray-800 truncate max-w-[200px]">{{ $article->title }}</span>
    </nav>

    <header class="mb-10 text-center">
        <h1 class="text-3xl md:text-5xl font-extrabold text-gray-900 leading-tight mb-6">
            {{ $article->title }}
        </h1>
        <div class="flex flex-wrap items-center justify-center gap-6 text-gray-600 text-sm">
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 rounded-full bg-green-50 flex items-center justify-center text-[#00923F] border border-green-100">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                </div>
                <span class="font-bold text-gray-800">Admin Fatayat</span>
            </div>
            <div class="w-1.5 h-1.5 rounded-full bg-gray-300"></div>
            <div class="flex items-center gap-2 text-gray-500 font-medium">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                {{ \Carbon\Carbon::parse($article->created_at)->locale('id')->translatedFormat('l, d F Y - H:i') }} WIB
            </div>
        </div>
    </header>
    
    <!-- 2. PENGGABUNGAN FOTO (Biar Sistem Gak Bingung) -->
    @php
        $fotoTambahan = is_string($article->images) ? json_decode($article->images, true) : $article->images;
        $semuaFoto = [];
        
        // Masukkan foto utama ke urutan pertama
        if ($article->image) {
            $semuaFoto[] = $article->image;
        }
        
        // Gabungkan dengan foto-foto tambahan
        if (is_array($fotoTambahan)) {
            $semuaFoto = array_merge($semuaFoto, $fotoTambahan);
        }
    @endphp

    <!-- 3. RENDER SLIDER ATAU FOTO TUNGGAL -->
    @if(count($semuaFoto) > 1)
        <!-- JIKA FOTO LEBIH DARI 1: TAMPILKAN SLIDER -->
        <div class="swiper mySwiper w-full h-[400px] md:h-[500px] rounded-2xl border border-gray-100 shadow-sm mb-8 bg-gray-50 relative group overflow-hidden">
            <div class="swiper-wrapper">
                @foreach($semuaFoto as $img)
                <div class="swiper-slide flex items-center justify-center p-2">
                    <img src="{{ asset('storage/' . $img) }}" class="w-full h-full object-contain rounded-xl drop-shadow-md">
                </div>
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-next !text-[#00923F] opacity-0 group-hover:opacity-100 transition drop-shadow-md bg-white/80 p-6 rounded-full transform scale-75"></div>
            <div class="swiper-button-prev !text-[#00923F] opacity-0 group-hover:opacity-100 transition drop-shadow-md bg-white/80 p-6 rounded-full transform scale-75"></div>
        </div>
    @elseif(count($semuaFoto) == 1)
        <!-- JIKA FOTO HANYA 1: TAMPILKAN FOTO BIASA (TANPA SLIDER) -->
        <div class="w-full h-[400px] md:h-[500px] rounded-2xl border border-gray-100 shadow-sm mb-8 bg-gray-50 flex items-center justify-center p-2">
            <img src="{{ asset('storage/' . $semuaFoto[0]) }}" class="w-full h-full object-contain rounded-xl drop-shadow-md">
        </div>
    @endif

    <article class="prose prose-lg prose-green max-w-none text-gray-800 leading-relaxed mb-16 text-justify mt-6">
        {!! nl2br(e($article->content)) !!}
    </article>
    
    @if($article->link_dokumentasi)
    <div class="mt-10 mb-8 p-8 bg-green-50 border border-green-100 rounded-2xl text-center">
        <h4 class="text-xl font-extrabold text-gray-900 mb-2">Dokumentasi Lengkap Acara</h4>
        <p class="text-gray-600 mb-6">Lihat seluruh kumpulan foto kegiatan ini di halaman galeri kami.</p>
        <a href="{{ $article->link_dokumentasi }}" target="_blank" class="inline-flex items-center gap-2 bg-[#00923F] text-white px-8 py-3 rounded-lg hover:bg-green-800 font-bold transition shadow-md hover:shadow-lg hover:-translate-y-0.5">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
            Buka Album Galeri
        </a>
    </div>
    @endif  

    <div class="flex justify-between items-center py-6 border-t border-gray-200 mt-10">
        <a href="{{ url('/berita') }}" class="flex items-center gap-2 text-gray-500 font-bold hover:text-[#00923F] transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Kembali ke Indeks Berita
        </a>
    </div>
</div>

<!-- 4. KITA PAKSA LOAD JS LANGSUNG BIAR SLIDERNYA BERNYAWA -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    // Memastikan skrip jalan sedetik setelah HTML dirender
    setTimeout(function() {
        if(typeof Swiper !== 'undefined') {
            new Swiper(".mySwiper", {
                loop: true,
                grabCursor: true, /* Bisa ditarik kursor! */
                spaceBetween: 10,
                autoplay: { 
                    delay: 3500, 
                    disableOnInteraction: false 
                },
                pagination: { 
                    el: ".swiper-pagination", 
                    clickable: true,
                    dynamicBullets: true
                },
                navigation: { 
                    nextEl: ".swiper-button-next", 
                    prevEl: ".swiper-button-prev" 
                },
            });
        }
    }, 300);
</script>

@endsection