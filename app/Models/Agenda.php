<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    // use HasFactory;
    // Specify the table if it's not following Laravel's naming convention
    protected $table = 'agendas';
    protected $fillable = [
        'event_name',
        'event_start_date',
        'event_end_date',
        'event_location',
        'status',
        'description',
        'staff_email',
    ];

    // Define the relationship with Staff
    public function staff()
    {
        return $this->belongsTo(Staff::class, 'staff_email', 'email');
    }
    public function articles()
    {
        return $this->hasMany(Article::class, 'agenda_id', 'id');
    }
}
