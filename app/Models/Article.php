<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function images() { return $this->hasMany(ArticleImage::class); }
    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }
    protected $guarded = [];
}