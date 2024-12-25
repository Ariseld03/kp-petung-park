<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleGallery extends Model
{
    use HasFactory;
    protected $table = 'article_gallery';
    public function article()
    {
        return $this->belongsTo(Article::class, 'article_id');
    }

    public function gallery()
    {
        return $this->belongsTo(Gallery::class, 'gallery_id');
    }
}
