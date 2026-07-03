<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Admin Fatayat</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style> body { font-family: 'Plus Jakarta Sans', sans-serif; } </style>
</head>
<body class="bg-gray-100">

    <div class="flex min-h-screen">
        <aside class="w-64 bg-green-800 text-white flex-shrink-0 hidden md:flex flex-col">
            <div class="p-6 text-2xl font-bold border-b border-green-700">
                Admin <span class="text-yellow-400">Fatayat</span>
            </div>
            <nav class="flex-1 p-4 overflow-y-auto">
                <!-- Dashboard -->
                <a href="{{ url('/admin') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium transition-all {{ Request::is('admin') ? 'bg-green-900 text-white' : 'text-green-50 hover:bg-green-700' }}">
                    Dashboard
                </a>

                <!-- Divider: Menu Utama (PAC) -->
                <div class="mt-6 mb-2 px-4">
                    <p class="text-[11px] font-bold text-green-300/80 uppercase tracking-wider">Navigasi Utama</p>
                </div>
                
                <div class="space-y-1">
                    <a href="{{ url('/admin/articles?jenis=biasa') }}" class="block px-4 py-2.5 rounded-lg text-sm font-medium transition-all {{ request('jenis') == 'biasa' || (Request::is('admin/articles*') && !request()->has('jenis')) ? 'bg-green-900 text-white' : 'text-green-50 hover:bg-green-700' }}">Kelola Berita PAC</a>
                    
                    <a href="{{ url('/admin/pengurus?kategori=PAC') }}" class="block px-4 py-2.5 rounded-lg text-sm font-medium transition-all {{ request('kategori') == 'PAC' || (Request::is('admin/pengurus*') && !request()->has('kategori')) ? 'bg-green-900 text-white' : 'text-green-50 hover:bg-green-700' }}">Struktur Inti PAC</a>
                    
                    <a href="{{ url('/admin/events') }}" class="block px-4 py-2.5 rounded-lg text-sm font-medium transition-all {{ Request::is('admin/events*') ? 'bg-green-900 text-white' : 'text-green-50 hover:bg-green-700' }}">Jadwal Acara</a>
                    
                    <a href="{{ url('/admin/galleries') }}" class="block px-4 py-2.5 rounded-lg text-sm font-medium transition-all {{ Request::is('admin/galleries*') ? 'bg-green-900 text-white' : 'text-green-50 hover:bg-green-700' }}">Galeri Kegiatan</a>
                </div>

                <!-- Divider: Lembaga -->
                <div class="mt-6 mb-2 px-4">
                    <p class="text-[11px] font-bold text-green-300/80 uppercase tracking-wider">Ekstraksi Lembaga</p>
                </div>
                
                <div class="space-y-1">
                    <!-- Class rotate-180 langsung ditambahkan ke icon agar panahnya menghadap ke atas by default -->
                    <button type="button" onclick="toggleLembaga()" class="flex items-center justify-between w-full px-4 py-2.5 rounded-lg text-sm font-medium transition-all text-left {{ request('jenis') == 'lembaga' || request('kategori') == 'Lembaga' ? 'bg-green-900 text-white' : 'text-green-50 hover:bg-green-700' }}">
                        <span>Manajemen Lembaga</span>
                        <svg class="w-4 h-4 transform transition-transform rotate-180" id="lembaga-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    
                    <!-- Class hidden langsung dihapus agar menu otomatis terbuka saat pertama kali load -->
                    <div id="lembaga-menu" class="mt-1 space-y-1 px-2 border-l-2 border-green-700 ml-3">
                        <a href="{{ url('/admin/articles?jenis=lembaga') }}" class="block px-4 py-2 text-sm rounded-lg transition-all {{ request('jenis') == 'lembaga' ? 'text-white font-semibold' : 'text-green-200 hover:text-white hover:bg-green-700' }}">Berita Lembaga</a>
                        
                        <a href="{{ url('/admin/pengurus?kategori=Lembaga') }}" class="block px-4 py-2 text-sm rounded-lg transition-all {{ request('kategori') == 'Lembaga' ? 'text-white font-semibold' : 'text-green-200 hover:text-white hover:bg-green-700' }}">Struktur Lembaga</a>
                    </div>
                </div>
            </nav>

            <script>
                // JS Logic untuk menutup/buka secara manual tetap dipertahankan
                function toggleLembaga() {
                    document.getElementById('lembaga-menu').classList.toggle('hidden');
                    document.getElementById('lembaga-icon').classList.toggle('rotate-180');
                }
            </script>

            <div class="p-4 border-t border-green-700">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center justify-center gap-2 px-4 py-2.5 text-sm font-bold text-red-200 hover:text-white hover:bg-red-600/80 rounded-lg transition-all border border-transparent hover:border-red-500">
                        <!-- Icon Logout -->
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                        Keluar (Logout)
                    </button>
                </form>
            </div>
            </aside>

        <main class="flex-1 flex flex-col">
            <header class="bg-white shadow-sm p-4 flex justify-between items-center">
                <h1 class="text-xl font-semibold text-gray-700">@yield('title')</h1>
                <div class="flex items-center gap-2">
                    <span class="text-sm text-gray-500 italic">Halo, {{ Auth::user()->name }}</span>
                </div>
            </header>

            <div class="p-6">
                @yield('content')
            </div>
        </main>
    </div>

</body>
</html>