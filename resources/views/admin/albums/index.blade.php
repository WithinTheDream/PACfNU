@extends('layouts.admin')
@section('title', 'Kategori & Album Galeri')

@section('content')

<div class="bg-white p-6 md:p-8 rounded-2xl shadow-sm border border-gray-100 mb-8 relative overflow-hidden">
    <div class="absolute top-0 right-0 w-32 h-32 bg-green-50 rounded-bl-full -z-0"></div>
    <div class="relative z-10">
        <h3 class="font-extrabold text-gray-800 mb-6 text-xl flex items-center gap-2">
            <svg class="w-6 h-6 text-[#00923F]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            Buat Album / Kategori Baru
        </h3>
        <form action="{{ route('albums.store') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-5">
                <div class="md:col-span-1">
                    <label class="block text-sm font-bold text-gray-700 mb-2">Nama Album *</label>
                    <input type="text" name="nama_album" required class="w-full border border-gray-300 bg-gray-50 rounded-xl p-3.5 focus:ring-2 focus:bg-white focus:ring-green-200 focus:border-[#00923F] outline-none transition" placeholder="Contoh: Bukber Ramadhan 2026">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-bold text-gray-700 mb-2">Deskripsi / Waktu (Opsional)</label>
                    <input type="text" name="deskripsi" class="w-full border border-gray-300 bg-gray-50 rounded-xl p-3.5 focus:ring-2 focus:bg-white focus:ring-green-200 focus:border-[#00923F] outline-none transition" placeholder="Contoh: Dilaksanakan pada 20 April 2026">
                </div>
            </div>
            <div class="flex justify-end">
                <button type="submit" class="bg-[#00923F] text-white px-8 py-3.5 rounded-xl font-extrabold hover:bg-green-800 shadow-md hover:shadow-lg transition transform hover:-translate-y-0.5">
                    Buat Album Sekarang
                </button>
            </div>
        </form>
    </div>
</div>

<div class="space-y-6">
    @foreach($albums as $album)
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 flex flex-col md:flex-row gap-6 hover:border-[#00923F] transition duration-300 group">
            
            <div class="md:w-1/3 flex flex-col justify-between">
                <div>
                    <h4 class="text-2xl font-extrabold text-gray-900 mb-2 group-hover:text-[#00923F] transition">{{ $album->nama_album }}</h4>
                    @if($album->deskripsi)
                        <p class="text-gray-600 text-sm mb-4 leading-relaxed">{{ $album->deskripsi }}</p>
                    @else
                        <p class="text-gray-400 text-sm mb-4 italic">Belum ada deskripsi untuk kegiatan ini.</p>
                    @endif
                    <span class="inline-block bg-green-50 text-[#00923F] text-xs font-extrabold px-4 py-1.5 rounded-full mb-4 border border-green-100">
                        Total {{ $album->galleries_count }} Foto
                    </span>
                </div>

                <div class="flex gap-3 mt-4">
                    <a href="{{ route('albums.show', $album->id) }}" class="flex-1 bg-[#00923F] text-white text-center py-2.5 rounded-xl font-bold text-sm hover:bg-green-800 transition shadow-sm">
                        Masuk & Upload Foto
                    </a>
                    
                    <!-- PAKAI CLASS form-delete -->
                    <form action="{{ route('albums.destroy', $album->id) }}" method="POST" class="inline form-delete">
                        @csrf @method('DELETE')
                        <button type="submit" class="px-4 py-2.5 bg-red-50 text-red-600 rounded-xl hover:bg-red-600 hover:text-white transition font-bold text-sm border border-red-100">
                            Hapus
                        </button>
                    </form>
                </div>
            </div>

            <div class="md:w-2/3">
                @if($album->galleries->count() > 0)
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 h-full items-center">
                        @foreach($album->galleries->take(4) as $index => $foto)
                            <div class="relative rounded-xl overflow-hidden aspect-square border border-gray-100 shadow-sm group/img">
                                <img src="{{ asset('storage/'.$foto->image_path) }}" class="w-full h-full object-cover group-hover/img:scale-110 transition duration-500">
                                @if($index == 3 && $album->galleries_count > 4)
                                    <div class="absolute inset-0 bg-black/60 flex flex-col items-center justify-center text-white font-bold text-xl backdrop-blur-sm">
                                        +{{ $album->galleries_count - 4 }}
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="h-full border-2 border-dashed border-gray-200 bg-gray-50/50 rounded-2xl flex flex-col items-center justify-center text-gray-400 p-6 min-h-[160px]">
                        <svg class="w-12 h-12 mb-3 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        <span class="text-sm font-bold">Album masih kosong</span>
                    </div>
                @endif
            </div>
            
        </div>
    @endforeach
</div>
@endsection