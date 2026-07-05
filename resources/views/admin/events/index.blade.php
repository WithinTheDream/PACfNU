@extends('layouts.admin')
@section('title', 'Kelola Jadwal Acara')

@section('content')
<div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
        <h2 class="text-xl font-bold text-gray-800">Daftar Agenda Kegiatan</h2>
        
        <a href="{{ route('events.create') }}" class="bg-[#00923F] text-white px-5 py-2.5 rounded-lg text-sm font-bold hover:bg-green-800 transition shadow-sm flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
            Tambah Agenda
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
                    <th class="p-4 font-bold rounded-tl-lg">Nama Acara</th>
                    <th class="p-4 font-bold">Waktu Pelaksanaan</th>
                    <th class="p-4 font-bold">Lokasi</th>
                    <th class="p-4 font-bold">Status</th>
                    <th class="p-4 font-bold text-right rounded-tr-lg">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($events as $event)
                <tr class="hover:bg-gray-50/50 transition">
                    <td class="p-4 font-bold text-gray-800 text-base">{{ $event->name }}</td>
                    <td class="p-4">
                        <span class="bg-blue-50 text-blue-700 px-3 py-1.5 rounded-md text-xs font-bold border border-blue-100">
                            <!-- Format Tanggal Indonesia -->
                            {{ \Carbon\Carbon::parse($event->event_date)->locale('id')->translatedFormat('l, d F Y - H:i') }} WIB
                        </span>
                    </td>
                    <td class="p-4 text-gray-600 font-medium text-sm">{{ $event->location }}</td>
                    <td class="p-4">
                        <span class="px-3 py-1 text-xs font-extrabold rounded-full {{ $event->status == 'upcoming' ? 'bg-yellow-100 text-yellow-700' : 'bg-green-100 text-[#00923F]' }}">
                            {{ $event->status == 'upcoming' ? 'AKAN DATANG' : 'SELESAI' }}
                        </span>
                    </td>
                    <td class="p-4 text-right space-x-3 w-32">
                        <a href="{{ route('events.edit', $event->id) }}" class="text-blue-600 hover:text-blue-800 font-bold text-sm transition">Edit</a>
                        <form action="{{ route('events.destroy', $event->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Hapus agenda ini?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700 font-bold text-sm transition">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="p-10 text-center text-gray-500 border-dashed border-2 border-gray-100 rounded-lg">
                        <p class="font-medium text-lg">Belum ada jadwal acara.</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection