@extends('layouts.admin')
@section('title', 'Tambah Berita Baru')

@section('content')
<div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100 max-w-3xl">
    <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-5">
            <label class="block text-gray-700 font-medium mb-2">Judul Berita</label>
            <input type="text" name="title" required class="w-full border rounded-lg px-4 py-2.5 focus:border-green-500 focus:ring-1 focus:ring-green-500 outline-none">
        </div>
        
        <div class="mb-5">
            <label class="block text-gray-700 font-medium mb-2">Isi Konten</label>
            <textarea name="content" rows="8" required class="w-full border rounded-lg px-4 py-2.5 focus:border-green-500 focus:ring-1 focus:ring-green-500 outline-none"></textarea>
        </div>
        
        <div class="mb-5">
            <label class="block text-gray-700 font-medium mb-2">Foto / Gambar Header (Opsional)</label>
            <input type="file" name="image" accept="image/*" class="w-full border rounded-lg px-4 py-2.5 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:bg-green-50 file:text-green-700 hover:file:bg-green-100">
        </div>
        
        <div class="mb-8">
            <label class="block text-gray-700 font-medium mb-2">Status Publikasi</label>
            <select name="status" class="w-full border rounded-lg px-4 py-2.5 outline-none focus:border-green-500">
                <option value="draft">Draft (Simpan sementara)</option>
                <option value="published">Published (Tampilkan di web)</option>
            </select>
        </div>
        
        <div class="flex items-center gap-4 border-t pt-6">
            <button type="submit" class="bg-green-600 text-white px-8 py-3 rounded-lg hover:bg-green-700 font-bold transition">Simpan Berita</button>
            <a href="{{ route('articles.index') }}" class="text-gray-500 hover:text-gray-800 font-medium">Batal</a>
        </div>
    </form>
</div>
@endsection