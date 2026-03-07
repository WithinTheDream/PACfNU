<?php

use Illuminate\Support\Facades\Route;
use App\Models\Article;
use App\Models\Event;

Route::get('/', function () {
    // Ambil 3 berita terbaru yang statusnya 'published'
    $articles = Article::where('status', 'published')->latest()->take(3)->get();
    
    // Ambil 3 acara terdekat yang statusnya 'upcoming'
    $events = Event::where('status', 'upcoming')->orderBy('event_date', 'asc')->take(3)->get();

    // Kirim datanya ke file welcome.blade.php
    return view('welcome', compact('articles', 'events'));
});