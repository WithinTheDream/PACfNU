@extends('layouts.admin')
@section('title', 'Dashboard Utama')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 col-span-full flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Selamat Datang, {{ Auth::user()->name }}! 👋</h2>
            <p class="text-gray-600 mt-2">Gunakan panel ini untuk mengelola data website Fatayat NU Tahunan secara mandiri.</p>
        </div>
        <div class="hidden md:block">
            <span class="bg-green-100 text-green-800 text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wide">Administrator</span>
        </div>
    </div>

    <!-- Widget Statistik -->
    <div class="bg-white p-6 rounded-xl shadow-sm border border-l-4 border-l-green-500 hover:shadow-md transition">
        <h3 class="text-gray-500 font-medium text-sm">Total Berita PAC</h3>
        <div class="flex items-center gap-3 mt-2">
            <p class="text-3xl font-bold text-gray-800">{{ $totalBerita ?? 0 }}</p>
            <span class="text-xs text-green-600 bg-green-50 px-2 py-1 rounded-md">Artikel</span>
        </div>
    </div>
    
    <div class="bg-white p-6 rounded-xl shadow-sm border border-l-4 border-l-blue-500 hover:shadow-md transition">
        <h3 class="text-gray-500 font-medium text-sm">Acara Mendatang</h3>
        <div class="flex items-center gap-3 mt-2">
            <p class="text-3xl font-bold text-gray-800">{{ $totalAcara ?? 0 }}</p>
            <span class="text-xs text-blue-600 bg-blue-50 px-2 py-1 rounded-md">Agenda</span>
        </div>
    </div>

    <div class="bg-white p-6 rounded-xl shadow-sm border border-l-4 border-l-orange-500 hover:shadow-md transition">
        <h3 class="text-gray-500 font-medium text-sm">Total Pengurus</h3>
        <div class="flex items-center gap-3 mt-2">
            <p class="text-3xl font-bold text-gray-800">{{ $totalPengurus ?? 0 }}</p>
            <span class="text-xs text-orange-600 bg-orange-50 px-2 py-1 rounded-md">Personel</span>
        </div>
    </div>

    <div class="bg-white p-6 rounded-xl shadow-sm border border-l-4 border-l-purple-500 hover:shadow-md transition">
        <h3 class="text-gray-500 font-medium text-sm">Kategori Galeri</h3>
        <div class="flex items-center gap-3 mt-2">
            <p class="text-3xl font-bold text-gray-800">{{ $totalGaleri ?? 0 }}</p>
            <span class="text-xs text-purple-600 bg-purple-50 px-2 py-1 rounded-md">Album</span>
        </div>
    </div>
</div>

<!-- PANEL AKSES CEPAT -->
<div class="mt-10">
    <h3 class="text-lg font-bold text-gray-800 mb-4">Akses Cepat Menu</h3>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        
        <!-- Akses: Tulis Berita PAC -->
        <a href="{{ url('/admin/articles/create?jenis=biasa') }}" class="flex items-center gap-4 bg-white p-4 rounded-xl border border-gray-100 shadow-sm hover:shadow-md hover:border-green-300 transition group">
            <div class="bg-green-50 text-green-600 p-3 rounded-lg group-hover:bg-green-600 group-hover:text-white transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
            </div>
            <div>
                <h4 class="font-bold text-gray-800 group-hover:text-green-700 transition">Tulis Berita PAC</h4>
                <p class="text-xs text-gray-500 mt-0.5">Buat artikel kegiatan utama</p>
            </div>
        </a>

        <!-- Akses: Berita Lembaga -->
        <a href="{{ url('/admin/articles?jenis=lembaga') }}" class="flex items-center gap-4 bg-white p-4 rounded-xl border border-gray-100 shadow-sm hover:shadow-md hover:border-yellow-400 transition group">
            <div class="bg-yellow-50 text-yellow-600 p-3 rounded-lg group-hover:bg-yellow-500 group-hover:text-white transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2.5 2.5 0 00-2.5-2.5H14"></path></svg>
            </div>
            <div>
                <h4 class="font-bold text-gray-800 group-hover:text-yellow-600 transition">Manajemen Lembaga</h4>
                <p class="text-xs text-gray-500 mt-0.5">Kelola liputan khusus lembaga</p>
            </div>
        </a>

        <!-- Akses: Tambah Jadwal -->
        <a href="{{ url('/admin/events/create') }}" class="flex items-center gap-4 bg-white p-4 rounded-xl border border-gray-100 shadow-sm hover:shadow-md hover:border-blue-300 transition group">
            <div class="bg-blue-50 text-blue-600 p-3 rounded-lg group-hover:bg-blue-600 group-hover:text-white transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
            </div>
            <div>
                <h4 class="font-bold text-gray-800 group-hover:text-blue-700 transition">Tambah Jadwal</h4>
                <p class="text-xs text-gray-500 mt-0.5">Agendakan acara mendatang</p>
            </div>
        </a>

    </div>
</div>
@endsection