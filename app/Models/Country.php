<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table='countries';

    use HasFactory;


    public function coach()
    {
        return $this->hasOne(Coach::class);
    }

    public function player()
    {
        return $this->hasOne(Player::class);
    }

}
