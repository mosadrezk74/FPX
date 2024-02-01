<?php

namespace App\Models;

 use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Coach extends Authenticatable
{
    public $guard = 'coach';


    protected $fillable = [
        'name_ar',
        'name_en',
        'email',
        'photo',
        'password',
        'nationality',
        'age'
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



    use HasFactory;

    public function club(){
        return $this->belongsTo(Club::class,'club_id','id');
    }
    public function players()
    {
        return $this->hasMany(Player::class);
    }
}
