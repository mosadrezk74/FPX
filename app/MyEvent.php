<?php

namespace App;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MyEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $name_ar;
    public $nationality;

    public function __construct($data)
    {
        #-------------------------------------#
//        $this->name_ar = $data['name_ar'];
        #-------------------------------------#
//        $this->nationality = $data['nationality'];
        #-------------------------------------#

     }

    public function broadcastOn()
    {
        return ['my-channel'];
    }

    public function broadcastAs()
    {
        return 'my-event';
    }
}
