@extends('layouts.front')
@section('title', 'Visi & Misi')

@section('content')
<div class="bg-[#EFFFF5] py-16 text-center border-b border-green-100">
    <h1 class="text-3xl md:text-4xl font-extrabold text-[#00923F]">Visi & Misi</h1>
    <p class="mt-3 text-gray-600 max-w-2xl mx-auto text-lg">Arah gerak dan tujuan utama kepengurusan Pimpinan Anak Cabang Fatayat NU Tahunan.</p>
</div>

<div class="max-w-4xl mx-auto px-4 py-16">
    <div class="bg-white p-8 md:p-12 rounded-xl shadow-sm border border-gray-100 mb-8 relative overflow-hidden hover:shadow-md transition">
        <div class="absolute top-0 left-0 w-2 h-full bg-yellow-500"></div>
        <h2 class="text-2xl font-bold text-gray-800 mb-4 flex items-center gap-2">
            <svg class="w-7 h-7 text-yellow-500" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
            Visi Kami
        </h2>
        <p class="text-xl text-gray-700 leading-relaxed font-medium">"Mewujudkan perempuan muda Islam yang bertaqwa, berakhlakul karimah, beramal shaleh, cakap, bertanggungjawab, dan berguna bagi agama, nusa, dan bangsa."</p>
    </div>

    <div class="bg-white p-8 md:p-12 rounded-xl shadow-sm border border-gray-100 relative overflow-hidden hover:shadow-md transition">
        <div class="absolute top-0 left-0 w-2 h-full bg-[#00923F]"></div>
        <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center gap-2">
            <svg class="w-7 h-7 text-[#00923F]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
            Misi Kami
        </h2>
        <ul class="space-y-5 text-gray-700 text-lg">
            <li class="flex items-start">
                <span class="text-[#00923F] font-extrabold mr-4 text-xl">1.</span>
                <span class="leading-relaxed">Membangun kesadaran kritis perempuan di bidang agama dan sosial kemasyarakatan.</span>
            </li>
            <li class="flex items-start">
                <span class="text-[#00923F] font-extrabold mr-4 text-xl">2.</span>
                <span class="leading-relaxed">Meningkatkan sumber daya manusia (SDM) pengurus dan anggota melalui pelatihan dan kaderisasi berkelanjutan.</span>
            </li>
            <li class="flex items-start">
                <span class="text-[#00923F] font-extrabold mr-4 text-xl">3.</span>
                <span class="leading-relaxed">Memperkuat jaringan organisasi di tingkat PAC hingga Ranting untuk mengoptimalkan program kerja.</span>
            </li>
            <li class="flex items-start">
                <span class="text-[#00923F] font-extrabold mr-4 text-xl">4.</span>
                <span class="leading-relaxed">Memberdayakan ekonomi dan kemandirian perempuan melalui wadah koperasi atau UMKM binaan.</span>
            </li>
        </ul>
    </div>
</div>
@endsection