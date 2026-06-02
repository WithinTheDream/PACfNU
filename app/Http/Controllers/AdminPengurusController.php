<?php

namespace App\Http\Controllers;

use App\Models\Pengurus;
use Illuminate\Http\Request;

class AdminPengurusController extends Controller
{
    public function index()
    {
        // Menampilkan semua data pengurus, diurutkan dari yang terbaru
        $pengurus = Pengurus::latest()->get();
        return view('admin.pengurus.index', compact('pengurus'));
    }

    public function create()
    {
        return view('admin.pengurus.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori' => 'required|in:PAC,Lembaga',
            'jabatan'  => 'required|string|max:255',
            'nama'     => 'required|string|max:255',
            'bidang'   => 'nullable|string|max:255', // Boleh kosong untuk pengurus inti
        ]);

        Pengurus::create($request->all());

        return redirect()->route('pengurus.index')->with('success', 'Data pengurus berhasil ditambahkan!');
    }

    public function edit(Pengurus $penguru) // Laravel otomatis memotong 's', jadi $penguru
    {
        return view('admin.pengurus.edit', compact('penguru'));
    }

    public function update(Request $request, Pengurus $penguru)
    {
        $request->validate([
            'kategori' => 'required|in:PAC,Lembaga',
            'jabatan'  => 'required|string|max:255',
            'nama'     => 'required|string|max:255',
            'bidang'   => 'nullable|string|max:255',
        ]);

        $penguru->update($request->all());

        return redirect()->route('pengurus.index')->with('success', 'Data pengurus berhasil diupdate!');
    }

    public function destroy(Pengurus $penguru)
    {
        $penguru->delete();
        return redirect()->route('pengurus.index')->with('success', 'Data pengurus berhasil dihapus!');
    }
}