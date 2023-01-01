@extends('layouts.website.master')

@section('styles')
@endsection

@section('title')
    Contact Us
@endsection

@section('content')
<style>
  .inline-item{display: inline;}
</style>

<div style="margin-top: -10%;">
    <!-- ***** Main Banner Area Start ***** -->
    <div class="page-heading about-page-heading" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-content">
                        <h2>Contact Us</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->

    <!-- ***** Contact Area Starts ***** -->
    <div class="contact-us">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div id="map">
                      {{-- <button id="switch">Click Here</button> --}}
                      {{-- <input id="switch" type="submit" value="Click Here"> --}}
                      <p class="mb-2" style="font-size: 100%;"><a id="switch" type="submit" href="javascript:void(0);">Click Here</a> to toggle between the standard "Road Map" & the "Satellite Map" with street names.</p>
                      <!-- Makram Ebeid Map (Roadmap) -->
                        <div id="mapouter_roadmap"><div class="gmap_canvas_roadmap"><iframe class="gmap_iframe_roadmap" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=makram ebied&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a href="https://piratebay-proxys.com/">Pirate Proxy</a></div><style>#mapouter_roadmap{position:relative;text-align:right;width:100%;height:400px;}.gmap_canvas_roadmap{overflow:hidden;background:none!important;width:100%;height:400px;}.gmap_iframe_roadmap{height:400px!important;}</style></div>
                      <!-- Makram Ebeid Map (Satellite with street names) -->
                        <div id="mapouter_satellite_with_street_names" hidden><div class="gmap_canvas_satellite_with_street_names"><iframe class="gmap_iframe_satellite_with_street_names" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=makram ebied&amp;t=h&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a href="https://piratebay-proxys.com/">Pirate Proxy</a></div><style>#mapouter_satellite_with_street_names{position:relative;text-align:right;width:100%;height:400px;}.gmap_canvas_satellite_with_street_names{overflow:hidden;background:none!important;width:100%;height:400px;}.gmap_iframe_satellite_with_street_names{height:400px!important;}</style></div>
                    </div>
                </div>
                <div class="col-lg-6" id="contact-form">
                    <div class="section-heading">
                        <h2>Don't Hesitate To Contact Us!</h2>
                    </div>
                    
                    @if(session()->has('contact_unsuccessful_message'))
                      <div class="alert alert-danger text-center" style="margin-top: 2%; margin-bottom: 5%;">
                          <button type="button" class="close" data-dismiss="alert" style="color: rgb(173, 6, 6)">x</button>
                          {{ session()->get('contact_unsuccessful_message') }}
                      </div>
                    @endif

                    <form id="contact" action="/contact-submit" method="POST">
                      @csrf
                        <div class="row">
                          <div class="col-lg-6">
                            <fieldset>
                              <input name="name" type="text" id="name" placeholder="Your name" required="">
                            </fieldset>
                          </div>
                          <div class="col-lg-6">
                            <fieldset>
                              <input name="email" type="text" id="email" placeholder="Your email" required="">
                            </fieldset>
                          </div>
                          <div class="col-lg-12 mt-4">
                            <fieldset>
                              <input name="subject" type="text" id="subject" placeholder="Subject" required="">
                            </fieldset>
                          </div>
                          <div class="col-lg-12">
                            <fieldset>
                              <textarea name="message" rows="6" id="message" placeholder="Your message..." required=""></textarea>
                            </fieldset>
                          </div>
                          <div class="col-lg-12">
                            <fieldset>
                              <button type="submit" id="form-submit" class="main-dark-button"><i class="fa-solid fa-check"></i></button>
                          </div>
                        </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Contact Area Ends ***** -->
</div>


<script type="text/javascript">
	const road_map = document.querySelector("#mapouter_roadmap"),
        satellite_map = document.querySelector("#mapouter_satellite_with_street_names");

	document.querySelector("#switch").addEventListener("click", function() {
		// hide element: element.hidden = true;
		// show element: element.hidden = false;
		road_map.hidden = !road_map.hidden;
		satellite_map.hidden = !satellite_map.hidden;
	});
</script>

@include('layouts.website.subscription-and-contact-info')

<hr>

@include('layouts.website.social-media')
@endsection

@section('scripts')
@endsection



