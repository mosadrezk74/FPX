<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Club extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;


     public $guard = 'club';

     protected $table = 'clubs';
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
        return $this->hasOne(Coach::class);
    }


    public function history()
    {
        return $this->hasOne(History::class);
    }


    public function table()
    {
        return $this->hasMany(Standing::class);
    }


    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }


























    use HasFactory;
}
