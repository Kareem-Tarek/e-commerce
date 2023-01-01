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

<div class="text-center mt-5" style="margin-bottom: 5%;">
    <img src="/assets/images/guest-login.gif" width="130" style="border-radius: 50px;"/>
    <h5 class="pt-4">Your are not logged in.<a href="{{ route('login') }}"> Log in</a> to add some products to your favorites!</h5>
    <h6 class="pt-3">Or <a href="{{ route('register') }}">register</a> if you don't have an account already!</h6>
</div>

<hr>

@include('layouts.website.social-media')

@endsection


@section('scripts')
@endsection



