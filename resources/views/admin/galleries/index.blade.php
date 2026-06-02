@extends('layouts.admin')
@section('title', 'Manajemen Galeri')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <a href="{{ route('galleries.create') }}" class="bg-green-600 text-white px-5 py-2.5 rounded-lg hover:bg-green-700 transition font-medium">
        + Tambah Foto
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
                <th class="p-4 text-sm font-semibold text-gray-600">Caption</th>
                <th class="p-4 text-sm font-semibold text-gray-600">Terkait Berita</th>
                <th class="p-4 text-sm font-semibold text-gray-600">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @forelse($galleries as $item)
            <tr class="hover:bg-gray-50 transition">
                <td class="p-4">
                    <img src="{{ asset('storage/'.$item->image_path) }}" class="w-20 h-20 object-cover rounded shadow-sm border border-gray-200">
                </td>
                <td class="p-4 text-gray-800 font-medium">{{ $item->caption ?? '-' }}</td>
                <td class="p-4">
                    @if($item->article)
                        <span class="text-xs bg-blue-50 text-blue-600 px-2 py-1 rounded border border-blue-100">{{ $item->article->title }}</span>
                    @else
                        <span class="text-xs text-gray-400 italic">Berdiri Sendiri</span>
                    @endif
                </td>
                <td class="p-4">
                    <div class="flex gap-3">
                        <a href="{{ route('galleries.edit', $item->id) }}" class="text-blue-600 hover:text-blue-800 font-medium text-sm">Edit</a>
                        <form action="{{ route('galleries.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin hapus foto ini?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800 font-medium text-sm">Hapus</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="p-8 text-center text-gray-500 italic">Belum ada foto galeri.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection