<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $table = 'articles';
    public function galleries()
    {
        return $this->belongsToMany(Gallery::class, 'article_gallery', 'article_id', 'gallery_id');
    }
    public function staff()
    {
        return $this->belongsTo(Staff::class, 'staff_email', 'email');
    }
    public function agenda()
    {
        return $this->belongsTo(Agenda::class, 'agenda_id', 'id');
    }
}

