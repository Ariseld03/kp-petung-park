<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $table = 'menus';
    public function user()
    {
        return $this->belongsTo(Staff::class, 'user_id', 'id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function gallery()
    {
        return $this->hasOne(Gallery::class, 'id', 'gallery_id');
    }
    // Define the many-to-many relationship with Package
    public function packages()
    {
        return $this->belongsToMany(Package::class, 'package_menus', 'menu_id', 'package_id');
    }
    
    // Define the many-to-many relationship with MenuCategory if needed
    public function menuCategories()
    {
        return $this->belongsToMany(MenuCategory::class, 'package_menus', 'menu_id', 'menu_category_id');
    }
}
