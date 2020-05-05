<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;

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


        $date=date('Y-m-d H:i:s');
        /* echo "Current Date : ".$date;
         echo "<br>";
       echo "Date in seconds : ";*/
       $currentTimeSeconds=strtotime(date($date));
       
         
         
         $last_activity = \DB::table('sessions')->select('last_activity', 'user_id')->where('user_id','!=', null)->orderBy('last_activity', 'DESC')->get();
       //dd($last_activity);
       
       foreach($last_activity as $activity){
       
          $last=$currentTimeSeconds -$activity->last_activity;
           
           if ($last > Config::get('session.lifetime') * 60){
       
               User::where('id', $activity->user_id)->update(['online' => 0]);
              // $user = new User;
             //  $user->find($activity->user_id);
             //  $user->online=0;
             //  $user->save();
           }
       
           else{
       
             User::where('id', $activity->user_id)->update(['online' => 1]);
           }
       
           
       
       
       }

    }

    
}


