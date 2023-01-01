@extends('layouts.website.master')

@section('styles')
@endsection

@section('title')
    Favorites
@endsection

@section('content')


<!-- ***** Search bar Start ***** -->
@include('layouts.website.search-bar')
<!-- ***** Search bar End ***** -->

<section style="margin-top: 2%;">
    @if($favoriteItems_count == 0)
        <!-- empty area (because the "empty" from forelse loop will handle that error) -->
    @else
        <div class="alert alert-success" role="alert" style="text-align: center; margin-left: auto; margin-right: auto; margin-bottom: 2%; width: 40%">
            <span>Number of items in your favorites ({{ $favoriteItems_count }})</span>
        </div>
    @endif

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

    @if(session()->has('removeFavorite_message'))
        <div class="alert alert-success text-center session-message">
            <button type="button" class="close" data-dismiss="alert" style="color: rgb(173, 6, 6)">x</button>
            {{ session()->get('removeFavorite_message') }}
            {{-- <a href="{{route('favorites.restore',$favoriteItems->id)}}" onclick="return confirm('Are you sure that you want to restore ('$favoriteItems->favoriteItem_name')';" class="btn btn-secondary btn-xs" type="button" title="{{'Restore'." ($favoriteItems->favoriteItem_name)"}}"> Click here to undo action.</a> --}}
        </div>
    @endif

    <div style="display: flex; justify-content: flex-start; text-align: center; flex-wrap: wrap; padding: 0% 2%;">
        @forelse($favoriteItems as $favoriteItem)

            @php
            // the following condition is made on the "light" layout (and the other condition "dark" layout will be handled by else in a if condition)
            $now   = Carbon\Carbon::now();
            $start = Carbon\Carbon::createFromTimeString('00:00'); // 12:00 AM
            $end   = Carbon\Carbon::createFromTimeString('12:00'); // 12:00 PM

            // if ($now->between($start, $end)) {  
            //     echo ....;
            // }
             @endphp

                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 pt-3 pb-3 @if($now->between($start, $end)) bg-light @else bg-dark  @endif border" style="border: 1px solid black; @if($now->between($start, $end)) color: black; @else color: snow;  @endif">
                    <div class="curriculum-event-thumb">
                        <a href="{{ route('single_product_page' , $favoriteItem->product_id) }}">
                            @php $data = Carbon\Carbon::parse($favoriteItem->created_at)->diffInDays(Carbon\Carbon::now()); @endphp
                            @if($data <= 7) <!---------- in days ---------->
                                <span class="mt-2" style="position: absolute; background: rgba(0, 69, 175, 0.65); width: 180px; height: 35px; font-weight: bold; text-align: center; color: snow; opacity: 0.70;">
                                    <h3 style="font-weight: bolder;">NEW</h3>
                                </span>
                            @endif
                            <img class="mt-2" src="{{$favoriteItem->product_image}}" alt="{{$favoriteItem->product_name}}" style="width: 180px; height: 200px; border: 2px solid black;">
                        </a>
                    </div>
                    <div class="curriculum-event-content d-flex justify-content-center" >
                        <div class="row">
                            <div class="col-lg-12 col-sm-8 col-md-8 text-left mt-1">
                                <div class="c-red text-center">
                                    @auth
                                        @if(/* auth()->user()->user_type == "customer" && */ $favoriteItem->available_quantity <= 10 && $favoriteItem->available_quantity != 0)
                                            <span style="color: rgb(255, 106, 0);">({{ $favoriteItem->available_quantity }} only left in-stock)</span>
                                        @elseif(/* auth()->user()->user_type == "customer" && */ $favoriteItem->available_quantity == 0)
                                            <span style="color: red; ">(Out-of-stock)</span>
                                        @elseif(/* auth()->user()->user_type == "customer" && */ $favoriteItem->available_quantity > 10)
                                            <span style="color: rgb(59, 188, 59); ">(In-stock)</span>
                                        @endif
                                    @endauth
                                </div>
                                <div class="c-red"><u>Title:</u><a href="{{ route('single_product_page' , $favoriteItem->product_id) }}" class="product_item_title_in_card"> {{ $favoriteItem->product_name }}</a></div>
                                @if($favoriteItem->discount > 0)
                                    <div class="c-red"><u>Original Price:</u> <del style="color: red;">{{$favoriteItem->price}} EGP</del></div>
                                    <div class="c-red"><u>Sale Price:</u> <span style="color: green;">{{$favoriteItem->price - ($favoriteItem->price * $favoriteItem->discount) }} EGP</span></div>
                                @elseif($favoriteItem->discount <= 0 || $favoriteItem->discount == null || $favoriteItem->discount == "")
                                    <div class="c-red"><u>Price:</u> {{$favoriteItem->price}} EGP</div>
                                @endif
                                <div class="c-red"><u>Category:</u> {{ucfirst($favoriteItem->product_category)}}</div>
                                @if($favoriteItem->is_accessory == 'no')
                                    <div class="c-red"><u>Clothing Type:</u>
                                        @if($favoriteItem->clothing_type == '1')
                                            Formal
                                        @elseif($favoriteItem->clothing_type == '2')
                                            Casual
                                        @else
                                            Sports Wear
                                        @endif
                                    </div>
                                @else <!-- elseif($favoriteItem->is_accessory == 'yes') -->
                                    <!-- empty -->
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="mt-2 mb-2" style="color:rgb(72, 125, 171);">
                        (Total Ratings: {{ \App\Models\Rating::where('product_id', $favoriteItem->product_id)->count() }}) 
                    </div>
                    @auth
                        @if(auth()->user()->user_type == 'customer')
                            <div style="width: 70%; margin-left: auto; margin-right: auto;">
                                <!-- start add to cart -->
                                    <form action="{{ url('addCart' , $favoriteItem->product_id) }}" method="POST" style="margin-top: 2%; margin-bottom: 3%;">
                                        @csrf
                                        <div class="input-group">
                                            <!-- declaration for first field -->
                                            <input class="form-control input-sm" type="number" value="1" min="1" name="quantity" placeholder="Quantity">
                                    
                                            <!-- reducong the gap between them to zero -->
                                            <span class="input-group-btn" style="width: 5px;"></span>
                                    
                                            <!-- declaration for second field -->
                                            <input class="add-to-cart-btn" type="submit" value="Add To Cart" name="">
                                        </div>
                                    </form>
                                <!-- end add to cart -->

                                <!-- start add rating -->
                                    {{-- <form action="{{ url('addRating' , $favoriteItem->product_id) }}" method="POST" id="addRating-form" style="margin-top: 2%; margin-bottom: 3%;">
                                        @csrf
                                        <div class="input-group">                                    
                                            <select name="rating_level" class="form-control" onchange="this.form.submit()"> <!-- onchange="this.form.submit()" submits the form without the use of input/button type submit -->
                                                <option value="" disabled selected>--- Select Your Rating ---</option>
                                                <option value="1">Poor</option>      <!----- Poor ----->
                                                <option value="2">Average</option>   <!----- Average ----->
                                                <option value="3">Good</option>      <!----- Good ----->
                                                <option value="4">Very Good</option> <!----- Very Good ----->
                                                <option value="5">Excellent</option> <!----- Excellent ----->
                                            </select>
                                        </div>
                                    </form> --}}
                                    <form action="{{ url('addRating' , $favoriteItem->product_id) }}" method="POST" id="addRating-form" style="margin-top: 2%; margin-bottom: 3%;">
                                        @csrf
                                        <div class="star-wrapper">
                                            @foreach(range(5,1) as $i)
                                                <input class="fas fa-star star_{{ $i }}" value="{{ $i }}" type="radio" name="rating_level" onchange="this.form.submit()"/>
                                                <label class="fas fa-star star_{{ $i }}" class="star_{{ $i }}" for="star_{{ $i }}"></label>
                                            @endforeach
                                        </div>
                                    </form>
                                    <style>
                                        .star-wrapper {
                                            margin-left: auto;
                                            margin-right: auto;
                                            position: relative;
                                            direction: rtl;
                                        }
                                        .star-wrapper label {
                                            font-size: 0.9em;
                                            color: rgba(179, 172, 172, 0.61);
                                            text-decoration: none;
                                            transition: all 0.5s;
                                            margin: 4px;
                                        }
                                        .star-wrapper label:hover {
                                            color: gold;
                                            transform: scale(1.35);
                                        }
                                        .star_1:hover ~ label {
                                            color: gold;
                                        }
                                        .star_2:hover ~ label {
                                            color: gold;
                                        }
                                        .star_3:hover ~ label {
                                            color: gold;
                                        }
                                        .star_4:hover ~ label {
                                            color: gold;
                                        }
                                        .star_5:hover ~ label {
                                            color: gold;
                                        }
                                        .wraper {
                                            position: absolute;
                                            bottom: 30px;
                                            right: 50px;
                                        }
                                    </style>
                                <!-- end add rating -->
                                {!! Form::open([
                                    'route' => ['favorites.destroy',$favoriteItem->id],
                                    'method' => 'delete'
                                ])!!}
                                <button class="btn btn-danger btn-sm" style="width: 100%;" onclick="return confirm('{{__('Are you sure that you want to remove the ['.$favoriteItem->favoriteItem_name.'] item from your favorites?')}}');" type="submit" title="{{__('Remove')." [$favoriteItem->favoriteItem_name] item"}}"><i class="fa-solid fa-trash"></i>&nbsp;&nbsp;Remove</button>
                                {!! Form::close() !!}
                            </div>
                        @endif
                    @endauth
            </div>
        @empty
            <div class="alert alert-danger" role="alert" style="text-align: center; margin-left: auto; margin-right: auto; margin-top: 2%; width: 40%">
                <span>There are no favoriteItems in your favorites yet!</span>
            </div> 
        @endforelse

    </div>
</section>
@endsection

@section('scripts')
@endsection



