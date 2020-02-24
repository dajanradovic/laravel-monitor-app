<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\BroadcastMessage;

class ChatAccept extends Notification implements ShouldQueue
{
    use Queueable;

    public $chatId;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($chatId)
    {
        $this->chatId = $chatId;
    }

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

            'message' => Auth()->user()->name . 'is ready for chat',
            'chatId' => $this->chatId
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
