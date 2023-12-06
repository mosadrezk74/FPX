<?php
namespace App\Notifications;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Admin;
use App\Models\Player;
use Illuminate\Support\Facades\Auth;

class OffersNotification extends Notification
{
    use Queueable;
    private $player_id;

    public function __construct(Player $player_id)
    {
        $this->player_id = $player_id;

    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        $userName = Auth::user() ? Auth::user()->name : null;

        return [
            'id' => $this->player_id ? $this->player_id->id : null,
            'title' => 'تم اضافة لاعب جديد بواسطة :',
            'user' => $userName,
        ];
    }


}
