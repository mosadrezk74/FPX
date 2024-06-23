<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Club;
use App\Models\Coach;
use App\Models\Player;
use App\Trait\GeneralTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClubController extends Controller
{
    use GeneralTrait;

    public function index()
    {
        $clubs = Club::all();

        return view('Dashboard.Clubs.index', compact('clubs'));
    }

    public function store(Request $request)
    {
        $clubs = new Club();
        $clubs->select_name = $request->select_name;
        $clubs->status = $request->status;
        $clubs->email = $request->email;
        $clubs->password = password_hash($request->password, PASSWORD_BCRYPT);
        $clubs->save();
        session()->flash('success', trans('index.added_successfully'));
        return redirect()->route('club.index');
    }

    public function show($clubId)
    {
        $club = Club::with('coach')->findOrFail($clubId);
        $players = Player::where('club_id', $clubId)->get();
        $count_players = $players->count();

        return view('Dashboard.Clubs.show', compact('club', 'players', 'count_players'));
    }

    function destroy($club)
    {
        $to_delete = Club::findorfail($club);
        $to_delete->delete();
        return redirect()->route('club.index');
    }



    public function toggleStatus($status, $id)
    {
        $club = Club::find($id);
        $club->status = $status;
        $club->save();

        return redirect()->route('club.index')
            ->with('message', 'Club status successfully updated.');
    }
}
