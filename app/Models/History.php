<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $table='history';
    public function club(){
        return $this->belongsTo(Club::class);
    }

    use HasFactory;
}
