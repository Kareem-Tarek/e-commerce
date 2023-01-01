<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
// use App\Models\User;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    
    public function addRating(Request $request , $id) // this function is same as "store" function from the resource controller
    {
        if(Auth::id()){

            $user                     = auth()->user(); // currently logged in user account which are customer ONLY!
            $product                  = Product::find($id); // find data from products table by id
            $rating                   = new Rating; // new data entry for the current entity (Rating)
            $rating->rating_level     = $request->rating_level;
            if($rating->rating_level == 1){
                $request->rating_level = 'Poor';
            }
            elseif($rating->rating_level == 2){
                $request->rating_level = 'Average';
            }
            elseif($rating->rating_level == 3){
                $request->rating_level = 'Good';
            }
            elseif($rating->rating_level == 4){
                $request->rating_level = 'Very Good';
            }
            elseif($rating->rating_level == 5){
                $request->rating_level = 'Excellent';
            }
            else{
                // return abort('404');
                return redirect()->back();
            }
            $rating->customer_id      = $user->id;
            $rating->product_id       = $product->id;
            $rating->product_name     = $product->name;
            $rating->save(); 

            return redirect()->back()->with('addRating_message' , 'You rated "'.$product->name.'" product as ['.$request->rating_level.']');
            // if($product->product_category == "men" && $product->is_accessory == "no"){
            //     return redirect('http://127.0.0.1:8000/products#men')->with('addRating_men_message' , 'You rated "'.$product->name.'" product as ['.$request->rating_level.']');
            // }
            // elseif($product->product_category == "women" && $product->is_accessory == "no"){
            //     return redirect('http://127.0.0.1:8000/products#women')->with('addRating_women_message' , 'You rated "'.$product->name.'" product as ['.$request->rating_level.']');
            // }
            // elseif($product->product_category == "kids" && $product->is_accessory == "no"){
            //     return redirect('http://127.0.0.1:8000/products#kids')->with('addRating_kids_message' , 'You rated "'.$product->name.'" product as ['.$request->rating_level.']');
            // }
            // elseif($product->is_accessory == "yes"){
            //     return redirect('http://127.0.0.1:8000/products#accessories')->with('addRating_accessories_message' , 'You rated "'.$product->name.'" product as ['.$request->rating_level.']');
            // }
        }
    }

}
