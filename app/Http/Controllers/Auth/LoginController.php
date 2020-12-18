<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use Auth;
use App\User;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }



//google login
public function redirectToGoogle()
{
    return Socialite::driver('google')->redirect();
}

//facebook login
public function redirectToFacebook()
{
    return Socialite::driver('facebook')->redirect();
}

//google callback

public function handleGoogleCallback()
{
   $user = Socialite::driver('google')->stateless()->user();
   print_r($user);
   $this->_registerOrLoginUser($user);
   return redirect()->route('home');
    // $user->token;
}


//facebook callback

public function handleFacebookCallback()
{
    $user = Socialite::driver('facebook')->user();

    // $user->token;
}


protected function _registerOrLoginUser($data){
    $user=User::where('email','=',$data->email)->first();

    if(!$user){
        $user=new User();
        $user->email=$data->email;
        $user->name=$data->name;
        $user->photo=$data->avatar ? $data->avatar : 'avatar.jpg';
        $user->email_verified_at='2020-11-07 16:11:21';
        $user->save();

        Auth::login($user,'true');
    }else{
        Auth::login($user,'true');
    }
}
}
