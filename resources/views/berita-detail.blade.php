@extends('layouts.front')
@section('title', $article->title)

@section('content')
<div class="max-w-4xl mx-auto px-4 py-12">
    <!-- Breadcrumb -->
    <nav class="flex text-sm text-gray-500 mb-8 font-medium" aria-label="Breadcrumb">
        <a href="{{ url('/') }}" class="hover:text-[#00923F] transition">Home</a>
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
                {{ $article->created_at->format('l, d F Y - H:i') }} WIB
            </div>
        </div>
    </header>

    @if($article->image)
    <!-- KOTAK OUTLINE FIX (TIDAK BERUBAH RESOLUSINYA) -->
    <div class="w-full aspect-video bg-gray-100 rounded-2xl mb-12 shadow-sm border border-gray-200 overflow-hidden flex items-center justify-center">
        <!-- object-contain menjaga gambar tetap utuh tanpa merusak kotak pembungkus -->
        <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="w-full h-full object-contain p-4 bg-gray-100 cursor-pointer" data-fancybox="news-image">
    </div>
    @endif

    <article class="prose prose-lg prose-green max-w-none text-gray-800 leading-relaxed mb-16 text-justify">
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
@endsection