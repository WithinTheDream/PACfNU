@extends('layouts.admin')
@section('title', request('kategori') == 'Lembaga' ? 'Struktur Lembaga' : 'Struktur Inti PAC')

@section('content')
<div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
        <h2 class="text-xl font-bold text-gray-800">
            Daftar Pengurus {{ request('kategori') == 'Lembaga' ? 'Lembaga' : 'PAC' }}
        </h2>
        
        <a href="{{ route('pengurus.create', ['kategori' => request('kategori', 'PAC')]) }}" class="bg-[#00923F] text-white px-5 py-2.5 rounded-lg text-sm font-bold hover:bg-green-800 transition shadow-sm flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
            Tambah Pengurus
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
                    <th class="p-4 font-bold rounded-tl-lg">Nama Lengkap</th>
                    <th class="p-4 font-bold">Jabatan</th>
                    <th class="p-4 font-bold">Kategori</th>
                    <th class="p-4 font-bold text-right rounded-tr-lg">Aksi</th>
                </tr>
            </thead>
            
            <!-- Looping Kelompok Bidang -->
            @forelse($groupedPengurus as $namaBidang => $anggota)
                <!-- Tbody untuk Judul Bidang -->
                <tbody>
                    <tr class="bg-green-50/50">
                        <td colspan="4" class="p-3 px-4 font-extrabold text-[#00923F] text-xs uppercase tracking-widest border-l-4 border-[#00923F]">
                            {{ $namaBidang }}
                        </td>
                    </tr>
                </tbody>
                
                <!-- Tbody khusus untuk Area Drag & Drop per Bidang -->
                <tbody class="divide-y divide-gray-100 sortable-tbody" data-kategori="{{ $namaBidang }}">
                    @foreach($anggota as $p)
                    <tr class="hover:bg-gray-50/50 transition cursor-move group bg-white" data-id="{{ $p->id }}">
                        <td class="p-4 font-bold text-gray-800 text-base">
                            <div class="flex items-center gap-3">
                                <!-- Icon Drag (Garis Tiga) -->
                                <svg class="w-5 h-5 text-gray-300 group-hover:text-green-500 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h16M4 16h16"></path></svg>
                                {{ $p->nama }}
                            </div>
                        </td>
                        <td class="p-4 font-medium text-gray-600">{{ $p->jabatan }}</td>
                        <td class="p-4">
                            <span class="px-3 py-1 text-xs font-extrabold rounded-full {{ $p->kategori == 'PAC' ? 'bg-green-100 text-[#00923F]' : 'bg-yellow-100 text-yellow-700' }}">
                                {{ strtoupper($p->kategori) }}
                            </span>
                        </td>
                        <td class="p-4 text-right space-x-3">
                            <a href="{{ route('pengurus.edit', $p->id) }}" class="text-blue-600 hover:text-blue-800 font-bold text-sm transition relative z-10">Edit</a>
                            <form action="{{ route('pengurus.destroy', $p->id) }}" method="POST" class="inline-block relative z-10" onsubmit="return confirm('Hapus data pengurus ini?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700 font-bold text-sm transition">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            @empty
                <tbody>
                    <tr>
                        <td colspan="4" class="p-10 text-center text-gray-500 border-dashed border-2 border-gray-100 rounded-lg">
                            <p class="font-medium text-lg">Belum ada data kepengurusan.</p>
                        </td>
                    </tr>
                </tbody>
            @endforelse
        </table>
    </div>
</div>

<!-- Library SortableJS dipanggil langsung di sini agar tidak gagal load -->
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Cari semua tbody yang punya class sortable-tbody
        document.querySelectorAll('.sortable-tbody').forEach(tbody => {
            new Sortable(tbody, {
                animation: 150,
                ghostClass: 'bg-green-100', // Warna background saat item di-drag
                onEnd: function () {
                    // Kumpulkan urutan baru
                    let order = [];
                    tbody.querySelectorAll('tr').forEach((tr, index) => {
                        order.push({ id: tr.dataset.id, position: index + 1 });
                    });
                    
                    // Tembak data ke server lewat AJAX (Fetch API)
                    fetch("{{ route('pengurus.reorder') }}", {
                        method: 'POST',
                        headers: { 
                            'Content-Type': 'application/json', 
                            'X-CSRF-TOKEN': '{{ csrf_token() }}' 
                        },
                        body: JSON.stringify({ order: order })
                    }).then(response => {
                        if(response.ok) {
                            console.log('Urutan berhasil disimpan!');
                        }
                    });
                }
            });
        });
    });
</script>
@endsection