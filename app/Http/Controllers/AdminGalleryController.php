<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminGalleryController extends Controller
{
    public function index()
    {
        // Ambil data galeri, urutkan dari yang terbaru (tidak perlu with('article') lagi)
        $galleries = Gallery::latest()->get();
        return view('admin.galleries.index', compact('galleries'));
    }

    public function create()
    {
        // Langsung tampilkan view, tidak perlu passing data articles
        return view('admin.galleries.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori' => 'required|string|max:255',
            'images'   => 'required|array',
            'images.*' => 'image|mimes:jpeg,png,jpg|max:2048' // Validasi per file max 2MB
        ]);

        // Looping semua gambar yang diupload untuk multiple upload
        foreach ($request->file('images') as $image) {
            $path = $image->store('galleries', 'public');
            
            Gallery::create([
                'kategori'   => $request->kategori,
                'image_path' => $path,
            ]);
        }

        return redirect()->route('galleries.index')->with('success', 'Berhasil mengupload dokumentasi!');
    }

    public function edit(Gallery $gallery)
    {
        return view('admin.galleries.edit', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'kategori' => 'required|string|max:255',
            'image'    => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = [
            'kategori' => $request->kategori,
        ];

        // Jika user mengupload gambar baru untuk mengganti yang lama
        if ($request->hasFile('image')) {
            // Hapus gambar lama dari storage fisik
            if (Storage::disk('public')->exists($gallery->image_path)) {
                Storage::disk('public')->delete($gallery->image_path);
            }
            // Simpan gambar baru
            $data['image_path'] = $request->file('image')->store('galleries', 'public');
        }

        $gallery->update($data);

        return redirect()->route('galleries.index')->with('success', 'Foto galeri berhasil diupdate!');
    }

    public function destroy(Gallery $gallery)
    {
        // Hapus file fisik gambar dari storage
        if (Storage::disk('public')->exists($gallery->image_path)) {
            Storage::disk('public')->delete($gallery->image_path);
        }
        
        $gallery->delete();

        return redirect()->route('galleries.index')->with('success', 'Foto galeri berhasil dihapus!');
    }
}