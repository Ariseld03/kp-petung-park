<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Staff extends Authenticatable
{
    // use HasFactory;
    protected $table = 'staffs';

    public function gallery()
    {
        return $this->belongsTo(Gallery::class, 'gallery_id', 'id');
    }
    public function agendas()
    {
        return $this->hasMany(Agenda::class, 'staff_email', 'email');
    }
    public function generics()
    {
        return $this->hasMany(Generic::class, 'staff_email', 'email');
    }
    public function menus()
    {
        return $this->hasMany(Menu::class, 'staff_email', 'email');
    }
    public function articles()
    {
        return $this->hasMany(Article::class, 'staff_email', 'email');
    }
}
