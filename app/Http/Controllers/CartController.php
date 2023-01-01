<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
// use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // public function cartView() // changed from cart_registered() & cart_unregistered() to "cartView()"
    // {
    //     if(isset($each_customer_cartItems)){
    //         $each_customer_cartItems  = Cart::where('customer_id',auth()->user()->id);
    //     }
    //     if(isset($cartItems)){
    //         $cartItems = $each_customer_cartItems->get();
    //     }
    //     if(isset($cartItems_count)){
    //         $cartItems_count = $each_customer_cartItems->count();
    //     }
    //     if(isset($cart_registered)){
    //         $cart_registered = view('website.website.cart.cart_registered' , compact('cartItems' , 'cartItems_count'));
    //     }

    //     $cart_unregistered        = view('website.website.cart.cart_unregistered');

    //     if(auth()->user()){ return $cart_registered; }

    //     elseif(!auth()->user()){ return $cart_unregistered; }
    // }

    public function cart_registered()
    {
        $each_customer_cartItems = Cart::where('customer_id',auth()->user()->id);
        $cartItems               = $each_customer_cartItems->get();
        $cartItems_count         = $each_customer_cartItems->count();

        return view('website.website.cart.cart_registered' , compact('cartItems' , 'cartItems_count'));
    }

    public function cart_unregistered()
    {
        return view('website.website.cart.cart_unregistered');
    }

    public function addCart(Request $request , $id) // this function is same as "store" function from the resource controller
    {
            $user                     = auth()->user(); // currently logged in user account which are customer ONLY!
            $product                  = Product::find($id); // find data from products table by id
            $cart                     = new Cart; // new data entry for the current entity (Cart)
            $cart->customer_name      = $user->name;
            $cart->customer_phone     = $user->phone;
            $cart->customer_email     = $user->email;
            $cart->customer_address   = $user->address;
            $cart->product_name       = $product->name;
            $cart->product_image      = $product->image_name;
            $cart->is_accessory       = $product->is_accessory;
            $cart->clothing_type      = $product->clothing_type;
            $cart->product_category   = $product->product_category;
            $cart->price              = $product->price;
            $cart->discount           = $product->discount;
            $cart->available_quantity = $product->available_quantity;
            // NOTE for quantity: since the input type is number then it will not allow strings (a, b, c, ...z)
            if($request->quantity > 0  && $request->quantity <= $cart->available_quantity){ // from 1 to infinity which is the correct condition!
                $cart->quantity = $request->quantity;
                //------ update "available_quantity" column (from product table) when adding to cart any of the products ------//
                $product->available_quantity = $product->available_quantity - $request->quantity;
                $product->save();
                //-------------------------------------------------------------------------------------------------------------//
            }
            elseif($request->quantity > $cart->available_quantity){ // wrong condition (1): user's inout is more than the available quantity (> max) of the product
                return redirect()->back()->with('exceeded_available_quantity_message' , 'The quantity that you entered for product "'.$cart->product_name.'" is not available at the moment!');
            }
            elseif($request->quantity == null || $request->quantity == ""){ // wrong condition (2): quantity is equals to "null" or "" value. Which means an empty space value.
                return redirect()->back()->with('quantity_is_null_message' , 'The quantity value is empty! Please enter a quantity for the "'.$cart->product_name.'" product!');
            }
            elseif($request->quantity == 0){ // wrong condition (3): quantity is equals to "zero" value
                return redirect()->back()->with('quantity_is_zero_message' , 'You entered ['.$request->quantity.'] value for the quantity for "'.$cart->product_name.'" product. You can not enter [zero] value for the quantity for any product!');
            }
            elseif($request->quantity < 0){ // wrong condition (4): quantity is equals to "negative" value
                return redirect()->back()->with('quantity_is_negative_message' , 'You entered ['.$request->quantity.'] value for the quantity. The entered value for the quantity for "'.$cart->product_name.'" product is in negative!');
            }
            $cart->product_id       = $product->id;
            $cart->customer_id      = $user->id;

            // $_cartFind        = Cart::where('id',$id)->exists();
            // $_cart_product_id = Cart::where('product_id',$product->id)->exists();
            // if($_cartFind == true && $_cart_product_id == true){
            //     $cart->quantity += $request->quantity;
            //     $cart->save();
            //     return redirect()->back();
            // }
            // else{
            //     $cart->save();
            //     return redirect()->back()->with('addCart_message' , '"'.$product->name.'" (Quantity: '.$cart->quantity.') - added successfully to your cart!');
            // }
            $cart->save();
            return redirect()->back()->with('addCart_message' , '"'.$product->name.'" (Quantity: '.$cart->quantity.') - added successfully to your cart!');

        // else{ //it is shaded because there is already if condition in any of the product blades for guest "if(Auth::guest())..."
        //     return redirect()->route('cart-unregistered');
        // }
    } // end of "addCart" function


    // public function getCartItemsForCheckout(){ // ($id)
    //     // $CartItems_ID = Cart::where('id' , $id)->get();
    //     // $cartItems_ID = Cart::where('customer_id', auth()->user()->id)->where('id' , $id)->get(); // ID will be dynamic in url but total amount will not be calculated!
    //     $cartItems = Cart::where('customer_id', auth()->user()->id)->get();

    //     $finalData = []; // an empty array

    //     $amount = 0; // will be used in the array for the summation of the total amount or price (not for each item!) for ALL THE ITEMS within the cart!!

    //     if(isset($cartItems))
    //     {
    //         foreach($cartItems as $cartItem)
    //         {
    //             // $finalData['id']            = $cartItem->id; // cart ID
    //             // $finalData['customer_name'] = $cartItem->customer_name;
    //             // $finalData['quantity']      = $cartItem->quantity;
    //             // $finalData['price']         = $cartItem->price;
    //             // $finalData['discount']      = $cartItem->discount;
    //             // $finalData['total']         = $cartItem->price * $cartItem->quantity;
    //             if($cartItem->discount > 0){
    //                 $amount                    += $cartItem->quantity * ($cartItem->price - ($cartItem->price * $cartItem->discount));
    //                 $finalData['Total_Amount']  = $amount; // total amount of all items' price (after discount which is the sale price)
    //             }
    //             elseif($cartItem->discount <= 0 || $cartItem->discount == null || $cartItem->discount == ""){
    //                 $amount                    += $cartItem->quantity * $cartItem->price;
    //                 $finalData['Total_Amount']  = $amount; // total amount of all items' price (with no sale which is the original price)
    //             }
    //         }
    //     }

    //     // return response()->json($finalData);
    //     if($finalData <= 0 || $finalData == null || $finalData == ""){ // the wrong condition (which is there is no items already in the cart to be calculated [total amount])
    //         return view('website.website.cart.cartErrors.cart-no-total-amount');
    //     }

    //     else{ // the correct condition! elseif($finalData > 0) => which means that there is total quantity calculated or in an another meaning there is +1 product in the cart.
    //         return response()->json($finalData);
    //     }
    // } // end of "getCartItemsForCheckout" function

    public function cartCheckOutView(){ // the functionality is only available for registered users (Customers ONLY!) + it happens after the cart_registered.blade.php functionalities
        $cartItems       = Cart::where('customer_id',auth()->user()->id)->get();
        $cartItems_count = $cartItems->count();

        if($cartItems_count == 0){ // acts as a middleware but on the condition "count = 0"
            return redirect()->route('cart-registered');
        }
        else{ // elseif($cartItems_count > 0)
            $finalData = []; // an empty array

            $amount = 0; // will be used in the array for the summation of the total amount or price (not for each item!) for ALL THE ITEMS within the cart!!

            if(isset($cartItems))
            {
                foreach($cartItems as $cartItem)
                {
                    // $finalData['id']            = $cartItem->id; // cart ID
                    // $finalData['customer_name'] = $cartItem->customer_name;
                    // $finalData['quantity']      = $cartItem->quantity;
                    // $finalData['price']         = $cartItem->price;
                    // $finalData['discount']      = $cartItem->discount;
                    // $finalData['total']         = $cartItem->price * $cartItem->quantity;
                    if($cartItem->discount > 0){
                        $amount                    += $cartItem->quantity * ($cartItem->price - ($cartItem->price * $cartItem->discount));
                        $finalData['Total_Amount']  = $amount; // total amount of all items' price (after discount which is the sale price)
                    }
                    elseif($cartItem->discount <= 0 || $cartItem->discount == null || $cartItem->discount == ""){
                        $amount                    += $cartItem->quantity * $cartItem->price;
                        $finalData['Total_Amount']  = $amount; // total amount of all items' price (with no sale which is the original price)
                    }
                }
            }

            if($finalData <= 0 || $finalData == null || $finalData == ""){ // the wrong condition (which means that there is no items already in the cart to be calculated [total amount])
                return view('website.website.cart.cartErrors.cart-no-total-amount');
            }
            else{ // the correct condition! elseif($finalData > 0) => which means that there is total quantity calculated or in an another meaning there is +1 product in the cart
                return view('website.website.cart.cart_checkout' , compact('cartItems' , 'cartItems_count' , 'finalData'));
            }
        }
    } // end of "cartCheckOutView" function

    public function update_cart_items_quantity(Request $request , $id)
    {
        $cartItem = Cart::where('customer_id',auth()->user()->id)->find($id);
        {// those variables are just used in the json data in the return of the function (they are not used in the update functionality itself!)
            $cartItems_count = Cart::where('customer_id',auth()->user()->id)->count();
            if($cartItems_count > 0){ // if there is items in the cart (the correct condition!)
                $cartItem_Old_Quantity = Cart::find($id)->quantity;
            }
            else{ // if there is no items in the cart (the wrong condition!)
                return redirect()->route('cart-registered');
            }

            if($cartItem->clothing_type == 1){
                $cartItem->clothing_type = "Formal";
            }
            elseif($cartItem->clothing_type == 2){
                $cartItem->clothing_type = "Casual";
            }
            elseif($cartItem->clothing_type == 3){
                $cartItem->clothing_type = "Sports Wear";
            }
        }

        if($request->new_quantity > 0 && $request->new_quantity <= $cartItem->available_quantity){ // the correct condition! if($request->new_quantity > 0), because that's the only correct condition!
            $cartItem->quantity = $request->new_quantity; // all are the same thing => "$_GET['new_quantity']" = "$request->get('new_quantity');" = "$request->new_quantity;"
            //------ update "available_quantity" column (from product table) when updating the products within the cart ------//
            $product = Product::find($id);
            $product->available_quantity = $product->available_quantity - $request->new_quantity;
            $product->save();
            //----------------------------------------------------------------------------------------------------------------//
        }
        elseif($request->new_quantity > $cartItem->available_quantity){ // wrong condition (1)
            return redirect()->back()->with('exceeded_available_quantity_message' , 'The quantity that you entered for product "'.$cartItem->product_name.'" is not available at the moment!');
        }
        elseif($cartItem->quantity == $request->new_quantity){ // wrong condition (2)
            return redirect()->back()->with(['quantity_same_old_new_message' => __('You did not change the quantity! The quantity that you entered for product "'.$cartItem->product_name.'" is the same!')]);
        }
        elseif($request->new_quantity == null || $request->new_quantity == ""){ // wrong condition (3)
            return redirect()->back()->with(['quantity_is_null_message' => __('The quantity value is empty! Please enter a quantity for the "'.$cartItem->product_name.'" product!')]);
        }
        elseif($request->new_quantity < 0){ // wrong condition (4)
            return redirect()->back()->with(['quantity_is_negative_message' => __('You entered ['.$request->new_quantity.'] value for the quantity. The entered value for the quantity for "'.$cartItem->product_name.'" product is in negative!')]);
        }

        elseif($request->new_quantity == 0){ // the logic of zero quantity which is the "force delete" action (permanent delete from the front-end & back-end)
            $cartItem->quantity = 0; // the new quantity (which will be zero already in this condition!)
            $cartItem->forceDelete();
            return redirect()->back()->with(['quantity_is_zero_delete_message' => __('The quantity that you entered for product "'.$cartItem->product_name.'" is ('.$cartItem->quantity.'). The product is successfully deleted from your cart!')]);
        }

        $cartItem->save();
        return redirect()->route('cart-registered')
            ->with(['quantity_old_new_message' => __('You changed the quantity for product "'.$cartItem->product_name.'" from ('.$cartItem_Old_Quantity.') to ('.$cartItem->quantity.').')]);
        //////------- the code below is just for checking old quantity and the updated new quantity by using json -------//////
        // return response()->json([
        //     'Cart_ID'                                       => $cartItem->id ,
        //     'Cart_Item_(Product_Name)'                      => $cartItem->product_name ,
        //     'Cart_Item_(Product_category)'                  => $cartItem->product_category ,
        //     'Cart_Item_(clothing_type)'                     => $cartItem->clothing_type ?? 'null, No Clothing Type for Accessories!',
        //     'Old_Quantity'                                  => $cartItem_Old_Quantity ,
        //     'New_Quantity'                                  => $cartItem->quantity ,
        //     'Price/Unit'                                    => $cartItem->price ,
        //     'Total_Price_for_('.$cartItem->product_name.')' => $cartItem->quantity * $cartItem->price , // Total_Price/Item
        // ]);
        //////----------------------------------------------------------------------------------------------------------//////
    } // end of (update_cart_items_quantity) function

    public function destroy_for_cart_and_checkout($id)
    {
        $cartItem = Cart::findOrFail($id);
        $cartItem->forceDelete();
        if($cartItem->count() == 0){ //when in checkout page items count is equals to ero redirect to "cart-registered" route
            return redirect()->route('cart-registered');
        }
        else{
            return redirect()->back() //redirect()->back() => to "cart" or "checkout" page depending on the location of the remove action
                ->with(['cart_checkout_item_deleted_message' => '"'.$cartItem->product_name.'" product is successfully deleted from your cart!']);
        }

    } // end of "destroy_for_cart_and_checkout" function

}
?>
