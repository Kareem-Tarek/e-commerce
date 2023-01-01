@extends('layouts.website.master')

@section('styles')
@endsection

@section('title')
    Product is not found!
@endsection

@section('content')
<div style="background-image: linear-gradient(rgba(0, 0, 0, 0.65), rgba(0, 0, 0, 0.65)), url(/assets/images/bg-gif.gif); background-size: 100% auto; background-repeat: no-repeat; margin-top: -5%; margin-bottom: -4%;">
    <div class="text-center" style="padding-bottom: 4%; padding-top: 4%;">
        <img src="/assets/images/sad-face.png" width="130" style="border-radius: 5000px;"/><br>
        <span style="font-size: 500%; font-weight: bolder; color: snow;">Oops!</span><br>
        <h5 class="mb-4" style="font-weight: bold; color: snow;">404 - PAGE NOT FOUND</h5>
        <h6 class="mb-5" style="color: snow;">
            The product's page you are looking for might have been removed, <br>
            had its name changed or temporarily unavailable.
        </h6>
        <a href="{{ route('all_product_items') }}" class="back-to-products-page-link">Back To Products Page</a>
    </div>
</div>

<style>
    .back-to-products-page-link{
        background-color: #2F82FB; 
        color: snow;
        font-size: 80%; 
        font-weight: bold; 
        padding: 1%; 
        padding-left: 2%;
        padding-right: 2%;
        border-radius: 3px;
    }

    .back-to-products-page-link:hover{
        background-color: #0868F3; 
        color: snow;
    }
</style>
@endsection


@section('scripts')
@endsection



