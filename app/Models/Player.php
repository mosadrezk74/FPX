<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Player extends Authenticatable implements JWTSubject
{

    use HasApiTokens, HasFactory, Notifiable;

//    public $guard = 'club';

    protected $primaryKey = 'id';
    use Notifiable;
    protected $table = 'players';
     public function unreadNotifications()
    {
        return $this->notifications()->whereNull('read_at');
    }


    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

//    protected $table = 'players';

    protected $fillable = [
        'name_ar',
        'name_en'
        ,'email',
        'password',
        'photo',
        'position',
        'nationality',
        'club_id',
        'stat_id',

        ];
    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',

    ];

    public function club(){
        return $this->belongsTo(Club::class,'club_id','id');
    }
    public function coach()
    {
        return $this->belongsTo(Coach::class);
    }

    public function stat()
    {
        return $this->belongsTo(Statistics::class, 'stat_id');
    }


    public function task()
    {
        return $this->belongsTo(Task::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class,'nationality','id');

    }

    public function getAgeInYearsAttribute()
    {
        return Carbon::parse($this->attributes['age'])->age;
    }
}
