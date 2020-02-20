<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Notifications\ChatInvite;

use App\Events\SendChatMessageEvent;
use Illuminate\Support\Facades\Notification;

class ChatController extends Controller
{
    public function sendMessage(Request $request){

        //dd($request->all());
        Notification::send(User::find($request->invitedUserId), new ChatInvite());

       
    }

    public function send(Request $request){

        event(new SendChatMessageEvent($request->all(), Auth()->user()->name));
    }
}
