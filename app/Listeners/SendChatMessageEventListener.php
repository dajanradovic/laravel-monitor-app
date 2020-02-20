<?php

namespace App\Listeners;

use App\Events\SendChatMessageEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendChatMessageEventListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  SendChatMessageEvent  $event
     * @return void
     */
    public function handle(SendChatMessageEvent $event)
    {
        //
    }
}
