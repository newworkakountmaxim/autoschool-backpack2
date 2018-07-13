<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
//use Socialite;

use Laravel\Socialite\Facades\Socialite;
use App\User;
//use Laravel\Illuminate\Facades\Auth;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       
        $this->middleware('guest')->except('logout');
         //return Socialite::driver('github')->redirect();
        //var_dump(Socialite::get());
    }

// *************************
    public function redirectToProvider($service)
    {
        return Socialite::driver($service)->redirect();
        //return Auth::user();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($service)
    {
        $user = Socialite::driver($service)->stateless()->user();

        // $user->token;
         //return $user->name.','.$user->getEmail();
        $findUser = User::where('email', $user->getEmail())->first();
        if ($findUser) {
            Auth::login($findUser); 
        }else{
           $newUser = new User;
           $newUser->email = $user->getEmail();
           $newUser->name = $user->name;
           $newUser->password = bcrypt(1234567890);
           $newUser->save();
           Auth::login($newUser); 
        }
       
       return redirect('home');
    }
// *************************



} 
