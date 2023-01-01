<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/assets/images/Anywhere-Anytime(1).png" type="image/x-icon">
    <link rel="shortcut icon" href="/assets/images/Anywhere-Anytime(1).png" type="image/x-icon">
    <title> {{$user->name}} - Profile</title>
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Almarai&family=Harmattan&display=swap" rel="stylesheet">
    <!-- Font Awesome-->
    @includeIf('layouts.admin.partials.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<div class="loader-wrapper">
    <div class="theme-loader"></div>
</div>
<!-- Loader ends-->
<!-- page-wrapper Start-->
<div class="page-wrapper compact-sidebar" id="pageWrapper">
    <!-- Page Header Start-->
    <div class="page-main-header">
        <div class="main-header-right row m-0" style="background-color: #F7F7F7;">
            <div class="main-header-left">
                <div class="logo-wrapper"><a href="javascript:void(0)"><img class="img-fluid" src="{{asset('/assets/images/Anywhere-Anytime(1).png')}}" alt="GDP" style="width: 45%; border-radius:10px;"></a></div>
                <div class="dark-logo-wrapper"><a href="javascript:void(0)"><img class="img-fluid" src="{{asset('/assets/images/Anywhere-Anytime(2).png')}}" alt="GDP" style="width: 45%; border-radius:10px;"></a></div>
            </div>
            
            <div class="nav-right col pull-right right-menu p-0">
    
                <ul class="nav-menus">
                    <li>

                        <li><a href="{{ route('home') }}" style="color: rgb(0, 0, 0);">Home</a></li>

                        <li class="onhover-dropdown" style="cursor: context-menu;">
                            <div class="notification-box"><a href="{{ route('products') }}" style="color: #C8A17D; font-weight: bold;">Our Products</a><i data-feather="chevron-down"></i></div>
                            <ul class="notification-dropdown onhover-show-div">

                                <li class="noti-secondary">
                                    <div class="media">
                                        <a href="javascript:void(0);">
                                            <div class="media-body" style="color: rgb(0, 0, 0);">
                                                Men's Wear
                                            </div>
                                        </a>
                                    </div>
                                </li>
        
                                <li class="noti-secondary">
                                    <div class="media">
                                        <a href="javascript:void(0);">
                                            <div class="media-body" style="color: rgb(0, 0, 0);">
                                                Women's Wear
                                            </div>
                                        </a>
                                    </div>
                                </li>

                                <li class="noti-secondary">
                                    <div class="media">
                                        <a href="javascript:void(0);">
                                            <div class="media-body" style="color: rgb(0, 0, 0);">
                                                Kids' Wear
                                            </div>
                                        </a>
                                    </div>
                                </li>

                                <li class="noti-secondary">
                                    <div class="media">
                                        <a href="javascript:void(0);">
                                            <div class="media-body" style="color: rgb(0, 0, 0);">
                                                Accessories
                                            </div>
                                        </a>
                                    </div>
                                </li>

                            </ul>
                        </li>

                        <li class="onhover-dropdown" style="cursor: context-menu;">
                            <div class="notification-box">Our Company<i data-feather="chevron-down"></i></div>
                            <ul class="notification-dropdown onhover-show-div">

                                <li class="noti-secondary">
                                    <div class="media">
                                        <a href="javascript:void(0);">
                                            <div class="media-body" style="color: rgb(0, 0, 0);">
                                                About Us
                                            </div>
                                        </a>
                                    </div>
                                </li>
        
                                <li class="noti-secondary">
                                    <div class="media">
                                        <a href="javascript:void(0);">
                                            <div class="media-body" style="color: rgb(0, 0, 0);">
                                                Mission & Vision
                                            </div>
                                        </a>
                                    </div>
                                </li>

                                <li class="noti-secondary">
                                    <div class="media">
                                        <a href="javascript:void(0);">
                                            <div class="media-body" style="color: rgb(0, 0, 0);">
                                                Single Product
                                            </div>
                                        </a>
                                    </div>
                                </li>

                                <li class="noti-secondary">
                                    <div class="media">
                                        <a href="javascript:void(0);">
                                            <div class="media-body" style="color: rgb(0, 0, 0);">
                                                Contact
                                            </div>
                                        </a>
                                    </div>
                                </li>

                                <li class="noti-secondary">
                                    <div class="media">
                                        <a href="javascript:void(0);">
                                            <div class="media-body" style="color: rgb(0, 0, 0);">
                                                FAQ's
                                            </div>
                                        </a>
                                    </div>
                                </li>

                            </ul>
                        </li>

                    </li>

                    <li><a href="https://events.dev/en#suppliers-services-home-page" style="color: rgb(0, 0, 0);">Explore</a></li>
                    
                    <li><a href="javascript:void(0);" style="color: rgb(0, 0, 0);">About Us</a></li>
                    
                    <li><a href="javascript:void(0);" style="color: rgb(0, 0, 0);">Contact Us</a></li>

                    <li class="onhover-dropdown" style="cursor: context-menu;">
                        <div class="notification-box"><img style="border-radius: 4px;" width="40" class="username" src="{{auth()->user()->avatar}}" alt="{{auth()->user()->username ?? auth()->user()->name}}"><i data-feather="chevron-down"></i></div>
                        <ul class="notification-dropdown onhover-show-div">

                            @if(auth()->user()->user_type == 'admin' || auth()->user()->user_type == 'moderator' || auth()->user()->user_type == 'supplier')
                                <li class="noti-secondary">
                                    <div class="media">
                                        <a href="{{ route('dashboard') }}">
                                            <div class="media-body" style="color: rgb(0, 0, 0);">
                                                Dashboard
                                            </div>
                                        </a>
                                    </div>
                                </li>
                            @endif

                            @if(auth()->user()->user_type == 'customer')
                                <li class="noti-secondary">
                                    <div class="media">
                                        <a href="{{ route('favorites-registered') }}">
                                            <div class="media-body" style="color: rgb(0, 0, 0);">
                                                Favorites ({{\App\Models\Cart::where('customer_id',auth()->user()->id)->count()}})
                                            </div>
                                        </a>
                                    </div>
                                </li>
                            @endif
    
                            <li class="noti-secondary">
                                <div class="media">
                                    <a href="{{ route('User') }}">
                                        <div class="media-body" style="color: rgb(0, 0, 0);">
                                            Profile Management
                                        </div>
                                    </a>
                                </div>
                            </li>

                        </ul>
                    </li>

                    <li>
                        <span style="color: #9e9e9e; user-select: none;">
                            <!-- ucfirst(), is a back-end built-in function that capitalizes the first letter in each word -->
                            @if(auth()->user()->user_type == 'admin') 
                                {{ ucfirst(auth()->user()->user_type) }} <!-- same as "Admin" -->
                            @elseif(auth()->user()->user_type == 'moderator')
                                {{ ucfirst(auth()->user()->user_type) }} <!-- same as "Moderator" -->
                            @elseif(auth()->user()->user_type == 'customer')
                                {{ ucfirst(auth()->user()->user_type) }} <!-- same as "Customer" -->
                            @else <!------ user_type -> supplier ------>
                                {{ ucfirst(auth()->user()->user_type) }} <!-- same as "Supplier" -->
                            @endif
                        </span>
                    </li>
                    
                    <li><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i data-feather="maximize"></i></a></li>
    
                    <li class="onhover-dropdown p-0">
                        <button class="btn btn-primary-light" type="button" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i data-feather="log-out"></i>Logout</button>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </div>
    
            <div class="d-lg-none mobile-toggle pull-right w-auto"><i data-feather="more-horizontal"></i></div>
        </div>
    </div>
    <!-- Page Header Ends -->
    <!-- Page Body Start-->
    <div class="page-body-wrapper sidebar-icon">
        <!-- Page Sidebar Start-->
    <!-- Page Sidebar Ends-->
{{--        <div class="page-body">--}}
            <!-- Container-fluid starts-->
            <div class="container-fluid">
                <div class="user-profile">
                    <div class="row">
                        <!-- user users header start-->
                        <div class="col-sm-12">
                            <div class="card profile-header" style="margin-top: 10%;">
                                {{-- <img class="img-fluid bg-img-cover" src="{{$user->getFirstMediaUrl('cover')}}" alt="cover {{$user->name}}" />
                                <div class="profile-img-wrrap"><img class="img-fluid bg-img-cover" src="{{$user->getFirstMediaUrl('cover')}}" alt="cover {{$user->name}}" /></div> --}}
                                <img class="img-fluid bg-img-cover" src="{{$user->cover}}" alt="{{auth()->user()->username.'.cover' ?? auth()->user()->name.'.cover'}}" />
                                <div class="profile-img-wrrap"><img class="img-fluid bg-img-cover" src="{{$user->cover}}" alt="{{auth()->user()->username.'.cover' ?? auth()->user()->name.'.cover'}}" /></div>
                                <div class="userpro-box" style="padding-top: 8%; margin-left: auto; margin-right: auto; background-color: rgba(255, 255, 255, 0.80);">
                                    <div class="img-wrraper">
                                        <div class="avatar"><img class="img-fluid" src="{{$user->avatar}}" alt="{{auth()->user()->name ?? auth()->user()->username}}" /></div>
                                        <a class="icon-wrapper" href="{{route('editProfile')}}"><i class="icofont icofont-pencil-alt-5"></i></a>
                                    </div>
                                    <div class="user-designation">
                                        <div class="title">
                                            <a target="_blank" href="javascript:void(0);" style="cursor: context-menu">
                                                <h4>{{$user->name}}</h4>
                                                <h6 style="color: #0760b4;">
                                                    @if($user->user_type =='dashboard')
                                                        {{__('admin/home.admin_title')}}
                                                    @else
                                                        {{$user->user_type}}
                                                    @endif
                                                </h6>
                                            </a>
                                        </div>
                                        <div class="social-media">
                                            <ul class="user-list-social">
                                                <li>
                                                    <a href="https://facebook.com/{{$user->facebook}}" target="_blank"><i class="fa fa-facebook"></i></a>
                                                </li>
                                                {{-- <li>
                                                    <a href="https://twitter.com/{{$user->twitter}}" target="_blank"><i class="fa fa-twitter"></i></a>
                                                </li> --}}
                                                <li>
                                                    <a href="https://instagram.com/{{$user->instagram}}" target="_blank"><i class="fa fa-instagram"></i></a>
                                                </li>
                                                <li>
                                                    <a href="https://whatsapp.com/{{$user->whatsapp}}" target="_blank"><i class="fa fa-whatsapp"></i></a>
                                                </li>
                                                {{-- <li>
                                                    <a href="https://t.me/{{$user->telegram}}" target="_blank"><i class="fa fa-telegram"></i></a>
                                                </li> --}}
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- user users header end-->
                        <div class="col-xl-3 col-lg-12 col-md-5 xl-35">
                            <div class="default-according style-1 faq-accordion job-accordion">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="p-0">
                                                    <button class="btn btn-link ps-0" data-bs-toggle="collapse" data-bs-target="#collapseicon2" aria-expanded="true" aria-controls="collapseicon2">About Me</button>
                                                </h5>
                                            </div>
                                            <div class="collapse show" id="collapseicon2" aria-labelledby="collapseicon2" data-parent="#accordion">
                                                <div class="card-body post-about">
                                                    <ul>
                                                        <li>
                                                            <div class="icon"><i data-feather="at-sign"></i></div>
                                                            <div>
                                                                <h5>{{ $user->username ?? $user->name.'_'.substr(uniqid(),8,13) }}</h5>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon">
                                                                <i data-feather="mail"></i>
                                                            </div>
                                                            <div>
                                                                <h5>{{$user->email ?? __('admin/home.alertEmail')}}</h5>
                                                                <span>
                                                                    @auth
                                                                        @if(auth()->user()->email_verified_at == null)
                                                                            <a href="{{ route('email-verification') }}" style="font-size: 90%;"><u>(Unverified. Verify Email Now!)</u></a>
                                                                        @else
                                                                            <label style="font-size: 80%;">Verified <i class="fa-solid fa-circle-check"></i></label>
                                                                        @endif
                                                                     @endauth
                                                                </span>
                                                            </div>
                                                        </li>

                                                        <li>
                                                            <div class="icon"><i class="fa-solid fa-user" style="color: #2494FD;"></i></div>
                                                            <div>
                                                                <h5>{{$user->user_type}}</h5>
                                                            </div>
                                                        </li>

                                                        <li>
                                                            <div class="icon"><i data-feather="map-pin"></i></div>
                                                            <div>
                                                                <h5>{{$user->address ?? '???'}}</h5>
                                                                <p>{{$user->city->name ?? 'city ??'}} - {{$user->governorate->name ?? 'governorate ??'}} - {{$user->country->name ?? 'country ??'}}</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon"><i class="fa-solid fa-cake-candles" style="color: #2494FD;"></i></div>
                                                            <div>
                                                                <h5>{{$user->dob ?? '???'}}</h5>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <!-- ucfirst(), it's a function that capitalizes the first letter in each word -->
                                                            @if($user->gender == 'male' || $user->gender == ucfirst('male'))
                                                                <div class="icon"><i class="fa fa-male" style="color: #2494FD;"></i></div>
                                                            @elseif($user->gender == 'female' || $user->gender == ucfirst('female'))
                                                                <div class="icon"><i class="fa fa-venus" style="color: #2494FD;"></i></div>
                                                            @else <!-- elseif($user->gender == null || $user->gender == "") -->
                                                                <div class="icon">
                                                                    <img src="https://img.icons8.com/external-dreamstale-lineal-dreamstale/32/000000/external-empty-science-education-dreamstale-lineal-dreamstale.png" style="width: 45%;"/>
                                                                </div>
                                                            @endif
                                                            <div>
                                                                <h5>{{$user->gender ?? '???'}}</h5>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if(auth()->user()->user_type == 'customer')
                            <div class="col-xl-9 col-lg-12 col-md-7 xl-65">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="p-0">
                                            <span>Information about your cart items...</span>
                                        </h5>
                                        <div class="alert alert-primary mt-4" role="alert" style="text-align: center; margin-left: auto; margin-right: auto; margin-bottom: -1.5%; width: 40%;">
                                            <span>Number of total items ({{ $cartItems_count }})</span>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-2">
                                            <h6>
                                                <a href="{{ route('cart-registered') }}">Go check your cart</a> to <u>update</u> or <u>remove</u> some items from it.
                                            </h6>
                                            Or you could browse our products from <a href="{{ route('products') }}"><strong>here</strong></a> to <u>add</u> some cool stuff to it.
                                        </div>
                                        @forelse($cartItems as $cartItem)
                                            <div class="col-xxl-12 col-lg-12">
                                                <div class="project-box">
                                                    <h6>{{ $loop->iteration}}.</h6>
                                                    <div class="media">
                                                        <img class="img-100 rounded-circle" src="{{ $cartItem->product_image ?? ''}}" alt="{{$cartItem->product_name ?? ''}}" data-original-title="" title="" />
                                                        {{-- <div class="media-body">
                                                            <h5 style="color: rgb(169, 169, 169);">{{ $cartItem->product_name ?? ''}}</h5>
                                                        </div> --}}
                                                    </div>
                                                    {{-- <p>{!! Illuminate\Support\Str::limit($cartItem->product_name,'70','...') !!}</p> --}}
                                                    <h6 style="color: rgb(169, 169, 169);">{{ $cartItem->product_name ?? ''}}</h6>
                                                    <div class="row details mt-4">
                                                        <div class="col-6"><span>Category</span></div>
                                                        <div class="col-6 font-secondary">{{ ucfirst($cartItem->product_category) ?? ''}}</div>
                                                        <div class="col-6"><span>Is Accessory?</span></div>
                                                        <div class="col-6 font-secondary">{{ ucfirst($cartItem->is_accessory) ?? ''}}</div>
                                                        <div class="col-6"><span>Quantity</span></div>
                                                        <div class="col-6 font-secondary">{{ $cartItem->quantity ?? ''}}</div>
                                                        <div class="col-6"><span>Price/Unit</span></div>
                                                        @if($cartItem->discount > 0)
                                                            <div class="col-6 font-danger"><del>{{ $cartItem->price }} EGP</del> <label class="font-secondary">&RightArrow;</label> <span class="col-6" style="color: green !important;">{{ $cartItem->price - ($cartItem->price * $cartItem->discount) }} EGP</span><span style="color:rgb(155, 31, 151); font-weight: bold;"> ({{ $cartItem->discount * 100  }}% OFF)</span></div>
                                                        @elseif($cartItem->discount <= 0 || $cartItem->discount == null || $cartItem->discount == "")
                                                            <div class="col-6 font-secondary">{{ $cartItem->price }} EGP</div>
                                                        @endif
                                                        <div class="col-6"><span>Total Amount</span></div>
                                                        @if($cartItem->discount > 0)
                                                            <div class="col-6 font-danger"><del>{{ $cartItem->quantity * $cartItem->price }} EGP</del> <label class="font-secondary">&RightArrow;</label> <span class="col-6 font-primary">{{ $cartItem->quantity * ($cartItem->price - ($cartItem->price * $cartItem->discount)) }} EGP</span></div>
                                                        @elseif($cartItem->discount <= 0 || $cartItem->discount == null || $cartItem->discount == "")
                                                            <div class="col-6 font-primary">{{ $cartItem->quantity * $cartItem->price }} EGP</div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <div class="alert alert-danger">
                                                There is no data yet.
                                            </div>
                                        @endforelse
                                    </div>
                                </div>
                            </div>

                            {{-- <nav class="m-b-30" aria-label="Page navigation example">
                                <ul class="pagination justify-content-center pagination-primary text-center">
                                    {!! $cartItems->links('pagination::bootstrap-5') !!}
                                </ul>
                            </nav> --}}
                        @endif

                        {{-- @if(auth()->user()->user_type == 'supplier')
                         <div class="col-xl-9 col-lg-12 col-md-7 xl-65">
                            <div class="card">
                                <div class="card-body">
                                @forelse($offers as $offer)
                                <!-- event start-->
                                    <div class="col-xxl-12 col-lg-12">
                                        <div class="project-box">
                                            @if($offer->value == 0)
                                                <span class="badge badge-danger">{{__('website/home.is_paid_pending')}}</span>
                                            @elseif($offer->value == 1)
                                                <span class="badge badge-success" style="color:bisque;">{{__('website/home.is_paid_success')}}</span>
                                            @endif
                                            <h6>{{__('website/home.offers')}}</h6>
                                            <div class="media">
                                                <img class="img-20 me-2 rounded-circle" src="{{$offer->user->photo ?? ''}}" alt="{{$offer->user->name ?? ''}}" data-original-title="" title="" />
                                                <div class="media-body">
                                                    <p>{{$offer->user->name ?? ''}}</p>
                                                </div>
                                            </div>
                                            <p>{{$offer->body}}</p>
                                            <div class="row details">
                                                <div class="col-6"><span>{{__('admin/event.date')}}</span></div>
                                                <div class="col-6 font-secondary">{{$offer->created_at}}</div>
                                                <div class="col-6"><span>{{__('admin/event.budget')}}</span></div>
                                                <div class="col-6 font-danger">{{$offer->value}} {{__('admin/home.currency')}}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- event end-->
                                    @empty
                                        <div class="alert alert-secondary">
                                            {{__('admin/home.alert_no_data')}}
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                         </div>
                        @endif --}}

                    </div>
                </div>
            </div>
        <!-- Container-fluid Ends-->
{{--        </div>--}}

        <!-- footer start-->
        <footer class="footer" style="margin-left: auto; margin-right:auto">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 footer-copyright">
                        <p class="mb-0">Copyright {{date('Y')}}-{{date('y', strtotime('+1 year'))}} © viho All rights reserved.</p>
                    </div>
                    <div class="col-md-6">
                        <p class="pull-right mb-0">Hand crafted & made with <i class="fa fa-heart font-secondary"></i></p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
<!-- latest jquery-->
@includeIf('layouts.admin.partials.js')
<script>
    $(document).ready(function(){
        var form = $('#alert-form'),
            original = form.serialize()

        form.submit(function(){
            window.onbeforeunload = null
        })

        window.onbeforeunload = function(){
            if (form.serialize() != original)
                return '{{__('admin/home.alert_form')}}'
        }
    })

    var toggle_icon = document.getElementById('dark-only');
    var body = document.getElementsByTagName('body')[0];
    var dark_theme_class = 'dark-only';

    toggle_icon.addEventListener('click', function() {
        if (body.classList.contains(dark_theme_class)) {

            body.classList.remove(dark_theme_class);

            setCookie('theme', 'empty');

        } else {
            body.classList.add(dark_theme_class);

            setCookie('theme', 'dark-only');

        }
    });

    function setCookie(name, value) {
        var d = new Date();
        d.setTime(d.getTime() + (365*24*60*60*1000));
        var expires = "expires=" + d.toUTCString();
        document.cookie = name + "=" + value + ";" + expires + ";path=/";
    }

</script>
</body>
</html>







