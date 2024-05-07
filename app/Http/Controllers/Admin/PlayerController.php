<?php

namespace App\Http\Controllers\Admin;
use App\Models\Club;
use App\Models\Statistics;
use App\Models\User;
use App\MyEvent;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Controller;
use App\Models\Player;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PlayerController extends Controller
{

     public function index()
    {
        $players = \App\Models\Player::with('club', 'stat')->get();
        $clubs = \App\Models\Club::all();
        $notifications = \App\Models\Notification::all();

        return view('Dashboard.Players.index', compact('players', 'clubs', 'notifications'));
    }




    public function create()
    {
        $players = \App\Models\Player::with('club')->get();
        $clubs = \App\Models\Club::all();
        $notifications = \App\Models\Notification::all();
        $client = new Client();
        $response = $client->get('https://restcountries.com/v3.1/all');
        $countries = json_decode($response->getBody(), true);
        $countries = array_filter($countries, function ($country) {
            return $country['name']['common'] !== 'Israel';
        });
        $northAmerica = ["ca", "us", "mx"];
        $asia = ["cn", "jp", "in"];
        $countries = array_filter($countries, function ($country) use ($northAmerica, $asia) {
            $countryCode = strtolower($country['cca2']);
            return !in_array($countryCode, array_merge($northAmerica, $asia));
        });
        $player_stats=Statistics::all();
        $countries = collect($countries)->sortBy('name.common')->all();



        return view('Dashboard.Players.create',
            ['countries' => $countries],
            compact('players' ,'clubs','notifications' , 'player_stats' ));

    }


    public function store(Request $request)
    {
        try {

            $rules = [
                'name_ar' => 'required|string|max:25',
                'name_en' => 'required|string|max:25',
                'nationality' => 'required|string|max:25',
                'position' => 'required|string|max:50',
                'club_id' => 'required|exists:clubs,id',
                'email' => 'required|email|unique:players,email',
                'password' => 'required|string|min:6',
                'photo' => 'required',


            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return redirect()->route('player.create')
                    ->withErrors($validator)
                    ->withInput();
            }

            $players = new \App\Models\Player();
            $players->name_ar = $request->name_ar;
            $players->name_en = $request->name_en;
            $players->nationality = $request->nationality;

            $players->position = $request->position;
            $players->stat_id  = $request->stat_id ;
            $players->club_id = $request->club_id;
            $players->email = $request->email;
            $players->password = password_hash($request->password, PASSWORD_BCRYPT);
            $players->photo=$request->photo;

//            if ($request->hasFile('photo')) {
//                $file = $request->file('photo');
//                $extension = $file->getClientOriginalExtension();
//                $filename = time() . '.' . $extension;
//                $file->move('uploads/players/', $filename);
//                $players->photo = $filename;
//            }
            $players->save();
            ###############################
            ###############################
            $data = [
                'name_ar' => $players->name_ar,
                'nationality' => $players->nationality,
            ];
            event(new MyEvent($data));

            session()->flash('add');

            return redirect()->route('player.create');
        } catch (ValidationException $e) {

            return redirect()->route('player.create')
                ->withErrors($e->validator)
                ->withInput();
        } catch (\Exception $e) {

            return redirect()->route('player.create');
        }



    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy($id)
    {
        try {
            $player = \App\Models\Player::findOrFail($id);

            if ($player->photo) {
                $photoPath = public_path('uploads/players/' . $player->photo);
                if (file_exists($photoPath)) {
                    unlink($photoPath);
                }
            }

            $player->delete();

            session()->flash('delete');

            return redirect()->route('player.index');
        } catch (\Exception $e) {
            return redirect()->route('player.index')->withErrors(['error' => 'An error occurred. Please try again.']);
        }
    }

    public function getAvailableShirtNumbers($club_id)
    {
        $takenShirtNumbers = \App\Models\Player::where('club_id', $club_id)->pluck('shirt_number')->toArray();

        $allShirtNumbers = range(1, 99);
        $availableShirtNumbers = array_diff($allShirtNumbers, $takenShirtNumbers);
        \Log::info('Club ID: ' . $club_id);
        \Log::info('Available Shirt Numbers: ' . implode(', ', $availableShirtNumbers));

        return response()->json($availableShirtNumbers);
    }



}
