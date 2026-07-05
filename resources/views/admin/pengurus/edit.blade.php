@extends('layouts.admin')
@section('title', 'Edit Data Pengurus')

@section('content')
<div class="mb-6 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
    <h2 class="text-2xl font-bold text-gray-800">Form Edit Pengurus</h2>
    <a href="{{ route('pengurus.index', ['kategori' => $pengurus->kategori]) }}" class="text-gray-500 hover:text-[#00923F] font-bold transition flex items-center gap-1 bg-white px-4 py-2 rounded-lg shadow-sm border border-gray-100">
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

<form action="{{ route('pengurus.update', $pengurus->id) }}" method="POST">
    @csrf
    @method('PUT')
    
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 items-start">
        
        <!-- KOLOM KIRI (AREA DATA UTAMA) -->
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white p-6 md:p-8 rounded-2xl shadow-sm border border-gray-100">
                <div class="mb-6">
                    <label class="block text-sm font-extrabold text-gray-700 mb-2">Nama Lengkap *</label>
                    <input type="text" name="nama" value="{{ old('nama', $pengurus->nama) }}" class="w-full border border-gray-300 rounded-xl p-4 focus:ring-2 focus:ring-green-200 focus:border-[#00923F] outline-none transition text-lg" required>
                </div>
                
                <div>
                    <label class="block text-sm font-extrabold text-gray-700 mb-2">Jabatan *</label>
                    <input type="text" name="jabatan" value="{{ old('jabatan', $pengurus->jabatan) }}" class="w-full border border-gray-300 rounded-xl p-4 focus:ring-2 focus:ring-green-200 focus:border-[#00923F] outline-none transition text-lg font-semibold text-gray-800" required>
                    <p class="text-xs text-blue-600 mt-2 font-medium bg-blue-50 p-2.5 rounded-lg border border-blue-100 inline-block">
                        💡 <b>Info Sistem:</b> Penulisan jabatan harus persis seperti standar website agar struktur warna & posisinya terbaca otomatis (Misal: "Ketua", bukan "ketua 1").
                    </p>
                </div>
            </div>
        </div>

        <!-- KOLOM KANAN (AREA PENGATURAN KATEGORI) -->
        <div class="lg:col-span-1 space-y-6 sticky top-6">
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                <h3 class="font-extrabold text-gray-800 mb-4 border-b border-gray-100 pb-3 flex items-center gap-2">
                    <svg class="w-5 h-5 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                    Edit Pemetaan
                </h3>
                
                <div class="mb-5">
                    <label class="block text-sm font-bold text-gray-700 mb-2">Kategori *</label>
                    <select name="kategori" class="w-full border border-gray-300 bg-gray-50 rounded-xl p-3 focus:ring-2 focus:ring-green-200 outline-none transition cursor-pointer text-sm font-semibold">
                        <option value="PAC" {{ (old('kategori') ?? $pengurus->kategori) == 'PAC' ? 'selected' : '' }}>PAC (Pengurus Anak Cabang)</option>
                        <option value="Lembaga" {{ (old('kategori') ?? $pengurus->kategori) == 'Lembaga' ? 'selected' : '' }}>Pengurus Lembaga</option>
                    </select>
                </div>

                <div class="mb-8">
                    <label class="block text-sm font-bold text-gray-700 mb-2">Nama Bidang / Lembaga</label>
                    <input type="text" name="bidang" value="{{ old('bidang', $pengurus->bidang) }}" class="w-full border border-gray-300 rounded-xl p-3 focus:ring-2 focus:ring-green-200 outline-none transition text-sm" placeholder="Contoh: Bidang Pendidikan">
                    <p class="text-[11px] text-orange-600 mt-2 font-medium bg-orange-50 p-2 rounded-lg border border-orange-100 leading-relaxed">
                        ⚠️ <b>Kosongkan kotak ini</b> jika pengurus merupakan jajaran Inti.
                    </p>
                </div>

                <button type="submit" class="w-full py-3.5 bg-orange-500 text-white font-extrabold rounded-xl hover:bg-orange-600 shadow-md transition transform hover:-translate-y-0.5 flex justify-center items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                    Update Pengurus
                </button>
            </div>
        </div>

    </div>
</form>
@endsection