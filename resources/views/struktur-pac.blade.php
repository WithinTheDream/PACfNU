@extends('layouts.front')
@section('title', 'Susunan Pengurus PAC')

@section('content')
@php
    // Kelompokkan pengurus inti berdasarkan kata kunci jabatan
    $penasehat = $pengurusPacInti->filter(fn($p) => str_contains(strtolower($p->jabatan), 'penasehat') || str_contains(strtolower($p->jabatan), 'pembina') || str_contains(strtolower($p->jabatan), 'dewan kehormatan'));
    $ketua = $pengurusPacInti->filter(fn($p) => str_contains(strtolower($p->jabatan), 'ketua'));
    $sekretaris = $pengurusPacInti->filter(fn($p) => str_contains(strtolower($p->jabatan), 'sekretaris'));
    $bendahara = $pengurusPacInti->filter(fn($p) => str_contains(strtolower($p->jabatan), 'bendahara'));
@endphp

<div class="bg-[#EFFFF5] py-16 text-center border-b border-green-100">
    <h1 class="text-3xl font-extrabold text-[#00923F] uppercase tracking-wide">Pimpinan Anak Cabang</h1>
    <h2 class="text-xl font-bold text-gray-700 mt-2">Fatayat Nahdlatul Ulama Tahunan</h2>
    <p class="mt-3 text-gray-600 font-medium">Masa Khidmat 2026 - 2030</p>
</div>

<div class="max-w-7xl mx-auto px-4 py-16">

    @if($penasehat->count() > 0)
    <div class="mb-12">
        <h3 class="text-center font-bold text-gray-500 mb-6 uppercase tracking-widest text-sm">Jajaran Penasehat & Pembina</h3>
        <div class="flex flex-wrap justify-center gap-4">
            @foreach($penasehat as $p)
                <div class="bg-white border-t-4 border-gray-400 shadow-sm rounded-lg p-4 w-64 text-center">
                    <div class="text-xs font-bold text-gray-500 uppercase mb-1">{{ $p->jabatan }}</div>
                    <div class="font-bold text-gray-800">{{ $p->nama }}</div>
                </div>
            @endforeach
        </div>
    </div>
    @endif

    @if($ketua->count() > 0)
    <div class="mb-10 relative">
        <div class="flex flex-col items-center gap-4 relative z-10">
            @foreach($ketua as $p)
                <div class="bg-gradient-to-b from-[#00923F] to-green-700 shadow-lg rounded-xl p-5 w-80 text-center transform hover:scale-105 transition">
                    <div class="text-xs font-bold text-yellow-300 uppercase tracking-widest mb-1">{{ $p->jabatan }}</div>
                    <div class="text-lg font-extrabold text-white">{{ $p->nama }}</div>
                </div>
            @endforeach
        </div>
        <div class="w-1 h-12 bg-green-200 mx-auto mt-2"></div>
    </div>
    @endif

    <div class="flex flex-col md:flex-row justify-center gap-10 md:gap-24 mb-16 relative">
        <div class="hidden md:block absolute top-0 left-1/2 -translate-x-1/2 w-[40%] h-1 bg-green-200"></div>
        <div class="hidden md:block absolute top-0 left-[30%] w-1 h-6 bg-green-200"></div>
        <div class="hidden md:block absolute top-0 right-[30%] w-1 h-6 bg-green-200"></div>

        <div class="flex flex-col gap-4 mt-6">
            @foreach($sekretaris as $p)
                <div class="bg-white border border-green-100 shadow-md rounded-xl p-5 w-72 text-center border-t-4 border-t-yellow-500">
                    <div class="text-xs font-bold text-gray-500 uppercase mb-1">{{ $p->jabatan }}</div>
                    <div class="font-bold text-gray-800">{{ $p->nama }}</div>
                </div>
            @endforeach
        </div>

        <div class="flex flex-col gap-4 mt-6">
            @foreach($bendahara as $p)
                <div class="bg-white border border-green-100 shadow-md rounded-xl p-5 w-72 text-center border-t-4 border-t-yellow-500">
                    <div class="text-xs font-bold text-gray-500 uppercase mb-1">{{ $p->jabatan }}</div>
                    <div class="font-bold text-gray-800">{{ $p->nama }}</div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="mt-20">
        <div class="text-center mb-10">
            <h2 class="text-2xl font-extrabold text-gray-800 uppercase inline-block border-b-4 border-[#00923F] pb-2">Bidang - Bidang</h2>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($bidangPac as $namaBidang => $anggota)
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition">
                    <div class="bg-green-50 px-5 py-3 border-b border-green-100">
                        <h4 class="font-bold text-[#00923F] text-center">{{ $namaBidang }}</h4>
                    </div>
                    <div class="p-5">
                        <ul class="space-y-4">
                            @foreach($anggota as $a)
                                <li class="flex flex-col">
                                    <span class="text-[11px] font-bold text-gray-400 uppercase tracking-wide">{{ $a->jabatan }}</span>
                                    <span class="font-semibold text-gray-800">{{ $a->nama }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</div>
@endsection