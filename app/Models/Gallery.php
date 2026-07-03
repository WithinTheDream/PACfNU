<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    // Izinkan mass assignment
    protected $guarded = [];

    // FUNGSI RELASI ARTICLE() DIHAPUS 
    // Karena galeri sekarang sudah mandiri berdasarkan 'kategori'
}