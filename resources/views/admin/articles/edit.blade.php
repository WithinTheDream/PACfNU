@extends('layouts.admin')
@section('title', 'Edit Berita')

@section('content')
<div class="mb-6 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
    <h2 class="text-2xl font-bold text-gray-800">Form Edit Berita</h2>
    <a href="{{ route('articles.index') }}" class="text-gray-500 hover:text-[#00923F] font-bold transition flex items-center gap-1 bg-white px-4 py-2 rounded-lg shadow-sm border border-gray-100">
        &larr; Kembali ke Daftar
    </a>
</div>

@if ($errors->any())
    <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-6 rounded-r-lg shadow-sm">
        <h3 class="text-sm font-bold text-red-800 mb-2">Gagal menyimpan! Periksa kembali isian form:</h3>
        <ul class="text-sm text-red-600 list-disc list-inside space-y-1 font-medium">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('articles.update', $article->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 items-start">
        
        <!-- KOLOM KIRI -->
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white p-6 md:p-8 rounded-2xl shadow-sm border border-gray-100">
                <label class="block text-sm font-extrabold text-gray-700 mb-2">Judul Berita *</label>
                <input type="text" name="title" value="{{ old('title', $article->title) }}" class="w-full border border-gray-300 rounded-xl p-4 focus:ring-2 focus:ring-green-200 focus:border-[#00923F] outline-none transition text-lg" required>
                
                <label class="block text-sm font-extrabold text-gray-700 mb-2 mt-8">Isi Konten Berita *</label>
                <textarea name="content" rows="18" class="w-full border border-gray-300 rounded-xl p-4 focus:ring-2 focus:ring-green-200 focus:border-[#00923F] outline-none transition text-gray-700 leading-relaxed text-base" required>{{ old('content', $article->content) }}</textarea>
            </div>
        </div>

        <!-- KOLOM KANAN (AREA PENGATURAN & MEDIA) -->
        <div class="lg:col-span-1 space-y-6 sticky top-6">
            
            <!-- SATU KONTAINER UNTUK SEMUA -->
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex flex-col h-full">
                <h3 class="font-extrabold text-gray-800 mb-4 border-b border-gray-100 pb-3">
                    Pengaturan & Media
                </h3>
                
                <!-- 1. Kategori & Status -->
                <div class="mb-4">
                    <label class="block text-sm font-bold text-gray-700 mb-1">Kategori / Jenis *</label>
                    <select name="jenis" class="w-full border border-gray-300 bg-gray-50 rounded-xl p-2.5 focus:ring-2 focus:ring-green-200 outline-none text-sm">
                        <option value="biasa" {{ (old('jenis') ?? $article->jenis) == 'biasa' ? 'selected' : '' }}>Berita Utama (PAC)</option>
                        <option value="lembaga" {{ (old('jenis') ?? $article->jenis) == 'lembaga' ? 'selected' : '' }}>Berita Khusus Lembaga</option>
                    </select>
                </div>
                <div class="mb-6">
                    <label class="block text-sm font-bold text-gray-700 mb-1">Status Publikasi *</label>
                    <select name="status" class="w-full border border-gray-300 bg-gray-50 rounded-xl p-2.5 focus:ring-2 focus:ring-green-200 outline-none text-sm">
                        <option value="published" {{ (old('status') ?? $article->status) == 'published' ? 'selected' : '' }}>Langsung Terbit (Published)</option>
                        <option value="draft" {{ (old('status') ?? $article->status) == 'draft' ? 'selected' : '' }}>Simpan Sebagai Draft</option>
                    </select>
                </div>

                <!-- 2. Preview Foto (Tinggi Dibatasi) -->
                @if($article->image)
                    <div class="mb-4 border-t border-gray-100 pt-4">
                        <span class="block text-xs font-bold text-gray-400 mb-2">FOTO UTAMA SAAT INI</span>
                        <div class="w-full h-40 rounded-lg overflow-hidden bg-gray-100 border border-gray-200 flex justify-center items-center">
                            <img src="{{ asset('storage/' . $article->image) }}" class="max-w-full max-h-full object-cover">
                        </div>
                    </div>
                @endif

                <!-- TAMPILAN FOTO TAMBAHAN (HAPUS INSTAN) -->
                @if(!empty($article->images) && count($article->images) > 0)
                    <div class="mb-4 border-t border-gray-100 pt-4" id="container-foto-tambahan">
                        <span class="block text-xs font-bold text-gray-400 mb-3">FOTO TAMBAHAN SAAT INI</span>
                        <div class="grid grid-cols-2 gap-3">
                            @foreach($article->images as $index => $img)
                                <div class="relative rounded-lg overflow-hidden border border-gray-200 group aspect-video bg-gray-100 shadow-sm" id="foto-tambahan-{{ $index }}">
                                    <img src="{{ asset('storage/' . $img) }}" class="w-full h-full object-cover">
                                    
                                    <!-- Tombol Hapus (Muncul keren saat dihover) -->
                                    <button type="button" onclick="hapusFotoSeketika('{{ $img }}', 'foto-tambahan-{{ $index }}')" class="absolute inset-0 bg-black/70 opacity-0 group-hover:opacity-100 transition-all duration-300 flex items-center justify-center text-white hover:text-red-400 backdrop-blur-sm cursor-pointer">
                                        <div class="flex flex-col items-center transform translate-y-4 group-hover:translate-y-0 transition-all duration-300">
                                            <svg class="w-8 h-8 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                            <span class="text-sm font-bold">Hapus</span>
                                        </div>
                                    </button>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- 3. Form Upload Gambar -->
                <label class="block text-xs font-bold text-gray-400 mb-2 mt-2">GANTI / TAMBAH FOTO</label>
                <div class="mb-3 border-2 border-dashed border-gray-300 rounded-xl p-3 bg-gray-50 text-center relative hover:bg-orange-50 hover:border-orange-500 transition cursor-pointer">
                    <input type="file" name="image" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" accept="image/*" onchange="document.getElementById('file-name-edit').innerText = this.files[0] ? this.files[0].name : 'Pilih File Baru'">
                    <span id="file-name-edit" class="text-sm font-bold text-orange-600 flex items-center justify-center gap-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
                        Upload Sampul Baru
                    </span>
                </div>
                <div class="mb-6">
                    <label class="block text-xs font-bold text-gray-400 mb-1">UPLOAD FOTO TAMBAHAN (MULTIPLE)</label>
                    <input type="file" name="images[]" multiple accept="image/*" class="w-full border rounded-xl p-2 text-sm bg-white">
                </div>

                <!-- 4. Tombol Update (Selalu di Bawah) -->
                <div class="mt-auto pt-4 border-t border-gray-100">
                    <button type="submit" class="w-full py-3.5 bg-orange-500 text-white font-extrabold rounded-xl hover:bg-orange-600 shadow-md transition transform hover:-translate-y-0.5 flex justify-center items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                        Update Berita
                    </button>
                </div>
            </div>

        </div>
    </div>
</form>
@push('scripts')
<script>
function hapusFotoSeketika(imagePath, elementId) {
    if(confirm('Yakin ingin menghapus foto ini? (Tidak bisa dikembalikan)')) {
        let el = document.getElementById(elementId);
        el.style.opacity = '0.5'; // Efek loading

        fetch(`{{ url('admin/articles') }}/{{ $article->id }}/delete-image`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
            body: JSON.stringify({ image: imagePath })
        })
        .then(response => response.json())
        .then(data => {
            if(data.success) {
                // Animasi menghilang yang mulus
                el.style.transition = 'all 0.4s ease';
                el.style.transform = 'scale(0)';
                setTimeout(() => el.remove(), 400);
            } else {
                alert('Gagal menghapus foto.');
                el.style.opacity = '1';
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Terjadi kesalahan pada sistem.');
            el.style.opacity = '1';
        });
    }
}
</script>
@endpush
@endsection