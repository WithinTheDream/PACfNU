<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - PAC Fatayat NU Tahunan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Animasi AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- Library CSS untuk Galeri (Fancybox) dan Slider Berita (Swiper) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    
    <style> 
        body { font-family: 'Plus Jakarta Sans', sans-serif; } 
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #f1f1f1; }
        ::-webkit-scrollbar-thumb { background: #10b981; border-radius: 4px; }
    </style>
    
    <!-- Tempat untuk memuat CSS khusus dari halaman lain -->
    @stack('styles')
</head>
<body class="bg-gray-50 text-gray-800 antialiased flex flex-col min-h-screen">

    <nav class="bg-white sticky top-0 z-50 shadow-sm border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-[80px] items-center">
                <a href="{{ url('/') }}" class="flex items-center gap-3">
                    <img src="{{ asset('images/logoPAC.jpeg') }}" alt="Logo Fatayat" class="w-10 h-10 object-contain">
                    <div class="flex flex-col justify-center">
                        <span class="font-bold text-lg text-gray-900 leading-tight">Fatayat NU</span>
                        <span class="text-[10px] text-[#00923F] font-bold tracking-wider uppercase leading-tight">PAC Tahunan Jepara</span>
                    </div>
                </a>
                
                <!-- Desktop Menu (Dengan Logika Active State) -->
                <div class="hidden md:flex items-center gap-8">
                    <a href="{{ url('/') }}" class="transition pb-1 {{ request()->is('/') ? 'text-[#00923F] font-extrabold border-b-2 border-[#00923F]' : 'text-gray-700 hover:text-[#00923F] font-medium' }}">Beranda</a>

                    <div class="relative group">
                        <button class="flex items-center gap-1 transition py-2 pb-3 {{ request()->is('profil*') ? 'text-[#00923F] font-extrabold border-b-2 border-[#00923F]' : 'text-gray-700 hover:text-[#00923F] font-medium' }}">
                            Profil <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div class="absolute left-0 mt-0 w-48 bg-white border border-gray-100 rounded-lg shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50">
                            <div class="py-2">
                                <a href="{{ url('/profil/visi-misi') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-green-50 hover:text-[#00923F]">Visi & Misi</a>
                                <a href="{{ url('/profil/sejarah') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-green-50 hover:text-[#00923F]">Sejarah</a>
                                <a href="{{ url('/profil/struktur') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-green-50 hover:text-[#00923F]">Struktur PAC</a>
                            </div>
                        </div>
                    </div>

                    <div class="relative group">
                        <button class="flex items-center gap-1 transition py-2 pb-3 {{ request()->is('lembaga*') ? 'text-[#00923F] font-extrabold border-b-2 border-[#00923F]' : 'text-gray-700 hover:text-[#00923F] font-medium' }}">
                            Lembaga <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div class="absolute left-0 mt-0 w-48 bg-white border border-gray-100 rounded-lg shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50">
                            <div class="py-2">
                                <a href="{{ url('/lembaga/struktur') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-green-50 hover:text-[#00923F]">Struktur Lembaga</a>
                                <a href="{{ url('/lembaga/berita') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-green-50 hover:text-[#00923F]">Berita Lembaga</a>
                            </div>
                        </div>
                    </div>

                    <a href="{{ url('/berita') }}" class="transition pb-1 {{ request()->is('berita*') && !request()->is('lembaga/berita') ? 'text-[#00923F] font-extrabold border-b-2 border-[#00923F]' : 'text-gray-700 hover:text-[#00923F] font-medium' }}">Berita</a>
                    <a href="{{ url('/galeri') }}" class="transition pb-1 {{ request()->is('galeri*') ? 'text-[#00923F] font-extrabold border-b-2 border-[#00923F]' : 'text-gray-700 hover:text-[#00923F] font-medium' }}">Galeri</a>
                    <a href="{{ url('/kontak') }}" class="transition pb-1 {{ request()->is('kontak') ? 'text-[#00923F] font-extrabold border-b-2 border-[#00923F]' : 'text-gray-700 hover:text-[#00923F] font-medium' }}">Kontak</a>
                </div>

                <!-- Tombol Menu Mobile (Hamburger) -->
                <div class="md:hidden flex items-center">
                    <button id="mobile-menu-btn" class="text-gray-600 hover:text-[#00923F] focus:outline-none p-2 rounded-md bg-gray-50 border border-gray-100">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path id="menu-icon" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Panel Menu Mobile (Muncul saat diklik di HP) -->
        <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-gray-100 shadow-lg absolute w-full left-0 z-50">
            <div class="px-4 pt-2 pb-6 space-y-1 overflow-y-auto max-h-[80vh]">
                
                <a href="{{ url('/') }}" class="block px-3 py-3 text-base border-b border-gray-50 transition-colors rounded-t-lg {{ request()->is('/') ? 'text-[#00923F] font-extrabold bg-green-50' : 'font-medium text-gray-700 hover:text-[#00923F] hover:bg-gray-50' }}">Beranda</a>
                
                <div class="py-2 border-b border-gray-50">
                    <p class="px-3 text-xs font-bold text-gray-400 uppercase mb-2 mt-2">Profil & Struktur</p>
                    <a href="{{ url('/profil/visi-misi') }}" class="block px-3 py-2 text-sm transition-colors rounded-md {{ request()->is('profil/visi-misi') ? 'text-[#00923F] font-bold bg-green-50/50' : 'text-gray-600 hover:text-[#00923F] hover:bg-gray-50' }}">Visi & Misi</a>
                    <a href="{{ url('/profil/sejarah') }}" class="block px-3 py-2 text-sm transition-colors rounded-md {{ request()->is('profil/sejarah') ? 'text-[#00923F] font-bold bg-green-50/50' : 'text-gray-600 hover:text-[#00923F] hover:bg-gray-50' }}">Sejarah</a>
                    <a href="{{ url('/profil/struktur') }}" class="block px-3 py-2 text-sm transition-colors rounded-md {{ request()->is('profil/struktur') ? 'text-[#00923F] font-bold bg-green-50/50' : 'text-gray-600 hover:text-[#00923F] hover:bg-gray-50' }}">Struktur PAC</a>
                </div>

                <div class="py-2 border-b border-gray-50">
                    <p class="px-3 text-xs font-bold text-gray-400 uppercase mb-2 mt-2">Lembaga</p>
                    <a href="{{ url('/lembaga/struktur') }}" class="block px-3 py-2 text-sm transition-colors rounded-md {{ request()->is('lembaga/struktur') ? 'text-[#00923F] font-bold bg-green-50/50' : 'text-gray-600 hover:text-[#00923F] hover:bg-gray-50' }}">Struktur Lembaga</a>
                    <a href="{{ url('/lembaga/berita') }}" class="block px-3 py-2 text-sm transition-colors rounded-md {{ request()->is('lembaga/berita') ? 'text-[#00923F] font-bold bg-green-50/50' : 'text-gray-600 hover:text-[#00923F] hover:bg-gray-50' }}">Berita Lembaga</a>
                </div>

                <a href="{{ url('/berita') }}" class="block px-3 py-3 text-base border-b border-gray-50 transition-colors {{ request()->is('berita*') && !request()->is('lembaga/berita') ? 'text-[#00923F] font-extrabold bg-green-50' : 'font-medium text-gray-700 hover:text-[#00923F] hover:bg-gray-50' }}">Berita</a>
                
                <a href="{{ url('/galeri') }}" class="block px-3 py-3 text-base border-b border-gray-50 transition-colors {{ request()->is('galeri*') ? 'text-[#00923F] font-extrabold bg-green-50' : 'font-medium text-gray-700 hover:text-[#00923F] hover:bg-gray-50' }}">Galeri</a>
                
                <a href="{{ url('/kontak') }}" class="block px-3 py-3 text-base transition-colors rounded-b-lg {{ request()->is('kontak') ? 'text-[#00923F] font-extrabold bg-green-50' : 'font-medium text-gray-700 hover:text-[#00923F] hover:bg-gray-50' }}">Kontak</a>
            
            </div>
        </div>
    </nav>

    <main class="flex-grow">
        @yield('content')
    </main>

    <footer class="bg-gray-900 text-white pt-16 pb-8 mt-auto border-t-4 border-[#00923F]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-12">
                <div>
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-10 h-10 bg-[#00923F] rounded-lg flex items-center justify-center text-white font-bold text-xl">F</div>
                        <span class="font-bold text-xl text-white">Fatayat NU</span>
                    </div>
                    <p class="text-gray-400 text-sm leading-relaxed mb-6">Organisasi perempuan muda NU yang berfokus pada pemberdayaan perempuan dalam berbagai bidang kehidupan.</p>
                </div>
                <div>
                    <h4 class="font-bold text-lg mb-6 text-white">Tautan Cepat</h4>
                    <ul class="space-y-3 text-sm text-gray-400">
                        <li><a href="{{ url('/') }}" class="hover:text-[#00923F] transition">Beranda</a></li>
                        <li><a href="{{ url('/profil/visi-misi') }}" class="hover:text-[#00923F] transition">Visi & Misi</a></li>
                        <li><a href="{{ url('/galeri') }}" class="hover:text-[#00923F] transition">Galeri Kegiatan</a></li>
                    </ul>
                </div>
                
                <!-- FOOTER KONTAK -->
                <div class="col-span-1 lg:col-span-2">
                    <h4 class="font-bold text-lg mb-6 text-white">Hubungi Kami</h4>
                    <div class="space-y-4 text-sm text-gray-400">
                        <p class="flex items-start gap-3">
                            <svg class="w-5 h-5 shrink-0 text-[#00923F]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            Gedung MWCNU Tahunan, Kec. Tahunan, Kab. Jepara.
                        </p>
                        <p class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-[#00923F]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                            0882-3145-13667 / 0813-3331-0051
                        </p>
                        <p class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-[#00923F]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            admin@fatayatnutahunan.my.id
                        </p>
                        
                        <!-- Sosmed Links Lengkap -->
                        <div class="flex flex-wrap items-center gap-x-4 gap-y-3 mt-2 pt-4 border-t border-gray-800">
                            
                            <!-- Instagram -->
                            <a href="https://instagram.com/pac.fatayatnutahunan" target="_blank" class="flex items-center gap-1.5 hover:text-[#00923F] transition">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm3.975-9.421a1.08 1.08 0 100-2.159 1.08 1.08 0 000 2.159z"/></svg>
                                @pac.fatayatnutahunan
                            </a>
                            <span class="text-gray-700 hidden sm:inline">|</span>
                            
                            <!-- TikTok -->
                            <a href="https://tiktok.com/@pac.fatayatnutahunan" target="_blank" class="flex items-center gap-1.5 hover:text-[#00923F] transition">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M19.59 6.69a4.83 4.83 0 01-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 01-5.2 1.74 2.89 2.89 0 012.31-4.64 2.93 2.93 0 01.88.13V9.4a6.84 6.84 0 00-1-.05A6.33 6.33 0 005 20.1a6.34 6.34 0 0010.86-4.43v-7a8.16 8.16 0 004.77 1.52v-3.4a4.85 4.85 0 01-1-.1z"/></svg>
                                @pac.fatayatnutahunan
                            </a>
                            <span class="text-gray-700 hidden sm:inline">|</span>

                            <!-- YouTube -->
                            <a href="https://youtube.com/@pac_fatayatnutahunan" target="_blank" class="flex items-center gap-1.5 hover:text-[#00923F] transition">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                                YouTube
                            </a>
                            <span class="text-gray-700 hidden sm:inline">|</span>

                            <!-- Saluran WA -->
                            <a href="https://whatsapp.com/channel/0029Vb7BVuHJ3juv4HRNqW3S" target="_blank" class="flex items-center gap-1.5 hover:text-[#00923F] transition">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.093 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                                Saluran WA
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="border-t border-gray-800 pt-8 text-center text-sm text-gray-500">
                <p>&copy; {{ date('Y') }} Fatayat NU PAC Tahunan. Hak Cipta Dilindungi.</p>
            </div>
        </div>
    </footer>

    <!-- Script Utama (Mobile Navbar & Fancybox Init) -->
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script>
        // Logika Toggle Menu Mobile
        const btn = document.getElementById('mobile-menu-btn');
        const menu = document.getElementById('mobile-menu');
        const icon = document.getElementById('menu-icon');

        btn.addEventListener('click', () => {
            menu.classList.toggle('hidden');
            if (menu.classList.contains('hidden')) {
                icon.setAttribute('d', 'M4 6h16M4 12h16M4 18h16'); // Garis Tiga (Burger)
            } else {
                icon.setAttribute('d', 'M6 18L18 6M6 6l12 12'); // Tanda Silang (Close)
            }
        });

        // Inisialisasi Galeri Lightbox
        Fancybox.bind("[data-fancybox]", {
            Images: { zoom: true },
            Toolbar: {
                display: {
                    left: ["infobar"],
                    middle: ["zoomIn", "zoomOut"],
                    right: ["download", "slideshow", "close"],
                }
            }
        });
    </script>
    
    <!-- Script Animasi AOS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            AOS.init({
                once: true,       // Animasi hanya jalan sekali saat di-scroll
                duration: 800,    // Durasi animasi (ms)
                offset: 50,       // Jarak trigger animasi dari bawah layar
            });
        });
    </script>
    
    <!-- Tempat untuk memuat Script khusus dari halaman lain -->
    @stack('scripts')
</body>
</html>