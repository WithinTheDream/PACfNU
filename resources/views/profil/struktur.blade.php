@extends('layouts.front')
@section('title', 'Struktur Organisasi')

@section('content')
<div class="bg-[#EFFFF5] py-16 text-center border-b border-green-100">
    <h1 class="text-3xl md:text-4xl font-extrabold text-[#00923F]">Struktur Organisasi</h1>
    <p class="mt-3 text-gray-600 max-w-2xl mx-auto text-lg">Susunan Pengurus Anak Cabang Fatayat NU Kecamatan Tahunan.</p>
</div>

<div class="max-w-5xl mx-auto px-4 py-16 text-center">
    <div class="bg-white p-10 md:p-16 rounded-2xl border border-gray-100 shadow-sm">
        <div class="w-24 h-24 bg-green-50 rounded-full flex items-center justify-center mx-auto mb-6">
            <svg class="w-12 h-12 text-[#00923F]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
        </div>
        <h3 class="text-2xl font-bold text-gray-800 mb-3">Bagan Kepengurusan</h3>
        <p class="text-gray-500 mb-10 max-w-2xl mx-auto text-lg">Bagan struktur organisasi saat ini sedang dalam proses pembaruan data untuk periode kepengurusan terbaru.</p>
        
        <div class="w-full h-80 bg-gray-50 rounded-xl border-2 border-dashed border-gray-300 flex flex-col items-center justify-center text-gray-400">
            <svg class="w-10 h-10 mb-2 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
            <span>[ Upload Gambar Struktur Organisasi Di Sini ]</span>
        </div>
    </div>
</div>
@endsection