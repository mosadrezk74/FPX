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
    use Notifiable;

    protected $table = 'players';

    protected $hidden = [
        'password',
        'remember_token',
    ];
    public function unreadNotifications()
    {
        return $this->notifications()->whereNull('read_at');
    }

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
}
