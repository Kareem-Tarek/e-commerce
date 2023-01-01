@extends('layouts.website.master')

@section('styles')
@endsection

@section('title')
    Contact
@endsection

@section('content')

<div class="text-center" style="margin-bottom: 5%;">
    <img src="/assets/images/guest-login.gif" width="130" style="border-radius: 50px;"/>
    <h5 class="pt-4">Your are not logged in.<a href="{{ route('login') }}"> Log in</a> to submit your contact information!</h5>
    <h6 class="pt-3">Or <a href="{{ route('register') }}">register</a> if you don't have an account already!</h6>
</div>

<hr>

@include('layouts.website.social-media')

@endsection


@section('scripts')
@endsection



