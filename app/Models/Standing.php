<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Standing extends Model
{
    use HasFactory;
    protected $table = 'standings';
    public function club(){
        return $this->belongsTo(Club::class,'club_id','id');
    }
}
