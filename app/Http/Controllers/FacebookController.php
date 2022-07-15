<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Laravel\Socialite\Facades\Socialite;

class FacebookController extends Controller
{
    //Login using Facebook
    public function LoginUsingFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callbackFromFacebook()
    {
        try {
            $user = Socialite::driver('facebook')->user();
            ddd($user);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
