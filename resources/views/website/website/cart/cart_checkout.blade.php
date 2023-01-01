@extends('layouts.website.master')

@section('styles')
@endsection

@section('title')
    Cart - CHECKOUT
@endsection

@section('content')

@if($cartItems_count == 0)
<style>
    table{display: none;}
    .options-info-in-cart-checkout{display: none;}
</style>
@endif

<div class="text-center">
    <h2>CHECKOUT</h2>
</div>

<div class="alert alert-primary mt-4" role="alert" style="text-align: center; margin-left: auto; margin-right: auto; width: 40%">
    <span>Number of items ({{ $cartItems_count ?? 'empty count' }})</span>
</div>

@if(session()->has('cart_checkout_item_deleted_message'))
    <div class="alert alert-success text-center" style="width: 50%; margin-top: 2%; margin-bottom: 2%; margin-left: auto; margin-right: auto;">
        <button type="button" class="close" data-dismiss="alert" style="color: rgb(173, 6, 6)">x</button>
        {{ session()->get('cart_checkout_item_deleted_message') }}
    </div>
@endif

<div class="mt-5">
    <table border="1" cellpadding="5" style="text-align: center; margin-left:auto; margin-right:auto; width: 55%;">
            <thead>
                <tr>
                    {{-- <th>#</th> --}}
                    <th>Image</th>
                    <th>Title</th>
                    <th>Discount</th>
                    <th>Quantity X Price = Total Price</th>
                    <th>
                        @if($cartItems_count == 1)
                            Remove Item
                        @elseif($cartItems_count > 1)
                            Remove Items
                        @endif
                    </th>
                </tr>
            </thead>

            @forelse($cartItems as $cartItem) 
                <tbody>
                    <tr>
                        {{-- <th>{{ $loop->iteration}}</th> --}}
                        <td><img src="{{$cartItem->product_image}}" alt="{{$cartItem->product_name}}" style="width: 90px; height: 110px; border: 1px solid black;"></td>
                        <td style="width: 35%;">{{ $cartItem->product_name }}</td>
                        @if($cartItem->discount > 0)
                             <td style="width: 14%; background-color: #f8ecf4;">
                                 <span style="color:rgb(155, 31, 151); font-weight: bold;">{{ $cartItem->discount * 100  }}% OFF</span>
                             </td>
                         @elseif($cartItem->discount <= 0 || $cartItem->discount == null || $cartItem->discount == "")
                             <td style="width: 14%; background-color: #f2f1f1;">
                                 <img src="https://img.icons8.com/external-dreamstale-lineal-dreamstale/32/000000/external-empty-science-education-dreamstale-lineal-dreamstale.png"/>
                             </td>
                         @endif
                        <td style="width: 40%;">
                            @if($cartItem->discount > 0)
                                <del style="color: red;">{{ $cartItem->quantity.' X '.$cartItem->price.' = '.$cartItem->quantity * $cartItem->price }} EGP</del><br>
                                <span style="color: green;">{{ $cartItem->quantity.' X '.($cartItem->price - ($cartItem->price * $cartItem->discount))}} = <u>{{$cartItem->quantity * ($cartItem->price - ($cartItem->price * $cartItem->discount)) }} EGP</u></span>
                            @elseif($cartItem->discount <= 0 || $cartItem->discount == null || $cartItem->discount == "")
                                <span>{{ $cartItem->quantity.' X '.$cartItem->price.' = '.$cartItem->quantity * $cartItem->price }} EGP</span>
                            @endif
                        </td>
                        <td style="width: 29%;">
                            {!! Form::open([
                                'route' => ['cart_and_checkout.destroy',$cartItem->id],
                                'method' => 'delete'
                            ])!!}
                            <button class="btn btn-danger btn-sm" onclick="return confirm('{{__('Are you sure that you want to remove the ['.$cartItem->product_name.'] item(s) from your cart?')}}');" type="submit" title="{{__('Remove all')." [$cartItem->product_name] item(s)"}}"><i class="fa-solid fa-trash"></i>&nbsp;&nbsp;Remove</button>
                            {!! Form::close() !!}
                            {{-- <form id="delete-form" method="POST" action="/checkout-details/{{$cartItem->id}}">
                                @csrf
                                {{ method_field('DELETE') }}
                            
                                <div class="form-group">
                                  <input type="submit" class="btn btn-danger" value="Delete">
                                </div>
                            </form> --}}
                        </td>
                    </tr>
                </tbody>
            @empty
                <?php 
                    /* no need to handle an error already! because if there is less than 1 item 
                       in the cart the "PROCEED TO CHECKOUT" button will not be available for the
                       customers already (and that's handled by if condition in cart_registered.blade.php).
                        So in this case we could also use "foreach" loop instead of "forelse" */ 
                 ?>
            @endforelse
    </table>

    <div class="options-info-in-cart-checkout">
        <div class="text-center mt-5">
            {{-- Have a discount? <a href="javascript:void(0);" class="" onclick="return prompt('APPLY COUPON HERE:')">Enter it here</a>. --}}
            Have a discount? <a href="javascript:void(0);" class="" onclick="promptCouponFunction()">Enter it here</a>.
            <div style="width: 30%; margin-top: 0.5%; margin-left: auto; margin-right: auto;">
                <p id="coupon-area" style="background-color: beige; border-radius: 1px;"></p>
            </div>

            <script>
            function promptCouponFunction() {
            let coupon = prompt("APPLY COUPON HERE:", ""); // the second argument is the same as value attribute in any input from HTML
            if(coupon == null || coupon == "") {
                document.querySelector("#coupon-area").innerHTML = 
                '<div class="alert alert-secondary"> You did not enter any coupon. Please try again! <button type="button" class="close" data-dismiss="alert" style="color: rgb(173, 6, 6)">x</button> </div>';
            }
            else{ // which means -> elseif(coupon != null || coupon != "")
                document.querySelector("#coupon-area").innerHTML = 
                '<div class="alert alert-secondary"> You entered coupon: <span style="color: rgb(218, 139, 3);">' + coupon + '</span> <button type="button" class="close" data-dismiss="alert" style="color: rgb(173, 6, 6)">x</button> </div>';
            }
            }
            </script>
        </div>

        <div class="mt-2">
            <table border="1" cellpadding="3" style="text-align: center; margin-left:auto; margin-right:auto; width: 25%;">
                <tr>
                    <th>Subtotal</th> <!-- subtotal = total prices of products in cart (with tax) -->
                    <td>
                        @foreach($finalData as $finalData_result)
                            {{ $finalData_result ?? '???'}} EGP
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <th>Discount</th>
                    <td>
                        <span style="color:rgb(155, 31, 151); font-weight: bold;">
                            - {{ 0 }} EGP
                        </span>
                    </td>
                </tr>
                <tr>
                    <th>Shipping</th>
                    <td>???</td>
                </tr>
                <tr>
                    <th>Total</th> <!-- total = total prices of products in cart (with tax) + shipping cost + fees + tax on fees - discount coupon -->
                    <td>
                        @foreach($finalData as $finalData_result)
                            <span style="color: navy; font-weight: bold;">{{ $finalData_result ?? '???'}} EGP</span>
                        @endforeach
                    </td>
                </tr>
            </table>
        </div>
        <div class="text-center mt-4">
            <img src="/assets/images/verified.png" style="width: 30%;">
        </div>
        
        <div class="continue-to-payment-div text-center mt-5">
            <a href="javascript:void(0);" class="continue-to-payment-button"><i class="fa-solid fa-cart-shopping"></i>&nbsp;&nbsp;CONTINUE TO PAYMENT</a>
        </div>
    </div>
</div>

<style>
    .continue-to-payment-button{
        background-color: black;
        color: snow;
        padding: 0.5%;
        border-radius: 2px;
    }

    .continue-to-payment-button:hover{
        background-color: rgb(181, 181, 181);
        color: black;
        transition: 0.3s all ease-in-out;
    }
</style>
           
@endsection

@section('scripts')
@endsection



