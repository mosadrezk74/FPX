<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table='tasks';

    public $timestamps=false;
     public function player()
    {
        return $this->belongsTo(Player::class);
    }
}
