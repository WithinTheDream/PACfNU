@extends('layouts.front')
@section('title', $article->title)

@section('content')
<div class="max-w-4xl mx-auto px-4 py-12">
    <nav class="flex text-sm text-gray-500 mb-8" aria-label="Breadcrumb">
        <a href="{{ url('/') }}" class="hover:text-[#00923F]">Home</a>
        <span class="mx-2">/</span>
        <a href="{{ url('/berita') }}" class="hover:text-[#00923F]">Berita</a>
        <span class="mx-2">/</span>
        <span class="text-gray-800 truncate max-w-[200px]">{{ $article->title }}</span>
    </nav>

    <header class="mb-8">
        <h1 class="text-3xl md:text-5xl font-extrabold text-gray-900 leading-tight mb-6">
            {{ $article->title }}
        </h1>
        <div class="flex flex-wrap items-center gap-6 text-gray-600 text-sm border-y border-gray-100 py-3">
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 rounded-full bg-green-100 flex items-center justify-center text-[#00923F]">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                </div>
                <span class="font-medium text-gray-800">Admin Fatayat</span>
            </div>
            <div class="flex items-center gap-2">
                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                {{ $article->created_at->format('l, d F Y - H:i') }} WIB
            </div>
        </div>
    </header>

@if($article->galleries && $article->galleries->count() > 0)
    <div class="swiper detailSwiper mb-10 rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="swiper-wrapper">
            <div class="swiper-slide w-full bg-gray-50 flex justify-center py-6 px-4">
                <img src="{{ asset('storage/' . $article->image) }}" class="max-w-full max-h-[600px] object-contain rounded-lg">
            </div>
            @foreach($article->galleries as $gallery)
                <div class="swiper-slide w-full bg-gray-50 flex justify-center py-6 px-4 relative">
                    <img src="{{ asset('storage/' . $gallery->image_path) }}" class="max-w-full max-h-[600px] object-contain rounded-lg">
                    @if($gallery->caption)
                        <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 bg-black/60 text-white px-4 py-2 rounded-full text-sm">
                            {{ $gallery->caption }}
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
        <div class="swiper-button-next !text-[#00923F]"></div>
        <div class="swiper-button-prev !text-[#00923F]"></div>
        <div class="swiper-pagination"></div>
    </div>

@elseif($article->image)
    <div class="w-full bg-gray-50 rounded-2xl mb-10 shadow-sm border border-gray-200 flex justify-center py-6 px-4">
        <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="max-w-full max-h-[600px] object-contain rounded-lg shadow-sm">
    </div>
@endif

    <article class="prose prose-lg prose-green max-w-none text-gray-800 leading-relaxed mb-16">
        {!! nl2br(e($article->content)) !!}
    </article>
    
    @if($article->link_dokumentasi)
    <div class="mt-10 mb-8 p-6 bg-green-50 border border-green-100 rounded-xl text-center">
        <h4 class="font-bold text-gray-800 mb-2">Dokumentasi Lengkap Acara</h4>
        <p class="text-sm text-gray-600 mb-4">Lihat seluruh kumpulan foto kegiatan ini di halaman galeri kami.</p>
        <a href="{{ $article->link_dokumentasi }}" target="_blank" class="inline-block bg-[#00923F] text-white px-6 py-2.5 rounded-lg hover:bg-green-800 font-medium transition shadow-sm">
            Buka Album Galeri &rarr;
        </a>
    </div>
@endif
    <div class="flex justify-between items-center py-6 border-t border-gray-200">
        <a href="{{ url('/berita') }}" class="flex items-center gap-2 text-[#00923F] font-semibold hover:text-green-800 transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Kembali ke Indeks Berita
        </a>
    </div>
</div>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

<script>
    var detailSwiper = new Swiper(".detailSwiper", {
        navigation: { nextEl: ".swiper-button-next", prevEl: ".swiper-button-prev" },
        pagination: { el: ".swiper-pagination", clickable: true },
        loop: true,
    });
</script>
@endsection

