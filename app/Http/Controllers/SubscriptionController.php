<?php

namespace App\Http\Controllers;

// use App\Models\User; // no need for the usage of "User" model because auth()->user() already means the users table and that also
                        // ...means a specific column from users' table "auth()->user()->column_name"
use App\Models\Subscription;
use Illuminate\Http\Request;
// use Symfony\Component\HttpKernel\Exception\HttpException;

class SubscriptionController extends Controller
{
    /************ with the testing method showing data result with JSON (including the whole row/record in the DB) + submitted in DB ************/
    // public function submit_subscription(Request $request)
    // {
    //     return Subscription::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //     ]);
    // }


    /************ with the actual method [submitted in DB + redirecting to a route (page) in the website] ************/
    public function submit_subscription(Request $request)
    {

        $subscription_section_static   = redirect('http://localhost:8000/home#subscribe'); // redirecting to a specific URL to "subscribe" section (STATICALLY with home page)
        // OR
        $subscription_section_dynamic  = redirect(url()->previous().'#subscribe'); // redirecting to a specific URL to "subscribe" section (DYNAMICALLY with any page)
        // OR
        $products_page                 = redirect()->route('home'); // redirecting to a specific route (from web.php routes) -> home page route
        // OR
        $products_page_back            = redirect()->back(); /* which will redirect to the same page after the action is done within it wether 
                                                       success/error action (with the built-in function "back()") */

        
        $user                        = auth()->user(); // Subscription is already allowed ONLY for the user type "customer" to see in the front-end
        $user_email                  = auth()->user()->email; // Customer's email column from the DB
        $subscription                = new Subscription;
        $subscription->name          = $request->name;
        $subscription->customer_name = $user->name;
        if($request->email == $user_email){ // the correct condition!
            $subscription->email = $request->email;
        }
        elseif($request->email != $user_email){ // wrong condition (1) - the entered email from the user (customer) doesn't match the email he/she used in his/her account
            return $subscription_section_dynamic->with('subscription_unsuccessful_incorrect_email_message' , 'The email that you entered is wrong! Please try to enter your email again.');
        }
        //$subscription->save();
        //return redirect(url()->previous().'#subscribe')->with('subscription_successful_message' , 'You successfully subscribed to our newsletter!');


        // the duplication error is handled by using try/catch to complete the logic of the "email" column in subscription because it has a unique key in the DB
        try{ // the correct condition! (save if there is no duplication error for any column in the subscription table)
            $subscription->save();
            return redirect(url()->previous().'#subscribe')->with('subscription_successful_message' , 'You successfully subscribed to our newsletter!');
        }
        catch (\Exception $exception){ // wrong condition (2) (handle exception which is here in this case -> duplication in a column which is in "email" column that holds a unique key)
            return redirect(url()->previous().'#subscribe')->with('subscription_unsuccessful_duplication_error_message' , 'You already subscribed to our newsletter!');
        }
    
    }
}

