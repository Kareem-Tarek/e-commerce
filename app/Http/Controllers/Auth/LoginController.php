<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;
use Hash;
use Socialite;
use Str;
use App\Models\User;

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
    // use AuthenticatesUsers {
    //     logout as performLogout;
    // }
    

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

    /************************************ for login by email or username ************************************/
    // public function login(Request $request)
    // {   
    //     $input = $request->all();

    //     $this->validate($request, [
    //         'username' => 'required',
    //         'password' => 'required',
    //     ]);

    //     $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

    //     if(auth()->attempt(array($fieldType => $input['username'], 'password' => $input['password']))){
    //         return redirect()->route('home');
    //     }
    //     else{
    //         return redirect()->route('login')
    //             ->with('error','Email-Address And Password Are Wrong.');
    //     }

    // }
    /************************************ for login by email or username ************************************/


    /*********************** for login by email, username or phone (currently in use) ***********************/
    public function credentials(Request $request)
    {
        /*
            NOTE: All the following are the same thing: (And means that all are requests from the front-end from an inputs)
                - $request->xyz
                - $request->get('xyz')
                - $request->input('xyz')
         */
        if(is_numeric($request->get('email'))){
            return ['phone' => $request->email, 'password' => $request->password];
        }
        elseif (filter_var($request->get('email'), FILTER_VALIDATE_EMAIL)){
            return ['email' => $request->email, 'password' => $request->password];
        }
        else{
            return ['username' => $request->email, 'password' => $request->password];
        }
    }
    /*********************** for login by email, username or phone (currently in use) ***********************/

    function authenticated(Request $request, $user){ // used for login at (datetime) and the ip of the computer that was logged in with
        $user->update([
            'last_login_at' => Carbon::now()->toDateTimeString(),
            'last_login_ip' => $request->getClientIp()
        ]);
    }

    // public function logout(Request $request)    //logout function
    // {
    //     $this->performLogout($request);

    //     return redirect()->route('home');
    // }

    public function _OAuthSignInInfo($user)
    {
        // if the user doesn't exist, then add them
        // if they do, get the model
        // either way, authenticate the user into the application and redirect afterwards
        $user = User::firstOrCreate([
            'email' => $user->email
        ], [
            'username' => $user->name , // username (column from users table) => $user->name (name from third-party app)
            'password' => Hash::make(Str::random(24)) ,
            'avatar'   => $user->avatar ,
        ]);

        Auth::login($user, true);
    }

    public function github()
    {
        // send the user's request to github
        return Socialite::driver('github')->redirect();
    }

    public function githubRedirect()
    {
        // get oauth request back from github to authenticate user
        $user = Socialite::driver('github')->user();
        $this->_OAuthSignInInfo($user);

        return redirect()->route('home');
    }

    public function google()
    {
        // send the user's request to google
        return Socialite::driver('google')->redirect();
    }

    public function googleRedirect()
    {
        // get oauth request back from google to authenticate user
        $user = Socialite::driver('google')->user();
        $this->_OAuthSignInInfo($user);

        return redirect()->route('home');
    }

    public function facebook()
    {
        // send the user's request to facebook
        return Socialite::driver('facebook')->redirect();
    }

    public function facebookRedirect()
    {
        // get oauth request back from facebook to authenticate user
        $user = Socialite::driver('facebook')->user();
        $this->_OAuthSignInInfo($user);

        return redirect()->route('home');
    }

}
