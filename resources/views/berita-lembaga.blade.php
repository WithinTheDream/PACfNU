@extends('layouts.front')
@section('title', 'Berita Lembaga')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16" data-aos="fade-up" data-aos-duration="1000">
    
    <!-- Header Berita Lembaga -->
    <div class="text-center mb-12">
        <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-green-50 text-[#00923F] text-sm font-bold mb-4 border border-green-200 shadow-sm">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2.5 2.5 0 00-2.5-2.5H14"></path></svg>
            Liputan Khusus
        </div>
        <h1 class="text-3xl md:text-5xl font-extrabold text-gray-900 tracking-tight mb-4">Berita <span class="text-[#00923F]">Lembaga</span></h1>
        <p class="text-lg text-gray-600 max-w-2xl mx-auto">Informasi dan liputan khusus dari lembaga-lembaga di bawah naungan PAC Fatayat NU Tahunan.</p>
    </div>

    <div class="flex flex-col lg:flex-row gap-8">
        
        <!-- SIDEBAR KIRI: FITUR PENCARIAN & FILTER -->
        <div class="w-full lg:w-1/4" data-aos="fade-right" data-aos-delay="100">
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 sticky top-28">
                <h3 class="font-bold text-gray-900 mb-4 flex items-center gap-2 border-b border-gray-100 pb-3">
                    <svg class="w-5 h-5 text-[#00923F]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path></svg>
                    Pencarian Berita
                </h3>
                
                <form action="{{ url('/lembaga/berita') }}" method="GET" class="space-y-5">
                    
                    <!-- Form Cari -->
                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Kata Kunci</label>
                        <div class="relative">
                            <input type="text" name="cari" value="{{ request('cari') }}" placeholder="Cari judul berita..." class="w-full border border-gray-300 rounded-xl pl-10 pr-4 py-2.5 focus:ring-2 focus:ring-green-200 focus:border-[#00923F] outline-none text-sm transition">
                            <svg class="w-5 h-5 text-gray-400 absolute left-3 top-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        </div>
                    </div>

                    <!-- Form Bulan -->
                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Bulan Publikasi</label>
                        <select name="bulan" class="w-full border border-gray-300 bg-gray-50 rounded-xl p-2.5 focus:ring-2 focus:ring-green-200 outline-none text-sm transition cursor-pointer">
                            <option value="">Semua Bulan</option>
                            @foreach(range(1, 12) as $m)
                                <option value="{{ $m }}" {{ request('bulan') == $m ? 'selected' : '' }}>
                                    {{ \Carbon\Carbon::create()->month($m)->locale('id')->translatedFormat('F') }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Form Tahun -->
                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Tahun Publikasi</label>
                        <select name="tahun" class="w-full border border-gray-300 bg-gray-50 rounded-xl p-2.5 focus:ring-2 focus:ring-green-200 outline-none text-sm transition cursor-pointer">
                            <option value="">Semua Tahun</option>
                            @php $currentYear = date('Y'); @endphp
                            @for($y = $currentYear; $y >= $currentYear - 3; $y--)
                                <option value="{{ $y }}" {{ request('tahun') == $y ? 'selected' : '' }}>{{ $y }}</option>
                            @endfor
                        </select>
                    </div>

                    <button type="submit" class="w-full bg-[#00923F] text-white font-bold py-3 rounded-xl hover:bg-green-800 transition shadow-sm hover:shadow-md flex justify-center items-center gap-2">
                        Terapkan Filter
                    </button>

                    <!-- Tombol Reset Filter -->
                    @if(request('cari') || request('bulan') || request('tahun'))
                        <a href="{{ url('/lembaga/berita') }}" class="block text-center text-sm font-bold text-red-500 hover:text-red-700 transition mt-2">
                            × Hapus Filter
                        </a>
                    @endif
                </form>
            </div>
        </div>

        <!-- KONTEN KANAN: LIST BERITA (Grid 3 Kolom) -->
        <div class="w-full lg:w-3/4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse ($articles as $article)
                    <div data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}" class="bg-white rounded-2xl border border-gray-100 overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-1 transition duration-300 flex flex-col group">
                        
                        <div class="relative h-48 bg-gray-50 flex items-center justify-center overflow-hidden border-b border-gray-100">
                            @if($article->image)
                                <img src="{{ asset('storage/' . $article->image) }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-700">
                            @else
                                <div class="text-green-300 font-bold text-xl">Fatayat NU</div>
                            @endif
                            <div class="absolute top-3 left-3 bg-white text-[#00923F] text-[10px] font-bold px-2.5 py-1 rounded-full shadow-sm">
                                {{ \Carbon\Carbon::parse($article->created_at)->locale('id')->translatedFormat('d M Y') }}
                            </div>
                            <div class="absolute top-3 right-3 bg-[#00923F] text-white text-[10px] uppercase font-extrabold px-3 py-1.5 rounded-full shadow-sm">
                                Lembaga
                            </div>
                        </div>

                        <div class="p-5 flex-grow flex flex-col">
                            <h3 class="font-bold text-lg text-gray-800 mb-2 line-clamp-2 leading-snug group-hover:text-[#00923F] transition">
                                {{ $article->title }}
                            </h3>
                            
                            <div class="text-gray-500 text-sm line-clamp-3 mb-5 flex-grow leading-relaxed">
                                {!! \Illuminate\Support\Str::limit(strip_tags($article->content), 80) !!}
                            </div>
                            
                            <a href="{{ url('/berita/' . $article->slug) }}" class="inline-flex justify-center items-center bg-green-50 border border-green-100 text-[#00923F] text-sm font-bold py-2.5 rounded-xl hover:bg-[#00923F] hover:text-white transition w-full mt-auto">
                                Baca Selengkapnya
                            </a>
                        </div>
                    </div>
                @empty
                    <!-- Jika Berita Tidak Ditemukan -->
                    <div class="col-span-full text-center py-20 bg-gray-50 rounded-2xl border border-dashed border-gray-300 flex flex-col items-center justify-center">
                        <svg class="w-16 h-16 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                        <h3 class="text-lg font-bold text-gray-900 mb-1">Berita Tidak Ditemukan</h3>
                        <p class="text-gray-500 text-sm">Coba sesuaikan kata kunci atau ubah filter bulan dan tahun.</p>
                    </div>
                @endforelse
            </div>

            <!-- Tombol Halaman (Pagination) -->
            <div class="mt-10">
                {{ $articles->links() }}
            </div>
        </div>

    </div>
</div>
@endsection