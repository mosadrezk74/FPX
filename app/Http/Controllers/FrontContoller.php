<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\FrontContact;
use App\Models\FrontSend;
use App\Models\Join;
use App\Models\Player;
use Illuminate\Http\Request;

class FrontContoller extends Controller
{
    public function index()
    {
        $clubs_count=Club::all()->where('status',1)->count();
        $clubs=Club::all()->where('status',1);
        $player_count=Player::all()->count();

        ###########################################################
        return view('site.index'
        ,compact('clubs_count' , 'clubs' , 'player_count'
            )
        );
        ############################################################
    }

    public function player()
    {
        return view('site.players');
    }
    ############################################################
    public function contact()
    {
        return view('site.contact');
    }

    public function contact_store(Request $request)
    {
         $validatedData = $request->validate([
            'f_name' => 'required|string',
            'l_name' => 'required|string',
            'number' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string',
            'contact_method' => 'required|array',
            'contact_method.*' => 'in:email,phone',
        ]);
        $con = new FrontContact();
        $con->f_name = $validatedData['f_name'];
        $con->l_name = $validatedData['l_name'];
        $con->number = $validatedData['number'];
        $con->email = $validatedData['email'];
        $con->message = $validatedData['message'];

        $con->contact_method = implode(', ', $validatedData['contact_method']);
        $con->save();
        session()->flash('success', trans('site/index.success'));
        return redirect()->back();
    }
    #############################################################
    public function about()
    {
        return view('site.about');
    }
    #############################################################


    public function compare()
    {

        return view('site.compare');

    }

    public function comparison(Request $request)
    {
        $player1Name = $request->input('player1');
        $player2Name = $request->input('player2');

        $player1 = Player::where('name_ar', $player1Name)
            ->orWhere('name_en', $player1Name)
            ->first();

        $player2 = Player::where('name_ar', $player2Name)
            ->orWhere('name_en', $player2Name)
            ->first();

        if (!$player1 || !$player2) {
            return redirect()->back()->with('error', 'One or both players not found');
        }

        return view('site.comparison', compact('player1', 'player2'));
    }



#############################################################

    public function join()
    {
        return view('site.joinus');
    }
public function join_store(Request $request)
{
    $js=new Join();
    $js->name = $request->name;
    $js->country = $request->country;
    $js->phone = $request->phone;
    $js->email=$request->email;
    $js->descr=$request->descr;
    session()->flash('success', trans('site/index.success'));
    $js->save();

    return redirect()->back();
}


 #############################################################
#############################################################
    public function discover()
    {
        $players=Player::with(['club' , 'stat'] )->get();
        return view('site.discover' , compact('players') );
    }
#############################################################
    public function rating()
    {
        return view('site.rating');
    }
#############################################################
    public function scouting()
    {
        return view('site.scouting');
    }
#############################################################
    public function send()
    {
        return view('site.send');
    }

    public function send_store(Request $request)
    {
        $sends = new FrontSend();
        $sends->send = $request->send;
        $sends->email = $request->email;
        $sends->save();


        session()->flash('success', trans('site/index.success'));

        return redirect()->back();
    }

#############################################################
    public function signup()
    {
        return view('site.signup');
    }
#############################################################
    public function topRated()
    {
        return view('site.topRated');
    }
#############################################################



}
