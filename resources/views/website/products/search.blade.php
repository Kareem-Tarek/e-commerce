@extends('layouts.website.master')

@section('styles')
@endsection

@section('title')
    @if($search_text_input == "") <?php //for empty search box (no entered query!) ?>
        Search box is empty!
    @else <?php //for wrong & correct data from the DB ?>
        @if($products_result_count == 0)
            Results - {{ '"'.$search_text_input.'" ['.$products_result_count.']' }} - Not found! <?php /* "." is for concatenating static front-end
                                                                                                    codes with dynamic back-end codes */ ?>
        @else
            Results - {{ '"'.$search_text_input.'" ['.$products_result_count.']' }}
        @endif
   @endif
@endsection

@section('content')
<style>
    .session-message{
        width: 60%;
        margin-top: 1%;
        margin-bottom: 3%;
        margin-left: auto;
        margin-right: auto;
    }
    /* .table-search-results{margin-left: auto; margin-right: auto;} */
</style>

<!-- ***** Search bar Start ***** -->
@include('layouts.website.search-bar')
<!-- ***** Search bar End ***** -->

<div id="search-blade" class="search-blade mt-5">
    <?php /********************************** Start Dashboard Table for Product (for dashboard!) **********************************/ ?>
    {{-- <table border="1" cellpadding="10" class="table-search-results">
        <thead>
            <tr style="padding: 5%;">
                <th scope = "col">#</th>
                <th scope = "col">ID</th>
                <th scope = "col">Title</th>
                <th scope = "col">Price</th>
                <th scope = "col">Category</th>
                @if(auth()->user()->user_type == 'admin')
                    <th scope = "col">Action</th>
                @endif
            </tr>
        </thead>

        <tbody>
            @foreach($products_result as $product)
                <tr>
                    <th>{{ $loop->iteration}}</th>
                    <td>{{ $product->id ?? 'Not Found'}}</th>
                    <td>{{ $product->name ?? 'Not Found' }}</td>
                    <td>{{ $product->price ?? 'Not Found' }}</td>
                    <td>{{ $product->product_category ?? '' }}</td>
                    @if(auth()->user()->user_type == 'admin')
                        <td style="display: flex;">
                            <div style="margin-top: 5%;">
                                <button class="btn btn-success">Edit</button>
                                <a href="javascript:void(0);" style="background-color: rgb(36, 157, 36); color: snow; padding: 25%; border-radius: 2px;">
                                    Edit
                                </a>
                            </div>
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table> --}}
    <?php /********************************** End Dashboard Table for Product (for dashboard!) **********************************/ ?>

    <section class="product-results-section" style="padding: 0% 2%;">
            @if($search_text_input == "")
                <div class="alert alert-danger" role="alert" style="text-align: center; margin-left: auto; margin-right: auto;  width: 40%;">
                    <span style="font-size: 110%; font-weight: bold;">The search box is empty. You didn't enter anything in it!</span>
                </div>
            {{-- @elseif($search_text != $products_result)
                <div class="alert alert-danger" role="alert" style="text-align: center; margin-left: auto; margin-right: auto; margin-bottom: 2%; width: 40%;">
                    <span style="font-size: 110%; font-weight: bold;">"{{ $search_text }}" Not Found!</span>
                </div> --}}
            @else <?php //@elseif($search_text == $products_result) ?>
                @if($products_result_count == 0)
                    <div class="alert alert-danger" style="text-align: center; margin-left: auto; margin-right: auto; width: 40%;">
                        "{{ $search_text_input }}" results ({{ $products_result_count }}) - Not found!
                    </div>
                    @auth
                        @if(auth()->user()->user_type == "admin" || auth()->user()->user_type == "moderator" || auth()->user()->user_type == "supplier")
                            <div class="d-flex justify-content-center">
                                Try to add a new product from&nbsp;<a href="{{route('products.create')}}" class="" style="" type="" title="Add New Product">here</a>.
                            </div>
                        @endif
                     @endauth
                @else
                    <div class="alert alert-success" style="text-align: center; margin-left: auto; margin-right: auto; width: 40%;">
                        "{{ $search_text_input }}" results ({{ $products_result_count }})
                    </div>
                    @auth
                        @if(auth()->user()->user_type == "admin" || auth()->user()->user_type == "moderator" || auth()->user()->user_type == "supplier")
                            <div class="d-flex justify-content-center mb-4">
                                <a href="{{route('products.create')}}" class="btn btn-dark" style="" type="button" title="Add New Product">Add New Product</a>
                            </div>
                        @endif
                    @endauth
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

                <div style="display: flex; justify-content: flex-start; text-align: center; flex-wrap: wrap;">
                    @forelse($products_result as $product)
                        <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 mt-3 pt-3 pb-3 bg-light border">
                                <div class="curriculum-event-thumb">
                                    {{-- @php $data = Carbon\Carbon::parse($product->created_at)->diffInDays(Carbon\Carbon::now()); @endphp
                                    @if($data <= 7) <!---------- in days ---------->
                                        <span style="font-weight: bold; color: rgb(54, 42, 163);">
                                            <img src="/assets/images/new-icon.png" alt="new_item" style="width: 20%;">
                                        </span>
                                    @endif --}}

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
                                <div class="curriculum-event-content d-flex justify-content-center">
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
                                            <div class="c-red"><u>Title:</u><a href="{{ route('single_product_page' , $product->id) }}" class="product_item_title_in_card"> {{$product->name}}</a></div>
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

                                                    {{-- {{ $product->clothing_type }} --}}

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
                                        {{-- <div style="margin-top: 4%; margin-bottom: 5%;">
                                            <a href="{{ route('cart-registered') }}" style="background-color: rgb(48, 116, 217); color: snow; padding: 1.5% 3%; border-radius: 4px;">
                                                Add Cart
                                            </a>
                                        </div> --}}
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
                        @empty
                        {{-- <div class="alert alert-danger" role="alert" style="text-align: center; margin-left: auto; margin-right: auto; margin-top: 2%; width: 40%">
                            <span>{{ $search_text }} not found!</span>
                        </div>
                        <?php
                            /*
                            Note:
                            in this case (the search functionality) error is handled with if condition (in line 67 ~ 69)
                            and the result proves that the data count is equals to (0) which is no data to retrieve from
                            the DB (because the entered query didn't match the data that already exists in the DB
                            which is described as the following => $search_text != $products_result).

                            @empty => acts like else from the if condition and for showing the other choice wich will be the error
                            (or the undefined data from the DB) if the data wasn't found in the code in "forelse" loop.
                            */
                        ?> --}}
                    @endforelse
                </div>
            @endif
    </section>

</div>
@endsection

@section('scripts')
@endsection



