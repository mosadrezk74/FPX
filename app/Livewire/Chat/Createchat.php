<?php

namespace App\Livewire\Chat;

use App\Models\Club;
use App\Models\Coach;
use App\Models\Message;
use App\Models\Player;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Createchat extends Component
{

    public $coach;
    public $users;

    public $club;
    public $players;



    public $auth_email;

    public function mount()
    {
        $this->auth_email = Auth::user() ? Auth::user()->email : null;
    }
    public function cre($receiver_email)
    {
        dd('sfsffsf');

//        $chek_Conversation = \App\Models\Chat::chekConversation($this->auth_email, $receiver_email)->get();
//        if ($chek_Conversation->isEmpty()) {
//            DB::beginTransaction();
//            try {
//                // $createConversation
//                $createConversation = \App\Models\Chat::create([
//                    'sender_email' => $this->auth_email,
//                    'receiver_email' => $receiver_email,
//                    'last_time_message' => null,
//                ]);
//                // create message
//                Message::create([
//                    'conversation_id' => $createConversation->id,
//                    'sender_email' => $this->auth_email,
//                    'receiver_email' => $receiver_email,
//                    'body' => 'السلام عليكم',
//                ]);
//                DB::commit();
//                $this->emitSelf('render');
//            } catch (\Exception $e) {
//                DB::rollBack();
//            }
//        } else {
//
//            dd('Conversation yes');
//        }


    }

    public function render()
    {
        $coach = auth()->guard('coach')->user();

        if ($coach) {
             $this->users = Player::with('club')->where('club_id', $coach->club_id)->get();
        } else {
             $this->users = Coach::all();
        }


        return view('livewire.chat.createchat', [
            'users' => $this->users,
        ])->extends('Dashboard.layouts.master');
    }

}
