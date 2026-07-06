<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Admin Fatayat</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style> 
        body { font-family: 'Plus Jakarta Sans', sans-serif; } 
        
        /* CSS Fix agar tombol upload file (Choose File) tidak miring dan rapi */
        input[type="file"]::file-selector-button {
            margin-right: 16px;
            border: none;
            background: #00923F;
            padding: 8px 16px;
            border-radius: 8px;
            color: white;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.2s ease-in-out;
        }
        input[type="file"]::file-selector-button:hover {
            background: #007a35;
        }
    </style>
    <!-- Stack untuk memanggil CSS tambahan (seperti Flatpickr) -->
    @stack('styles')
</head>
<body class="bg-gray-100 overflow-x-hidden">

    <div class="flex min-h-screen relative">
        
        <!-- Overlay Hitam untuk Mobile -->
        <div id="sidebar-overlay" onclick="toggleAdminSidebar()" class="fixed inset-0 bg-black/50 z-40 hidden md:hidden transition-opacity"></div>

        <!-- Sidebar (Fixed di Mobile, Relative di PC) -->
        <aside id="admin-sidebar" class="w-64 bg-green-800 text-white flex-shrink-0 flex flex-col fixed inset-y-0 left-0 transform -translate-x-full md:relative md:translate-x-0 transition-transform duration-300 z-50 shadow-2xl md:shadow-none">
            <div class="p-6 text-2xl font-bold border-b border-green-700 flex justify-between items-center">
                <div>Admin <span class="text-yellow-400">Fatayat</span></div>
                <!-- Tombol Close (Hanya di Mobile) -->
                <button onclick="toggleAdminSidebar()" class="md:hidden text-green-200 hover:text-white">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
            
            <nav class="flex-1 p-4 overflow-y-auto">
                <a href="{{ url('/admin') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium transition-all {{ Request::is('admin') ? 'bg-green-900 text-white' : 'text-green-50 hover:bg-green-700' }}">Dashboard</a>

                <div class="mt-6 mb-2 px-4"><p class="text-[11px] font-bold text-green-300/80 uppercase tracking-wider">Navigasi Utama</p></div>
                <div class="space-y-1">
                    <a href="{{ url('/admin/articles?jenis=biasa') }}" class="block px-4 py-2.5 rounded-lg text-sm font-medium transition-all {{ request('jenis') == 'biasa' || (Request::is('admin/articles*') && !request()->has('jenis')) ? 'bg-green-900 text-white' : 'text-green-50 hover:bg-green-700' }}">Kelola Berita PAC</a>
                    <a href="{{ url('/admin/pengurus?kategori=PAC') }}" class="block px-4 py-2.5 rounded-lg text-sm font-medium transition-all {{ request('kategori') == 'PAC' || (Request::is('admin/pengurus*') && !request()->has('kategori')) ? 'bg-green-900 text-white' : 'text-green-50 hover:bg-green-700' }}">Struktur Inti PAC</a>
                    <a href="{{ url('/admin/events') }}" class="block px-4 py-2.5 rounded-lg text-sm font-medium transition-all {{ Request::is('admin/events*') ? 'bg-green-900 text-white' : 'text-green-50 hover:bg-green-700' }}">Jadwal Acara</a>
                    
                    <!-- INI YANG DIUBAH: Link mengarah ke sistem Album baru -->
                    <a href="{{ url('/admin/albums') }}" class="block px-4 py-2.5 rounded-lg text-sm font-medium transition-all {{ Request::is('admin/albums*') ? 'bg-green-900 text-white' : 'text-green-50 hover:bg-green-700' }}">Galeri Kegiatan</a>
                </div>

                <div class="mt-6 mb-2 px-4"><p class="text-[11px] font-bold text-green-300/80 uppercase tracking-wider">Ekstraksi Lembaga</p></div>
                <div class="space-y-1">
                    <button type="button" onclick="toggleLembaga()" class="flex items-center justify-between w-full px-4 py-2.5 rounded-lg text-sm font-medium transition-all text-left {{ request('jenis') == 'lembaga' || request('kategori') == 'Lembaga' ? 'bg-green-900 text-white' : 'text-green-50 hover:bg-green-700' }}">
                        <span>Manajemen Lembaga</span>
                        <svg class="w-4 h-4 transform transition-transform rotate-180" id="lembaga-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div id="lembaga-menu" class="mt-1 space-y-1 px-2 border-l-2 border-green-700 ml-3">
                        <a href="{{ url('/admin/articles?jenis=lembaga') }}" class="block px-4 py-2 text-sm rounded-lg transition-all {{ request('jenis') == 'lembaga' ? 'text-white font-semibold' : 'text-green-200 hover:text-white hover:bg-green-700' }}">Berita Lembaga</a>
                        <a href="{{ url('/admin/pengurus?kategori=Lembaga') }}" class="block px-4 py-2 text-sm rounded-lg transition-all {{ request('kategori') == 'Lembaga' ? 'text-white font-semibold' : 'text-green-200 hover:text-white hover:bg-green-700' }}">Struktur Lembaga</a>
                    </div>
                </div>
            </nav>

            <div class="p-4 border-t border-green-700">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center justify-center gap-2 px-4 py-2.5 text-sm font-bold text-red-200 hover:text-white hover:bg-red-600/80 rounded-lg transition-all border border-transparent hover:border-red-500">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                        Keluar (Logout)
                    </button>
                </form>
            </div>
        </aside>

        <main class="flex-1 flex flex-col min-w-0 w-full">
            <header class="bg-white shadow-sm p-4 flex justify-between items-center border-b border-gray-100">
                <div class="flex items-center gap-4">
                    <!-- Tombol Hamburger Mobile -->
                    <button onclick="toggleAdminSidebar()" class="md:hidden text-gray-600 hover:text-green-700 p-1">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                    </button>
                    <h1 class="text-xl font-bold text-gray-800">@yield('title')</h1>
                </div>
                <div class="flex items-center gap-2">
                    <span class="text-sm text-gray-500 font-medium hidden sm:block">Halo, {{ Auth::user()->name }}</span>
                </div>
            </header>

            <div class="p-4 md:p-6 overflow-x-auto">
                @yield('content')
            </div>
        </main>
    </div>

    <script>
        function toggleLembaga() {
            document.getElementById('lembaga-menu').classList.toggle('hidden');
            document.getElementById('lembaga-icon').classList.toggle('rotate-180');
        }

        function toggleAdminSidebar() {
            const sidebar = document.getElementById('admin-sidebar');
            const overlay = document.getElementById('sidebar-overlay');
            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        }
    </script>
    
    <!-- Stack untuk memanggil Script tambahan -->
    @stack('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // 1. Alert Sukses Otomatis (Muncul Pop-up Toast di Pojok Kanan Atas)
            @if(session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: '{{ session('success') }}',
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                });
            @endif

            // 2. Alert Konfirmasi Hapus Otomatis (Mencegat Tombol Hapus)
            const deleteForms = document.querySelectorAll('.form-delete');
            deleteForms.forEach(form => {
                form.addEventListener('submit', function (e) {
                    e.preventDefault(); // Tahan dulu jangan langsung dihapus
                    Swal.fire({
                        title: 'Apakah Anda Yakin?',
                        text: "Data yang dihapus tidak dapat dikembalikan!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#00923F',
                        confirmButtonText: 'Ya, Hapus!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit(); // Lanjutkan hapus kalau di-klik 'Ya'
                        }
                    });
                });
            });
        });
    </script>
</body>
</html>