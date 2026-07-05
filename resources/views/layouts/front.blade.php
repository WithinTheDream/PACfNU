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
                    <div class="w-10 h-10 bg-[#00923F] rounded-lg shadow-sm flex items-center justify-center text-white font-bold text-xl">F</div>
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
                        <li><a href="{{ url('/galeri') }}" class="hover:text-[#00923F] transition">Galeri</a></li>
                    </ul>
                </div>
                <div class="col-span-1 lg:col-span-2">
                    <h4 class="font-bold text-lg mb-6 text-white">Kontak</h4>
                    <div class="space-y-3 text-sm text-gray-400">
                        <p>Gedung MWCNU Tahunan, Jepara, Jawa Tengah, Indonesia.</p>
                        <p class="pt-2">Email: admin@fatayatnutahunan.my.id<br>Telepon: (0291) 123-4567</p>
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