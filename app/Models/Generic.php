<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Generic extends Model
{
    // use HasFactory;
    protected $table = 'generic';
    public function staff()
    {
        return $this->belongsTo(Staff::class, 'staff_email', 'email');
    }
}
