@extends('layouts.front')
@section('title', 'Berita Lembaga')

@section('content')
<!-- Header Elegan -->
<div class="pt-16 pb-10 text-center px-4">
    <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-green-50 text-[#00923F] text-sm font-bold mb-4 border border-green-200 shadow-sm">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2.5 2.5 0 00-2.5-2.5H14"></path></svg>
        Liputan Khusus
    </div>
    <h1 class="text-3xl md:text-5xl font-extrabold text-gray-900 tracking-tight mb-4">Berita <span class="text-[#00923F]">Lembaga</span></h1>
    <p class="text-lg text-gray-600 max-w-2xl mx-auto">Informasi dan liputan khusus dari lembaga-lembaga di bawah naungan PAC Fatayat NU Tahunan.</p>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 pb-20">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        @forelse ($articles as $article)
            <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-1 transition duration-300 flex flex-col group">
                <div class="relative h-60 bg-gray-50 flex items-center justify-center overflow-hidden border-b border-gray-100">
                    @if($article->image)
                        <img src="{{ asset('storage/' . $article->image) }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                    @else
                        <div class="text-green-300 font-bold text-xl">Fatayat NU</div>
                    @endif
                    <div class="absolute top-3 right-3 bg-[#00923F] text-white text-[10px] uppercase font-extrabold px-3 py-1.5 rounded-full shadow-sm">
                        Lembaga
                    </div>
                </div>

                <div class="p-6 flex-grow flex flex-col">
                    <h3 class="font-bold text-lg text-gray-800 mb-3 line-clamp-2 leading-snug group-hover:text-[#00923F] transition">
                        {{ $article->title }}
                    </h3>
                    
                    <div class="space-y-1.5 text-sm text-gray-500 mb-6 flex-grow">
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            {{ $article->created_at->format('d M Y') }}
                        </div>
                    </div>

                    <a href="{{ url('/berita/' . $article->slug) }}" class="block w-full text-center bg-green-50 border border-green-100 text-[#00923F] py-2.5 rounded-xl hover:bg-[#00923F] hover:text-white transition font-bold text-sm mt-auto">
                        Baca Selengkapnya
                    </a>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-16 bg-gray-50 rounded-2xl border border-dashed border-gray-300">
                <p class="text-gray-500 font-medium text-lg">Belum ada berita lembaga yang dipublikasikan.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection