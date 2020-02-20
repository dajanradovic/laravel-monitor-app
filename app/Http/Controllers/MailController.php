<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class MailController extends Controller
{
    public function send(){



        Mail::send(['text' => 'mail'],
                    ['name' => 'dajan'  ],
                    function($message){
                        
                        $message->to('dajo1986@gmail.com', 'To Dajan')->subject('test email');
                        $message->from('dajo1986@gmail.com', 'Dajan');
                   



                    }


                );


    }
}
