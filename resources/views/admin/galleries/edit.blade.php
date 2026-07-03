@extends('layouts.admin')
@section('title', 'Edit Foto Galeri')

@section('content')
<div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 max-w-3xl">
    <div class="mb-6 border-b border-gray-100 pb-4 flex justify-between items-center">
        <h2 class="text-xl font-bold text-gray-800">Form Edit Foto</h2>
        <a href="{{ route('galleries.index') }}" class="text-gray-500 hover:text-gray-800 text-sm">Kembali</a>
    </div>

    <form action="{{ route('galleries.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">Nama Kategori Acara</label>
            <input type="text" name="kategori" value="{{ $gallery->kategori }}" class="w-full border border-gray-300 rounded-lg p-2.5 focus:border-[#00923F]" required>
        </div>

        <div class="mb-6 bg-gray-50 p-4 rounded-lg border border-gray-200">
            <p class="text-sm font-medium text-gray-700 mb-2">Foto Saat Ini:</p>
            <img src="{{ asset('storage/'.$gallery->image_path) }}" class="w-40 h-auto rounded border border-gray-300 mb-2 shadow-sm">
            <label class="block text-sm font-medium text-gray-700 mb-1 mt-4">Ganti Foto Baru (Opsional)</label>
            <input type="file" name="image" class="w-full border border-gray-300 bg-white rounded-lg p-2 focus:border-[#00923F] focus:ring-[#00923F]" accept="image/*">
            <p class="text-xs text-gray-500 mt-1">* Biarkan kosong jika tidak ingin mengganti foto.</p>
        </div>

        <button type="submit" class="bg-[#00923F] text-white px-6 py-2.5 rounded-lg hover:bg-green-800 font-medium">
            Update Data
        </button>
    </form>
</div>
@endsection