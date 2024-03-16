<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Analysis extends Authenticatable
{
    public $guard='analysis';

    protected $fillable=[
        'name_ar',
        'name_en',
        'email',
        'photo',
        'password',
        'status'

    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];

    use HasFactory;
}
