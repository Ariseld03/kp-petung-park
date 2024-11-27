<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'users';
    protected $fillable = [
        'name',
        'email',
        'password',
        'date_of_birth',
        'phone_number',
        'position',
        'gender',
        'gallery_id',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function gallery()
    {
        return $this->belongsTo(Gallery::class, 'gallery_id', 'id');
    }
    public function agendas()
    {
        return $this->hasMany(Agenda::class, 'user_id', 'id');
    }
    public function generics()
    {
        return $this->hasMany(Generic::class, 'user_id', 'id');
    }
    public function menus()
    {
        return $this->hasMany(Menu::class, 'user_id', 'id');
    }
    public function articles()
    {
        return $this->hasMany(Article::class, 'user_id', 'id');
    }
}
