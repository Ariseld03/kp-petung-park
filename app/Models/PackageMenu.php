<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class PackageMenu extends Pivot
{
    // You can add any additional methods or properties here if needed
    protected $table = 'package_menus';

    // Optional: Specify any additional fields that should be mass assignable
    protected $fillable = ['package_id', 'menu_id', 'menu_category_id', 'status', 'created_at', 'updated_at'];
}
