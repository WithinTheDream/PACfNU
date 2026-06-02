<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengurus extends Model
{
    use HasFactory;

    // Paksa Laravel menggunakan tabel 'pengurus', bukan 'penguruses'
    protected $table = 'pengurus'; 
    
    // Izinkan semua kolom diisi (mass assignment)
    protected $guarded = [];
}