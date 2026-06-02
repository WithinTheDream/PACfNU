<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    // Izinkan mass assignment
    protected $guarded = [];

    // Relasi: 1 Galeri dimiliki oleh 1 Artikel (Berita)
    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}