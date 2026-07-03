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
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'required|in:draft,published'
        ]);

        $data['slug'] = Str::slug($request->title); // Buat URL unik

        // Proses simpan gambar ke public/storage/articles
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('articles', 'public');
        }

        Article::create($data);
        return redirect()->route('articles.index')->with('success', 'Berita berhasil diterbitkan!');
    }

    public function edit(Article $article)
    {
        return view('admin.articles.edit', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'required|in:draft,published'
        ]);

        $data['slug'] = Str::slug($request->title);

        // Jika ada gambar baru yang diupload, hapus gambar lama
        if ($request->hasFile('image')) {
            if ($article->image) {
                Storage::disk('public')->delete($article->image);
            }
            $data['image'] = $request->file('image')->store('articles', 'public');
        }

        $article->update($data);
        return redirect()->route('articles.index')->with('success', 'Berita berhasil diperbarui!');
    }

    public function destroy(Article $article)
    {
        // Hapus gambar fisik dari server biar tidak menuhin memori
        if ($article->image) {
            Storage::disk('public')->delete($article->image);
        }
        
        $article->delete();
        return back()->with('success', 'Berita berhasil dihapus!');
    }
}