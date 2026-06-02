@extends('layouts.front')
@section('title', 'Berita Lembaga')

@section('content')
<div class="bg-[#EFFFF5] py-16 text-center border-b border-green-100">
    <h1 class="text-3xl md:text-4xl font-extrabold text-[#00923F]">Berita Lembaga</h1>
    <p class="mt-3 text-gray-600 max-w-2xl mx-auto text-lg">Informasi dan liputan khusus dari lembaga-lembaga di bawah naungan PAC Fatayat NU Tahunan.</p>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        @forelse ($articles as $article)
            <div class="bg-white rounded-xl border border-green-100 overflow-hidden shadow-sm hover:shadow-lg transition duration-300 flex flex-col group">
                <div class="relative h-64 bg-gray-50 flex items-center justify-center overflow-hidden border-b border-gray-100">
                    @if($article->image)
                        <img src="{{ asset('storage/' . $article->image) }}" class="w-full h-full object-contain group-hover:scale-105 transition duration-500 p-2">
                    @else
                        <div class="text-green-300 font-bold">Fatayat NU</div>
                    @endif
                    <div class="absolute top-0 right-0 bg-[#00923F] text-white text-xs font-bold px-3 py-1 rounded-bl-lg">
                        Lembaga
                    </div>
                </div>

                <div class="p-5 flex-grow flex flex-col">
                    <h3 class="font-bold text-lg text-gray-800 mb-4 line-clamp-2 leading-tight group-hover:text-[#00923F] transition">
                        {{ $article->title }}
                    </h3>
                    
                    <div class="space-y-2 text-sm text-gray-600 mb-5 flex-grow">
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-[#00923F]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            {{ $article->created_at->format('l, d F Y') }}
                        </div>
                    </div>

                    <a href="{{ url('/berita/' . $article->slug) }}" class="block w-full text-center bg-green-50 text-[#00923F] py-2.5 rounded-md hover:bg-[#00923F] hover:text-white transition font-medium text-sm mt-auto">
                        Baca Selengkapnya
                    </a>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-16 bg-gray-50 rounded-xl border border-dashed border-gray-300">
                <p class="text-gray-500 font-medium">Belum ada berita lembaga yang dipublikasikan.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection