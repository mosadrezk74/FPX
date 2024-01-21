<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistics extends Model
{

   protected $table='stats';

    public function player()
    {
        return $this->hasOne(Player::class, 'stat_id');
    }



}
