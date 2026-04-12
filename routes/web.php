<?php

use Illuminate\Support\Facades\Route;
use App\Models\Article;
use App\Models\Event;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ArticleController;

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
Route::get('/profil/struktur', function () {
    return view('profil.struktur');
});

Route::get('/berita', function () {
    $articles = App\Models\Article::where('status', 'published')->latest()->get();
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
});

// Rute Admin Dashboard
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard'); // Memanggil view admin/dashboard.blade.php
    });
});