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

    <div class="container text-center mt-5">
        <div class="row" style="justify-content: center;">
            <img src="/assets/images/guest-login.gif" width="130" style="border-radius: 20px;"/>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                {{-- <img src="/assets/images/cart-empty(2).gif" width="130" style="border-radius: 20px;"/> --}}
                {{-- <img src="/assets/images/cart-empty(3).gif" width="130" style="border-radius: 20px;"/> --}}
                {{-- <img src="/assets/images/cart-empty(4).gif" width="130" style="border-radius: 20px;"/> --}}
                <h5 class="pt-4">Your are not logged in. Go ahead and <a href="{{ route('login') }}">log in</a> and add some cool stuff to it!</h5>
                <h6 class="pt-3">Or <a href="{{ route('register') }}">register</a> if you don't have an account already!</h6>
                <br><br>
                <a href="{{ route('products') }}" class="browse-products-link">Browse Products</a>
            </div>
        </div>
    </div>

    <style>
        img{border-radius: 10px;}

        h6 a{color: #0e74d4;}

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
    </style>
@endsection

@section('scripts')
@endsection



