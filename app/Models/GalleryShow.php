<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryShow extends Model
{
    use HasFactory;
    protected $table = 'gallery_shows';
    public function gallery()
    {
        return $this->belongsTo(Gallery::class, 'gallery_id', 'id');
    }
}