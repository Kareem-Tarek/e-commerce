@extends('layouts.website.master')

@section('styles')
@endsection

@section('title')
    Mission & Vision
@endsection

@section('content')

{{-- <div class="logo" style="width: 30%;">
  <img src="/assets/images/Anywhere-Anytime(1).png" alt="AA.png">
</div> --}}

<div class="row mission-vision-statement">
    <div class="col-sm-6">
      <div class="card">
        <div class="card-body mt-1">
          <div class="text-center pb-2"><img src="https://img.icons8.com/external-filled-outline-perfect-kalash/64/000000/external-Mission-investment-filled-outline-perfect-kalash.png"/></div>
          <h5 class="card-title text-center pb-1">Mission</h5>
          <p class="card-text text-center card-item">
            Our goal is to provide the most amount of value to our consumers by providing the most competitive prices, 
            the most extensive selection, and the most hassle-free shopping experience imaginable.
          </p>
        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="card">
        <div class="card-body mt-1">
          <div class="text-center pb-2"><img src="https://img.icons8.com/external-xnimrodx-lineal-gradient-xnimrodx/64/000000/external-vision-ui-and-ux-xnimrodx-lineal-gradient-xnimrodx.png"/></div>
          <h5 class="card-title text-center pb-1">Vision</h5>
          <p class="card-text text-center card-item">
            To be the company that is most focused on its consumers and provides them with a platform on which they can search 
            for and learn about any product they might be interested in purchasing online.
          </p>
        </div>
      </div>
    </div>
  </div>

  
  <style>
    .mission-vision-statement{padding-top: 6%; padding-bottom: 8%;}
    .card{margin-left: 8%; margin-right: 8%; height: 120%;}
    .card-title{color: #0083FF; font-weight: bold;}
    /* .card-body{position: relative;} */
    /* .card-item{position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 100%;} */

    /* .card:hover {background-color: black; color: snow; transition: 0.5s all ease-in-out;} */
  </style>

  {{-- <script>
    let card = document.querySelectorAll('.card');
    let card_text = document.querySelectorAll('.card-text');

    card.addEventListener("mouseover" , function(){
      card.style.backgroundColor = 'black';
      card_text.style.color = 'snow';
    })
  </script> --}}
@endsection

@section('scripts')
@endsection



