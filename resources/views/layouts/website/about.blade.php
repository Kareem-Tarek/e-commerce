@extends('layouts.website.master')

@section('styles')
@endsection

@section('title')
    About Us
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
                            <h2>About Our Company</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ***** Main Banner Area End ***** -->
    
        <!-- ***** About Area Starts ***** -->
        <div class="about-us">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="left-image">
                            <img src="/assets/images/about-left-image.jpg" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="right-content">
                            <h4>About Us &amp; Our Skills</h4>
                            <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod kon tempor incididunt ut labore.</span>
                            <div class="quote">
                                <i class="fa fa-quote-left"></i><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiuski smod kon tempor incididunt ut labore.</p>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod kon tempor incididunt ut labore et dolore magna aliqua ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>
                            <ul>
                                <li ><a href="javascript:void(0);"><i class="facebook-icon fa-brands fa-facebook-f"></i></a></li>
                                <li><a href="javascript:void(0);"><i class="twitter-icon fa-brands fa-twitter"></i></a></li>
                                <li><a href="javascript:void(0);"><i class="linkedin-icon fa-brands fa-linkedin"></i></a></li>
                                <li><a href="javascript:void(0);"><i class="instagram-icon fa-brands fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ***** About Area Ends ***** -->
    
        <!-- ***** Our Team Area Starts ***** -->
        <section class="our-team">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="section-heading">
                            {{-- <h2>Our Amazing Team</h2> --}}
                            <h2>Meet The Business Owner</h2>
                        </div>
                    </div>

                    {{-- <div class="col-lg-4">
                        <div class="team-item">
                            <div class="thumb">
                                <div class="hover-effect">
                                    <div class="inner-content">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                            <li><a href="#"><i class="fa fa-behance"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <img src="/assets/images/team-member-01.jpg">
                            </div>
                            <div class="down-content">
                                <h4>Ragnar Lodbrok</h4>
                                <span>Product Caretaker</span>
                            </div>
                        </div>
                    </div> --}}

                    {{-- <div class="col-lg-4">
                        <div class="team-item">
                            <div class="thumb">
                                <div class="hover-effect">
                                    <div class="inner-content">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                            <li><a href="#"><i class="fa fa-behance"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <img src="/assets/images/team-member-02.jpg">
                            </div>
                            <div class="down-content">
                                <h4>Ragnar Lodbrok</h4>
                                <span>Product Caretaker</span>
                            </div>
                        </div>
                    </div> --}}

                    <div class="col-lg-3">
                        <div class="team-item">
                            <div class="thumb">
                                <div class="hover-effect">
                                    <div class="inner-content">
                                        <ul>
                                            <li ><a href="https://www.facebook.com/kareemtarekpk/"><i class="facebook-icon fa-brands fa-facebook-f"></i></a></li>
                                            <li><a href="javascript:void(0);"><i class="twitter-icon fa-brands fa-twitter"></i></a></li>
                                            <li><a href="https://www.linkedin.com/in/kareem-tarek-1899a71a0"><i class="linkedin-icon fa-brands fa-linkedin"></i></a></li>
                                            <li><a href="https://www.instagram.com/kareemtarekpk/"><i class="instagram-icon fa-brands fa-instagram"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <img src="/assets/images/our-amazing-team/kareem.png" style="border-radius: 8px;">
                            </div>
                            {{-- <div class="down-content" style="background-color: red;">
                                <h4>Kareem Tarek</h4>
                                <span>Founder &amp; CEO</span>
                                <p>Kareem Tarek is business magnate and investor. He is the founder, CEO &amp; Web Developer of AA.</p>
                                <p>
                                    He started his life career in business and then shifted to IT career and used both careers 
                                    for his advantage to make his own online business company (AA).
                                </p>
                            </div> --}}
                        </div>
                    </div>

                    <div class="col-lg-12 mt-1">
                        <div class="text-center" style="">
                            <h4 style="font-weight: bold;">Kareem Tarek</h4>
                            <span style="color: rgb(166, 165, 165);">Founder &amp; CEO</span>
                            <p>Kareem Tarek is business magnate and investor. He is the founder, CEO &amp; Web Developer of AA.</p>
                            <p>
                                He started his life career in business and then shifted to IT career and used both careers 
                                for his advantage to make his own online business company (AA).
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- ***** Our Team Area Ends ***** -->
    
        <!-- ***** Services Area Starts ***** -->
        <section class="our-services">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-heading">
                            <h2>Our Products</h2>
                            <span>Check out the different categories & styles of products that our vendors provide.</span>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="service-item">
                            <h4>Formal</h4>
                            <p>
                                @foreach($categories_description as $category_description)
                                    @if($category_description->name == "Formal")
                                        {{ $category_description->description }}
                                    @endif
                                @endforeach
                            </p>
                            <img src="/assets/images/service-01.jpg" alt="">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="service-item">
                            <h4>Casual</h4>
                            <p>
                                @foreach($categories_description as $category_description)
                                    @if($category_description->name == "Casual")
                                        {{ $category_description->description }}
                                    @endif
                                @endforeach
                            </p>
                            <img src="/assets/images/service-02.jpg" alt="">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="service-item">
                            <h4>Sports Wear</h4>
                            <p>
                                @foreach($categories_description as $category_description)
                                    @if($category_description->name == "Sports Wear")
                                        {{ $category_description->description }}
                                    @endif
                                @endforeach
                            </p>
                            <img src="/assets/images/service-03.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ***** Services Area Ends ***** -->
</div>

@include('layouts.website.subscription-and-contact-info')

<hr>

@include('layouts.website.social-media')
@endsection

@section('scripts')
@endsection



