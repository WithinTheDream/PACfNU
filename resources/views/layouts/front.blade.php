<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - PAC Fatayat NU Tahunan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style> 
        body { font-family: 'Plus Jakarta Sans', sans-serif; } 
        /* Menyembunyikan scrollbar tapi tetap bisa scroll untuk estetika */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #f1f1f1; }
        ::-webkit-scrollbar-thumb { background: #10b981; border-radius: 4px; }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 antialiased flex flex-col min-h-screen">

    <nav class="bg-white sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-[84px] items-center">
                
                <a href="{{ url('/') }}" class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-green-600 flex items-center justify-center text-white font-bold text-xl">F</div>
                    <div class="flex flex-col justify-center">
                        <span class="font-bold text-lg text-green-700 leading-tight">Fatayat NU</span>
                        <span class="text-[11px] text-gray-500 font-medium leading-tight">PAC Tahunan, Jepara</span>
                    </div>
                </a>
                
                <div class="hidden md:flex items-center gap-8">
                    <a href="{{ url('/') }}" class="text-gray-700 hover:text-[#00923F] font-medium transition">Beranda</a>

                    <div class="relative group">
                        <button class="flex items-center gap-1 text-gray-700 hover:text-[#00923F] font-medium transition py-2">
                            Profil
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div class="absolute left-0 mt-2 w-48 bg-white border border-gray-100 rounded-lg shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50">
                            <div class="py-2">
                                <a href="{{ url('/profil/visi-misi') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-green-50 hover:text-[#00923F]">Visi & Misi</a>
                                <a href="{{ url('/profil/sejarah') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-green-50 hover:text-[#00923F]">Sejarah</a>
                                <a href="{{ url('/profil/struktur') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-green-50 hover:text-[#00923F]">Struktur PAC</a>
                            </div>
                        </div>
                    </div>

                    <div class="relative group">
                        <button class="flex items-center gap-1 text-gray-700 hover:text-[#00923F] font-medium transition py-2">
                            Lembaga
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div class="absolute left-0 mt-2 w-48 bg-white border border-gray-100 rounded-lg shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50">
                            <div class="py-2">
                                <a href="{{ url('/lembaga/struktur') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-green-50 hover:text-[#00923F]">Struktur Lembaga</a>
                                <a href="{{ url('/lembaga/berita') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-green-50 hover:text-[#00923F]">Berita Lembaga</a>
                            </div>
                        </div>
                    </div>

                    <a href="{{ url('/berita') }}" class="text-gray-700 hover:text-[#00923F] font-medium transition">Berita</a>
                    <a href="{{ url('/galeri') }}" class="text-gray-700 hover:text-[#00923F] font-medium transition">Galeri</a>
                    <a href="{{ url('/kontak') }}" class="text-gray-700 hover:text-[#00923F] font-medium transition">Kontak</a>
                </div>
            </div>
        </div>
    </nav>

    <main class="flex-grow">
        @yield('content')
    </main>

    <footer class="bg-[#00923F] text-white pt-16 pb-8 mt-auto">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-12">
                
                <div>
                    <h4 class="font-bold text-lg mb-6">Fatayat NU</h4>
                    <p class="text-green-50 text-sm leading-relaxed mb-6">
                        Organisasi perempuan muda NU yang berfokus pada pemberdayaan perempuan dalam berbagai bidang kehidupan.
                    </p>
                    <a href="#" class="inline-block hover:text-yellow-400 transition">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm3.975-9.421a1.08 1.08 0 100-2.159 1.08 1.08 0 000 2.159z"/></svg>
                    </a>
                </div>

                <div>
                    <h4 class="font-bold text-lg mb-6">Tautan Cepat</h4>
                    <ul class="space-y-3 text-sm text-green-50">
                        <li><a href="{{ url('/') }}" class="hover:text-yellow-400 transition">Beranda</a></li>
                        <li><a href="{{ url('/profil/visi-misi') }}" class="hover:text-yellow-400 transition">Visi & Misi</a></li>
                        <li><a href="#" class="hover:text-yellow-400 transition">Sejarah</a></li>
                        <li><a href="#" class="hover:text-yellow-400 transition">FAQ</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-bold text-lg mb-6">Kontak</h4>
                    <div class="space-y-3 text-sm text-green-50">
                        <p>Fatayat NU PAC Tahunan<br>Gedung MWCNU Tahunan<br>Jepara, Jawa Tengah<br>Indonesia</p>
                        <p class="pt-2">Email: admin@fatayatnutahunan.my.id<br>Telepon: (0291) 123-4567</p>
                    </div>
                </div>

            </div>

            <div class="border-t border-green-700/70 pt-8 text-center text-sm text-green-100">
                <p>&copy; {{ date('Y') }} Fatayat NU PAC Tahunan. Hak Cipta Dilindungi.</p>
            </div>
        </div>
    </footer>
</body>
</html>