@extends('layouts.admin')
@section('title', 'Tambah Berita Baru')

@section('content')
<div class="mb-6 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
    <h2 class="text-2xl font-bold text-gray-800">Form Publikasi Berita</h2>
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

<form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 items-start">
        
        <!-- KOLOM KIRI (AREA MENULIS UTAMA) -->
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white p-6 md:p-8 rounded-2xl shadow-sm border border-gray-100">
                <label class="block text-sm font-extrabold text-gray-700 mb-2">Judul Berita *</label>
                <input type="text" name="title" value="{{ old('title') }}" class="w-full border border-gray-300 rounded-xl p-4 focus:ring-2 focus:ring-green-200 focus:border-[#00923F] outline-none transition text-lg" placeholder="Masukkan judul berita yang menarik..." required>
                
                <label class="block text-sm font-extrabold text-gray-700 mb-2 mt-8">Isi Konten Berita *</label>
                <textarea name="content" rows="18" class="w-full border border-gray-300 rounded-xl p-4 focus:ring-2 focus:ring-green-200 focus:border-[#00923F] outline-none transition text-gray-700 leading-relaxed text-base" placeholder="Ketik isi berita selengkapnya di sini..." required>{{ old('content') }}</textarea>
            </div>
        </div>

       <!-- KOLOM KANAN (AREA PENGATURAN & MEDIA) -->
        <div class="lg:col-span-1 space-y-6 sticky top-6">
            
            <!-- SATU KONTAINER UNTUK SEMUA -->
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex flex-col h-full">
                <h3 class="font-extrabold text-gray-800 mb-4 border-b border-gray-100 pb-3 flex items-center gap-2">
                    <svg class="w-5 h-5 text-[#00923F]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    Pengaturan & Media
                </h3>
                
                <!-- 1. Kategori & Status -->
                <div class="mb-4">
                    <label class="block text-sm font-bold text-gray-700 mb-1">Kategori / Jenis *</label>
                    <select name="jenis" class="w-full border border-gray-300 bg-gray-50 rounded-xl p-2.5 focus:ring-2 focus:ring-green-200 outline-none text-sm">
                        <option value="biasa" {{ request('jenis') == 'biasa' || old('jenis') == 'biasa' ? 'selected' : '' }}>Berita Utama (PAC)</option>
                        <option value="lembaga" {{ request('jenis') == 'lembaga' || old('jenis') == 'lembaga' ? 'selected' : '' }}>Berita Khusus Lembaga</option>
                    </select>
                </div>
                <div class="mb-6">
                    <label class="block text-sm font-bold text-gray-700 mb-1">Status Publikasi *</label>
                    <select name="status" class="w-full border border-gray-300 bg-gray-50 rounded-xl p-2.5 focus:ring-2 focus:ring-green-200 outline-none text-sm">
                        <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Langsung Terbit (Published)</option>
                        <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Simpan Sebagai Draft</option>
                    </select>
                </div>

                <!-- 2. Form Upload Gambar -->
                <label class="block text-xs font-bold text-gray-400 mb-2 border-t border-gray-100 pt-4">UPLOAD FOTO SAMPUL *</label>
                <div class="mb-4 border-2 border-dashed border-gray-300 rounded-xl p-3 bg-gray-50 text-center relative hover:bg-green-50 hover:border-[#00923F] transition cursor-pointer">
                    <input type="file" name="image" required class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" accept="image/*" onchange="document.getElementById('file-name-create').innerText = this.files[0] ? this.files[0].name : 'Pilih File Sampul'">
                    <span id="file-name-create" class="text-sm font-bold text-[#00923F] flex items-center justify-center gap-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
                        Pilih File Sampul
                    </span>
                </div>

                <div class="mb-6">
                    <label class="block text-xs font-bold text-gray-400 mb-2 mt-4 pt-4 border-t border-gray-100">FOTO TAMBAHAN (BISA BANYAK)</label>
                    
                    <!-- Input disembunyikan, diganti tombol custom -->
                    <input type="file" id="images-input" name="images[]" multiple accept="image/*" class="hidden" onchange="previewImages()">
                    
                    <label for="images-input" class="w-full flex items-center justify-center gap-2 border-2 border-dashed border-gray-300 rounded-xl p-4 bg-gray-50 hover:bg-green-50 hover:border-[#00923F] transition cursor-pointer text-sm font-bold text-gray-500 hover:text-[#00923F]">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                        Pilih Beberapa Foto
                    </label>
                    <p class="text-[10px] text-gray-400 mt-1.5">*Maksimal 2MB per foto.</p>
                    
                    <!-- Area tempat foto preview akan muncul otomatis -->
                    <div id="preview-container" class="grid grid-cols-2 gap-2 mt-4 empty:hidden"></div>
                </div>

                <!-- 3. Tombol Simpan (Mentok Bawah) -->
                <div class="mt-auto pt-4 border-t border-gray-100">
                    <button type="submit" class="w-full py-3.5 bg-[#00923F] text-white font-extrabold rounded-xl hover:bg-green-800 shadow-md transition transform hover:-translate-y-0.5 flex justify-center items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path></svg>
                        Simpan Berita
                    </button>
                </div>
            </div>

        </div>
</form>
@push('scripts')
<script>
    // Menyimpan daftar file secara virtual
    const dataTransfer = new DataTransfer();

    function previewImages() {
        const input = document.getElementById('images-input');
        
        // Memasukkan file yang baru dipilih ke dalam sistem virtual kita
        for (let i = 0; i < input.files.length; i++) {
            dataTransfer.items.add(input.files[i]);
        }
        
        // Sinkronkan kembali ke input aslinya
        input.files = dataTransfer.files;
        renderPreviews();
    }

    function hapusPreview(index) {
        const input = document.getElementById('images-input');
        
        // Hapus file dari sistem virtual
        dataTransfer.items.remove(index);
        
        // Sinkronkan kembali ke input aslinya
        input.files = dataTransfer.files;
        renderPreviews();
    }

    function renderPreviews() {
        const container = document.getElementById('preview-container');
        container.innerHTML = ''; // Bersihkan preview lama
        
        // Buat kotak preview baru sesuai jumlah file
        Array.from(dataTransfer.files).forEach((file, index) => {
            let reader = new FileReader();
            reader.onload = function(e) {
                const div = document.createElement('div');
                div.className = 'relative rounded-lg overflow-hidden border border-gray-200 group aspect-video bg-gray-100 shadow-sm';
                div.innerHTML = `
                    <img src="${e.target.result}" class="w-full h-full object-cover">
                    <!-- Tombol Hapus (Overlay) -->
                    <button type="button" onclick="hapusPreview(${index})" class="absolute inset-0 bg-black/70 opacity-0 group-hover:opacity-100 transition-all duration-300 flex items-center justify-center text-white hover:text-red-400 backdrop-blur-sm cursor-pointer">
                        <span class="text-xs font-bold bg-red-500 text-white px-2 py-1 rounded shadow">Batal</span>
                    </button>
                `;
                container.appendChild(div);
            }
            reader.readAsDataURL(file);
        });
    }
</script>
@endpush
@endsection