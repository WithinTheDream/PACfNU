@extends('layouts.front')
@section('title', 'Galeri Kegiatan')
@section('content')
<div class="bg-[#EFFFF5] py-16 text-center border-b border-green-100">
    <h1 class="text-3xl font-extrabold text-[#00923F]">Galeri Dokumentasi</h1>
</div>

<div class="max-w-7xl mx-auto px-4 py-16">
    @forelse($galleriesGrouped as $kategori => $images)
        <div class="mb-16">
            <div class="flex items-center gap-4 mb-6">
                <h2 id="{{ Str::slug($kategori) }}" class="text-2xl font-bold text-gray-800 border-l-4 border-[#00923F] pl-4">{{ $kategori }}</h2>
                <span class="text-sm font-medium text-gray-500 bg-gray-100 px-3 py-1 rounded-full">{{ $images->count() }} Foto</span>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach($images as $img)
                    <div class="aspect-video bg-gray-100 rounded-xl overflow-hidden shadow-sm group cursor-pointer">
                        <img src="{{ asset('storage/' . $img->image_path) }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                    </div>
                @endforeach
            </div>
        </div>
    @empty
        <div class="text-center text-gray-500 py-10">Belum ada dokumentasi.</div>
    @endforelse
</div>
@endsection