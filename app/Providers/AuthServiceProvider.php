<?php

namespace App\Providers;
use App\Task;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('isSupervisor', function($user){

           return $user->department == 'Supervisor';

        });

        Gate::define('isPhoneAgent', function($user){

            return $user->department == 'Phone-agent';
         
        });

        Gate::define('isTechnician', function($user){

            return $user->department == 'Technician on terrain';
         
        });

        
    }
}
