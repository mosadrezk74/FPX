<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PlayerResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'name_ar'=>$this->name_ar,
            'name_en'=>$this->name_en,
            'email'=>$this->email,
            'password'=>$this->password,
            'photo'=>$this->photo,
            'position'=>$this->position,
            'nationality'=>$this->nationality,
            'club_id'=>$this->club_id,
        ];
    }
}
