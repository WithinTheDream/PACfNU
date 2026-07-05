@extends('layouts.admin')
@section('title', 'Tambah Data Pengurus')

@section('content')
<div class="mb-6 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
    <h2 class="text-2xl font-bold text-gray-800">Form Tambah Pengurus</h2>
    <a href="{{ route('pengurus.index', ['kategori' => request('kategori', 'PAC')]) }}" class="text-gray-500 hover:text-[#00923F] font-bold transition flex items-center gap-1 bg-white px-4 py-2 rounded-lg shadow-sm border border-gray-100">
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

<form action="{{ route('pengurus.store') }}" method="POST">
    @csrf
    
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 items-start">
        
        <!-- KOLOM KIRI (AREA DATA UTAMA) -->
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white p-6 md:p-8 rounded-2xl shadow-sm border border-gray-100">
                <div class="mb-6">
                    <label class="block text-sm font-extrabold text-gray-700 mb-2">Nama Lengkap *</label>
                    <input type="text" name="nama" value="{{ old('nama') }}" class="w-full border border-gray-300 rounded-xl p-4 focus:ring-2 focus:ring-green-200 focus:border-[#00923F] outline-none transition text-lg" placeholder="Masukkan nama beserta gelar (jika ada)..." required>
                </div>
                
                <div>
                    <label class="block text-sm font-extrabold text-gray-700 mb-2">Jabatan *</label>
                    <input type="text" name="jabatan" value="{{ old('jabatan') }}" class="w-full border border-gray-300 rounded-xl p-4 focus:ring-2 focus:ring-green-200 focus:border-[#00923F] outline-none transition text-lg font-semibold text-gray-800" placeholder="Contoh: Ketua, Sekretaris, Dewan Penasehat..." required>
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
                    <svg class="w-5 h-5 text-[#00923F]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                    Pemetaan Struktur
                </h3>
                
                <div class="mb-5">
                    <label class="block text-sm font-bold text-gray-700 mb-2">Kategori *</label>
                    <select name="kategori" class="w-full border border-gray-300 bg-gray-50 rounded-xl p-3 focus:ring-2 focus:ring-green-200 outline-none transition cursor-pointer text-sm font-semibold">
                        <option value="PAC" {{ request('kategori') == 'PAC' || old('kategori') == 'PAC' ? 'selected' : '' }}>PAC (Pengurus Anak Cabang)</option>
                        <option value="Lembaga" {{ request('kategori') == 'Lembaga' || old('kategori') == 'Lembaga' ? 'selected' : '' }}>Pengurus Lembaga</option>
                    </select>
                </div>

                <div class="mb-8">
                    <label class="block text-sm font-bold text-gray-700 mb-2">Nama Bidang / Lembaga</label>
                    <input type="text" name="bidang" value="{{ old('bidang') }}" class="w-full border border-gray-300 rounded-xl p-3 focus:ring-2 focus:ring-green-200 outline-none transition text-sm" placeholder="Contoh: Bidang Organisasi">
                    <p class="text-[11px] text-orange-600 mt-2 font-medium bg-orange-50 p-2 rounded-lg border border-orange-100 leading-relaxed">
                        ⚠️ <b>Kosongkan kotak ini</b> jika pengurus merupakan jajaran Inti (Ketua, Sekretaris, Bendahara, Pembina).
                    </p>
                </div>

                <button type="submit" class="w-full py-3.5 bg-[#00923F] text-white font-extrabold rounded-xl hover:bg-green-800 shadow-md transition transform hover:-translate-y-0.5 flex justify-center items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path></svg>
                    Simpan Pengurus
                </button>
            </div>
        </div>

    </div>
</form>
@endsection