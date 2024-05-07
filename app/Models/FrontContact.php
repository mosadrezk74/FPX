<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FrontContact extends Model
{
    protected $table='front_contact';
    public $timestamps = false;
    use HasFactory;
}
