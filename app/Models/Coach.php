<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coach extends Model
{
    protected $table='coaches';

    use HasFactory;

    public function club(){
        return $this->belongsTo(Club::class,'club_id','id');
    }
}
