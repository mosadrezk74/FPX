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
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

        $players = Player::with('club', 'stat')->get();
        
        $transformedPlayers = $players->map(function ($player) {
            return [
                'id' => $player->id,
                'name_ar' => $player->name_ar,
                'name_en' => $player->name_en,
                'photo' => $player->photo,
                'position' => $player->position,
                'nationality' => $player->nationality,
                'club' => $player->club,
                'stats' => $player->stat,
                'email' => $player->email,
                'created_at' => $player->created_at,
                'updated_at' => $player->updated_at,
            ];
        });

        return response()->json($transformedPlayers);
    }


    public function get_players_by_id_api(Request $request)
    {
        $player = Player::find($request->id);
        if (!$player) {
            return $this->returnError('001', 'مفيش لاعب مسجل بالرقم دا .. حاول تاني ');
        }
        return $this->returnData('player_info', $player, 'تم تحميل بيانات اللاعب بنجاح');
    }

    public function get_all_stats()
    {
        $stats=Statistics::all();
        return response()->json($stats);
    }

    public function get_stats_by_id_api(Request $request)
    {
        $stats = Statistics::find($request->id);
        if (!$stats) {
            return $this->returnError('001', 'مفيش لاعب مسجل بالرقم دا .. حاول تاني ');
        }
        return $this->returnData('player_info', $stats, 'تم تحميل احصائيات اللاعب بنجاح');
    }



    //-------------------------------------------------------------------------------------------------------------------
    //-------------------------------------------------------------------------------------------------------------------


    public function get_table()
    {
        $table = Standing::get();
        return response()->json($table);
    }

    public function top_player()
    {
        $topGoalScorer = Player::join('stats', 'players.stat_id', '=', 'stats.id')
            ->orderByDesc('stats.Goals')
            ->select('players.*', 'stats.Goals as Goals')
            ->take(10)
            ->get();

        return response()->json($topGoalScorer);
    }
    #############################################
    public function top_assist()
    {
        $topAssister = Player::join('stats', 'players.stat_id', '=', 'stats.id')
            ->orderByDesc('stats.Assists')
            ->select('players.*', 'stats.Assists as Assists')
            ->take(10)
            ->get();

        return response()->json($topAssister);
    }

    public function top_rating()
    {
        $topRatePlayer = Player::join('stats', 'players.stat_id', '=', 'stats.id')
            ->orderByDesc('stats.SoT')
            ->select('players.*', 'stats.SoT as SoT')
            ->take(10)
            ->get();

        return response()->json($topRatePlayer);
    }
   public function top_xg()
   {
       $topXG = Player::join('stats', 'players.stat_id', '=', 'stats.id')
           ->orderByDesc('stats.SoT')
           ->select('players.*', 'stats.SoT as SoT')
           ->take(10)
           ->get();

       return response()->json($topXG);

   }
   public function top_xa()
   {
       $topXA = Player::join('stats', 'players.stat_id', '=', 'stats.id')
           ->orderByDesc('stats.PasAss')
           ->select('players.*', 'stats.PasAss as PasAss')
           ->take(10)
           ->get();

       return response()->json($topXA);

   }

   public function xg_xa()
   {
       $topXGA = Player::join('stats', 'players.stat_id', '=', 'stats.id')
           ->orderByDesc('stats.GCA')
           ->select('players.*', 'stats.GCA as GCA')
           ->take(10)
           ->get();

       return response()->json($topXGA);
   }

   public function top_key_pass()
   {
       $top_Passes=Player::join('stats', 'players.stat_id', '=', 'stats.id')
           ->orderByDesc('stats.Pas3rd')
           ->select('players.*', 'stats.Pas3rd as Pas3rd')
           ->take(10)
           ->get();
       return response()->json($top_Passes);

   }






    //-------------------------------------------------------------------------------------------------------------------
    //-------------------------------------------------------------------------------------------------------------------









}
