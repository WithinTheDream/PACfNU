<?php

namespace App\Http\Controllers;

use App\Models\Pengurus;
use Illuminate\Http\Request;

class AdminPengurusController extends Controller
{
    public function index(Request $request)
    {
        $kategori = $request->query('kategori', 'PAC'); 
        
        // Tarik data pengurus dan kelompokkan otomatis berdasarkan Bidang
        $pengurus = Pengurus::where('kategori', $kategori)
            ->orderByRaw("COALESCE(bidang, '0_INTI') ASC") // Trik agar pengurus inti (tanpa bidang) muncul di paling atas
            ->orderBy('position', 'asc')
            ->get();

        // Kelompokkan koleksi data
        $groupedPengurus = $pengurus->groupBy(function($item) {
            return $item->bidang ?: 'Pengurus Harian / Inti';
        });
        
        return view('admin.pengurus.index', compact('groupedPengurus', 'kategori'));
    }

    // Tambahkan ini di dalam class AdminPengurusController
    public function reorder(Request $request)
    {
        // Terima data urutan dari frontend
        foreach ($request->order as $order) {
            // Update posisi berdasarkan ID
            \App\Models\Pengurus::where('id', $order['id'])->update(['position' => $order['position']]);
        }
        return response()->json(['status' => 'success']);
    }

    public function create()
    {
        return view('admin.pengurus.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'kategori' => 'required|in:PAC,Lembaga'
        ]);

        Pengurus::create($data);

        // FIX: Redirect kembali ke halaman kategori yang baru saja diinput
        return redirect()->route('pengurus.index', ['kategori' => $request->kategori])
                         ->with('success', 'Data pengurus berhasil ditambahkan!');
    }

    public function edit($id)
    {
        // FIX: Tarik data dari database dan kirim dengan variabel $pengurus
        $pengurus = Pengurus::findOrFail($id);
        
        return view('admin.pengurus.edit', compact('pengurus'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'kategori' => 'required|in:PAC,Lembaga'
        ]);

        $pengurus = Pengurus::findOrFail($id);
        $pengurus->update($data);

        // FIX: Redirect kembali ke halaman kategori yang baru saja diedit
        return redirect()->route('pengurus.index', ['kategori' => $request->kategori])
                         ->with('success', 'Data pengurus berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $pengurus = Pengurus::findOrFail($id);
        $pengurus->delete();
        
        return back()->with('success', 'Data pengurus berhasil dihapus!');
    }
}