@extends('layouts.admin')
@section('title', 'Edit Jadwal Acara')

@section('content')
<div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100 max-w-3xl">
    <form action="{{ route('events.update', $event->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
            <div>
                <label class="block text-gray-700 font-medium mb-2">Nama Kegiatan</label>
                <input type="text" name="name" value="{{ $event->name }}" required class="w-full border rounded-lg px-4 py-2.5 focus:border-green-500 outline-none">
            </div>
            <div>
                <label class="block text-gray-700 font-medium mb-2">Tanggal & Waktu</label>
                <input type="datetime-local" name="event_date" value="{{ \Carbon\Carbon::parse($event->event_date)->format('Y-m-d\TH:i') }}" required class="w-full border rounded-lg px-4 py-2.5 focus:border-green-500 outline-none">
            </div>
        </div>
        
        <div class="mb-5">
            <label class="block text-gray-700 font-medium mb-2">Lokasi Kegiatan</label>
            <input type="text" name="location" value="{{ $event->location }}" required class="w-full border rounded-lg px-4 py-2.5 focus:border-green-500 outline-none">
        </div>
        
        <div class="mb-5">
            <label class="block text-gray-700 font-medium mb-2">Keterangan / Deskripsi</label>
            <textarea name="description" rows="4" class="w-full border rounded-lg px-4 py-2.5 focus:border-green-500 outline-none">{{ $event->description }}</textarea>
        </div>
        
        <div class="mb-8">
            <label class="block text-gray-700 font-medium mb-2">Status Kegiatan</label>
            <select name="status" class="w-full border rounded-lg px-4 py-2.5 outline-none">
                <option value="upcoming" {{ $event->status == 'upcoming' ? 'selected' : '' }}>Upcoming (Akan Datang)</option>
                <option value="completed" {{ $event->status == 'completed' ? 'selected' : '' }}>Completed (Selesai)</option>
            </select>
        </div>
        
        <div class="flex items-center gap-4 border-t pt-6">
            <button type="submit" class="bg-blue-600 text-white px-8 py-3 rounded-lg hover:bg-blue-700 font-bold transition">Update Jadwal</button>
            <a href="{{ route('events.index') }}" class="text-gray-500 hover:text-gray-800 font-medium">Batal</a>
        </div>
    </form>
</div>
@endsection