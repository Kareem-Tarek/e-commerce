@extends('layouts.website.master')

@section('styles')
@endsection

@section('title')
   Home
@endsection

@section('content')

<style>
    .hover-content{background-color: rgba(117, 117, 117, 0.4);}
    .hover-content-for-product-items{padding: 2% 0%;}
</style>

<!-- ***** Search bar Start ***** -->
@include('layouts.website.search-bar')
<!-- ***** Search bar End ***** -->

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
    <div class="alert alert-danger text-center" style="width: 60%; margin-top: 5%; margin-bottom: -1.5%; margin-left: auto; margin-right: auto;">
        <button type="button" class="close" data-dismiss="alert" style="color: rgb(173, 6, 6)">x</button>
        {{ session()->get('quantity_is_null_message') }}
    </div>
@elseif(session()->has('quantity_is_zero_message'))
    <div class="alert alert-danger text-center" style="width: 60%; margin-top: 5%; margin-bottom: -1.5%; margin-left: auto; margin-right: auto;">
        <button type="button" class="close" data-dismiss="alert" style="color: rgb(173, 6, 6)">x</button>
        {{ session()->get('quantity_is_zero_message') }}
    </div>
@elseif(session()->has('quantity_is_negative_message'))
    <div class="alert alert-danger text-center" style="width: 60%; margin-top: 5%; margin-bottom: -1.5%; margin-left: auto; margin-right: auto;">
        <button type="button" class="close" data-dismiss="alert" style="color: rgb(173, 6, 6)">x</button>
        {{ session()->get('quantity_is_negative_message') }}
    </div>
@endif

@if(session()->has('addRating_message'))
    <div class="alert alert-success text-center" style="width: 60%; margin-top: 5%; margin-bottom: -1.5%; margin-left: auto; margin-right: auto;">
        <button type="button" class="close" data-dismiss="alert" style="color: rgb(173, 6, 6)">x</button>
        {{ session()->get('addRating_message') }}
    </div>
@endif

@if(session()->has('addFavorite_message'))
    <div class="alert alert-success text-center" style="width: 60%; margin-top: 5%; margin-bottom: -1.5%; margin-left: auto; margin-right: auto;">
        <button type="button" class="close" data-dismiss="alert" style="color: rgb(173, 6, 6)">x</button>
        {{ session()->get('addFavorite_message') }}<a href="{{ route('favorites-registered') }}"> Check your favorites</a>.
    </div>
@elseif(session()->has('addFavorite_already_added_message'))
    <div class="alert alert-danger text-center" style="width: 60%; margin-top: 5%; margin-bottom: -1.5%; margin-left: auto; margin-right: auto;">
        <button type="button" class="close" data-dismiss="alert" style="color: rgb(173, 6, 6)">x</button>
        {{ session()->get('addFavorite_already_added_message') }}
    </div>
@endif

@auth
    @if(auth()->user()->user_type == "supplier")
        <div class="supplier-add-new-product-div mt-5">
            <h3 class="text-center" style="color: snow;">Don't waste time anymore! Go ahead and add any of the products that you provide from&nbsp;<i class="fa-regular fa-hand-point-right"></i>&nbsp;<a href="{{route('products.create')}}" class="supplier-add-new-product-button" style="" type="" title="Add New Product">here</a>.</h3>
        </div>
    @elseif(auth()->user()->user_type == "admin" || auth()->user()->user_type == "moderator")
        <div class="admin-moderator-add-new-product-div d-flex justify-content-center mt-5">
            <h4>
                Hello 
                @if(auth()->user()->gender == 'male' || auth()->user()->gender == 'Male')
                    Mr.
                @elseif(auth()->user()->gender == 'female' || auth()->user()->gender == 'Female')
                    Mrs.
                @elseif(auth()->user()->gender == null || auth()->user()->gender == "")
                    Mr./Mrs.
                @endif 
                @if(auth()->user()->user_type == "admin") 
                    "<span class="admin-moderator-user-type">Admin</span>" {{-- {{ auth()->user()->user_type }} --}}
                @else 
                    "<span class="admin-moderator-user-type">Moderator</span>", {{-- {{ auth()->user()->user_type }} --}}
                @endif 
                you could add a new product from&nbsp;<a href="{{route('products.create')}}" class="" style="" type="" title="Add New Product">here</a>.
            </h4>
        </div>     
    @endif
@endauth

<!-- ***** Main Banner Area Start ***** -->
<div class="main-banner" id="top">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="left-content">
                    <div class="thumb">
                        <div class="inner-content">
                            <h4 class="px-3">We Are AA</h4>
                            <span class="px-3">
                                Awesome clothes in different styles. Checkout our latest Formal, Casual, &amp; Sports Wear
                            </span>
                            <div class="main-border-button px-3">
                                <a href="{{ route('about') }}">More..</a>
                            </div>
                        </div>
                        <img src="/assets/images/left-banner-image.jpg" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="right-content">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="right-first-image">
                                <div class="thumb">
                                    <div class="inner-content">
                                        <h4 >Formal</h4>
                                        <span class="px-2">Best formal clothes for men, women & kids</span>
                                    </div>
                                    <div class="hover-content">
                                        <div class="inner">
                                            <h4>Formal</h4>
                                            <p>Lorem ipsum dolor sit amet, conservisii ctetur adipiscing elit incid.</p>
                                            <div class="main-border-button">
                                                <a href="{{ route('formal_clothes_all_filter') }}">Discover More</a>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="{{ route('formal_clothes_all_filter') }}"><img src="/assets/images/baner-right-image-01.jpg"></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="right-first-image">
                                <div class="thumb">
                                    <div class="inner-content">
                                        <h4>Casual</h4>
                                        <span class="px-2">Best casual clothes for men, women & kids</span>
                                    </div>
                                    <div class="hover-content">
                                        <div class="inner">
                                            <h4>Casual</h4>
                                            <p>Lorem ipsum dolor sit amet, conservisii ctetur adipiscing elit incid.</p>
                                            <div class="main-border-button">
                                                <a href="{{ route('casual_clothes_all_filter') }}">Discover More</a>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="{{ route('casual_clothes_all_filter') }}"><img src="/assets/images/baner-right-image-02.jpg"></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="right-first-image">
                                <div class="thumb">
                                    <div class="inner-content">
                                        <h4>Sports Wear</h4>
                                        <span class="px-2">Best Sports Wear clothes for men, women & kids</span>
                                    </div>
                                    <div class="hover-content">
                                        <div class="inner">
                                            <h4>Sports Wear</h4>
                                            <p>Lorem ipsum dolor sit amet, conservisii ctetur adipiscing elit incid.</p>
                                            <div class="main-border-button">
                                                <a href="{{ route('sports_wear_clothes_all_filter') }}">Discover More</a>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="{{ route('sports_wear_clothes_all_filter') }}"><img src="/assets/images/baner-right-image-03.jpg"></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="right-first-image">
                                <div class="thumb">
                                    <div class="inner-content">
                                        <h4>Accessories</h4>
                                        <span>Best Trend Accessories</span>
                                    </div>
                                    <div class="hover-content">
                                        <div class="inner">
                                            <h4>Accessories</h4>
                                            <p>Lorem ipsum dolor sit amet, conservisii ctetur adipiscing elit incid.</p>
                                            <div class="main-border-button">
                                                <a href="{{ route('accessories_all_filter') }}">Discover More</a>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="{{ route('accessories_all_filter') }}"><img src="/assets/images/baner-right-image-04.jpg"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ***** Main Banner Area End ***** -->

<!-- Product Items Starts -->
<div class="product-items">
    <section class="section" id="women">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="section-heading text-center">
                        <h1 style="font-weight: bolder;">Here are some of our products...</h1>
                        {{-- @if(session()->has('addRating_women_message'))
                            <div class="alert alert-success text-center" style="width: %; margin-top: 5%; margin-left: auto; margin-right: auto;">
                                <button type="button" class="close" data-dismiss="alert" style="color: rgb(173, 6, 6)">x</button>
                                {{ session()->get('addRating_women_message') }}
                            </div>
                        @endif --}}
                        <span>Details to details is what makes AA different from the other themes.</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <!-------------------- first row -------------------->
            <div class="row">
                <div class="col-lg-12">
                    <div class="men-item-carousel">
                        <div class="owl-men-item owl-carousel">
                            @if(isset($products))
                                @foreach ( $products as $product )
                                <div class="item">
                                    <div class="thumb">
                                        <div class="hover-content hover-content-for-product-items">
                                            <ul>
                                                <li><a href="{{ route('single_product_page' , [$product->id, $product->clothing_type, $product->name]) }}" class="products-hover-icons eye-button"><i class="fa fa-eye"></i></a></li>
                                                <li><a href="javascript:void(0);" class="products-hover-icons star-button"><i class="fa fa-star"></i></a></li>
                                                <li>
                                                    <a href="javascript:void(0)" class="products-hover-icons add-to-cart-button" product-id="{{ $product->id }}"
                                                    user-id="{{ auth()->user()->id ?? 0 }}">
                                                        <i class="fa-solid fa-cart-plus"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <a href="{{ route('single_product_page' , [$product->id, $product->clothing_type, $product->name]) }}">
                                            <img src="{{ $product->image_name }}" alt="{{ $product->name }}" style="height: 450px; width: 100%; border: 2px solid black;">
                                            @php $data = Carbon\Carbon::parse($product->created_at)->diffInDays(Carbon\Carbon::now()); @endphp
                                            @if($data <= 7) <!---------- in days ---------->
                                                <span style="position: absolute;  top: 1px; background: rgba(0, 69, 175, 0.65); width:100%; font-weight: bold; text-align: center; color: snow; opacity: 0.70;">
                                                    <h3 style="font-weight: bolder;">NEW</h3>
                                                </span>
                                            {{-- @else <!---------- any other condition which is => more than the given period in the prevoious condition ---------->
                                                <span style="position: absolute;  top: 1px; background: rgba(175, 105, 0, 0.65); width:100%; font-weight: bold; text-align: center; color: snow;">
                                                    <h3 style="font-weight: bolder;">OLD</h3>
                                                </span> --}}
                                            @endif
                                        </a>
                                    </div>
                                    <div class="down-content">
                                        <h4>
                                            <a class="product_item_title" href="{{ route('single_product_page' , [$product->id, $product->clothing_type, $product->name]) }}">{{ $product->name }}</a>
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
                                        </h4>
                                        @if($product->discount > 0)
                                            <span><del style="color: red;">{{ $product->price }} EGP</del> <label style="color: #000;">&RightArrow;</label> {{ $product->price - ($product->price * $product->discount) }} EGP <span style="color:rgb(155, 31, 151); font-weight: bold; display:inline-block;">({{ $product->discount * 100  }}% OFF)</span></span>
                                        @elseif($product->discount <= 0 || $product->discount == null || $product->discount == "")
                                            <span>{{ $product->price }} EGP</span>
                                        @endif
                                        {{-- <ul class="stars pr-1"><br>
                                            <li><i class="fa fa-star" style="color: orange; width:13%;"></i></li>
                                            <li><i class="fa fa-star" style="color: orange; width:13%;"></i></li>
                                            <li><i class="fa fa-star" style="color: orange; width:13%;"></i></li>
                                            <li><i class="fa fa-star" style="color: orange; width:13%;"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                        </ul> --}}
                                        <div class="text-left" style="color:rgb(72, 125, 171);">
                                            Total Ratings: {{ \App\Models\Rating::where('product_id', $product->id)->count() }}
                                            —
                                            {{-- Average Rating: {{ \App\Models\Rating::where('product_id', $product->id)->select('id','rating_level')->get() ?? '' }} --}}
                                        </div>
                                        @auth
                                            @if(auth()->user()->user_type == 'admin')
                                                @include('layouts.website.admin-product-control-website')
                                            @elseif(auth()->user()->user_type == 'customer')
                                                @include('layouts.website.addCart-form')
                                                @include('layouts.website.addRating-form')
                                                @include('layouts.website.addFavorite-form')
                                            @endif
                                        @endauth

                                        @if(Auth::guest())
                                            <div style="margin-top: 2%; margin-bottom: 2%;">
                                                <a class="add-to-cart-btn" href="{{ route('cart-unregistered') }}" style="padding: 9px 25px;">Add To Cart</a>
                                                <a class="add-to-favorites-btn" href="{{ route('favorites-unregistered') }}">Add To Favorites</a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-------------------- second row -------------------->
            @if($products_count < 1)
                <!-- empty area -->
            @else
                <div class="row justify-content-center mt-4">
                    <!-- <a href="{{ route('products') }}" class="browse-more-products-link">Browse More..</a> -->
                    <div class="main-border-browse-more-button"><a href="{{ route('products') }}">Browse More..</a></div>
                </div>
            @endif
        </div>
    </section>
</div>
<!-- Product Items Ends -->

@include('layouts.website.explore')

@include('layouts.website.subscription-and-contact-info')

<hr>

@include('layouts.website.social-media')

<style>
    .supplier-add-new-product-div{
        background-image: linear-gradient(rgba(0, 106, 206, 0.9), rgba(0, 0, 0, 0.9), rgba(157, 66, 157, 0.9));
        padding: 4%;
        border-top: 4px solid black;
        border-bottom: 4px solid black;
    }

    .supplier-add-new-product-button{
        animation: anim_text_color 5s infinite;
    }

    @keyframes anim_text_color {
        0% {color: #0045AF;}
        25%{color: #3385ff;}
        38% {color: snow;}
        50%{color: #3385ff;}
        60%{color: rgb(102, 88, 211);}
        75% {color: snow;}
        88%{color: #3385ff;}
        94% {color: snow;}
        100% {color: #0045AF;}
    }

    .admin-moderator-add-new-product-div{
        background-image: linear-gradient(rgba(225, 225, 225, 0.9), rgba(0, 73, 141, 0.9), rgba(0, 0, 0, 0.9));
        padding: 4%;
        border-top: 4px solid black;
        border-bottom: 4px solid black;
        color: snow;
    }

    .admin-moderator-user-type{
        color:#4bdbff; 
        font-family: cursive;
    }
</style>

@endsection

@section('scripts')
@endsection



