<?php

namespace App\Http\Controllers;

use App\Http\Requests\Api\CrudRequest;
use App\Models\Admin;
use App\Models\Club;
use App\Models\Coach;
use App\Models\Player;
use App\Models\Standing;
use App\Models\Statistics;
use App\Trait\GeneralTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ApiController extends Controller
{
    use GeneralTrait;

    public function get_clubs_api(){

        $clubs=Club::get();
        return response()->json($clubs);
    }
    public function get_club_by_id_api(Request $request){
        $club=Club::get()->find($request->id);
        if(!$club){
            return $this->returnError('001','مفيش  نادي مسجل بالرقم دا .. حاول تاني ');
        }
        return $this->returnData('club_info',$club,'تم تحميل بيانات النادي بنجاح');

    }

    public function get_coaches_api()
    {
        $coaches = Coach::get();
        return response()->json($coaches);
    }

    public function get_coaches_by_id_api(Request $request)
    {
        $coach = Coach::find($request->id);
        if (!$coach) {
            return $this->returnError('001', 'مفيش مدرب مسجل بالرقم دا .. حاول تاني ');
        }
        return $this->returnData('coach_info', $coach, 'تم تحميل بيانات المدرب بنجاح');
    }

    //-------------------------------------------------------------------------------------------------------------------
    //-------------------------------------------------------------------------------------------------------------------

    public function get_players_api()
    {
        $players = Player::get();
        return response()->json($players);
    }

    public function get_players_by_id_api(Request $request)
    {
        $player = Player::find($request->id);
        if (!$player) {
            return $this->returnError('001', 'مفيش لاعب مسجل بالرقم دا .. حاول تاني ');
        }
        return $this->returnData('player_info', $player, 'تم تحميل بيانات اللاعب بنجاح');
    }

    //-------------------------------------------------------------------------------------------------------------------
    //-------------------------------------------------------------------------------------------------------------------


    public function get_table()
    {
        $table = Standing::get();
        return response()->json($table);
    }

















}
