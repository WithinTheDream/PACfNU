@extends('layouts.admin')
@section('title', 'Edit Berita')

@section('content')
<div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100 max-w-3xl">
    <form action="{{ route('articles.update', $article->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT') <div class="mb-5">
            <label class="block text-gray-700 font-medium mb-2">Judul Berita</label>
            <input type="text" name="title" value="{{ $article->title }}" required class="w-full border rounded-lg px-4 py-2.5 focus:border-green-500 focus:ring-1 focus:ring-green-500 outline-none">
        </div>
        
        <div class="mb-5">
            <label class="block text-gray-700 font-medium mb-2">Isi Konten</label>
            <textarea name="content" rows="8" required class="w-full border rounded-lg px-4 py-2.5 focus:border-green-500 focus:ring-1 focus:ring-green-500 outline-none">{{ $article->content }}</textarea>
        </div>
        
        <div class="mb-5">
            <label class="block text-gray-700 font-medium mb-2">Ganti Foto (Biarkan kosong jika tidak diganti)</label>
            @if($article->image)
                <div class="mb-2">
                    <img src="{{ asset('storage/'.$article->image) }}" class="h-24 w-auto rounded border">
                </div>
            @endif
            <input type="file" name="image" accept="image/*" class="w-full border rounded-lg px-4 py-2.5">
        </div>
        
        <div class="mb-8">
            <label class="block text-gray-700 font-medium mb-2">Status Publikasi</label>
            <select name="status" class="w-full border rounded-lg px-4 py-2.5 outline-none">
                <option value="draft" {{ $article->status == 'draft' ? 'selected' : '' }}>Draft</option>
                <option value="published" {{ $article->status == 'published' ? 'selected' : '' }}>Published</option>
            </select>
        </div>
        
        <div class="flex items-center gap-4 border-t pt-6">
            <button type="submit" class="bg-blue-600 text-white px-8 py-3 rounded-lg hover:bg-blue-700 font-bold transition">Update Berita</button>
            <a href="{{ route('articles.index') }}" class="text-gray-500 hover:text-gray-800 font-medium">Batal</a>
        </div>
    </form>
</div>
@endsection