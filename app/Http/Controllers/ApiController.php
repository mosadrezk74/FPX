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
use Carbon\Carbon;
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
        $topRatePlayer = Player::with(['stat', 'club'])
            ->whereIn('rate', [1, 2])
            ->inRandomOrder()
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
   public function scouting_players()
   {
       $scout=Player::with(['stat' , 'club' ])
       ->where('rate' , '=' ,5)
           ->inRandomOrder()
           ->take(10)
           ->get();
       return response()->json($scout);

   }


    public function part_clubs()
    {
        $PartClub = Club::where('status', 1)->get();

        return response()->json($PartClub);
    }

    public function show_club(Request $request)
    {
        $club = Club::with(['player', 'coach','table'])->find($request->id);

        if (!$club) {
            return response()->json(['message' => 'Club not found'], 404);
        }

        $responseData = [
            'name_ar' => $club->name_ar,
            'name_en' => $club->name_en,
            'image' => $club->image,
            'stadium_en' => $club->staduim_en,
            'stadium_ar' => $club->staduim_ar,
            'capacity' => $club->capacity,
            'date_of_est' => $club->date_of_est,
            'table' => $club->table,
            'players' => $club->player->map(function ($player) {
                return [
                    'name_ar' => $player->name_ar,
                    'name_en' => $player->name_en,
                    'position' => $player->position,
                    'age' => Carbon::now()->diffInYears($player->age),
                    'country' => $player->country,
                    'stat' => $player->stat,
                    'club' => $player->club,
                ];
            }),
            'coach' => $club->coach ? [
                'name_ar' => $club->coach->name_ar,
                'name_en' => $club->coach->name_en,
                'country' => $club->coach->country,
                'nationality' => $club->coach->nationality,
                'club_id' => $club->coach->club_id,
            ] : null,
        ];
        return response()->json($responseData);
    }


    public function show_coach(Request $request)
    {
        $coach = Coach::with(['club.player.country', 'country'])->find($request->id);


        if (!$coach) {
            return response()->json(['message' => 'Coach Not Found'], 404);
        }

        $responseData = [
            'name_ar' => $coach->name_ar,
            'name_en' => $coach->name_en,
            'photo' => $coach->photo,
            'country' => [
                'name_ar' => $coach->country->name_ar,
                'name_en' => $coach->country->name_en,
            ],
            'club' => [
                'name_ar' => $coach->club->name_ar,
                'name_en' => $coach->club->name_en,
            ],
            'players' => $coach->club->player->map(function ($player) {
                return [
                    'name_ar' => $player->name_ar,
                    'name_en' => $player->name_en,
                    'position' => $player->position,
                    'age' => Carbon::now()->diffInYears(Carbon::parse($player->date_of_birth)),
                    'country' => [
                        'name_ar' => $player->country->name_ar,
                        'name_en' => $player->country->name_en,
                    ],
                    'stat' => $player->stat,
                    'club' => [
                        'name_ar' => $player->club->name_ar,
                        'name_en' => $player->club->name_en,
                    ],
                ];
            }),
        ];


        return response()->json($responseData);
    }



    public function show_player(Request $request)
    {
        $player = Player::with(['stat', 'country' ,'club'])->find($request->id);


        if (!$player) {
            return response()->json(['message' => 'Player Not Found'], 404);
        }

        $responseData = [
            'name_ar' => $player->name_ar,
            'name_en' => $player->name_en,
            'photo' => $player->photo,
            'country' => [
                'name_ar' => $player->country->name_ar,
                'name_en' => $player->country->name_en,
            ],
            'position' => $player->position,
            'club' => $player->club,
            'stat' => $player->stat,
            'age' => $player->age,
            'height' => $player->height,
            'weight' => $player->weight,
            'shirt_number' => $player->shirt_number,
            'rate' => $player->rate,


            ];


        return response()->json($responseData);
    }





    //-------------------------------------------------------------------------------------------------------------------
    //-------------------------------------------------------------------------------------------------------------------









}
