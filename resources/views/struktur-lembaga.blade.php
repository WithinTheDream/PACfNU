@extends('layouts.front')
@section('title', 'Susunan Pengurus Lembaga')

@section('content')
<!-- Header Elegan -->
<div class="pt-16 pb-10 text-center px-4">
    <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-green-50 text-[#00923F] text-sm font-bold mb-4 border border-green-200 shadow-sm">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
        Susunan Kepengurusan
    </div>
    <h1 class="text-3xl md:text-5xl font-extrabold text-gray-900 tracking-tight mb-4">Pengurus <span class="text-[#00923F]">Lembaga</span></h1>
    <p class="text-lg text-gray-600 max-w-2xl mx-auto">Daftar kepengurusan lembaga-lembaga di bawah naungan PAC Fatayat NU Tahunan Masa Khidmat 2026 - 2030.</p>
</div>

<div class="max-w-7xl mx-auto px-4 py-8 pb-20">

    @if($lembagaInti->count() > 0)
    <div class="flex justify-center mb-16 relative">
        @foreach($lembagaInti as $p)
            <div class="bg-[#00923F] shadow-lg rounded-xl p-5 w-80 text-center relative z-10">
                <div class="text-xs font-bold text-yellow-300 uppercase tracking-widest mb-1">{{ $p->jabatan }}</div>
                <div class="text-lg font-extrabold text-white mb-1">{{ $p->nama }}</div>
            </div>
        @endforeach
        <div class="absolute top-[100%] left-1/2 -translate-x-1/2 w-1 h-12 bg-green-200"></div>
    </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 pt-4">
        @foreach($pengurusLembaga as $namaLembaga => $anggota)
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:border-[#00923F] transition duration-300">
                <div class="bg-gradient-to-r from-green-50 to-white px-5 py-4 border-b border-green-100 flex items-center gap-3">
                    <div class="w-8 h-8 rounded-full bg-green-200 text-green-700 flex items-center justify-center font-bold">
                        {{ $loop->iteration }}
                    </div>
                    <h4 class="font-bold text-gray-800 leading-tight">{{ $namaLembaga }}</h4>
                </div>
                <div class="p-5">
                    <ul class="space-y-4">
                        @foreach($anggota as $a)
                            <li class="flex flex-col">
                                <span class="text-[11px] font-bold text-yellow-600 uppercase tracking-wide">{{ $a->jabatan }}</span>
                                <span class="font-semibold text-gray-700">{{ $a->nama }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endforeach
    </div>

</div>
@endsection