<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>
        @yield('title')
    </title>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous"> --}}
    
    <!-- Additional CSS Files -->
    
    {{-- <link rel="stylesheet" href="{{ mix('/css/app.css') }}"> --}}
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="/assets/css/font-awesome.css" type="text/css">
    <link rel="stylesheet" href="/assets/css/templatemo-hexashop.css">
    <link rel="stylesheet" href="/assets/css/owl-carousel.css">
    <link rel="stylesheet" href="/assets/css/lightbox.css">
    <link rel="stylesheet" href="/assets/css/my-custom-css.css"> <!-- My Custom CSS file (doesn't belong to the template) -->

    @yield('styles')

<!--

TemplateMo 571 Hexashop

https://templatemo.com/tm-571-hexashop

-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @livewireStyles
    <!-- icon in the title -->
    <link rel="icon" href="/assets/images/Anywhere-Anytime(1).png" type="image/x-icon">
    <link rel="shortcut icon" href="/assets/images/Anywhere-Anytime(1).png" type="image/x-icon">
    </head>

    <body>
        <style>
            body{
                /* background-color: rgba(249, 208, 232, 0.20); */
                background-color: rgb(255, 255, 255);
            }
        </style>
    <div id="app" style="padding-top: 10%;">
            <!-- ***** Preloader Start ***** -->
        <div id="preloader">
            <div class="jumper">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
        <!-- ***** Preloader End ***** -->

        <!-- ***** Header Start ***** -->
        @include('layouts.website.header')
        <!-- ***** Header End ***** -->

        <!-- ***** Container/Content Start ***** -->
        @yield('content')                 <!--All the pages of the website are in a sections within a blade.php files
                                            (in the views) that called "content" which acts as a variable for each page-->
        <!-- ***** Container/Content End ***** -->

        <!-- ***** Footer Start ***** -->
        @include('layouts.website.footer') 
        <!-- ***** Footer End ***** -->

        <!-- ***** Sticky Clock Start ***** -->
        @include('layouts.website.live-clock-date')
        <!-- ***** Sticky Clock End ***** -->

        <!-- ***** Register Now Start (for guests ONLY!) ***** -->
        @include('layouts.website.register-now')
        <!-- ***** Register Now End (for guests ONLY!) ***** -->

        <!-- ***** Scroll Up Start ***** -->
        @include('layouts.website.scroll-up')
        <!-- ***** Scroll Up End ***** -->

    </div>

    <!-- js & jQuery -->
    <script src="/assets/js/jquery-2.1.0.min.js"></script>
    {{-- <script src="{{ url('public/js/app.js') }}" defer></script> --}}
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> --}}
    <script src="{{ asset('js/app.js') }}" ></script>    <!-- My Custom JS file (doesn't belong to the template) -->
    <!-- Bootstrap -->
    <script src="/assets/js/popper.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="/assets/js/owl-carousel.js"></script>
    <script src="/assets/js/accordions.js"></script>
    <script src="/assets/js/datepicker.js"></script>
    <script src="/assets/js/scrollreveal.min.js"></script>
    <script src="/assets/js/waypoints.min.js"></script>
    <script src="/assets/js/jquery.counterup.min.js"></script>
    <script src="/assets/js/imgfix.min.js"></script>
    <script src="/assets/js/slick.js"></script>
    <script src="/assets/js/lightbox.js"></script>
    <script src="/assets/js/isotope.js"></script>

    <!-- Global Init -->
    <script src="/assets/js/custom.js"></script>

    <script src="/assets/js/my_custom.js"></script>

    <script>

        $(function() {
            var selectedClass = "";
            $("p").click(function(){
            selectedClass = $(this).attr("data-rel");
            $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("."+selectedClass).fadeOut();
            setTimeout(function() {
            $("."+selectedClass).fadeIn();
            $("#portfolio").fadeTo(50, 1);
            }, 500);

            });
        });

    </script>
    @yield('scripts')
    @livewireScripts
</body>
</html>
