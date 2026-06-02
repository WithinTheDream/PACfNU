@extends('layouts.admin')
@section('title', 'Edit Data Pengurus')

@section('content')
<div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 max-w-3xl">
    <div class="mb-6 border-b border-gray-100 pb-4 flex justify-between items-center">
        <h2 class="text-xl font-bold text-gray-800">Form Edit Pengurus</h2>
        <a href="{{ route('pengurus.index') }}" class="text-gray-500 hover:text-gray-800 text-sm">Kembali</a>
    </div>

    <form action="{{ route('pengurus.update', $penguru->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
            <select name="kategori" class="w-full border border-gray-300 rounded-lg p-2.5 focus:border-[#00923F] focus:ring-[#00923F]" required>
                <option value="PAC" {{ $penguru->kategori == 'PAC' ? 'selected' : '' }}>PAC (Pimpinan Anak Cabang)</option>
                <option value="Lembaga" {{ $penguru->kategori == 'Lembaga' ? 'selected' : '' }}>Lembaga</option>
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">Nama Bidang / Nama Lembaga</label>
            <input type="text" name="bidang" value="{{ $penguru->bidang }}" class="w-full border border-gray-300 rounded-lg p-2.5 focus:border-[#00923F] focus:ring-[#00923F]">
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">Jabatan</label>
            <input type="text" name="jabatan" value="{{ $penguru->jabatan }}" class="w-full border border-gray-300 rounded-lg p-2.5 focus:border-[#00923F] focus:ring-[#00923F]" required>
        </div>

        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
            <input type="text" name="nama" value="{{ $penguru->nama }}" class="w-full border border-gray-300 rounded-lg p-2.5 focus:border-[#00923F] focus:ring-[#00923F]" required>
        </div>

        <button type="submit" class="bg-[#00923F] text-white px-6 py-2.5 rounded-lg hover:bg-green-800 font-medium">
            Update Data
        </button>
    </form>
</div>
@endsection