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
            <nav class="flex-1 p-4 space-y-2">
                <a href="{{ url('/admin') }}" class="block px-4 py-2.5 rounded-lg hover:bg-green-700 transition {{ Request::is('admin') ? 'bg-green-900' : '' }}">Dashboard</a>
                <a href="{{ url('/admin/articles') }}" class="block px-4 py-2.5 rounded-lg hover:bg-green-700 transition {{ Request::is('admin/articles*') ? 'bg-green-900' : '' }}">Kelola Berita</a>
                <a href="{{ url('/admin/events') }}" class="block px-4 py-2.5 rounded-lg hover:bg-green-700 transition {{ Request::is('admin/events*') ? 'bg-green-900' : '' }}">Jadwal Acara</a>
                
                <a href="{{ url('/admin/pengurus') }}" class="block px-4 py-2.5 rounded-lg hover:bg-green-700 transition {{ Request::is('admin/pengurus*') ? 'bg-green-900' : '' }}">Struktur & Lembaga</a>
                <a href="{{ url('/admin/galleries') }}" class="block px-4 py-2.5 rounded-lg hover:bg-green-700 transition {{ Request::is('admin/galleries*') ? 'bg-green-900' : '' }}">Galeri Kegiatan</a>
            </nav>
            <div class="p-4 border-t border-green-700">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-left px-4 py-2 text-red-300 hover:text-red-100 transition">
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