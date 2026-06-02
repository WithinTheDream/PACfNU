@extends('layouts.front')
@section('title', 'Susunan Pengurus Lembaga')

@section('content')
<div class="bg-[#EFFFF5] py-16 text-center border-b border-green-100">
    <h1 class="text-3xl font-extrabold text-[#00923F] uppercase tracking-wide">Susunan Pengurus Lembaga</h1>
    <h2 class="text-xl font-bold text-gray-700 mt-2">PAC Fatayat NU Tahunan</h2>
    <p class="mt-3 text-gray-600 font-medium">Masa Khidmat 2026 - 2030</p>
</div>

<div class="max-w-7xl mx-auto px-4 py-16">

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
            <div class="bg-white rounded-2xl shadow-sm border border-green-100 overflow-hidden hover:border-[#00923F] transition duration-300">
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