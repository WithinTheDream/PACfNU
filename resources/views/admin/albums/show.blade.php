@extends('layouts.admin')
@section('title', 'Kelola Album: ' . $album->nama_album)

@section('content')
<div class="mb-4 flex justify-between items-center">
    <h2 class="text-2xl font-bold text-gray-800">Album: {{ $album->nama_album }}</h2>
    <a href="{{ route('albums.index') }}" class="text-gray-500 font-bold">&larr; Kembali ke Daftar Album</a>
</div>

<!-- Container Upload Foto Massal (Sudah dirapikan presisi di tengah) -->
<div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 mb-8">
    <form action="{{ route('albums.photos.store', $album->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="border-2 border-dashed border-gray-300 rounded-xl p-8 bg-gray-50 flex flex-col items-center justify-center">
            <svg class="h-12 w-12 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
            
            <!-- CSS khusus Tailwind untuk merapikan form file ke tengah -->
            <input type="file" name="images[]" multiple required accept="image/*" 
                   class="block w-full max-w-sm text-sm text-gray-500 mx-auto
                          file:mr-4 file:py-2.5 file:px-6 file:rounded-xl file:border-0 
                          file:text-sm file:font-bold file:bg-[#00923F] file:text-white 
                          hover:file:bg-green-800 cursor-pointer text-center">
            
            <p class="text-xs text-gray-500 mt-4 text-center">Sorot/blok banyak foto saat memilih file. Maksimal 2MB per foto.</p>
        </div>
        <button type="submit" class="mt-4 w-full bg-[#00923F] text-white py-3 rounded-xl font-bold hover:bg-green-800 transition">Upload Foto Sekarang</button>
    </form>
</div>

<!-- Container Grid Foto yang sudah ada -->
<div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
    @foreach($album->galleries as $foto)
        <div class="relative group rounded-xl overflow-hidden shadow-sm border">
            <img src="{{ asset('storage/'.$foto->image_path) }}" class="w-full h-32 object-cover">
            
            <!-- Tombol Hapus muncul saat di hover -->
            <form action="{{ route('photos.destroy', $foto->id) }}" method="POST" class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition flex items-center justify-center" onsubmit="return confirm('Hapus foto ini?')">
                @csrf @method('DELETE')
                <button class="bg-red-500 text-white p-2 rounded-full hover:bg-red-700">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                </button>
            </form>
        </div>
    @endforeach
</div>
@endsection