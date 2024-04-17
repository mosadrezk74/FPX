<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\Coach;
use App\Models\Message;
use App\Models\Message_Users;
use App\Models\Player;
use App\Models\Standing;
use App\Models\User;
use App\NewMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ContactsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        $club_id = $user->club_id;
        $players = Player::with('club')->where('club_id', $club_id)->get();


        return view('Dashboard.Coach_Dashboard.chat' , compact('players') );
    }
    public function index_player()
    {

        $user = Auth::user();
        $club_id = $user->club_id;
        $players = Coach::with('club')->where('club_id', $club_id)->get();
        $coaches = Player::with('club')->where('club_id', $club_id)->get();
        $messages = Player::where('id', '<>', Auth::id())->get();
        return view('Dashboard.Player_Dashboard.chat' , compact('players' , 'coaches' , 'messages'  ) );

    }

    public function store(Request $request)
    {

        $message = new Message();
        $message->message_users_id = $request->convo_id;
        $message->message = $request->message;
        $message->save();

        return "Message Sent";
    }

    public function load($reciever, $sender){
        $boxType = "";

        $id1 = Message_Users::where('sender_id', $sender)->where('reciever_id',$reciever)->pluck('id');
        $id2 = Message_Users::where('reciever_id', $sender)->where('sender_id',$reciever)->pluck('id');

        $allMessages = Message::where('message_users_id', $id1)->orWhere('message_users_id', $id2)->orderBy('id', 'asc')->get();


        $tobePassed = [$allMessages, $id1];
        return $tobePassed;
    }

    public function retrieveNew($reciever, $sender, $lastId){
        $id1 = Message_Users::where('sender_id', $sender)->where('reciever_id',$reciever)->pluck('id');
        $id2 = Message_Users::where('reciever_id', $sender)->where('sender_id',$reciever)->pluck('id');

        $allMessages = Message::where('id','>=',$lastId)->where('message_users_id', $id2)->orderBy('id', 'asc')->get();

        return $allMessages;
    }


    ##-----------------------------Controller User----------------------------------##
    ##-----------------------------Controller User----------------------------------##

    public function check($recieverId){
        $senderId = Auth::user()->id;

        $data = [
            'sender_id' => $senderId,
            'reciever_id' => $recieverId
        ];
        $data2 = [
            'sender_id' => $recieverId,
            'reciever_id' => $senderId
        ];

        $checkExist = Message_Users::where('sender_id', $senderId)->where('reciever_id', $recieverId)->first();

        if(!$checkExist){
            $createConvo = Message_Users::create($data);
            $createConvo2 = Message_Users::create($data2);
            return $createConvo->id;
        }else{
            return $checkExist->id;
        }
    }
    ##-----------------------------Controller User----------------------------------##
    ##-----------------------------Controller User----------------------------------##



}
