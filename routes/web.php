<?php

use Illuminate\Support\Facades\Route;
use App\Models\Article;
use App\Models\Event;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AdminArticleController;
use App\Http\Controllers\AdminPengurusController;
use App\Http\Controllers\AdminGalleryController;

// 1. Rute Frontend (Public)
Route::get('/', function () {
    $articles = App\Models\Article::where('status', 'published')->latest()->take(6)->get();
    $events = App\Models\Event::where('status', 'upcoming')->orderBy('event_date', 'asc')->take(3)->get();
    
    return view('welcome', compact('articles', 'events'));
});

// profil
Route::get('/profil/visi-misi', function () {
    return view('profil.visi-misi');
});
Route::get('/profil/sejarah', function () {
    return view('profil.sejarah');
});
// Rute khusus Struktur Organisasi Biasa / PAC
Route::get('/profil/struktur', function () {
    $pengurusPacInti = App\Models\Pengurus::where('kategori', 'PAC')->whereNull('bidang')->get();
    $bidangPac = App\Models\Pengurus::where('kategori', 'PAC')->whereNotNull('bidang')->get()->groupBy('bidang');
    return view('struktur-pac', compact('pengurusPacInti', 'bidangPac'));
});

// lembaga
Route::get('/lembaga/struktur', function () {
    // Ambil penanggungjawab (yang bidangnya kosong)
    $lembagaInti = App\Models\Pengurus::where('kategori', 'Lembaga')->whereNull('bidang')->get();
    // Ambil daftar lembaganya
    $pengurusLembaga = App\Models\Pengurus::where('kategori', 'Lembaga')->whereNotNull('bidang')->get()->groupBy('bidang');
    
    return view('struktur-lembaga', compact('lembagaInti', 'pengurusLembaga'));
});

// Rute khusus Berita Lembaga
Route::get('/lembaga/berita', function () {
    $articles = App\Models\Article::where('status', 'published')->where('jenis', 'lembaga')->latest()->get();
    return view('berita-lembaga', compact('articles'));
});

Route::get('/galeri', function () {
    // Kelompokkan semua gambar berdasarkan kategori
    $galleriesGrouped = App\Models\Gallery::latest()->get()->groupBy('kategori');
    return view('gallery', compact('galleriesGrouped'));
});

Route::get('/berita', function () {
    $articles = App\Models\Article::where('status', 'published')->where('jenis', 'biasa')->latest()->get();
    return view('berita', compact('articles'));
});

Route::get('/berita/{slug}', function ($slug) {
    // Cari berita berdasarkan slug-nya, kalau nggak ada langsung munculin 404
    $article = App\Models\Article::where('slug', $slug)->where('status', 'published')->firstOrFail();
    return view('berita-detail', compact('article'));
});

Route::get('/kontak', function () {
    return view('kontak');
});

// 2. Rute Authentication
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rute Admin Dashboard
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    });
    
    Route::resource('articles', ArticleController::class);
    Route::resource('events', EventController::class);
    Route::resource('articles', AdminArticleController::class);
    Route::resource('pengurus', AdminPengurusController::class);
    Route::resource('galleries', AdminGalleryController::class);
});

// Rute Admin Dashboard
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard'); // Memanggil view admin/dashboard.blade.php
    });
});