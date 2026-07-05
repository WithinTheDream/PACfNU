<?php

use Illuminate\Support\Facades\Route;
use App\Models\Article;
use App\Models\Event;
use App\Models\Pengurus;
use App\Models\Album;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AdminPengurusController;
use App\Http\Controllers\AdminGalleryController;
use App\Http\Controllers\AdminAlbumController; // Tambahan Controller Baru

// ==========================================
// 1. RUTE FRONTEND (PUBLIK)
// ==========================================
Route::get('/', function () {
    // 1. Ambil data berita terbaru
    $articles = \App\Models\Article::where('status', 'published')->latest()->take(6)->get();
    
    // 2. Ambil data acara terbaru
    $events = \App\Models\Event::where('status', 'upcoming')->orderBy('event_date', 'asc')->take(3)->get();
    
    // 3. Ambil 4 album galeri terbaru (INI YANG KEMARIN KETINGGALAN)
    $albums = \App\Models\Album::with('galleries')->latest()->take(4)->get();
    
    // 4. Lempar KETIGA data tersebut ke view 'welcome'
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

// --- Berita, Galeri & Kontak ---
Route::get('/lembaga/berita', function () {
    $articles = Article::where('status', 'published')->where('jenis', 'lembaga')->latest()->get();
    return view('berita-lembaga', compact('articles'));
});

Route::get('/berita', function () {
    $articles = Article::where('status', 'published')->where('jenis', 'biasa')->latest()->get();
    return view('berita', compact('articles'));
});

Route::get('/berita/{slug}', function ($slug) {
    $article = Article::where('slug', $slug)->where('status', 'published')->firstOrFail();
    return view('berita-detail', compact('article'));
});

Route::get('/galeri', function () {
    $albums = Album::with('galleries')->latest()->get();
    return view('gallery', compact('albums'));
});

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
    
    // --- Dashboard Utama ---
    Route::get('/', function () {
        // Ini kode yang benar untuk halaman welcome, BUKAN kode dashboard
        $articles = \App\Models\Article::where('status', 'published')->latest()->take(6)->get();
        $events = \App\Models\Event::where('status', 'upcoming')->orderBy('event_date', 'asc')->take(3)->get();
        $albums = \App\Models\Album::with('galleries')->latest()->take(4)->get();
        
        return view('welcome', compact('articles', 'events', 'albums'));
    });
    
    // --- Berita & Jadwal Acara ---
    // Rute untuk hapus foto secara spesifik via AJAX
    Route::delete('articles/{article}/delete-image', [ArticleController::class, 'deleteImage']);
    Route::resource('articles', ArticleController::class);
    Route::resource('events', EventController::class);
    
    // --- Pengurus ---
    Route::resource('pengurus', AdminPengurusController::class);
    // [FIX] Menghapus "/admin" di depan agar tidak menjadi /admin/admin/pengurus/reorder
    Route::post('pengurus/reorder', [AdminPengurusController::class, 'reorder'])->name('pengurus.reorder');
    
    // --- Album & Galeri Kegiatan (Sistem Baru) ---
    // [FIX] Menghapus "/admin" di depan agar tidak menjadi /admin/admin/albums
    Route::resource('albums', AdminAlbumController::class);
    Route::post('albums/{album}/upload', [AdminAlbumController::class, 'uploadPhotos'])->name('albums.photos.store');
    Route::delete('photos/{gallery}', [AdminAlbumController::class, 'destroyPhoto'])->name('photos.destroy');
    Route::delete('albums/{album}/delete', [AdminAlbumController::class, 'destroyAlbum'])->name('albums.destroy');


    // ==============================================================
    // ⚠️ BARIS DI BAWAH INI TIDAK PERLU, SILAKAN DIHAPUS SENDIRI ⚠️
    // ==============================================================
    // Route::resource('galleries', AdminGalleryController::class);
});