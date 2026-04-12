@extends('layouts.admin')

@section('title', 'Dashboard Utama')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 col-span-full">
        <h2 class="text-2xl font-bold text-gray-800">Selamat Datang, Pengurus! 👋</h2>
        <p class="text-gray-600 mt-2">Gunakan panel ini untuk mengelola data website Fatayat NU Tahunan secara mandiri.</p>
    </div>

    <div class="bg-white p-6 rounded-xl shadow-sm border border-l-4 border-l-green-600">
        <h3 class="text-gray-500 font-medium">Total Berita</h3>
        <p class="text-3xl font-bold text-gray-800 mt-1">--</p>
    </div>
    
    <div class="bg-white p-6 rounded-xl shadow-sm border border-l-4 border-l-blue-600">
        <h3 class="text-gray-500 font-medium">Jadwal Mendatang</h3>
        <p class="text-3xl font-bold text-gray-800 mt-1">--</p>
    </div>
</div>
@endsection