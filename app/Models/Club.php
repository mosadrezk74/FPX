<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
   protected $table = 'clubs';

    public function player()
    {
        return $this->hasMany(Player::class);
    }

    use HasFactory;
}
