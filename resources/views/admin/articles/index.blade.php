@extends('layouts.admin')
@section('title', request('jenis') == 'lembaga' ? 'Kelola Berita Lembaga' : 'Kelola Berita PAC')

@section('content')
<div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
        <h2 class="text-xl font-bold text-gray-800">
            Daftar Berita {{ request('jenis') == 'lembaga' ? 'Lembaga' : 'Utama PAC' }}
        </h2>
        
        <!-- Parameter 'jenis' akan otomatis ngikut url saat tombol tambah diklik -->
        <a href="{{ route('articles.create', ['jenis' => request('jenis', 'biasa')]) }}" class="bg-[#00923F] text-white px-5 py-2.5 rounded-lg text-sm font-bold hover:bg-green-800 transition shadow-sm flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
            Tambah Berita
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-50 text-green-700 p-4 rounded-lg mb-6 border border-green-100 font-medium">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50 border-b border-gray-100 text-sm text-gray-500">
                    <th class="p-4 font-bold rounded-tl-lg">Foto Sampul</th>
                    <th class="p-4 font-bold">Judul Berita</th>
                    <th class="p-4 font-bold">Status</th>
                    <th class="p-4 font-bold text-right rounded-tr-lg">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($articles as $article)
                <tr class="hover:bg-gray-50/50 transition">
                    <td class="p-4 w-24">
                        @if($article->image)
                            <img src="{{ asset('storage/'.$article->image) }}" class="w-20 h-14 object-cover rounded-md border border-gray-200">
                        @else
                            <div class="w-20 h-14 bg-gray-100 rounded-md flex items-center justify-center text-[10px] font-bold text-gray-400">NO IMAGE</div>
                        @endif
                    </td>
                    <td class="p-4">
                        <p class="font-bold text-gray-800 line-clamp-1 text-base">{{ $article->title }}</p>
                        <p class="text-xs text-gray-500 mt-1 font-medium">{{ $article->created_at->format('d M Y') }}</p>
                    </td>
                    <td class="p-4">
                        <span class="px-3 py-1 text-xs font-extrabold rounded-full {{ $article->status == 'published' ? 'bg-green-100 text-[#00923F]' : 'bg-yellow-100 text-yellow-700' }}">
                            {{ strtoupper($article->status) }}
                        </span>
                    </td>
                    <td class="p-4 text-right space-x-3 w-32">
                        <a href="{{ route('articles.edit', $article->id) }}" class="text-blue-600 hover:text-blue-800 font-bold text-sm transition">Edit</a>
                        <form action="{{ route('articles.destroy', $article->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus berita ini secara permanen?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700 font-bold text-sm transition">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="p-10 text-center text-gray-500 border-dashed border-2 border-gray-100 rounded-lg">
                        <p class="font-medium text-lg">Belum ada data berita.</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection