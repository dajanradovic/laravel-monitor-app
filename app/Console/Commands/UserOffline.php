<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;

class UserOffline extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:offline';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Turn session-expired users into offline';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $last_activity = \DB::table('sessions')->select('last_activity', 'user_id')->where('user_id','!=', null)->get();
        //dd($last_activity);
        
        foreach($last_activity as $activity){
        
            $last=$activity->last_activity;
            
            if (session_time_remaining($last)<0){
        
                User::where('id', $activity->user_id)->update(['online' => 0]);
               // $user = new User;
              //  $user->find($activity->user_id);
              //  $user->online=0;
              //  $user->save();
            }
    }

     function session_time_remaining($last){

        $session_time_remaining_minutes = ($last + (\Config::get('session.lifetime') * 60) - time()) / 60;
        
        return $session_time_remaining_minutes;
        
        }
}
}