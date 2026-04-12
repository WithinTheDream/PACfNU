@extends('layouts.front')
@section('title', 'Profil Organisasi')

@section('content')
<div class="bg-green-700 py-16 text-center text-white">
    <h1 class="text-4xl font-bold">Profil Fatayat NU Tahunan</h1>
    <p class="mt-2 text-green-100">Mengenal lebih dekat visi, misi, dan struktur kepengurusan kami.</p>
</div>

<div class="max-w-5xl mx-auto px-4 py-16">
    <div id="visi-misi" class="mb-20">
        <h2 class="text-3xl font-bold text-green-800 text-center mb-10">Visi & Misi</h2>
        <div class="grid md:grid-cols-2 gap-10">
            <div class="bg-white p-8 rounded-2xl shadow-sm border border-green-100">
                <h3 class="text-2xl font-bold text-yellow-500 mb-4">Visi</h3>
                <p class="text-gray-700 leading-relaxed text-lg">Mewujudkan perempuan muda Islam yang bertaqwa, berakhlakul karimah, beramal shaleh, cakap, bertanggungjawab, dan berguna bagi agama, nusa, dan bangsa.</p>
            </div>
            <div class="bg-white p-8 rounded-2xl shadow-sm border border-green-100">
                <h3 class="text-2xl font-bold text-yellow-500 mb-4">Misi</h3>
                <ul class="list-disc list-inside text-gray-700 space-y-3">
                    <li>Membangun kesadaran kritis perempuan di bidang agama dan sosial.</li>
                    <li>Meningkatkan SDM pengurus dan anggota melalui pelatihan berkelanjutan.</li>
                    <li>Memperkuat jaringan organisasi di tingkat PAC dan Ranting.</li>
                    <li>Memberdayakan ekonomi dan kemandirian perempuan.</li>
                </ul>
            </div>
        </div>
    </div>

    <div id="struktur" class="text-center">
        <h2 class="text-3xl font-bold text-green-800 mb-10">Struktur Organisasi</h2>
        <div class="bg-gray-50 p-10 rounded-2xl border border-gray-200">
            <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-10 h-10 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
            </div>
            <h3 class="text-xl font-bold text-gray-800">Bagan Struktur Organisasi PAC Tahunan</h3>
            <p class="text-gray-500 mt-2">Sedang dalam tahap pembaruan data kepengurusan periode ini.</p>
        </div>
    </div>
</div>
@endsection