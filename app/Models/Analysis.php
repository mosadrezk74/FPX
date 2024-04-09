<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Analysis extends Authenticatable
{
    public $guard = 'analysis';
    protected $table = 'analysis_table';
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name_ar',
        'name_en',
        'email',
        'photo',
        'password',
        'status',

    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',

    ];

    use HasFactory;


}
