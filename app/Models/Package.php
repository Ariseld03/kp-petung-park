<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $table = 'packages';
    use HasFactory;
    // public function menus()
    // {
    //     return $this->belongsToMany(Menu::class, 'package_menus', 'package_id', 'menu_id');
    // }
    public function menus()
    {
        return $this->belongsToMany(Menu::class, 'package_menus', 'package_id', 'menu_id');            
    }
}
