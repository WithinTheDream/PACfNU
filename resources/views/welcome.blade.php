<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Fatayat NU Tahunan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        /* Efek gradient hijau transparan untuk background hero */
        .hero-overlay {
            background: linear-gradient(135deg, rgba(5, 150, 105, 0.9) 0%, rgba(4, 120, 87, 0.95) 100%);
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 antialiased">

    <nav class="bg-white shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20 items-center">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-green-600 rounded-full flex items-center justify-center text-white font-bold text-xl">
                        F
                    </div>
                    <span class="font-bold text-xl text-green-700">Fatayat Tahunan</span>
                </div>
                <div class="hidden md:flex space-x-8 items-center">
                    <a href="#" class="text-gray-600 hover:text-green-600 font-medium transition">Tentang</a>
                    <a href="#jadwal" class="text-gray-600 hover:text-green-600 font-medium transition">Jadwal</a>
                    <a href="#berita" class="text-gray-600 hover:text-green-600 font-medium transition">Berita</a>
                    <a href="/admin" class="bg-green-600 hover:bg-green-700 text-white px-6 py-2.5 rounded-lg font-semibold transition shadow-md">Login</a>
                </div>
            </div>
        </div>
    </nav>

    <section class="relative bg-[url('https://images.unsplash.com/photo-1511632765486-a01980e01a18?q=80&w=2070&auto=format&fit=crop')] bg-cover bg-center">
        <div class="hero-overlay absolute inset-0"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-32 text-center text-white">
            <h1 class="text-4xl md:text-5xl font-extrabold tracking-tight mb-6">
                Selamat Datang di Sistem Informasi<br>Fatayat NU Tahunan
            </h1>
            <p class="mt-4 text-lg md:text-xl font-medium text-green-50 max-w-3xl mx-auto mb-10">
                Pusat informasi kegiatan, berita terbaru, dan pendataan anggota untuk PAC Fatayat NU Kecamatan Tahunan, Kabupaten Jepara yang lebih modern dan terintegrasi.
            </p>
            <div class="flex justify-center gap-4">
                <a href="/admin" class="bg-yellow-500 hover:bg-yellow-400 text-yellow-950 px-8 py-3.5 rounded-lg font-bold transition shadow-lg">
                    Login Sistem
                </a>
                <a href="#jadwal" class="bg-transparent border-2 border-white hover:bg-white hover:text-green-700 px-8 py-3.5 rounded-lg font-bold transition">
                    Lihat Jadwal
                </a>
            </div>
        </div>
    </section>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        
        <div id="jadwal" class="mb-20">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-green-700 mb-2">Jadwal Kegiatan Terdekat</h2>
                <div class="w-24 h-1 bg-yellow-500 mx-auto rounded-full"></div>
                <p class="mt-4 text-gray-600">Jangan lewatkan agenda rutin dan kegiatan besar Fatayat NU Tahunan.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @forelse ($events as $event)
                    <div class="bg-white rounded-2xl p-6 shadow-sm hover:shadow-xl transition duration-300 border border-gray-100 relative overflow-hidden">
                        <div class="absolute top-0 left-0 w-2 h-full bg-green-500"></div>
                        <h3 class="font-bold text-xl text-gray-800 mb-2">{{ $event->name }}</h3>
                        <div class="flex items-center text-gray-500 text-sm mb-1">
                            <svg class="w-4 h-4 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            {{ $event->location }}
                        </div>
                        <div class="flex items-center text-blue-600 font-semibold text-sm mt-3 bg-blue-50 w-fit px-3 py-1 rounded-full">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            {{ \Carbon\Carbon::parse($event->event_date)->format('d F Y - H:i') }} WIB
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center py-10 bg-white rounded-xl shadow-sm border border-gray-100">
                        <p class="text-gray-500 italic">Belum ada jadwal kegiatan dalam waktu dekat.</p>
                    </div>
                @endforelse
            </div>
        </div>

        <div id="berita">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-green-700 mb-2">Berita & Informasi</h2>
                <div class="w-24 h-1 bg-yellow-500 mx-auto rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @forelse ($articles as $article)
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-lg transition">
                        
                        @if($article->image)
                            <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="h-48 w-full object-cover">
                        @else
                            <div class="h-48 bg-green-100 w-full flex items-center justify-center text-green-500">
                                <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            </div>
                        @endif

                        <div class="p-6">
                            <div class="text-xs font-semibold text-yellow-600 mb-2 uppercase tracking-wider">
                                {{ $article->created_at->format('d M Y') }}
                            </div>
                            <h3 class="font-bold text-xl text-gray-800 mb-3 leading-tight">{{ $article->title }}</h3>
                            <div class="text-gray-600 text-sm line-clamp-3">
                                {!! \Illuminate\Support\Str::limit(strip_tags($article->content), 120) !!}
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center py-10 bg-white rounded-xl shadow-sm border border-gray-100">
                        <p class="text-gray-500 italic">Belum ada berita yang diterbitkan.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </main>

    <section class="bg-green-600 py-16 text-center text-white px-4">
        <h2 class="text-3xl font-bold mb-4">Sudah punya akun pengurus?</h2>
        <p class="mb-8 text-green-100">Masuk ke sistem untuk mengelola data jadwal kegiatan dan menerbitkan berita.</p>
        <div class="flex justify-center gap-4">
            <a href="/admin" class="bg-yellow-500 hover:bg-yellow-400 text-yellow-950 px-8 py-3 rounded-lg font-bold transition">Masuk ke Sistem</a>
            <a href="#" class="bg-transparent border border-white hover:bg-white hover:text-green-700 px-8 py-3 rounded-lg font-bold transition">Hubungi Admin</a>
        </div>
    </section>

    <footer class="bg-gray-900 text-gray-300 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8 mb-8 border-b border-gray-800 pb-8">
            <div>
                <h4 class="text-white font-bold text-xl mb-4">Fatayat NU Tahunan</h4>
                <p class="text-sm text-gray-400 leading-relaxed">
                    Pusat administrasi dan informasi Pimpinan Anak Cabang Fatayat Nahdlatul Ulama Kecamatan Tahunan, Kabupaten Jepara, Jawa Tengah.
                </p>
            </div>
            <div>
                <h4 class="text-white font-bold text-lg mb-4">Tautan Cepat</h4>
                <ul class="space-y-2 text-sm text-gray-400">
                    <li><a href="#" class="hover:text-green-400 transition">Tentang Kami</a></li>
                    <li><a href="#jadwal" class="hover:text-green-400 transition">Jadwal Acara</a></li>
                    <li><a href="#berita" class="hover:text-green-400 transition">Berita Terbaru</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-white font-bold text-lg mb-4">Dukungan</h4>
                <ul class="space-y-2 text-sm text-gray-400">
                    <li><a href="#" class="hover:text-green-400 transition">Panduan Pengguna</a></li>
                    <li><a href="#" class="hover:text-green-400 transition">Hubungi Kami</a></li>
                </ul>
            </div>
        </div>
        <div class="max-w-7xl mx-auto text-center text-sm text-gray-500">
            &copy; {{ date('Y') }} Sistem Informasi Fatayat NU Tahunan. Dibangun untuk mempermudah administrasi organisasi.
        </div>
    </footer>

</body>
</html>