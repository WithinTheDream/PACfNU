@extends('layouts.front')
@section('title', 'Beranda')

@section('content')
    <section class="bg-[#EFFFF5] pt-20 pb-36 relative">
        <div class="max-w-5xl mx-auto px-4 text-center relative z-10">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-[#00923F] tracking-tight mb-8 leading-[1.1]">
                Perempuan Muda Berdaya, <br> Membangun Peradaban Dunia
            </h1>
            <p class="text-lg md:text-xl text-gray-600 max-w-3xl mx-auto mb-10 leading-relaxed">
                Fatayat NU Tahunan hadir sebagai wadah pemberdayaan perempuan muda Muslimah. Bersama, kita ciptakan perubahan positif melalui pendidikan, sosial, dan dakwah.
            </p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="{{ url('/profil/visi-misi') }}" class="bg-[#00923F] hover:bg-green-800 text-white px-8 py-3.5 rounded-lg font-bold transition shadow-md">Tentang Kami</a>
                <a href="{{ url('/kontak') }}" class="bg-transparent border-2 border-[#00923F] text-[#00923F] hover:bg-white hover:shadow-sm px-8 py-3.5 rounded-lg font-bold transition">Gabung Bersama Kami</a>
            </div>
        </div>
        
        <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-none">
            <svg class="relative block w-full h-[50px]" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V120H0V95.8C59.71,118.08,130.83,119.2,201,103.9Z" fill="#ffffff"></path>
            </svg>
        </div>
    </section>

    <section class="py-20 bg-gray-50 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-14 max-w-2xl mx-auto">
                <h2 class="text-3xl font-extrabold text-gray-900 mb-4">Kabar Terkini</h2>
                <div class="w-20 h-1.5 bg-yellow-500 mx-auto rounded-full mb-6"></div>
                <p class="text-gray-600 text-lg">Pantau terus informasi terbaru, liputan kegiatan, dan berbagai artikel menarik seputar pergerakan Fatayat NU di Kecamatan Tahunan.</p>
            </div>

            <style>
                /* Memaksa pembungkus (wrapper) merentangkan semua slide sama tinggi */
                .swiper-wrapper { align-items: stretch !important; }
                /* Slide menyesuaikan tinggi wrapper */
                .swiper-slide { height: auto !important; display: flex !important; }
                /* Titik-titik dipindah ke bawah secara natural (tidak numpang di atas slide) */
                .swiper-pagination { position: relative !important; margin-top: 30px !important; bottom: 0 !important; }
                /* Warna titik hijau Fatayat */
                .swiper-pagination-bullet-active { background-color: #00923F !important; }
            </style>

            <div class="swiper mySwiper mb-8">
                <div class="swiper-wrapper">
                    @forelse ($articles as $article)
                        <div class="swiper-slide">
                            <div class="w-full h-full bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-lg transition duration-300 flex flex-col group overflow-hidden">
                                <div class="relative h-72 bg-gray-50 flex items-center justify-center overflow-hidden border-b border-gray-100 p-2">
                                    @if($article->image)
                                        <img src="{{ asset('storage/' . $article->image) }}" class="w-full h-full object-contain group-hover:scale-105 transition duration-500 rounded-t-xl">
                                    @else
                                        <div class="text-green-400 font-bold">Fatayat NU</div>
                                    @endif
                                    <div class="absolute top-4 left-4 bg-[#00923F] text-white text-[11px] font-bold px-3 py-1.5 rounded-md shadow-sm">{{ $article->created_at->format('d M Y') }}</div>
                                </div>
                                
                                <div class="p-6 flex flex-col flex-grow">
                                    <h3 class="font-bold text-xl text-gray-800 mb-3 line-clamp-2 leading-snug group-hover:text-[#00923F] transition">{{ $article->title }}</h3>
                                    <div class="text-gray-600 text-sm line-clamp-3 mb-6 flex-grow leading-relaxed">{!! \Illuminate\Support\Str::limit(strip_tags($article->content), 100) !!}</div>
                                    
                                    <a href="{{ url('/berita/' . $article->slug) }}" class="block bg-green-50 text-[#00923F] text-center text-sm font-bold py-3 rounded-lg hover:bg-[#00923F] hover:text-white transition w-full mt-auto">
                                        Baca Selengkapnya
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="swiper-slide text-center text-gray-500 py-10 bg-white rounded-2xl border border-dashed border-gray-300 w-full">Belum ada berita yang dipublikasikan.</div>
                    @endforelse
                </div>
                <div class="swiper-pagination"></div>
            </div>
            
            <div class="text-center mt-8">
                <a href="{{ url('/berita') }}" class="inline-flex items-center text-[#00923F] font-bold bg-white border border-[#00923F] px-8 py-3.5 rounded-lg hover:bg-[#00923F] hover:text-white transition shadow-sm">
                    Lihat Semua Berita 
                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </a>
            </div>
        </div>
    </section>

    <section class="py-20 bg-white border-t border-gray-100">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-14">
                <h2 class="text-3xl font-extrabold text-gray-900 mb-4">Agenda Mendatang</h2>
                <div class="w-20 h-1.5 bg-[#00923F] mx-auto rounded-full mb-6"></div>
                <p class="text-gray-600 text-lg">Jangan lewatkan jadwal kegiatan rutin dan acara khusus dari PAC maupun Ranting.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @forelse ($events as $event)
                    <div class="bg-gray-50 rounded-2xl p-6 border border-gray-100 flex gap-5 hover:border-green-300 transition duration-300 group">
                        <div class="bg-white p-3 rounded-xl text-center shadow-sm border border-gray-100 h-min min-w-[70px] group-hover:bg-[#00923F] transition duration-300">
                            <span class="block text-xs text-gray-500 font-bold uppercase group-hover:text-green-100">{{ \Carbon\Carbon::parse($event->event_date)->format('M') }}</span>
                            <span class="block text-2xl font-extrabold text-[#00923F] group-hover:text-white">{{ \Carbon\Carbon::parse($event->event_date)->format('d') }}</span>
                        </div>
                        <div>
                            <h3 class="font-bold text-lg text-gray-800 mb-1 group-hover:text-[#00923F] transition">{{ $event->name }}</h3>
                            <p class="text-sm text-gray-500 mb-3 flex items-center gap-1">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg>
                                {{ $event->location }}
                            </p>
                            <span class="text-xs font-bold bg-yellow-100 text-yellow-800 px-2.5 py-1 rounded-md">{{ \Carbon\Carbon::parse($event->event_date)->format('H:i') }} WIB</span>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center text-gray-500 py-10 border border-dashed rounded-2xl bg-gray-50">Belum ada agenda kegiatan dalam waktu dekat.</div>
                @endforelse
            </div>
        </div>
    </section>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 1, spaceBetween: 24, loop: false,
            autoplay: { delay: 4000, disableOnInteraction: false },
            pagination: { el: ".swiper-pagination", clickable: true, dynamicBullets: true },
            breakpoints: { 640: { slidesPerView: 2 }, 1024: { slidesPerView: 3 } },
        });
    </script>
@endsection