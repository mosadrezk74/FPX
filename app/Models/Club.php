<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Club extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


     public $guard = 'club';

    protected $fillable = [
       'name_ar',
       'name_en',
       'email',
       'password',
        'image',
        'date'
    ];
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





    public function player()
    {
        return $this->hasMany(Player::class);
    }
    public function coach()
    {
        return $this->hasMany(Coach::class);
    }

    use HasFactory;
}
