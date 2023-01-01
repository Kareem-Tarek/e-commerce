<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Favorite;

class FavoriteController extends Controller
{
    
    public function favoritesCustomer(){
        $favoriteItems       = Favorite::where('customer_id',auth()->user()->id)->get();
        $favoriteItems_count = $favoriteItems->count();

        return view('website.website.favorite.favorite-registered' , compact('favoriteItems' , 'favoriteItems_count'));
    }

    public function favoritesGuest(){
        return view('website.website.favorite.favorite-unregistered');
    }

    public function addFavorite(Request $request , $id) // this function is same as "store" function from the resource controller
    {
        if(Auth::id()){

            $user                         = auth()->user(); // currently logged in user account which are customer ONLY!
            $product                      = Product::find($id); // find data from products table by id

            $favorite                     = new Favorite; // new data entry for the current entity (Favorite)
            $favorite->customer_name      = $user->name;
            $favorite->customer_phone     = $user->phone;
            $favorite->customer_email     = $user->email;
            $favorite->customer_address   = $user->address;
            $favorite->product_id         = $product->id;
            $favorite->product_name       = $product->name;
            $favorite->available_quantity = $product->available_quantity;
            $favorite->product_image      = $product->image_name;
            $favorite->is_accessory       = $product->is_accessory;
            $favorite->clothing_type      = $product->clothing_type;
            $favorite->product_category   = $product->product_category;
            // unlike the Cart -> NO Quantity because we are just adding the product to favorites
            $favorite->price              = $product->price;
            $favorite->discount           = $product->discount;
            $favorite->customer_id        = $user->id;
            // $favorite->save(); 
            // return redirect()->back()->with('addFavorite_message' , '"'.$product->name.'" is successfully added to your favorites!');


            // the duplication error is handled by using try/catch to complete the logic of the "product_id" column in favorite because it has a unique key in the DB
            try{ // the correct condition!
                $favorite->save();
                return redirect()->back()->with('addFavorite_message' , '"'.$product->name.'" is successfully added to your favorites!'); 
            } 
            catch (\Exception $exception){ // the wrong condition (handle exception which is here in this case -> "duplication error")
                return redirect()->back()->with('addFavorite_already_added_message' , '"'.$product->name.'" was already added to your favorites!'); 
            }

        }

        // else{ //it's shaded because there is already if condition in any of the product blades for guest "if(Auth::guest())..."
        //     return redirect()->route('favorite-unregistered');
        // }
    }

    public function destroy($id)
    {
        $favorites = Favorite::findOrFail($id);
        $favorites->forceDelete();

        return redirect()->route('favorites-registered')
            ->with('removeFavorite_message' , '"'.$favorites->product_name.'" is successfully deleted from your favorites!');
    }

    // public function restore(Request $request,$id) // undo/restore action (to get back the deleted product by using $id)
    // {
    //     $favorites = Favorite::withTrashed()->find($id); // OR Favorite::withTrashed()->where('id', $request['id']); BUT without using $id in restore()
    //     $favorites->restore();
    //     return redirect()->route('favorites-registered')
    //         ->with(['message' => __('admin/home.restored_successfully')]);
    // }

}
