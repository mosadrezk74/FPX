<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Club;

use App\Models\Player;
use App\Trait\GeneralTrait;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    use GeneralTrait;

    public function get_coaches_api(){

        $coaches=Coach::get();
        return response()->json($coaches);
    }
    public function get_coaches_by_id_api(Request $request){
        $coach=Coach::get()->find($request->id);
        if(!$coach){
            return $this->returnError('001','مفيش مدرب مسجل بالرقم دا .. حاول تاني ');
        }
        return $this->returnData('coach_info',$coach,'تم تحميل بيانات المدرب بنجاح');

    }
    //-------------------------------------------------------------------------------------------------------------------
    //-------------------------------------------------------------------------------------------------------------------

    public function get_players_api(){

        $players=Player::get();
        return response()->json($players);
    }
    public function get_players_by_id_api(Request $request){
        $player=Player::get()->find($request->id);
        if(!$player){
            return $this->returnError('001','مفيش لاعب مسجل بالرقم دا .. حاول تاني ');
        }
        return $this->returnData('player_info',$player,'تم تحميل بيانات اللاعب بنجاح');

    }


    //-------------------------------------------------------------------------------------------------------------------
    //-------------------------------------------------------------------------------------------------------------------

    public function admin_api(){

        $admins=Admin::get();
        return response()->json($admins);
    }

















}
