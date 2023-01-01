@extends('layouts.website.master')

@section('styles')
@endsection

@section('title')
    Thank You!
@endsection

@section('content')

<div class="text-center" style="margin-bottom: 5%;">
    <h3 class="countDown" style="margin-left: auto; margin-right: auto; width:3%; color: snow; background-color: #0868F3; border-radius: 100px;"></h3>
    <h3 class="mt-2">Thank you for getting in touch!</h3>
    <h5 class="mt-4">We appreciate you contacting us. One of our teams will get back in touch with you soon! Have a great day!</h5>
</div>

<hr>

@include('layouts.website.social-media')

@endsection

{{-- http://localhost:8000/contact-info-submitted --}}

@section('scripts')
<script>
var count = 21; // intialization

setInterval(function(){
    count--; //decrementation by 1
    document.querySelector('.countDown').innerHTML = count;

    if (count <= 0) { //(the wrong condition) ending condition to handle any kind of decrementation errors (zero & counting in negatives)
        count += 1;
        window.location = 'http://localhost:8000/home';
    }
    else if(count == 4 || count == 2){
        document.querySelector('.countDown').style.backgroundColor = '#D3D3D3';
        document.querySelector('.countDown').style.color = 'black';
    }
    else if(count == 5 || count == 3 || count == 1){
        document.querySelector('.countDown').style.backgroundColor = '#D3D3D3';
        document.querySelector('.countDown').style.color = 'red';
    }
},1000);

/* the 1000 represents the incrementation/decrementation (and 1000 is equals to each 1 second so in this case will 
   decrement 1 second by each count from variable "count" to 1 which is the timing from when the count begun and the 
   timing between each count decrement) */
</script>
@endsection



