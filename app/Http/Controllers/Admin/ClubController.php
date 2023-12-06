<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Club;
use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClubController extends Controller
{

    public function index()
    {
        $clubs = Club::paginate(3);

        return view('Dashboard.Clubs.index' , compact('clubs') );
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $clubs=new Club();
        $clubs->name_ar=$request->name_ar;
        $clubs->name_en=$request->name_en;
        $clubs->email = $request->email;
        $clubs->password = password_hash($request->password, PASSWORD_BCRYPT);
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('uploads/club_logo/', $filename);
            $clubs->image = $filename;
        }
        $clubs->date=$request->date;
        $clubs->save();
        session()->flash('add');
        return redirect()->route('club.index');

    }

    public function show($clubId)
    {
        $club=Club::findorFail($clubId);
        $players = Player::where('club_id', $clubId)->get();

        $count_players=$players->count();

        return view('Dashboard.Clubs.show', ['club' => $club]
        , compact('players' , 'count_players' )
        );

    }


    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        //
    }


    function destroy($club)
    {
        $to_delete = Club::findorfail($club);
        $to_delete ->delete();
        return redirect() -> route('club.index');
    }
}
