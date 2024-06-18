<?php

namespace App\Models;

 use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
 use Tymon\JWTAuth\Contracts\JWTSubject;

 class Coach extends Authenticatable implements JWTSubject
{
     protected $table = 'coaches';
     protected $primaryKey = 'id';
     use HasApiTokens, HasFactory, Notifiable;

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

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


    protected $casts = [
        'email_verified_at' => 'datetime',

    ];



    use HasFactory;

    public function club(){
        return $this->belongsTo(Club::class,'club_id','id');
    }
     public function players()
     {
         return $this->hasManyThrough(Player::class, Club::class);
     }

    public function country(){

        return $this->belongsTo(Country::class,'nationality','id');

    }









}
