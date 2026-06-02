@extends('layouts.admin')
@section('title', 'Tambah Foto Galeri')

@section('content')
<div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 max-w-3xl">
    <div class="mb-6 border-b border-gray-100 pb-4 flex justify-between items-center">
        <h2 class="text-xl font-bold text-gray-800">Form Tambah Foto</h2>
        <a href="{{ route('galleries.index') }}" class="text-gray-500 hover:text-gray-800 text-sm">Kembali</a>
    </div>

    <form action="{{ route('galleries.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700 mb-1">Nama Kategori Acara</label>
        <input type="text" name="kategori" class="w-full border border-gray-300 rounded-lg p-2.5 focus:border-[#00923F]" placeholder="Contoh: Bukber Ramadhan 2026" required>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">Pilih Beberapa Foto Sekaligus *</label>
            <input type="file" name="images[]" multiple class="w-full border border-gray-300 rounded-lg p-2 focus:border-[#00923F]" required accept="image/*">
            <p class="text-xs text-gray-500 mt-1">Kamu bisa menyorot (blok) banyak foto sekaligus saat memilih file.</p>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">Caption / Keterangan Gambar</label>
            <input type="text" name="caption" class="w-full border border-gray-300 rounded-lg p-2.5 focus:border-[#00923F] focus:ring-[#00923F]" placeholder="Opsional...">
        </div>

        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-1">Hubungkan ke Berita (Opsional)</label>
            <select name="article_id" class="w-full border border-gray-300 rounded-lg p-2.5 focus:border-[#00923F] focus:ring-[#00923F]">
                <option value="">-- Jangan Hubungkan (Tampil di Galeri Utama Saja) --</option>
                @foreach($articles as $article)
                    <option value="{{ $article->id }}">{{ $article->title }}</option>
                @endforeach
            </select>
            <p class="text-xs text-gray-500 mt-1">Jika dihubungkan, foto ini akan muncul sebagai slider dokumentasi tambahan saat membaca berita tersebut.</p>
        </div>

        <button type="submit" class="bg-[#00923F] text-white px-6 py-2.5 rounded-lg hover:bg-green-800 font-medium">
            Upload Foto
        </button>
    </form>
</div>
@endsection