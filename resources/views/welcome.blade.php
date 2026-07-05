@extends('layouts.front')
@section('title', 'Beranda')

@section('content')
    <!-- Hero Section: Tema Bold Green -->
    <section class="bg-[#00923F] pt-28 pb-36 relative overflow-hidden">
        <!-- Efek Glow/Cahaya Estetik di Background -->
        <div class="absolute top-[-10%] right-[-5%] w-96 h-96 bg-white opacity-10 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute bottom-[10%] left-[-10%] w-80 h-80 bg-yellow-400 opacity-20 rounded-full blur-3xl pointer-events-none"></div>
        
        <div class="max-w-5xl mx-auto px-4 text-center relative z-10">
            
            <!-- Badge / Label Atas -->
            <div class="inline-flex items-center gap-2 px-5 py-2 rounded-full bg-white/10 text-white border border-white/20 backdrop-blur-sm text-sm font-bold mb-8 shadow-sm">
                ✨ Selamat Datang di Portal Resmi
            </div>
            
            <!-- Judul Utama -->
            <h1 class="text-4xl md:text-5xl lg:text-7xl font-extrabold text-white tracking-tight mb-6 leading-[1.1]">
                Perempuan Muda <span class="text-yellow-400">Berdaya</span>, <br> Membangun Peradaban
            </h1>
            
            <!-- Deskripsi -->
            <p class="text-lg md:text-xl text-green-50 max-w-3xl mx-auto mb-10 leading-relaxed font-medium">
                Fatayat NU Tahunan hadir sebagai wadah pemberdayaan perempuan muda Muslimah. Bersama, kita ciptakan perubahan positif melalui pendidikan, sosial, dan dakwah.
            </p>
            
            <!-- Tombol Aksi -->
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="{{ url('/profil/visi-misi') }}" class="bg-yellow-400 hover:bg-yellow-500 text-green-950 px-8 py-3.5 rounded-xl font-bold transition-all shadow-lg hover:shadow-xl hover:-translate-y-1">
                    Tentang Kami
                </a>
                <a href="{{ url('/kontak') }}" class="bg-transparent border-2 border-green-400/50 hover:border-white text-white hover:bg-white/10 px-8 py-3.5 rounded-xl font-bold transition-all">
                    Gabung Bersama Kami
                </a>
            </div>
        </div>
        
        <!-- Gelombang Bawah Transisi ke Putih (FIX GARIS PUTIH: Tambah translate-y-[2px]) -->
        <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-none z-10 translate-y-[2px]">
            <svg class="relative block w-full h-[60px] md:h-[100px]" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V120H0V95.8C59.71,118.08,130.83,119.2,201,103.9Z" fill="#ffffff"></path>
            </svg>
        </div>
    </section>

    <!-- Section Berita Terkini -->
    <section class="py-20 bg-white relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-14 max-w-2xl mx-auto">
                <h2 class="text-3xl font-extrabold text-gray-900 mb-4">Kabar Terkini</h2>
                <div class="w-20 h-1.5 bg-yellow-400 mx-auto rounded-full mb-6"></div>
                <p class="text-gray-600 text-lg">Pantau terus informasi terbaru, liputan kegiatan, dan berbagai artikel menarik seputar pergerakan Fatayat NU di Kecamatan Tahunan.</p>
            </div>

            <style>
                .swiper-wrapper { align-items: stretch !important; }
                .swiper-slide { height: auto !important; display: flex !important; }
                .swiper-pagination { position: relative !important; margin-top: 30px !important; bottom: 0 !important; }
                .swiper-pagination-bullet-active { background-color: #00923F !important; }
            </style>

            <div class="swiper mySwiper mb-8">
                <div class="swiper-wrapper">
                    @forelse ($articles as $article)
                        <div class="swiper-slide">
                            <div class="w-full h-full bg-white rounded-3xl border border-gray-100 shadow-sm hover:shadow-xl hover:border-green-200 transition duration-300 flex flex-col group overflow-hidden">
                                <div class="relative h-64 bg-gray-50 flex items-center justify-center overflow-hidden border-b border-gray-100">
                                    @if($article->image)
                                        <img src="{{ asset('storage/' . $article->image) }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                                    @else
                                        <div class="text-green-300 font-bold text-2xl">Fatayat NU</div>
                                    @endif
                                    <!-- FIX BAHASA: Tanggal Berita -->
                                    <div class="absolute top-4 left-4 bg-white text-[#00923F] text-[11px] font-bold px-3 py-1.5 rounded-full shadow-sm">
                                        {{ \Carbon\Carbon::parse($article->created_at)->locale('id')->translatedFormat('d M Y') }}
                                    </div>
                                </div>
                                
                                <div class="p-6 md:p-8 flex flex-col flex-grow">
                                    <h3 class="font-bold text-xl text-gray-800 mb-3 line-clamp-2 leading-snug group-hover:text-[#00923F] transition">{{ $article->title }}</h3>
                                    <div class="text-gray-600 text-sm line-clamp-3 mb-6 flex-grow leading-relaxed">{!! \Illuminate\Support\Str::limit(strip_tags($article->content), 100) !!}</div>
                                    
                                    <a href="{{ url('/berita/' . $article->slug) }}" class="block bg-gray-50 text-[#00923F] text-center text-sm font-bold py-3.5 rounded-xl border border-gray-100 hover:bg-[#00923F] hover:text-white transition w-full mt-auto">
                                        Baca Selengkapnya
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="swiper-slide text-center text-gray-500 py-10 bg-white rounded-3xl border border-dashed border-gray-300 w-full">Belum ada berita yang dipublikasikan.</div>
                    @endforelse
                </div>
                <div class="swiper-pagination"></div>
            </div>
            
            <div class="text-center mt-8">
                <a href="{{ url('/berita') }}" class="inline-flex items-center text-[#00923F] font-bold bg-green-50 px-8 py-3.5 rounded-xl hover:bg-[#00923F] hover:text-white transition shadow-sm">
                    Lihat Semua Berita 
                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </a>
            </div>
        </div>
    </section>

    <!-- Section Agenda -->
    <section class="py-24 bg-gray-50 border-t border-gray-100">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-extrabold text-gray-900 mb-4">Agenda Mendatang</h2>
                <div class="w-20 h-1.5 bg-[#00923F] mx-auto rounded-full mb-6"></div>
                <p class="text-gray-600 text-lg">Jangan lewatkan jadwal kegiatan rutin dan acara khusus dari PAC maupun Ranting.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @forelse ($events as $event)
                    <div class="bg-white rounded-3xl p-6 border border-gray-100 flex gap-5 hover:border-green-300 hover:shadow-xl transition-all duration-300 group hover:-translate-y-1">
                        <div class="bg-green-50 p-4 rounded-2xl text-center shadow-sm border border-green-100 h-min min-w-[75px] group-hover:bg-[#00923F] transition-colors duration-300">
                            <!-- FIX BAHASA: Bulan Agenda (Biar jadi Apr, Mei, Agu, dsb) -->
                            <span class="block text-xs text-green-700 font-bold uppercase group-hover:text-green-100">
                                {{ \Carbon\Carbon::parse($event->event_date)->locale('id')->translatedFormat('M') }}
                            </span>
                            <span class="block text-2xl font-extrabold text-[#00923F] group-hover:text-white">
                                {{ \Carbon\Carbon::parse($event->event_date)->format('d') }}
                            </span>
                        </div>
                        <div>
                            <h3 class="font-bold text-lg text-gray-800 mb-2 group-hover:text-[#00923F] transition leading-tight">{{ $event->name }}</h3>
                            <p class="text-sm text-gray-500 mb-4 flex items-center gap-1.5">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg>
                                {{ $event->location }}
                            </p>
                            <!-- WIB otomatis karena dari sistem/hardcoded, tapi pastikan jam-nya aman -->
                            <span class="text-xs font-bold bg-yellow-100 text-yellow-800 px-3 py-1.5 rounded-lg">{{ \Carbon\Carbon::parse($event->event_date)->format('H:i') }} WIB</span>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center text-gray-500 py-12 border border-dashed rounded-3xl bg-gray-50">Belum ada agenda kegiatan dalam waktu dekat.</div>
                @endforelse
            </div>
        </div>
    </section>

        <!-- Cuplikan Galeri -->
    <section class="py-16 bg-white" data-aos="fade-up">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-10">
                <h2 class="text-3xl font-extrabold text-gray-900">Galeri <span class="text-[#00923F]">Terbaru</span></h2>
                <p class="text-gray-500 mt-2">Momen pergerakan dan kegiatan kami.</p>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                @foreach($albums as $album)
                    @if($album->galleries->first())
                        <a href="{{ url('/galeri') }}" class="group relative aspect-square rounded-2xl overflow-hidden shadow-sm block">
                            <img src="{{ asset('storage/'.$album->galleries->first()->image_path) }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent flex flex-col justify-end p-4">
                                <span class="text-white font-bold text-sm truncate">{{ $album->nama_album }}</span>
                            </div>
                        </a>
                    @endif
                @endforeach
            </div>
            
            <div class="text-center mt-8">
                <a href="{{ url('/galeri') }}" class="inline-block border-2 border-[#00923F] text-[#00923F] font-bold px-6 py-2.5 rounded-full hover:bg-[#00923F] hover:text-white transition">Lihat Semua Galeri</a>
            </div>
        </div>
    </section>

    <!-- Tautan Cepat (Quick Links) -->
    <section class="py-16 bg-green-900 text-white relative overflow-hidden" data-aos="fade-up">
        <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 24px 24px;"></div>
        <div class="max-w-7xl mx-auto px-4 relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 text-center">
                <a href="{{ url('/profil/sejarah') }}" class="p-6 bg-white/10 rounded-2xl hover:bg-[#00923F] transition border border-white/20 backdrop-blur-sm group">
                    <div class="w-12 h-12 bg-white text-green-900 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                    </div>
                    <h3 class="font-bold text-lg">Sejarah Kami</h3>
                </a>
                <a href="{{ url('/profil/struktur') }}" class="p-6 bg-white/10 rounded-2xl hover:bg-[#00923F] transition border border-white/20 backdrop-blur-sm group">
                    <div class="w-12 h-12 bg-white text-green-900 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    </div>
                    <h3 class="font-bold text-lg">Struktur Organisasi</h3>
                </a>
                <a href="{{ url('/berita') }}" class="p-6 bg-white/10 rounded-2xl hover:bg-[#00923F] transition border border-white/20 backdrop-blur-sm group">
                    <div class="w-12 h-12 bg-white text-green-900 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                    </div>
                    <h3 class="font-bold text-lg">Portal Berita</h3>
                </a>
                <a href="{{ url('/kontak') }}" class="p-6 bg-white/10 rounded-2xl hover:bg-[#00923F] transition border border-white/20 backdrop-blur-sm group">
                    <div class="w-12 h-12 bg-white text-green-900 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    </div>
                    <h3 class="font-bold text-lg">Hubungi Kami</h3>
                </a>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            if(typeof Swiper !== 'undefined') {
                var swiper = new Swiper(".mySwiper", {
                    slidesPerView: 1, spaceBetween: 24, loop: false,
                    autoplay: { delay: 4000, disableOnInteraction: false },
                    pagination: { el: ".swiper-pagination", clickable: true, dynamicBullets: true },
                    breakpoints: { 640: { slidesPerView: 2 }, 1024: { slidesPerView: 3 } },
                });
            }
        });
    </script>
@endsection