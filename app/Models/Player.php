<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
   protected $table = 'players';
    public function club(){
        return $this->belongsTo(Club::class,'club_id','id');
    }
}
