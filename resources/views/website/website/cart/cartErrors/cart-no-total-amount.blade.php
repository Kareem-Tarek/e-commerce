@extends('layouts.website.master')

@section('styles')
@endsection

@section('title')
    Cart - No Products Yet!
@endsection

@section('content')
<div class="text-center" style="margin-bottom: 5%;">
    <img src="/assets/images/cart-empty(5).gif" width="130" style="border-radius: 50px;"/>
    <h5 class="pt-4"><label style="background-color: beige;">Total Amount = {{ 0 }}</label><br>There are no items in your cart yet! Go ahead and add some cool items to it!</h5>
    {{-- <h6 class="pt-3">Or <a href="{{ route('register') }}">register</a> if you don't have an account already!</h6> --}}
</div>
@endsection

@section('scripts')
@endsection



