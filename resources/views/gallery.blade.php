@extends('layouts.front')
@section('title', 'Galeri Kegiatan')

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
@endpush

@section('content')
<!-- Header Elegan -->
<div class="pt-16 pb-10 text-center px-4">
    <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-green-50 text-[#00923F] text-sm font-bold mb-4 border border-green-200 shadow-sm">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
        Dokumentasi Visual
    </div>
    <h1 class="text-3xl md:text-5xl font-extrabold text-gray-900 tracking-tight mb-4">Galeri <span class="text-[#00923F]">Kegiatan</span></h1>
    <p class="text-lg text-gray-600 max-w-2xl mx-auto">Informasi, liputan kegiatan, dan dokumentasi visual seputar pergerakan Fatayat NU Tahunan.</p>
</div>

<div class="max-w-7xl mx-auto px-4 pb-16">
    
    <!-- JIKA GALERI MASIH KOSONG -->
    @if($albums->isEmpty())
        <div class="text-center py-24 bg-gray-50 rounded-3xl border-2 border-dashed border-gray-200">
            <svg class="mx-auto h-16 w-16 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
            <p class="text-xl font-bold text-gray-500">Belum ada dokumentasi kegiatan.</p>
        </div>
    @else
        <!-- Looping Kategori/Album -->
        @foreach($albums as $album)
            @if($album->galleries->count() > 0)
            <div class="mb-16">
                
                <!-- BAGIAN INFO ALBUM (Dibuat Flex: Kiri Teks, Kanan Badge) -->
                <div class="flex flex-col md:flex-row md:items-start justify-between gap-4 mb-8">
                    <div class="border-l-4 border-[#00923F] pl-5 flex-1">
                        <h2 class="text-3xl font-extrabold text-gray-900 mb-2">{{ $album->nama_album }}</h2>
                        <!-- Menampilkan Deskripsi Jika Ada -->
                        @if($album->deskripsi)
                            <p class="text-gray-600 text-base md:text-lg max-w-3xl leading-relaxed">{{ $album->deskripsi }}</p>
                        @endif
                    </div>
                    
                    <!-- Badge Total Foto dipindah ke Kanan -->
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
                            <!-- FOTO 1 SAMPAI 7 -->
                            <a href="{{ asset('storage/'.$photo->image_path) }}" data-fancybox="album-{{ $album->id }}" class="aspect-square rounded-xl overflow-hidden shadow-sm block group">
                                <img src="{{ asset('storage/'.$photo->image_path) }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                            </a>

                        @elseif($index == 7)
                            <!-- FOTO KE-8 (Overlay +X) -->
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
                            <!-- FOTO KE-9++ (Disembunyikan untuk Popup) -->
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