<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request; // <-- Tambahan untuk menangkap filter
use App\Models\Article;
use App\Models\Event;
use App\Models\Pengurus;
use App\Models\Album;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AdminPengurusController;
use App\Http\Controllers\AdminGalleryController;
use App\Http\Controllers\AdminAlbumController;

// ==========================================
// 1. RUTE FRONTEND (PUBLIK)
// ==========================================
Route::get('/', function () {
    $articles = Article::where('status', 'published')->latest()->take(6)->get();
    $events = Event::where('status', 'upcoming')->orderBy('event_date', 'asc')->take(3)->get();
    $albums = Album::with('galleries')->latest()->take(4)->get();
    return view('welcome', compact('articles', 'events', 'albums'));
});

// --- Profil ---
Route::get('/profil/visi-misi', function () { return view('profil.visi-misi'); });
Route::get('/profil/sejarah', function () { return view('profil.sejarah'); });

// --- Struktur PAC & Lembaga ---
Route::get('/profil/struktur', function () {
    $pengurusPacInti = Pengurus::where('kategori', 'PAC')->whereNull('bidang')->orderBy('position', 'asc')->get();
    $bidangPac = Pengurus::where('kategori', 'PAC')->whereNotNull('bidang')->orderBy('position', 'asc')->get()->groupBy('bidang');
    return view('struktur-pac', compact('pengurusPacInti', 'bidangPac'));
});

Route::get('/lembaga/struktur', function () {
    $lembagaInti = Pengurus::where('kategori', 'Lembaga')->whereNull('bidang')->orderBy('position', 'asc')->get();
    $pengurusLembaga = Pengurus::where('kategori', 'Lembaga')->whereNotNull('bidang')->orderBy('position', 'asc')->get()->groupBy('bidang');
    return view('struktur-lembaga', compact('lembagaInti', 'pengurusLembaga'));
});

// FITUR FILTER & SEARCH BERITA LEMBAGA (Baru)
Route::get('/lembaga/berita', function (Illuminate\Http\Request $request) {
    $query = Article::where('status', 'published')->where('jenis', 'lembaga');

    // Filter Pencarian Judul
    if ($request->has('cari') && $request->cari != '') {
        $query->where('title', 'like', '%' . $request->cari . '%');
    }
    // Filter Bulan
    if ($request->has('bulan') && $request->bulan != '') {
        $query->whereMonth('created_at', $request->bulan);
    }
    // Filter Tahun
    if ($request->has('tahun') && $request->tahun != '') {
        $query->whereYear('created_at', $request->tahun);
    }

    // Urutkan dari terbaru, batasi 9 berita per halaman (karena 3 kolom)
    $articles = $query->latest()->paginate(9)->withQueryString();
    
    return view('berita-lembaga', compact('articles'));
});

// FITUR FILTER & SEARCH BERITA PAC (Diperbarui)
Route::get('/berita', function (Request $request) {
    $query = Article::where('status', 'published')->where('jenis', 'biasa');

    // Filter Pencarian Judul
    if ($request->has('cari') && $request->cari != '') {
        $query->where('title', 'like', '%' . $request->cari . '%');
    }
    // Filter Bulan
    if ($request->has('bulan') && $request->bulan != '') {
        $query->whereMonth('created_at', $request->bulan);
    }
    // Filter Tahun
    if ($request->has('tahun') && $request->tahun != '') {
        $query->whereYear('created_at', $request->tahun);
    }

    // Urutkan dari terbaru, batasi 6 berita per halaman agar rapi
    $articles = $query->latest()->paginate(6)->withQueryString();
    
    return view('berita', compact('articles'));
});

Route::get('/berita/{slug}', function ($slug) {
    $article = Article::where('slug', $slug)->where('status', 'published')->firstOrFail();
    return view('berita-detail', compact('article'));
});

// FITUR SEARCH GALERI (Cukup satu ini saja)
Route::get('/galeri', function (Illuminate\Http\Request $request) {
    $query = Album::with('galleries');
    
    // Pencarian berdasarkan nama album
    if ($request->has('cari') && $request->cari != '') {
        $query->where('nama_album', 'like', '%' . $request->cari . '%');
    }
    
    $albums = $query->latest()->get();
    return view('gallery', compact('albums'));
});

Route::get('/kontak', function () { return view('kontak'); });

Route::get('/kontak', function () { return view('kontak'); });

// ==========================================
// 2. RUTE AUTENTIKASI
// ==========================================
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ==========================================
// 3. RUTE ADMIN DASHBOARD
// ==========================================
Route::prefix('admin')->middleware('auth')->group(function () {
    
    // --- Dashboard Utama (DIKEMBALIKAN KE KODE ASLI) ---
    Route::get('/', function () {
        $totalBerita = Article::where('jenis', 'biasa')->count();
        $totalAcara = Event::where('status', 'upcoming')->count();
        $totalPengurus = Pengurus::count();
        $totalGaleri = Album::count(); 
        
        return view('admin.dashboard', compact('totalBerita', 'totalAcara', 'totalPengurus', 'totalGaleri'));
    });
    
    // --- Berita & Jadwal Acara ---
    Route::delete('articles/{article}/delete-image', [ArticleController::class, 'deleteImage']);
    Route::resource('articles', ArticleController::class);
    Route::resource('events', EventController::class);
    
    // --- Pengurus ---
    Route::resource('pengurus', AdminPengurusController::class);
    Route::post('pengurus/reorder', [AdminPengurusController::class, 'reorder'])->name('pengurus.reorder');
    
    // --- Album & Galeri Kegiatan ---
    Route::resource('albums', AdminAlbumController::class);
    Route::post('albums/{album}/upload', [AdminAlbumController::class, 'uploadPhotos'])->name('albums.photos.store');
    Route::delete('photos/{gallery}', [AdminAlbumController::class, 'destroyPhoto'])->name('photos.destroy');
    Route::delete('albums/{album}/delete', [AdminAlbumController::class, 'destroyAlbum'])->name('albums.destroy');
});