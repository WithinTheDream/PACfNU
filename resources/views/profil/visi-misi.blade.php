@extends('layouts.front')
@section('title', 'Profil Organisasi')

@section('content')
<!-- Header Elegan Baru (Tanpa Blok Hijau) -->
<div class="pt-16 pb-10 text-center px-4">
    <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-green-50 text-[#00923F] text-sm font-bold mb-4 border border-green-200 shadow-sm">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
        Profil Organisasi
    </div>
    <h1 class="text-3xl md:text-5xl font-extrabold text-gray-900 tracking-tight mb-4">Visi & Misi <span class="text-[#00923F]">Fatayat NU</span></h1>
    <p class="text-lg text-gray-600 max-w-2xl mx-auto">Mengenal lebih dekat arah gerak, tujuan, dan landasan kepengurusan Fatayat NU PAC Tahunan.</p>
</div>

<!-- Konten Visi Misi -->
<div class="max-w-5xl mx-auto px-4 pb-16">
    <div class="grid md:grid-cols-2 gap-8 relative">
        <!-- Card Visi -->
        <div class="bg-white p-8 md:p-10 rounded-3xl shadow-sm border border-gray-100 hover:shadow-md hover:border-green-300 transition-all duration-300 relative overflow-hidden group">
            <div class="absolute top-0 right-0 w-24 h-24 bg-green-50 rounded-bl-full -z-10 group-hover:scale-110 transition-transform"></div>
            <h3 class="text-2xl font-bold text-[#00923F] mb-6 flex items-center gap-3">Visi Utama
            </h3>
            <p class="text-gray-700 leading-relaxed text-lg font-medium">Mewujudkan perempuan muda Islam yang bertaqwa, berakhlakul karimah, beramal shaleh, cakap, bertanggungjawab, dan berguna bagi agama, nusa, dan bangsa.</p>
        </div>
        
        <!-- Card Misi -->
        <div class="bg-white p-8 md:p-10 rounded-3xl shadow-sm border border-gray-100 hover:shadow-md hover:border-yellow-300 transition-all duration-300 relative overflow-hidden group">
            <div class="absolute top-0 right-0 w-24 h-24 bg-yellow-50 rounded-bl-full -z-10 group-hover:scale-110 transition-transform"></div>
            <h3 class="text-2xl font-bold text-yellow-600 mb-6 flex items-center gap-3">Misi Gerakan
            </h3>
            <ul class="space-y-4">
                <li class="flex items-start gap-3">
                    <svg class="w-6 h-6 text-yellow-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span class="text-gray-700">Membangun kesadaran kritis perempuan di bidang agama dan sosial.</span>
                </li>
                <li class="flex items-start gap-3">
                    <svg class="w-6 h-6 text-yellow-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span class="text-gray-700">Meningkatkan SDM pengurus dan anggota melalui pelatihan berkelanjutan.</span>
                </li>
                <li class="flex items-start gap-3">
                    <svg class="w-6 h-6 text-yellow-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span class="text-gray-700">Memperkuat jaringan organisasi di tingkat PAC dan Ranting.</span>
                </li>
                <li class="flex items-start gap-3">
                    <svg class="w-6 h-6 text-yellow-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span class="text-gray-700">Memberdayakan ekonomi dan kemandirian perempuan.</span>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection