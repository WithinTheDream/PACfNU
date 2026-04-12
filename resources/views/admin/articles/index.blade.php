@extends('layouts.admin')
@section('title', 'Kelola Berita')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <a href="{{ route('articles.create') }}" class="bg-green-600 text-white px-5 py-2.5 rounded-lg hover:bg-green-700 transition font-medium">
        + Tambah Berita
    </a>
</div>

@if(session('success'))
    <div class="bg-green-50 text-green-600 p-4 rounded-lg mb-6 border border-green-200">
        {{ session('success') }}
    </div>
@endif

<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <table class="w-full text-left border-collapse">
        <thead>
            <tr class="bg-gray-50 border-b">
                <th class="p-4 text-sm font-semibold text-gray-600">Foto</th>
                <th class="p-4 text-sm font-semibold text-gray-600">Judul Berita</th>
                <th class="p-4 text-sm font-semibold text-gray-600">Status</th>
                <th class="p-4 text-sm font-semibold text-gray-600">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @forelse($articles as $article)
            <tr class="hover:bg-gray-50 transition">
                <td class="p-4">
                    @if($article->image)
                        <img src="{{ asset('storage/'.$article->image) }}" class="w-16 h-16 object-cover rounded-md shadow-sm">
                    @else
                        <div class="w-16 h-16 bg-gray-100 rounded-md flex items-center justify-center text-gray-400 text-xs">No Image</div>
                    @endif
                </td>
                <td class="p-4 font-bold text-gray-800">{{ $article->title }}</td>
                <td class="p-4">
                    <span class="px-3 py-1 text-xs font-semibold rounded-full {{ $article->status == 'published' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                        {{ strtoupper($article->status) }}
                    </span>
                </td>
                <td class="p-4">
                    <div class="flex gap-3">
                        <a href="{{ route('articles.edit', $article->id) }}" class="text-blue-600 hover:text-blue-800 font-medium text-sm">Edit</a>
                        <form action="{{ route('articles.destroy', $article->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus berita ini?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800 font-medium text-sm">Hapus</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="p-8 text-center text-gray-500 italic">Belum ada berita yang diterbitkan.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection