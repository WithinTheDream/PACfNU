@extends('layouts.admin')
@section('title', 'Edit Jadwal Acara')

@section('content')
<!-- Pindahkan CSS ke sini -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/airbnb.css">

<div class="mb-6 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
    <h2 class="text-2xl font-bold text-gray-800">Form Edit Jadwal</h2>
    <a href="{{ route('events.index') }}" class="text-gray-500 hover:text-[#00923F] font-bold transition flex items-center gap-1 bg-white px-4 py-2 rounded-lg shadow-sm border border-gray-100">
        &larr; Kembali ke Daftar
    </a>
</div>

@if ($errors->any())
    <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-6 rounded-r-lg shadow-sm">
        <h3 class="text-sm font-bold text-red-800 mb-2">Gagal menyimpan! Periksa form:</h3>
        <ul class="text-sm text-red-600 list-disc list-inside space-y-1 font-medium">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('events.update', $event->id) }}" method="POST">
    @csrf
    @method('PUT')
    
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 items-start">
        
        <!-- KOLOM KIRI -->
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white p-6 md:p-8 rounded-2xl shadow-sm border border-gray-100">
                <div class="mb-6">
                    <label class="block text-sm font-extrabold text-gray-700 mb-2">Nama Acara / Kegiatan *</label>
                    <input type="text" name="name" value="{{ old('name', $event->name) }}" required class="w-full border border-gray-300 rounded-xl p-4 focus:ring-2 focus:ring-green-200 focus:border-[#00923F] outline-none transition text-lg">
                </div>
                
                <div class="mb-6">
                    <label class="block text-sm font-extrabold text-gray-700 mb-2">Lokasi Kegiatan *</label>
                    <input type="text" name="location" value="{{ old('location', $event->location) }}" required class="w-full border border-gray-300 rounded-xl p-4 focus:ring-2 focus:ring-green-200 focus:border-[#00923F] outline-none transition">
                </div>

                <div>
                    <label class="block text-sm font-extrabold text-gray-700 mb-2">Keterangan / Deskripsi</label>
                    <textarea name="description" rows="5" class="w-full border border-gray-300 rounded-xl p-4 focus:ring-2 focus:ring-green-200 focus:border-[#00923F] outline-none transition">{{ old('description', $event->description) }}</textarea>
                </div>
            </div>
        </div>

        <!-- KOLOM KANAN -->
        <div class="lg:col-span-1 space-y-6 sticky top-6">
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                <h3 class="font-extrabold text-gray-800 mb-4 border-b border-gray-100 pb-3 flex items-center gap-2">
                    <svg class="w-5 h-5 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    Edit Waktu & Status
                </h3>
                
                <div class="mb-5 relative">
                    <label class="block text-sm font-bold text-gray-700 mb-2">Tanggal & Waktu *</label>
                    <input type="text" name="event_date" id="event_date" value="{{ old('event_date', \Carbon\Carbon::parse($event->event_date)->format('Y-m-d H:i')) }}" required class="w-full border border-gray-300 bg-white rounded-xl p-3 pl-10 focus:ring-2 focus:ring-green-200 outline-none transition cursor-pointer font-semibold" placeholder="Pilih Tanggal...">
                    <svg class="w-5 h-5 text-gray-400 absolute bottom-3.5 left-3 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                </div>

                <div class="mb-8">
                    <label class="block text-sm font-bold text-gray-700 mb-2">Status Kegiatan *</label>
                    <select name="status" class="w-full border border-gray-300 bg-gray-50 rounded-xl p-3 focus:ring-2 focus:ring-green-200 outline-none transition cursor-pointer text-sm font-semibold">
                        <option value="upcoming" {{ (old('status') ?? $event->status) == 'upcoming' ? 'selected' : '' }}>Akan Datang (Upcoming)</option>
                        <option value="completed" {{ (old('status') ?? $event->status) == 'completed' ? 'selected' : '' }}>Selesai (Completed)</option>
                    </select>
                </div>

                <button type="submit" class="w-full py-3.5 bg-orange-500 text-white font-extrabold rounded-xl hover:bg-orange-600 shadow-md transition transform hover:-translate-y-0.5 flex justify-center items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                    Update Agenda
                </button>
            </div>
        </div>
    </div>
</form>

<!-- JS Flatpickr -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/id.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        flatpickr("#event_date", {
            enableTime: true,
            time_24hr: true,
            dateFormat: "Y-m-d H:i", 
            locale: "id", 
            altInput: true,
            altFormat: "l, j F Y - H:i" 
        });
    });
</script>
@endsection