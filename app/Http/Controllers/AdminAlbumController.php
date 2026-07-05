<?php
namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminAlbumController extends Controller
{
    public function index() {
        // Tarik data album lengkap dengan preview foto-fotonya
        $albums = Album::with('galleries')->withCount('galleries')->latest()->get();
        return view('admin.albums.index', compact('albums'));
    }

    public function store(Request $request) {
        $request->validate([
            'nama_album' => 'required|string|max:255',
            'deskripsi'  => 'nullable|string|max:255'
        ]);

        Album::create([
            'nama_album' => $request->nama_album,
            'deskripsi'  => $request->deskripsi
        ]);
        return back()->with('success', 'Album baru berhasil dibuat!');
    }

    public function show(Album $album) {
        return view('admin.albums.show', compact('album'));
    }

    public function uploadPhotos(Request $request, Album $album) {
        $request->validate([
            'images'   => 'required|array',
            'images.*' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        foreach ($request->file('images') as $image) {
            $path = $image->store('galleries', 'public');
            Gallery::create([
                'album_id'   => $album->id,
                'image_path' => $path,
            ]);
        }
        return back()->with('success', 'Foto berhasil diupload ke album!');
    }

    public function destroyPhoto(Gallery $gallery) {
        Storage::disk('public')->delete($gallery->image_path);
        $gallery->delete();
        return back()->with('success', 'Foto dihapus!');
    }

    // INI YANG ERROR KEMARIN, NAMA FUNGSINYA SUDAH DIGANTI JADI destroy() 
    public function destroy(Album $album) {
        foreach($album->galleries as $foto) {
            Storage::disk('public')->delete($foto->image_path);
        }
        $album->delete();
        return back()->with('success', 'Album dan seluruh fotonya berhasil dihapus!');
    }
}