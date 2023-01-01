@extends('layouts.website.master')

@section('styles')
@endsection

@section('title')
    Discounts 21% ~ 30% - results ({{ $items_count }})
@endsection

@section('content')


<!-- ***** Search bar Start ***** -->
@include('layouts.website.search-bar')
<!-- ***** Search bar End ***** -->

<section style="margin-top: 3%;">
    @if($items_count == 0)
        <div class="alert alert-danger" role="alert" style="text-align: center; margin-left: auto; margin-right: auto; margin-bottom: 2%; width: 40%">
            <span>Discounts on items between [21% ~ 30%] - results ({{ $items_count }})</span>
        </div>
    @else
        <div class="alert alert-primary" role="alert" style="text-align: center; margin-left: auto; margin-right: auto; margin-bottom: 2%; width: 40%">
            <span>Discounts on items between [21% ~ 30%] - results ({{ $items_count }})</span>
        </div>
    @endif

    @auth
        @if(auth()->user()->user_type == "admin" || auth()->user()->user_type == "moderator" || auth()->user()->user_type == "supplier")
            <div class="d-flex justify-content-center mb-4">
                <a href="{{route('products.create')}}" class="btn btn-dark" style="" type="button" title="Add New Product">Add New Product</a>
            </div>    
        @endif
    @endauth

    @if(session()->has('addCart_message'))
        <div class="alert alert-success text-center session-message">
            <button type="button" class="close" data-dismiss="alert" style="color: rgb(173, 6, 6)">x</button>
            {{ session()->get('addCart_message') }}<a href="{{ route('cart-registered') }}"> Check your cart</a>.
        </div>
    @elseif(session()->has('exceeded_available_quantity_message'))
        <div class="alert alert-danger text-center session-message">
            <button type="button" class="close" data-dismiss="alert" style="color: rgb(173, 6, 6)">x</button>
            {{ session()->get('exceeded_available_quantity_message') }}
        </div> 
    @elseif(session()->has('quantity_is_null_message'))
        <div class="alert alert-danger text-center session-message">
            <button type="button" class="close" data-dismiss="alert" style="color: rgb(173, 6, 6)">x</button>
            {{ session()->get('quantity_is_null_message') }}
        </div>
    @elseif(session()->has('quantity_is_zero_message'))
        <div class="alert alert-danger text-center session-message">
            <button type="button" class="close" data-dismiss="alert" style="color: rgb(173, 6, 6)">x</button>
            {{ session()->get('quantity_is_zero_message') }}
        </div>
    @elseif(session()->has('quantity_is_negative_message'))
        <div class="alert alert-danger text-center session-message">
            <button type="button" class="close" data-dismiss="alert" style="color: rgb(173, 6, 6)">x</button>
            {{ session()->get('quantity_is_negative_message') }}
        </div>
    @endif
    
    @if(session()->has('addRating_message'))
        <div class="alert alert-success text-center session-message">
            <button type="button" class="close" data-dismiss="alert" style="color: rgb(173, 6, 6)">x</button>
            {{ session()->get('addRating_message') }}
        </div>
    @endif

    @if(session()->has('addFavorite_message'))
        <div class="alert alert-success text-center session-message">
            <button type="button" class="close" data-dismiss="alert" style="color: rgb(173, 6, 6)">x</button>
            {{ session()->get('addFavorite_message') }}<a href="{{ route('favorites-registered') }}"> Check your favorites</a>.
        </div>
    @elseif(session()->has('addFavorite_already_added_message'))
        <div class="alert alert-danger text-center session-message">
            <button type="button" class="close" data-dismiss="alert" style="color: rgb(173, 6, 6)">x</button>
            {{ session()->get('addFavorite_already_added_message') }}
        </div>
    @endif

    <div style="display: flex; justify-content: flex-start; text-align: center; flex-wrap: wrap; padding: 0% 2%;">
        @foreach($products as $product)
            <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 mt-3 pt-3 pb-3 bg-light border">
                    <div class="curriculum-event-thumb">
                        <a href="{{ route('single_product_page' , $product->id) }}">
                            @php $data = Carbon\Carbon::parse($product->created_at)->diffInDays(Carbon\Carbon::now()); @endphp
                            @if($data <= 7) <!---------- in days ---------->
                                <span class="mt-2" style="position: absolute; background: rgba(0, 69, 175, 0.65); width: 180px; height: 35px; font-weight: bold; text-align: center; color: snow; opacity: 0.70;">
                                    <h3 style="font-weight: bolder;">NEW</h3>
                                </span>
                            @endif
                            <img class="mt-2" src="{{$product->image_name}}" alt="{{$product->name}}" style="width: 180px; height: 200px; border: 2px solid black;">
                        </a>
                    </div>
                    <div class="curriculum-event-content d-flex justify-content-center" >
                        <div class="row">
                            <div class="col-lg-12 col-sm-8 col-md-8 text-left mt-1">
                                <div class="c-red text-center">
                                    @auth
                                        @if((auth()->user()->user_type == "admin" || auth()->user()->user_type == "moderator") && $product->available_quantity > 0)
                                            <span style="@if($product->available_quantity <= 10) color: rgb(255, 106, 0); @else color: rgb(59, 188, 59); @endif">
                                                ({{ $product->available_quantity }}
                                                @if($product->available_quantity <= 10) Only @endif left in-stock)
                                            </span>
                                        @elseif(auth()->user()->user_type == "customer" && $product->available_quantity <= 10 && $product->available_quantity != 0)
                                            <span style="color: rgb(255, 106, 0);">({{ $product->available_quantity }} only left in-stock)</span>
                                        @elseif(auth()->user()->user_type == "customer" && $product->available_quantity == 0)
                                            <span style="color: red; ">(Out-of-stock)</span>
                                        @elseif(auth()->user()->user_type == "customer" && $product->available_quantity > 10)
                                            <span style="color: rgb(59, 188, 59); ">(In-stock)</span>
                                        @endif
                                    @endauth

                                    @if(!auth()->user())
                                        @if($product->available_quantity <= 10 && $product->available_quantity != 0)
                                            <span style="color: rgb(255, 106, 0);">({{ $product->available_quantity }} only left in-stock)</span>
                                        @elseif($product->available_quantity == 0)
                                            <span style="color: red; ">(Out-of-stock)</span>
                                        @elseif($product->available_quantity > 10)
                                            <span style="color: rgb(59, 188, 59); ">(In-stock)</span>
                                        @endif
                                    @endif
                                </div>
                                <div class="c-red"><u>Title:</u><a href="{{ route('single_product_page' , $product->id) }}" class="product_item_title_in_card"> {{ $product->name }}</a></div>
                                @if($product->discount > 0)
                                    <div class="c-red"><u>Original Price:</u> <del style="color: red;">{{$product->price}} EGP</del></div>
                                    <div class="c-red"><u>Sale Price:</u> <span style="color: green;">{{$product->price - ($product->price * $product->discount) }} EGP</span> <span style="color:rgb(155, 31, 151); font-weight: bold;">({{ $product->discount * 100 }}% OFF)</span></div>
                                @elseif($product->discount <= 0 || $product->discount == null || $product->discount == "")
                                    <div class="c-red"><u>Price:</u> {{$product->price}} EGP</div>
                                @endif
                                <div class="c-red"><u>Category:</u> {{ucfirst($product->product_category)}}</div>
                                @if($product->is_accessory == 'no')
                                    <div class="c-red"><u>Clothing Type:</u>
                                        @if($product->clothing_type == '1')
                                            Formal
                                        @elseif($product->clothing_type == '2')
                                            Casual
                                        @else
                                            Sports Wear
                                        @endif
                                        
                                        {{-- @inject('categories_clothing_type','App\Models\Category')
                                        {!! Form::select('name',$categories_clothing_type->pluck('name','id')) !!} --}}
                                    </div>
                                @else <!-- elseif($product->is_accessory == 'yes') -->
                                    <!-- empty -->
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="mt-2 mb-2" style="color:rgb(72, 125, 171);">
                        (Total Ratings: {{ \App\Models\Rating::where('product_id', $product->id)->count() }}) 
                    </div>
                    @auth
                        @if(auth()->user()->user_type == 'admin')
                            @include('layouts.website.admin-product-control-website')
                        @elseif(auth()->user()->user_type == 'customer')
                            <div style="width: 70%; margin-left: auto; margin-right: auto;">
                                @include('layouts.website.addCart-form')
                                @include('layouts.website.addRating-form')
                                @include('layouts.website.addFavorite-form')
                            </div>
                        @endif
                    @endauth

                    @if(Auth::guest())
                        <div style="margin-top: 2%; margin-bottom: 3%;">
                            <a class="add-to-cart-btn" href="{{ route('cart-unregistered') }}" style="padding: 9px 25px;">Add To Cart</a>
                            <a class="add-to-favorites-btn" href="{{ route('favorites-unregistered') }}">Add To Favorites</a>
                        </div>
                    @endif
            </div>
         {{-- @empty
            <div class="alert alert-danger" role="alert" style="text-align: center; margin-left: auto; margin-right: auto; margin-top: 2%; width: 40%">
                <span>No data found!</span>
            </div> 
            <?php 
                /* 
                @empty => acts like else from the if condition and for showing the other choice wich will be the error 
                (or the undefined data from the DB) if the data wasn't found in the code in "forelse" loop.
                */ 
             ?> --}}
        @endforeach
    </div>
</section>
@endsection

@section('scripts')
@endsection



