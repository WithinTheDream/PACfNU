@extends('layouts.front')
@section('title', 'Galeri Kegiatan')
@section('content')

<!-- Header Bersih (Tanpa Blok Hijau) -->
<div class="pt-16 pb-10 text-center px-4">
    <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-green-50 text-[#00923F] text-sm font-bold mb-4 border border-green-200 shadow-sm">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
        Dokumentasi
    </div>
    <h1 class="text-3xl md:text-5xl font-extrabold text-gray-900 tracking-tight mb-4">Galeri <span class="text-[#00923F]">Kegiatan</span></h1>
    <p class="text-lg text-gray-600 max-w-2xl mx-auto">Kumpulan momen dan rekam jejak agenda kegiatan PAC Fatayat NU Tahunan.</p>
</div>

<div class="max-w-7xl mx-auto px-4 py-8 pb-20">
    @forelse($galleriesGrouped as $kategori => $images)
        @php 
            $limit = 8; 
            $count = $images->count(); 
            $slug = Str::slug($kategori);
        @endphp

        <div class="mb-16">
            <div class="flex items-center justify-between border-b border-gray-200 pb-4 mb-6">
                <h2 id="{{ $slug }}" class="text-2xl font-bold text-gray-800 flex items-center gap-3">
                    <span class="w-2 h-8 bg-[#00923F] rounded-full block"></span>
                    {{ $kategori }}
                </h2>
                <span class="text-sm font-bold text-[#00923F] bg-green-50 px-3 py-1 rounded-full border border-green-100">{{ $count }} Foto Terarsip</span>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                <!-- Tampilkan maksimal 8 Foto Utama -->
                @foreach($images->take($limit) as $index => $img)
                    @if($index == $limit - 1 && $count > $limit)
                        <!-- Tampilan untuk Foto ke-8 (Memicu +X More) -->
                        <a href="{{ asset('storage/' . $img->image_path) }}" data-fancybox="gallery-{{$slug}}" data-caption="{{ $img->caption }}" class="relative aspect-square bg-gray-100 rounded-xl overflow-hidden shadow-sm group cursor-pointer block">
                            <img src="{{ asset('storage/' . $img->image_path) }}" class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-black/70 flex flex-col items-center justify-center transition-colors hover:bg-black/80">
                                <span class="text-white font-extrabold text-3xl">+{{ $count - $limit + 1 }}</span>
                                <span class="text-gray-300 font-medium text-sm mt-1">Lihat Semua</span>
                            </div>
                        </a>
                    @else
                        <!-- Tampilan Foto Normal -->
                        <a href="{{ asset('storage/' . $img->image_path) }}" data-fancybox="gallery-{{$slug}}" data-caption="{{ $img->caption }}" class="aspect-square bg-gray-100 rounded-xl overflow-hidden shadow-sm group cursor-pointer block relative">
                            <img src="{{ asset('storage/' . $img->image_path) }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                            <!-- Overlay tipis saat dihover -->
                            <div class="absolute inset-0 bg-black/0 group-hover:bg-black/10 transition duration-300"></div>
                        </a>
                    @endif
                @endforeach

                <!-- Sembunyikan sisa foto, tapi tetap dirender agar bisa digeser di dalam slider Fancybox -->
                @foreach($images->skip($limit) as $img)
                    <a href="{{ asset('storage/' . $img->image_path) }}" data-fancybox="gallery-{{$slug}}" data-caption="{{ $img->caption }}" style="display: none;"></a>
                @endforeach
            </div>
        </div>
    @empty
        <div class="text-center text-gray-500 py-16 bg-gray-50 rounded-2xl border border-dashed border-gray-300">
            <p class="font-medium text-lg">Belum ada dokumentasi acara yang diunggah.</p>
        </div>
    @endforelse
</div>
@endsection