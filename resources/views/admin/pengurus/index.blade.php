@extends('layouts.admin')
@section('title', 'Manajemen Struktur & Lembaga')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <a href="{{ route('pengurus.create') }}" class="bg-green-600 text-white px-5 py-2.5 rounded-lg hover:bg-green-700 transition font-medium">
        + Tambah Pengurus
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
                <th class="p-4 text-sm font-semibold text-gray-600">Nama</th>
                <th class="p-4 text-sm font-semibold text-gray-600">Jabatan</th>
                <th class="p-4 text-sm font-semibold text-gray-600">Kategori</th>
                <th class="p-4 text-sm font-semibold text-gray-600">Bidang/Lembaga</th>
                <th class="p-4 text-sm font-semibold text-gray-600">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @forelse($pengurus as $p)
            <tr class="hover:bg-gray-50 transition">
                <td class="p-4 font-bold text-gray-800">{{ $p->nama }}</td>
                <td class="p-4 text-gray-700">{{ $p->jabatan }}</td>
                <td class="p-4">
                    <span class="px-3 py-1 text-xs font-semibold rounded-full {{ $p->kategori == 'PAC' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                        {{ $p->kategori }}
                    </span>
                </td>
                <td class="p-4 text-gray-700">{{ $p->bidang ?? '-' }}</td>
                <td class="p-4">
                    <div class="flex gap-3">
                        <a href="{{ route('pengurus.edit', $p->id) }}" class="text-blue-600 hover:text-blue-800 font-medium text-sm">Edit</a>
                        <form action="{{ route('pengurus.destroy', $p->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data pengurus ini?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800 font-medium text-sm">Hapus</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="p-8 text-center text-gray-500 italic">Belum ada data pengurus.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection