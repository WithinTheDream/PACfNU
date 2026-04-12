@extends('layouts.admin')
@section('title', 'Kelola Jadwal Acara')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <a href="{{ route('events.create') }}" class="bg-green-600 text-white px-5 py-2.5 rounded-lg hover:bg-green-700 transition font-medium">
        + Tambah Jadwal Baru
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
                <th class="p-4 text-sm font-semibold text-gray-600">Nama Acara</th>
                <th class="p-4 text-sm font-semibold text-gray-600">Lokasi</th>
                <th class="p-4 text-sm font-semibold text-gray-600">Waktu</th>
                <th class="p-4 text-sm font-semibold text-gray-600">Status</th>
                <th class="p-4 text-sm font-semibold text-gray-600">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @forelse($events as $event)
            <tr class="hover:bg-gray-50 transition">
                <td class="p-4 font-bold text-gray-800">{{ $event->name }}</td>
                <td class="p-4 text-sm text-gray-600">{{ $event->location }}</td>
                <td class="p-4 text-sm text-blue-600 font-medium">{{ \Carbon\Carbon::parse($event->event_date)->format('d M Y, H:i') }}</td>
                <td class="p-4">
                    <span class="px-3 py-1 text-xs font-semibold rounded-full {{ $event->status == 'upcoming' ? 'bg-yellow-100 text-yellow-700' : 'bg-green-100 text-green-700' }}">
                        {{ strtoupper($event->status) }}
                    </span>
                </td>
                <td class="p-4">
                    <div class="flex gap-3">
                        <a href="{{ route('events.edit', $event->id) }}" class="text-blue-600 hover:text-blue-800 font-medium text-sm">Edit</a>
                        <form action="{{ route('events.destroy', $event->id) }}" method="POST" onsubmit="return confirm('Hapus jadwal ini?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800 font-medium text-sm">Hapus</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="p-8 text-center text-gray-500 italic">Belum ada jadwal acara.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection