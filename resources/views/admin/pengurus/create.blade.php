@extends('layouts.admin')
@section('title', 'Tambah Pengurus')

@section('content')
<div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 max-w-3xl">
    <div class="mb-6 border-b border-gray-100 pb-4 flex justify-between items-center">
        <h2 class="text-xl font-bold text-gray-800">Form Tambah Pengurus</h2>
        <a href="{{ route('pengurus.index') }}" class="text-gray-500 hover:text-gray-800 text-sm">Kembali</a>
    </div>

    <form action="{{ route('pengurus.store') }}" method="POST">
        @csrf
        
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
            <select name="kategori" class="w-full border border-gray-300 rounded-lg p-2.5 focus:border-[#00923F] focus:ring-[#00923F]" required>
                <option value="PAC">PAC (Pimpinan Anak Cabang)</option>
                <option value="Lembaga">Lembaga</option>
            </select>
            <p class="text-xs text-gray-500 mt-1">Pilih PAC untuk pengurus inti/bidang, atau Lembaga untuk IAF, FORDAF, dll.</p>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">Nama Bidang / Nama Lembaga</label>
            <input type="text" name="bidang" class="w-full border border-gray-300 rounded-lg p-2.5 focus:border-[#00923F] focus:ring-[#00923F]" placeholder="Contoh: Bidang Pendidikan / Koperasi">
            <p class="text-xs text-orange-500 mt-1">*Kosongkan jika jabatan adalah Pengurus Inti (Ketua, Sekretaris, Bendahara).</p>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">Jabatan</label>
            <input type="text" name="jabatan" class="w-full border border-gray-300 rounded-lg p-2.5 focus:border-[#00923F] focus:ring-[#00923F]" placeholder="Contoh: Ketua, Koordinator, Anggota" required>
        </div>

        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
            <input type="text" name="nama" class="w-full border border-gray-300 rounded-lg p-2.5 focus:border-[#00923F] focus:ring-[#00923F]" placeholder="Masukkan nama pengurus" required>
        </div>

        <button type="submit" class="bg-[#00923F] text-white px-6 py-2.5 rounded-lg hover:bg-green-800 font-medium">
            Simpan Data
        </button>
    </form>
</div>
@endsection