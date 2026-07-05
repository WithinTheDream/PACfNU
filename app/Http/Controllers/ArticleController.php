<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        // Ambil parameter dari URL, jika kosong default-nya adalah 'biasa' (PAC)
        $jenis = $request->query('jenis', 'biasa'); 
        
        // Tarik data dari database HANYA yang sesuai dengan jenisnya
        $articles = Article::where('jenis', $jenis)->latest()->get();
        
        // Lempar data ke view beserta variabel $jenis agar view tahu sedang di halaman apa
        return view('admin.articles.index', compact('articles', 'jenis'));
    }

    public function create()
    {
        return view('admin.articles.create');
    }

    public function store(Request $request)
    {
        // 1. Validasi Data
        $data = $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required',
            'image'   => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'status'  => 'required|in:draft,published',
            'jenis'   => 'required|in:biasa,lembaga' 
        ]);

        $data['slug'] = Str::slug($request->title); // Buat URL unik

        // 2. Proses Simpan Gambar Utama (Sampul)
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('articles', 'public');
        }

        // 3. Proses Simpan Gambar Tambahan (Multiple)
        $images = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $images[] = $file->store('articles', 'public');
            }
        }
        // Masukkan array gambar ke dalam data yang akan di-save ke database
        $data['images'] = $images;

        // 4. Simpan ke Database
        Article::create($data);
        
        return redirect()->route('articles.index', ['jenis' => $request->jenis])
                         ->with('success', 'Berita berhasil diterbitkan!');
    }

    public function edit(Article $article)
    {
        return view('admin.articles.edit', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        // 1. Validasi Data
        $data = $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required',
            'image'   => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'status'  => 'required|in:draft,published',
            'jenis'   => 'required|in:biasa,lembaga' 
        ]);

        $data['slug'] = Str::slug($request->title);

        // 2. Update Gambar Utama (Hapus lama, simpan baru)
        if ($request->hasFile('image')) {
            if ($article->image && Storage::disk('public')->exists($article->image)) {
                Storage::disk('public')->delete($article->image);
            }
            $data['image'] = $request->file('image')->store('articles', 'public');
        }

        // 3. KELOLA GAMBAR TAMBAHAN (MULTIPLE)
        $images = $article->images ?? []; 
        
        // A. Hapus gambar tambahan yang dicentang oleh user
        if ($request->has('delete_images')) {
            foreach ($request->delete_images as $hapusImg) {
                // Hapus file fisik dari storage
                if (Storage::disk('public')->exists($hapusImg)) {
                    Storage::disk('public')->delete($hapusImg);
                }
                // Cari posisi gambar tersebut di dalam array dan buang
                $key = array_search($hapusImg, $images);
                if ($key !== false) {
                    unset($images[$key]);
                }
            }
        }

        // B. Tambahkan gambar baru (jika ada upload tambahan)
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $images[] = $file->store('articles', 'public');
            }
        }

        // C. Re-index array (Sangat penting agar JSON tidak rusak/berubah jadi object)
        // Jika array kosong, kita set null agar bersih di database
        $data['images'] = empty($images) ? null : array_values($images);

        // 4. Update Database
        $article->update($data);
        
        return redirect()->route('articles.index', ['jenis' => $request->jenis])
                         ->with('success', 'Berita berhasil diperbarui!');
    }

    public function destroy(Article $article)
    {
        // 1. Hapus gambar utama fisik dari server
        if ($article->image && Storage::disk('public')->exists($article->image)) {
            Storage::disk('public')->delete($article->image);
        }

        // 2. Hapus SEMUA gambar tambahan dari server
        if (!empty($article->images)) {
            foreach ($article->images as $img) {
                if (Storage::disk('public')->exists($img)) {
                    Storage::disk('public')->delete($img);
                }
            }
        }
        
        // 3. Hapus data dari database
        $article->delete();
        
        return back()->with('success', 'Berita berhasil dihapus!');
    }
    // Fungsi khusus untuk menghapus 1 foto tambahan secara langsung
    public function deleteImage(Request $request, Article $article)
    {
        $imagePath = $request->input('image');
        $images = $article->images ?? [];

        // Cari gambar di dalam array
        $key = array_search($imagePath, $images);
        if ($key !== false) {
            // Hapus file fisik dari folder storage
            if (Storage::disk('public')->exists($imagePath)) {
                Storage::disk('public')->delete($imagePath);
            }
            // Hapus dari array
            unset($images[$key]);
            
            // Update database seketika
            $article->update(['images' => empty($images) ? null : array_values($images)]);
            
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 400);
    }
}