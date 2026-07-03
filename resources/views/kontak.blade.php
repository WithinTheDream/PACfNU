@extends('layouts.front')
@section('title', 'Hubungi Kami')

@section('content')
<!-- Header Elegan -->
<div class="pt-16 pb-10 text-center px-4">
    <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-green-50 text-[#00923F] text-sm font-bold mb-4 border border-green-200 shadow-sm">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
        Layanan Informasi
    </div>
    <h1 class="text-3xl md:text-5xl font-extrabold text-gray-900 tracking-tight mb-4">Hubungi <span class="text-[#00923F]">Kami</span></h1>
    <p class="text-lg text-gray-600 max-w-2xl mx-auto">Punya pertanyaan atau ingin berkolaborasi? Kami siap mendengarkan dan bersinergi bersama.</p>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 pb-24">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
        
        <div>
            <h2 class="text-3xl font-bold text-gray-800 mb-6">Mari Bersinergi Bersama <span class="text-[#00923F]">Fatayat NU</span></h2>
            <p class="text-gray-600 text-lg mb-10 leading-relaxed">
                Kami sangat terbuka untuk komunikasi, kritik, saran, maupun penawaran kerjasama program yang sejalan dengan visi dan misi pemberdayaan perempuan muda NU.
            </p>
            
            <div class="space-y-8">
                <div class="flex items-start gap-5">
                    <div class="w-14 h-14 bg-green-50 text-[#00923F] rounded-xl flex items-center justify-center flex-shrink-0 border border-green-100">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-800 text-lg">Sekretariat Resmi</h4>
                        <p class="text-gray-600 mt-1">Gedung MWCNU Tahunan<br>Kecamatan Tahunan, Kabupaten Jepara.</p>
                    </div>
                </div>
                
                <div class="flex items-start gap-5">
                    <div class="w-14 h-14 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center flex-shrink-0 border border-blue-100">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-800 text-lg">Email</h4>
                        <p class="text-gray-600 mt-1">admin@fatayatnutahunan.my.id</p>
                    </div>
                </div>

                <div class="flex items-start gap-5">
                    <div class="w-14 h-14 bg-pink-50 text-pink-600 rounded-xl flex items-center justify-center flex-shrink-0 border border-pink-100">
                        <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm3.975-9.421a1.08 1.08 0 100-2.159 1.08 1.08 0 000 2.159z"/></svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-800 text-lg">Instagram</h4>
                        <a href="#" class="text-[#00923F] font-medium hover:underline mt-1 block">@fatayat_tahunan</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white p-8 md:p-10 rounded-2xl shadow-xl border border-gray-100">
            <h3 class="text-2xl font-bold text-gray-800 mb-6">Kirim Pesan Cepat</h3>
            <form action="#" method="POST">
                <div class="mb-5">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                    <input type="text" placeholder="Masukkan nama Anda" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-[#00923F] focus:border-[#00923F] outline-none transition">
                </div>
                <div class="mb-5">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Alamat Email</label>
                    <input type="email" placeholder="contoh@email.com" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-[#00923F] focus:border-[#00923F] outline-none transition">
                </div>
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Pesan Anda</label>
                    <textarea rows="4" placeholder="Tuliskan pesan atau pertanyaan Anda di sini..." class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-[#00923F] focus:border-[#00923F] outline-none transition resize-none"></textarea>
                </div>
                <button type="button" class="w-full bg-[#00923F] text-white font-bold py-3.5 rounded-lg hover:bg-green-800 hover:shadow-lg transition">
                    Kirim Pesan Sekarang
                </button>
            </form>
        </div>
        
    </div>
</div>
@endsection