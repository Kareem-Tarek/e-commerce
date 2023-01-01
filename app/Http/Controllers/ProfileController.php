<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Cart;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('profile', 'edit_my_Profile', 'editProfile', 'profileUpdatePassword');
    }

    public function cartItems_in_user_profile()
    {
        $user            = User::findOrFail(auth()->user()->id);
        $cartItems       = Cart::where('customer_id',auth()->user()->id)->paginate(5);
        $cartItems_count = Cart::where('customer_id',auth()->user()->id)->count();
    
        return view('website.website.profile', compact('cartItems' , 'cartItems_count' , 'user'));
    }

    public function editProfile( /* Request $request */ )
    {
        $model = User::findOrFail(auth()->user()->id);
        // $password_decrypt = Crypt::decryptString($model->password);
        // $password_decrypt = Hash::check($request->current_password, Auth::user()->password);
        
        return view('website.website.profile-edit', compact('model' , /* 'password_decrypt' */ ));
    }


    public function profileUpdatePassword(Request $request)
    {

        $rules = [
            'current_password'     => 'required|min:8|current_password',
            'password'             => 'required|confirmed|min:8',
        ];
        $message = [
            // validation current_password
            'current_password.required'                  => 'Please enter your current password!',
            'current_password.min'                       => 'Please enter at least 8 characters!',
            'current_password.current_password'          => 'Please enter your current password correctly!', // __('admin/request.current_password'),
            // validation password
            'password.required'                          => 'Please enter your new password!',
            'password.confirmed'                         => 'Please confirm your new password!',
            'password.min'                               => 'Please enter at least 8 characters!',

        ];
        $this->validate($request, $rules, $message);
        
        $user = $request->user();
        if ($request->password != '') {
            if (Hash::check($request->input('current_password'), $user->password)) {
                // The passwords match...
                $user->password = bcrypt($request->input('password'));
                $user->save();
            } else {
                return redirect()->route('User')
                    ->with(['error' => 'The current password is incorrect, try again!']);
            }
        }
        return redirect()->route('editProfile')
            ->with(['user_password_updated_message' => "Your password has been successfully changed!"]);
    }

    public function edit_my_Profile(Request $request)
    {
        $user = User::findOrFail(auth()->user()->id);
        $array = [];
        if ($request->email != $user->email) {
            $email = User::where('email', $request->email)->first();
            if ($email == null) {
                $array['email'] =  $request->email;
            }
        }
        if ($request->name != $user->name) {
            $array['name'] =  $request->name;
        }
        if ($request->username != $user->username) {
            $array['username'] =  $request->username;
        }
        if ($request->bio != $user->bio) {
            $array['bio'] =  $request->bio;
        }
        if ($request->address != $user->address) {
            $array['address'] =  $request->address;
        }
        if ($request->phone != $user->phone) {
            $array['phone'] =  $request->phone;
        }
        if ($request->gender != $user->gender) {
            $array['gender'] =  $request->gender;
        }
        if ($request->dob != $user->dob) {
            $array['dob'] =  $request->dob;
        }
        // if ($request->postal_code != $user->postal_code) {
        //     $array['postal_code'] =  $request->postal_code;
        // }
        // if ($request->state_province != $user->state_province) {
        //     $array['state_province'] =  $request->state_province;
        // }
        if ($request->facebook != $user->facebook) {
            $array['facebook'] =  $request->facebook;
        }
        // if ($request->twitter != $user->twitter) {
        //     $array['twitter'] =  $request->twitter;
        // }
        if ($request->instagram != $user->instagram) {
            $array['instagram'] =  $request->instagram;
        }
        if ($request->whatsApp != $user->whatsApp) {
            $array['whatsApp'] =  $request->whatsApp;
        }
        // if ($request->telegram != $user->telegram) {
        //     $array['telegram'] =  $request->telegram;
        // }

        // if ($request->country_id != $user->country_id) {
        //     $array['country_id'] =  $request->country_id;
        // }

        // if ($request->governorate_id != $user->governorate_id) {
        //     $array['governorate_id'] =  $request->governorate_id;
        // }

        // if ($request->city_id != $user->city_id) {
        //     $array['city_id'] =  $request->city_id;
        // }

        if ($request->hasFile('avatar')) {
            $user
                ->clearMediaCollection('avatar')
                ->addMediaFromRequest('avatar')
                ->UsingName('avatar-' . $user->name)
                ->UsingFileName("avatar-.$user->name")
                ->toMediaCollection('avatar');
        }
        if ($request->hasFile('cover')) {
            $user
                ->clearMediaCollection('cover')
                ->addMediaFromRequest('cover')
                ->UsingName('cover-' . $user->name)
                ->UsingFileName("cover-.$user->name")
                ->toMediaCollection('cover');
        }

        if (!empty($array)) {
            $user->update($array);
        }

        return redirect()->route('editProfile')
            ->with(['user_profile_updated_message' => "Your profile information has been successfully updated!"]);
    }
}
