<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminGalleryController extends Controller
{
    public function index()
    {
        // Ambil data galeri beserta data artikel yang berelasi
        $galleries = Gallery::with('article')->latest()->get();
        return view('admin.galleries.index', compact('galleries'));
    }

    public function create()
    {
        // Ambil artikel untuk pilihan dropdown relasi
        $articles = Article::latest()->get();
        return view('admin.galleries.create', compact('articles'));
    }

   public function store(Request $request)
{
    $request->validate([
        'kategori' => 'required|string|max:255',
        'images'   => 'required|array',
        'images.*' => 'image|mimes:jpeg,png,jpg|max:2048' // Validasi per file
    ]);

    // Looping semua gambar yang diupload
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
        $articles = Article::latest()->get();
        return view('admin.galleries.edit', compact('gallery', 'articles'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'image'      => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'caption'    => 'nullable|string|max:255',
            'article_id' => 'nullable|exists:articles,id'
        ]);

        $data = [
            'caption'    => $request->caption,
            'article_id' => $request->article_id,
        ];

        // Jika user mengupload gambar baru
        if ($request->hasFile('image')) {
            // Hapus gambar lama dari storage
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