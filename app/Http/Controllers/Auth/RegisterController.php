<?php

namespace App\Http\Controllers\Auth;


use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use App\Events\SendMailEvent;
use Illuminate\Support\Facades\Gate;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

 
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('register')->only('showRegistrationForm');
        //$this->middleware('guest');
        $this->middleware('auth');
       
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function showRegistrationForm()
    {
        if (Gate::allows('isSupervisor', Auth()->user())) {
            
            return view('auth.register');
        }

        else{

          return   'You are not authorized to register users';
        }
      
    }

    public function register(Request $request)
    {

       //dd($request->workplace);
        $this->validator($request->all())->validate();
      
        event(new Registered($user = $this->create($request->all())));
     

      

       
        //event(new SendMailEvent($user));
        session()->flash('userRegistered', 'new user has been registered');
        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());

            
    }

    protected function validator( array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:2', 'confirmed'],
            'surname' => ['required', 'string', 'max:255'],
            'town' => ['required', 'string',  'max:255'],
            'address' => ['required', 'string', 'min:8'],
            'department' => ['required', 'string', 'max:255'],
            'workplace' => ['required_if:department,Technician on terrain', 'string', 'min:5' ,'max:255'],
            
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        
        //dd($data);
        
            $user=User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'surname' =>$data['surname'],
                'address' =>$data['address'],
                'town' =>$data['town'],
                'department' =>$data['department']
               // 'workplace' =>$data['workplace']
                
            ]);


            if (array_key_exists('workplace', $data)){

                $user->workplace = $data['workplace'];
                $user->save();

                            }

        return $user;

        

       

        

        }


        


        
    

    
}
