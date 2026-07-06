@extends('layouts.front')
@section('title', 'Hubungi Kami')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16" data-aos="fade-up" data-aos-duration="1000">
    
    <!-- Header -->
    <div class="text-center mb-16">
        <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-green-50 text-[#00923F] text-sm font-bold mb-4 border border-green-200 shadow-sm">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
            Layanan Informasi
        </div>
        <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 tracking-tight mb-4">Hubungi <span class="text-[#00923F]">Kami</span></h1>
        <p class="text-lg text-gray-600 max-w-2xl mx-auto">Punya pertanyaan atau ingin berkolaborasi? Kami siap mendengarkan dan bersinergi bersama.</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start mb-16">
        
        <!-- KIRI: Info Kontak & Sosial Media -->
        <div class="space-y-8" data-aos="fade-right" data-aos-delay="100">
            <div class="bg-white p-8 md:p-10 rounded-3xl shadow-sm border border-gray-100">
                <h2 class="text-2xl font-bold text-gray-800 mb-8">Mari Bersinergi Bersama <span class="text-[#00923F]">Fatayat NU</span></h2>
                
                <div class="space-y-6">
                    <!-- Alamat -->
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-green-50 text-[#00923F] rounded-xl flex items-center justify-center flex-shrink-0 border border-green-100 shadow-sm">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900">Sekretariat Resmi</h4>
                            <p class="text-gray-500 text-sm mt-1 leading-relaxed">Gedung MWCNU Tahunan<br>Kecamatan Tahunan, Kabupaten Jepara, Jawa Tengah.</p>
                        </div>
                    </div>
                    
                    <!-- WhatsApp -->
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-green-50 text-green-600 rounded-xl flex items-center justify-center flex-shrink-0 border border-green-100 shadow-sm">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900">WhatsApp / Telepon</h4>
                            <p class="text-green-600 text-sm font-medium mt-1">0882-3145-13667 <span class="text-gray-300 mx-1">|</span> 0813-3331-0051</p>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center flex-shrink-0 border border-blue-100 shadow-sm">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900">Email Resmi</h4>
                            <a href="mailto:admin@fatayatnutahunan.my.id" class="text-blue-600 text-sm font-medium hover:underline mt-1 block">admin@fatayatnutahunan.my.id</a>
                        </div>
                    </div>

                    <!-- Instagram -->
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-pink-50 text-pink-600 rounded-xl flex items-center justify-center flex-shrink-0 border border-pink-100 shadow-sm">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm3.975-9.421a1.08 1.08 0 100-2.159 1.08 1.08 0 000 2.159z"/></svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900">Instagram</h4>
                            <a href="https://instagram.com/pac.fatayatnutahunan" target="_blank" class="text-pink-600 text-sm font-medium hover:underline mt-1 block">@pac.fatayatnutahunan</a>
                        </div>
                    </div>

                    <!-- TikTok -->
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-black text-white rounded-xl flex items-center justify-center flex-shrink-0 border border-gray-800 shadow-sm">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M19.59 6.69a4.83 4.83 0 01-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 01-5.2 1.74 2.89 2.89 0 012.31-4.64 2.93 2.93 0 01.88.13V9.4a6.84 6.84 0 00-1-.05A6.33 6.33 0 005 20.1a6.34 6.34 0 0010.86-4.43v-7a8.16 8.16 0 004.77 1.52v-3.4a4.85 4.85 0 01-1-.1z"/></svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900">TikTok</h4>
                            <a href="https://tiktok.com/@pac.fatayatnutahunan" target="_blank" class="text-gray-800 text-sm font-medium hover:underline mt-1 block">@pac.fatayatnutahunan</a>
                        </div>
                    </div>

                    <!-- YouTube -->
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-red-50 text-red-600 rounded-xl flex items-center justify-center flex-shrink-0 border border-red-100 shadow-sm">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900">YouTube</h4>
                            <a href="https://youtube.com/@pac_fatayatnutahunan" target="_blank" class="text-red-600 text-sm font-medium hover:underline mt-1 block">@pac_fatayatnutahunan</a>
                        </div>
                    </div>

                    <!-- Saluran WA -->
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-emerald-50 text-emerald-600 rounded-xl flex items-center justify-center flex-shrink-0 border border-emerald-100 shadow-sm">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.093 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900">Saluran WA</h4>
                            <a href="https://whatsapp.com/channel/0029Vb7BVuHJ3juv4HRNqW3S" target="_blank" class="text-emerald-600 text-sm font-medium hover:underline mt-1 block">SAPA FATAYAT</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- KANAN: Form Terintegrasi API WhatsApp -->
        <div class="bg-white p-8 md:p-10 rounded-3xl shadow-xl border border-gray-100 relative overflow-hidden" data-aos="fade-left" data-aos-delay="200">
            <!-- Dekorasi Form -->
            <div class="absolute -top-10 -right-10 w-40 h-40 bg-green-50 rounded-full blur-3xl opacity-50"></div>
            
            <h3 class="text-2xl font-bold text-gray-800 mb-2 relative z-10">Kirim Pesan Cepat</h3>
            <p class="text-sm text-gray-500 mb-8 relative z-10">Pesan Anda akan otomatis diformat dan terhubung langsung ke WhatsApp Admin.</p>
            
            <form id="waForm" onsubmit="event.preventDefault(); sendToWhatsapp();" class="relative z-10">
                <div class="mb-5">
                    <label class="block text-sm font-bold text-gray-700 mb-2">Pilih Admin Tujuan *</label>
                    <select id="wa_admin" class="w-full bg-gray-50 border border-gray-300 rounded-xl px-4 py-3.5 focus:ring-2 focus:ring-[#00923F] focus:border-[#00923F] outline-none transition text-sm cursor-pointer" required>
                        <option value="62882314513667">Admin 1 (0882-3145-13667)</option>
                        <option value="6281333310051">Admin 2 (0813-3331-0051)</option>
                    </select>
                </div>

                <div class="mb-5">
                    <label class="block text-sm font-bold text-gray-700 mb-2">Nama Lengkap *</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        </div>
                        <input type="text" id="wa_name" placeholder="Masukkan nama Anda" required class="w-full bg-gray-50 border border-gray-300 rounded-xl pl-11 pr-4 py-3.5 focus:ring-2 focus:ring-[#00923F] focus:border-[#00923F] outline-none transition text-sm">
                    </div>
                </div>
                
                <div class="mb-5">
                    <label class="block text-sm font-bold text-gray-700 mb-2">Asal Ranting / Instansi (Opsional)</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                        </div>
                        <input type="text" id="wa_instansi" placeholder="Misal: Ranting Mantingan" class="w-full bg-gray-50 border border-gray-300 rounded-xl pl-11 pr-4 py-3.5 focus:ring-2 focus:ring-[#00923F] focus:border-[#00923F] outline-none transition text-sm">
                    </div>
                </div>
                
                <div class="mb-8">
                    <label class="block text-sm font-bold text-gray-700 mb-2">Pesan Anda *</label>
                    <textarea id="wa_message" rows="4" required placeholder="Tuliskan pesan atau pertanyaan Anda di sini..." class="w-full bg-gray-50 border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-[#00923F] focus:border-[#00923F] outline-none transition resize-none text-sm"></textarea>
                </div>
                
                <button type="submit" class="w-full bg-[#00923F] text-white font-bold py-4 rounded-xl hover:bg-green-800 shadow-md hover:shadow-xl transition transform hover:-translate-y-0.5 flex justify-center items-center gap-2">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.093 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                    Kirim via WhatsApp
                </button>
            </form>
        </div>
    </div>

    <!-- PETA LOKASI GOOGLE MAPS -->
    <div class="w-full bg-white p-4 rounded-3xl shadow-sm border border-gray-100" data-aos="zoom-in" data-aos-delay="300">
        <h3 class="font-bold text-gray-800 mb-4 px-2">Peta Lokasi Sekretariat</h3>
        <div class="relative w-full h-[450px] rounded-2xl overflow-hidden">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15852.124116499158!2d110.6623!3d-6.6433!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e711ef2c0f68d87%3A0xc3194beec6b1062b!2sKec.%20Tahunan%2C%20Kabupaten%20Jepara%2C%20Jawa%20Tengah!5e0!3m2!1sid!2sid!4v1717000000000!5m2!1sid!2sid" 
                class="absolute top-0 left-0 w-full h-full border-0 grayscale hover:grayscale-0 transition duration-500" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </div>

</div>
@endsection

@push('scripts')
<script>
    function sendToWhatsapp() {
        // Ambil data dari form, termasuk nomor Admin yang dipilih
        let phone = document.getElementById('wa_admin').value;
        let name = document.getElementById('wa_name').value;
        let instansi = document.getElementById('wa_instansi').value;
        let message = document.getElementById('wa_message').value;
        
        // Membentuk format pesan
        let text = `Halo Admin Fatayat NU Tahunan,%0A%0APerkenalkan saya *${name}*`;
        if (instansi) {
            text += ` dari ${instansi}`;
        }
        text += `.%0A%0A${message}`;
        
        // Mengalihkan user ke API WhatsApp
        let waUrl = `https://api.whatsapp.com/send?phone=${phone}&text=${text}`;
        window.open(waUrl, '_blank');
    }
</script>
@endpush