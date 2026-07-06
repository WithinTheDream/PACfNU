@extends('layouts.front')
@section('title', 'Galeri Kegiatan')

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
@endpush

@section('content')
<div class="max-w-4xl mx-auto px-4 py-16" data-aos="fade-up" data-aos-duration="1000">
    <div class="pt-16 pb-6 text-center px-4">
        <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-green-50 text-[#00923F] text-sm font-bold mb-4 border border-green-200 shadow-sm">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
            Dokumentasi Visual
        </div>
        <h1 class="text-3xl md:text-5xl font-extrabold text-gray-900 tracking-tight mb-4">Galeri <span class="text-[#00923F]">Kegiatan</span></h1>
        <p class="text-lg text-gray-600 max-w-2xl mx-auto mb-8">Informasi, liputan kegiatan, dan dokumentasi visual seputar pergerakan Fatayat NU Tahunan.</p>
        
        <!-- FITUR PENCARIAN GALERI (Kecil & Elegan di Tengah) -->
        <div class="max-w-md mx-auto">
            <form action="{{ url('/galeri') }}" method="GET" class="relative flex items-center">
                <input type="text" name="cari" value="{{ request('cari') }}" placeholder="Cari album kegiatan..." class="w-full bg-white border border-gray-300 rounded-full pl-12 pr-4 py-3 focus:ring-2 focus:ring-green-200 focus:border-[#00923F] outline-none text-sm transition shadow-sm">
                <svg class="w-5 h-5 text-gray-400 absolute left-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                @if(request('cari'))
                    <a href="{{ url('/galeri') }}" class="absolute right-4 text-red-500 hover:text-red-700 text-sm font-bold">× Hapus</a>
                @else
                    <button type="submit" class="absolute right-2 bg-[#00923F] text-white p-2 rounded-full hover:bg-green-800 transition">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </button>
                @endif
            </form>
        </div>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 pb-16">
    
    <!-- JIKA GALERI KOSONG ATAU PENCARIAN TIDAK DITEMUKAN -->
    @if($albums->isEmpty())
        <div class="text-center py-24 bg-gray-50 rounded-3xl border-2 border-dashed border-gray-200">
            <svg class="mx-auto h-16 w-16 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
            @if(request('cari'))
                <p class="text-xl font-bold text-gray-500 mb-2">Album "{{ request('cari') }}" tidak ditemukan.</p>
                <a href="{{ url('/galeri') }}" class="text-[#00923F] font-bold hover:underline">Kembali ke semua galeri</a>
            @else
                <p class="text-xl font-bold text-gray-500">Belum ada dokumentasi kegiatan.</p>
            @endif
        </div>
    @else
        <!-- Looping Kategori/Album -->
        @foreach($albums as $album)
            @if($album->galleries->count() > 0)
            <div class="mb-16">
                <!-- BAGIAN INFO ALBUM -->
                <div class="flex flex-col md:flex-row md:items-start justify-between gap-4 mb-8">
                    <div class="border-l-4 border-[#00923F] pl-5 flex-1">
                        <h2 class="text-3xl font-extrabold text-gray-900 mb-2">{{ $album->nama_album }}</h2>
                        @if($album->deskripsi)
                            <p class="text-gray-600 text-base md:text-lg max-w-3xl leading-relaxed">{{ $album->deskripsi }}</p>
                        @endif
                    </div>
                    <div class="shrink-0 md:mt-2">
                        <div class="inline-flex items-center gap-2 text-sm text-[#00923F] font-bold bg-green-50 px-4 py-2.5 rounded-lg border border-green-100 shadow-sm">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            {{ $album->galleries->count() }} Foto Dokumentasi
                        </div>
                    </div>
                </div>

                <!-- GRID FOTO -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    @foreach($album->galleries as $index => $photo)
                        @if($index < 7)
                            <a href="{{ asset('storage/'.$photo->image_path) }}" data-fancybox="album-{{ $album->id }}" class="aspect-square rounded-xl overflow-hidden shadow-sm block group">
                                <img src="{{ asset('storage/'.$photo->image_path) }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                            </a>
                        @elseif($index == 7)
                            <a href="{{ asset('storage/'.$photo->image_path) }}" data-fancybox="album-{{ $album->id }}" class="aspect-square rounded-xl overflow-hidden shadow-sm block group relative">
                                <img src="{{ asset('storage/'.$photo->image_path) }}" class="w-full h-full object-cover">
                                @if($album->galleries->count() > 8)
                                    <div class="absolute inset-0 bg-black/70 flex flex-col items-center justify-center text-white group-hover:bg-black/80 transition cursor-pointer backdrop-blur-[2px]">
                                        <span class="text-4xl font-black">+{{ $album->galleries->count() - 8 }}</span>
                                        <span class="text-sm font-medium mt-1">Foto Lainnya</span>
                                    </div>
                                @endif
                            </a>
                        @else
                            <a href="{{ asset('storage/'.$photo->image_path) }}" data-fancybox="album-{{ $album->id }}" style="display:none;"></a>
                        @endif
                    @endforeach
                </div>
            </div>
            @endif
        @endforeach
    @endif
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
<script>
    Fancybox.bind('[data-fancybox]', {
        Toolbar: { display: { left: ["infobar"], middle: [], right: ["zoom", "slideshow", "close"] } },
    });
</script>
@endpush