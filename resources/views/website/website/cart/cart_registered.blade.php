@extends('layouts.website.master')

@section('styles')
@endsection

@section('title')
    Cart
@endsection

@section('content')

<!-- ***** Search bar Start ***** -->
@include('layouts.website.search-bar')
<!-- ***** Search bar End ***** -->

@if($cartItems_count < 1) <!---- when the cart is empty for each user (customers ONLY!) then
                                hide the table's heading because it is out of the loop already ---->
<style>
    table{display: none;}
    .proceed-to-checkout-div{display: none;}
</style>
@endif

@if(session()->has('quantity_is_null_message'))
    <div class="alert alert-danger text-center session-message">
        <button type="button" class="close" data-dismiss="alert" style="color: rgb(173, 6, 6)">x</button>
        {{ session()->get('quantity_is_null_message') }}
    </div>
@elseif(session()->has('quantity_same_old_new_message'))
    <div class="alert alert-danger text-center session-message">
        <button type="button" class="close" data-dismiss="alert" style="color: rgb(173, 6, 6)">x</button>
        {{ session()->get('quantity_same_old_new_message') }}
    </div>
@elseif(session()->has('exceeded_available_quantity_message'))
    <div class="alert alert-danger text-center session-message">
        <button type="button" class="close" data-dismiss="alert" style="color: rgb(173, 6, 6)">x</button>
        {{ session()->get('exceeded_available_quantity_message') }}
    </div>
@elseif(session()->has('quantity_is_zero_delete_message'))
    <div class="alert alert-success text-center session-message">
        <button type="button" class="close" data-dismiss="alert" style="color: rgb(173, 6, 6)">x</button>
        {{ session()->get('quantity_is_zero_delete_message') }}
    </div>
@elseif(session()->has('quantity_is_negative_message'))
    <div class="alert alert-danger text-center session-message">
        <button type="button" class="close" data-dismiss="alert" style="color: rgb(173, 6, 6)">x</button>
        {{ session()->get('quantity_is_negative_message') }}
    </div>
@endif

@if(session()->has('quantity_old_new_message'))
    <div class="alert alert-success text-center session-message">
        <button type="button" class="close" data-dismiss="alert" style="color: rgb(173, 6, 6)">x</button>
        {{ session()->get('quantity_old_new_message') }}
    </div>
@endif

@if(session()->has('cart_checkout_item_deleted_message'))
    <div class="alert alert-success text-center session-message">
        <button type="button" class="close" data-dismiss="alert" style="color: rgb(173, 6, 6)">x</button>
        {{ session()->get('cart_checkout_item_deleted_message') }}
    </div>
@endif

<table border="1" cellpadding="5" class="table-search-results" style="text-align: center; margin-left:auto; margin-right:auto; margin-top:3%; width: 80%;">
    <thead>
        <tr style="padding: 5%;">
            <th scope = "col">#</th>
            <th scope = "col">Image</th>
            <th scope = "col">Title</th>
            <th scope = "col">Category</th>
            <th scope = "col">Clothing Type</th>
            <th scope = "col">Quantity</th>
            <th scope = "col">Discount</th>
            <th scope = "col">Price/Unit</th>
            <th scope = "col">Total Price</th>
            <th scope = "col">
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
                <th>{{ $loop->iteration}}</th>
                <td><img src="{{$cartItem->product_image}}" alt="{{$cartItem->product_name}}" style="width: 110px; height: 130px; border: 1px solid black;"></td>
                <td style="width: 18%;">{{ $cartItem->product_name ?? 'Not Found' }}</td>
                <td>{{ ucfirst($cartItem->product_category) }}</td>
                <td>
                    @if($cartItem->is_accessory == 'no')
                        @if($cartItem->clothing_type == '1')
                            {{ 'Formal' ?? '???'}}
                        @elseif($cartItem->clothing_type == '2')
                            {{ 'Casual' ?? '???'}}
                        @else <!-- elseif($cartItem->clothing_type == '3') -->
                            {{ 'Sports Wear' ?? '???'}}
                        @endif
                    @else <!-- elseif($cartItem->is_accessory == 'yes') -->
                        <img src="https://img.icons8.com/external-dreamstale-lineal-dreamstale/32/000000/external-empty-science-education-dreamstale-lineal-dreamstale.png"/>
                    @endif
                </td>
                <td>
                    <form action="{{ url('update-cart-items-quantity' , $cartItem->id) }}" method="POST" id="alert-form">
                        @csrf
                        {{ method_field('patch') }}
                        {{-- <button class="btn btn-default button-submit-quantity">AJAX Submit</button> --}}

                        <button type="button" class="button-minus" name="quantity_value_minus" style="background-color: /*#DC3545*/ black; border-radius: 15px;" onmouseover="this.style.backgroundColor='#C82333'" onmouseout="this.style.backgroundColor='black'"><i class="fa-solid fa-minus" style="color: snow;"></i></button>
                            <input type="number" class="quantity_value" name="new_quantity" value="{{ $cartItem->quantity }}" min="0" style="width: 20%;">
                        <button  type="button" class="button-plus" name="quantity_value_plus" style="background-color: /*#28A745*/ black; border-radius: 15px;" onmouseover="this.style.backgroundColor='#218838'" onmouseout="this.style.backgroundColor='black'"><i class="fa-solid fa-plus" style="color: snow;"></i></button>
                    </form>
                </td>

                @if($cartItem->discount > 0)
                    <td style="width: 9%; background-color: #f8ecf4;">
                        <span style="color:rgb(155, 31, 151); font-weight: bold;">{{ $cartItem->discount * 100  }}% OFF</span>
                    </td>
                @elseif($cartItem->discount <= 0 || $cartItem->discount == null || $cartItem->discount == "")
                    <td style="width: 9%; background-color: #f2f1f1;">
                        <img src="https://img.icons8.com/external-dreamstale-lineal-dreamstale/32/000000/external-empty-science-education-dreamstale-lineal-dreamstale.png"/>
                    </td>
                @endif

                @if($cartItem->discount > 0)
                    <td style="width: 9%;">
                        <del style="color: red;">{{ $cartItem->price }} EGP</del><br>
                        <span style="color: green;">{{ $cartItem->price - ($cartItem->price * $cartItem->discount) }} EGP</span>
                    </td>
                @elseif($cartItem->discount <= 0 || $cartItem->discount == null || $cartItem->discount == "")
                    <td style="width: 9%;">{{ $cartItem->price }} EGP</td>
                @endif
                @if($cartItem->discount > 0)
                    <td class="total_price_cell" style="width: 9%;">
                        <del style="color: red;">{{ $cartItem->quantity * $cartItem->price }} EGP</del><br>
                        <span style="color: green;">{{ ($cartItem->quantity) * ($cartItem->price - ($cartItem->price * $cartItem->discount)) }} EGP</span>
                    </td>
                @elseif($cartItem->discount <= 0 || $cartItem->discount == null || $cartItem->discount == "")
                    <td class="total_price_cell" style="width: 9%;">{{ $cartItem->quantity * $cartItem->price }} EGP</td>
                @endif
                <td>
                    {!! Form::open([
                        'route' => ['cart_and_checkout.destroy',$cartItem->id],
                        'method' => 'delete'
                    ])!!}
                    <button class="btn btn-danger btn-sm" onclick="return confirm('{{__('Are you sure that you want to remove the ['.$cartItem->product_name.'] item(s) from your cart?')}}');" type="submit" title="{{__('Remove all')." [$cartItem->product_name] item(s)"}}"><i class="fa-solid fa-trash"></i>&nbsp;&nbsp;Remove</button>
                    {!! Form::close() !!}
                </td>
                {{-- <td>
                    <button class="btn btn-danger btn-sm" onclick="return confirm('{{__('Are you sure that you want to remove the ['.$cartItem->product_name.'] item(s) from your cart?')}}');" type="submit" title="{{__('Remove all')." [$cartItem->product_name] item(s)"}}"><i class="fa-solid fa-trash"></i>&nbsp;&nbsp;Remove</button>
                </td> --}}
            </tr>
        </tbody>
    @empty
        <div class="container text-center mt-5">
            <div class="row" style="justify-content: center;">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <img src="/assets/images/cart-empty.gif" width="130" style="border-radius: 20px;"/>
                    <h5 class="pt-4">There are no items in your cart yet! Go ahead and add some cool stuff to it!</h5>
                    <br>
                    <a href="{{ route('products') }}" class="browse-products-link">Browse Products</a>
                </div>
            </div>
        </div>

        <?php
            /*
            @empty => acts like else from the if condition and for showing the other choice wich will be the error
            (or the undefined data from the DB) if the data wasn't found in the code in "forelse" loop.
            */
        ?>
    @endforelse
</table>

<div class="proceed-to-checkout-div text-center mt-5">
    <a href="{{ route('checkout_details') }}" class="proceed-to-checkout-button"><i class="fa-solid fa-money-bill"></i>&nbsp;&nbsp;PROCEED TO CHECKOUT</a>
</div>

<style>
    .browse-products-link{
        background-color: #2F82FB;
        color: snow;
        font-size: 80%;
        font-weight: bold;
        padding: 1%;
        padding-left: 2%;
        padding-right: 2%;
        border-radius: 3px;
    }

    .browse-products-link:hover{
        background-color: #0868F3;
        color: snow;
    }

    .proceed-to-checkout-button{
        background-color: black;
        color: snow;
        padding: 0.5%;
        border-radius: 2px;
    }

    .proceed-to-checkout-button:hover{
        background-color: rgb(181, 181, 181);
        color: black;
        transition: 0.3s all ease-in-out;
    }
</style>

@endsection

@section('scripts')
<script type="text/javascript">


cons button_minus   = document.querySelector('.button-minus'),
     quantity_value = document.querySelector('.quantity_value'),
     button_minus   = document.querySelector('.button-minus');

     let x = 1;

     plus.addEventListener("click" , ()=>{
        a++;
        a = (a < 10) ? "0" + a : a;
        quantity_value.innerText = a;
        console.log('+1');
     });

     minus.addEventListener("click" , ()=>{
        if(a > 1){
            a--;
            a = (a < 10) ? "0" + a : a;
            quantity_value.innerText = a;
        }
     });

/******************************** AJAX part starts ********************************/
    $.('.button-submit-quantity').click(function(){ //on click event on button "class: button-submit-quantity" make the following...
        var quantity_value = $.('.quantity_value').val(); //"quantity_value" variable holds the data from the input of the quantity
        $.ajax({
            url     : '/cart', //which is the url or route which is used in (web.php)
            type    : 'POST', //method "post" which is on updating in this case
            data    : {
                total_price : quantity_value //the variable that wil be used in the controller's request : the variable "quantity_value"
            }
            success : function(result){
                //console.log('done');
                $.('.total_price_cell').text(result); //show the result in this area (class: total_price_cell) from the HTML
            }
        })
    })

    $.ajaxSetup({
        headers : {
            'X-CSRF-TOKEN' : '{!! csrf_field() !!}' //the csrf of the form from the HTML (@csrf)
        }
    })
/******************************** AJAX part ends ********************************/
</script>
@endsection



