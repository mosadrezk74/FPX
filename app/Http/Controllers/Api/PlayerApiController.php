<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ClubResource;
use App\Http\Resources\PlayerResource;
use App\Models\Club;
use App\Models\Player;
use App\Trait\ApiResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PlayerApiController extends Controller
{
    use ApiResponseTrait;

    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'name_ar' => 'required|string|max:25',
            'name_en' => 'required|string|max:25',
            'nationality' => 'required|string|max:25',
            'position' => 'required|string|max:50',
            'email' => 'required|email|unique:players,email',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return $this->apiResponse(null,$validator->errors(),400);
        }

        $player = Player::create($request->all());

        if($player){
            return $this->apiResponse(new PlayerResource($player),'The  player Save',201);
        }

        return $this->apiResponse(null,'The player Not Save',400);
    }


    public function update(Request $request ,$id){

        $validator = Validator::make($request->all(), [
            'name_ar' => 'required|string|max:25',
            'name_en' => 'required|string|max:25',
            'nationality' => 'required|string|max:25',
            'position' => 'required|string|max:50',
            'email' => 'required|email|unique:players,email',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return $this->apiResponse(null,$validator->errors(),400);
        }

        $player=Player::find($id);

        if(!$player){
            return $this->apiResponse(null,'The  player Not Found',404);
        }

        $player->update($request->all());

        if($player){
            return $this->apiResponse(new PlayerResource($player),'The  player update',201);
        }

    }


    public function destroy($id){

        $player=Player::find($id);

        if(!$player){
            return $this->apiResponse(null,'The player Not Found',404);
        }

        $player->delete($id);

        if($player){
            return $this->apiResponse(null,'The player deleted',200);
        }

    }
}
