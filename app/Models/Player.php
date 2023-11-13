<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Player extends Authenticatable
{

    public $guard = 'club';

    protected $fillable = [
        'name_ar',
        'name_en',
        'email',
        'password',
        'photo',
        'nationality',
        'age',
        'height',
        'position',
        'shirt_number',


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



    public function club(){
        return $this->belongsTo(Club::class,'club_id','id');
    }
}
