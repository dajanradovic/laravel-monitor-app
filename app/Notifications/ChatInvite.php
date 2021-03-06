<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ChatInvite extends Notification implements ShouldQueue
{
    use Queueable;

    public $chat_id;
    

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($chat_id)
    {
        $this->chat_id=$chat_id;   }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['broadcast'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
   

    public function toBroadcast($notifiable){

        return new BroadcastMessage([

            'message' => Auth()->user()->name . 'wants to start a chat with you?!',
            'userId' => Auth()->user()->id,
            'chat_id' => $this->chat_id
            
        ]);
    }
    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
