<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
    // use HasFactory;
    protected $table = 'travels';
    public function galleries()
    {
        return $this->belongsToMany(Gallery::class, 'travel_gallery', 'travel_id', 'gallery_id');
    }
}