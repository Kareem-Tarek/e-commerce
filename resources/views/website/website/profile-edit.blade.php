<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/assets/images/Anywhere-Anytime(1).png" type="image/x-icon">
    <link rel="shortcut icon" href="/assets/images/Anywhere-Anytime(1).png" type="image/x-icon">
    <title>{{auth()->user()->name}} - Edit Profile</title>
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
                    <li style="padding-right: 3%;">

                        <li><a href="{{ route('home') }}" style="color: rgb(0, 0, 0);">Home</a></li>

                        <li class="onhover-dropdown" style="cursor: context-menu;">
                            <div class="notification-box" style="color: #C8A17D; font-weight: bold;">Our Products<i data-feather="chevron-down"></i></div>
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
                        <div class="notification-box"><img style="border-radius: 4px;" width="40" class="username" src="{{auth()->user()->avatar}}" alt="{{auth()->user()->name ?? auth()->user()->username}}"><i data-feather="chevron-down"></i></div>
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
                            @if(auth()->user()->user_type == 'admin') <!------ user_type -> admin ------>
                                Admin
                            @elseif(auth()->user()->user_type == 'moderator') <!------ user_type -> moderator ------>
                                Moderator
                            @elseif(auth()->user()->user_type == 'customer') <!------ user_type -> customer ------>
                                Customer
                            @else <!------ user_type -> supplier ------>
                                Supplier
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
            @include('layouts.admin.partials.validation-errors')
            <div class="container-fluid">
                <div class="edit-profile">
                    <div class="row">

                        <div class="col-xl-4" style="margin-top: 10%">
                            <div class="card">
                                <div class="card-header pb-0">
                                    <h4 class="card-title mb-0">My Profile</h4>
                                    <div class="card-options">
                                        <a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form action="{{route('editProfile-post')}}" method="post">
                                        @csrf
                                        <div class="row mb-2">
                                            <div class="profile-title">
                                                <div class="media">
                                                    <img class="img-70 rounded-circle" alt="{{$model->username ?? $model->name}}" src="{{$model->avatar}}" style="font-size: 90%;" />
                                                    <div class="media-body">
                                                        <h3 class="mb-1 f-20 txt-primary">{{$model->name ?? $model->username}}</h3>
                                                        <p class="f-2">
                                                            @if($model->user_type == 'admin') <!------ user_type -> admin ------>
                                                                Admin
                                                            @elseif($model->user_type == 'moderator') <!------ user_type -> moderator ------>
                                                                Moderator
                                                            @elseif($model->user_type == 'customer') <!------ user_type -> customer ------>
                                                                Customer
                                                            @else <!------ user_type -> supplier ------>
                                                                Supplier
                                                            @endif
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-5"><h5>Change Password</h5></div>

                                        @if(session()->has('user_password_updated_message'))
                                        <div class="alert alert-success text-center" style="width: 60%; margin-top: 1%; margin-left: auto; margin-right: auto;">
                                            {{ session()->get('user_password_updated_message') }}
                                        </div>
                                        @endif

                                        <div class="mb-3">
                                            <label class="form-label">Current Password</label>
                                            {{-- <input class="form-control @error('current_password') is-invalid @enderror" name="current_password" type="password" placeholder="Enter Current Password" value="{{Request::old('password') ? Request::old('password') : $password_decrypt}}"/> --}}
                                            <input class="form-control @error('current_password') is-invalid @enderror" name="current_password" type="password" placeholder="Enter Current Password"/>
                                            @error('current_password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">New Password</label>
                                            <input class="form-control @error('password') is-invalid @enderror" name="password" type="password" placeholder="Enter New Password"/>
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Confirm New Password</label>
                                            <input class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" type="password" placeholder="New Password"/>
                                            @error('password_confirmation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-footer">
                                            <button class="btn btn-primary btn-block" type="submit">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-8" style="margin-top: 10%">
                            <form action="{{route('editMyProfile')}}" method="post" class="card" files="true" enctype="multipart/form-data">
                                @csrf
                                <div class="card-header pb-0">
                                    <h4 class="card-title mb-0">Edit Profile</h4>
                                    
                                    @if(session()->has('user_profile_updated_message'))
                                        <div class="alert alert-success text-center" style="width: 60%; margin-top: 1%; margin-left: auto; margin-right: auto;">
                                            {{ session()->get('user_profile_updated_message') }}
                                        </div>
                                    @endif

                                    <div class="card-options">
                                        <a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a>
                                    </div>
                                </div>
                                <div class="card-body" style="margin-top: 8%;">
                                    <div class="row">

                                        <div class="col-sm-6 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Name</label>
                                                <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" placeholder="Enter your full name" autocomplete="off" value="{{Request::old('name') ? Request::old('name') : $model->name}}"/>
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Username</label>
                                                {{-- @if(auth()->user()->username == Socialite::driver('github')->user())
                                                    <input class="form-control @error('username') is-invalid @enderror" type="text" name="username" placeholder="Enter your username" autocomplete="off" value="{{Request::old('username') ? Request::old('username') : $model->username}}" disabled/>
                                                @else --}}
                                                    <input class="form-control @error('username') is-invalid @enderror" type="text" name="username" placeholder="Enter your username" autocomplete="off" value="{{Request::old('username') ? Request::old('username') : $model->username}}"/>
                                                {{-- @endif --}}
                                                @error('username')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Phone</label>
                                                <input class="form-control @error('phone') is-invalid @enderror" type="tel" name="phone" placeholder="Enter your phone number" autocomplete="off" value="{{Request::old('phone') ? Request::old('phone') : $model->phone}}"/>
                                                @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Email</label>
                                                <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" placeholder="Enter your email" autocomplete="off" value="{{Request::old('email') ? Request::old('email') : $model->email}}"/>
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-md-6">
                                            <label class="form-label">Gender</label>
                                            <div class="form-group m-checkbox-inline custom-radio-ml">
                                                <div class="radio radio-primary">
                                                    <input id="radioinline1" type="radio" name="gender" {{ isset($model) && $model->gender == 'Male' ? 'checked'  : '' }}  value="Male">
                                                    <label class="mb-0" for="radioinline1">Male</label>
                                                </div>
                                                <div class="radio radio-primary">
                                                    <input id="radioinline2" type="radio" name="gender" {{ isset($model) && $model->gender == 'Female' ? 'checked'  : '' }} value="Female">
                                                    <label class="mb-0" for="radioinline2">Female</label>
                                                </div>
                                            </div>
                                            @error('gender')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-sm-6 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Date of Birth</label>
                                                <input class="form-control @error('dob') is-invalid @enderror" type="date" name="dob" autocomplete="off" value="{{Request::old('dob') ? Request::old('dob') : $model->dob}}"/>
                                                @error('dob')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label">Address</label>
                                                <input class="form-control @error('address') is-invalid @enderror" type="text" name="address" placeholder="Enter your address" autocomplete="off" value="{{Request::old('address') ? Request::old('address') : $model->address}}"/>
                                                @error('address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        {{-- <div class="col-sm-6 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">{{__('admin/user.postal_code')}}</label>
                                                <input class="form-control @error('postal_code') is-invalid @enderror" type="number" name="postal_code" placeholder="{{__('admin/user.enter_postal_code')}}" autocomplete="off" value="{{Request::old('postal_code') ? Request::old('postal_code') : $model->postal_code}}"/>
                                                @error('postal_code')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div> --}}

                                        {{-- <div class="col-sm-6 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">{{__('admin/user.state_province')}}</label>
                                                <input class="form-control @error('state_province') is-invalid @enderror" type="text" name="state_province" placeholder="{{__('admin/user.enter_state_province')}}" autocomplete="off" value="{{Request::old('state_province') ? Request::old('state_province') : $model->state_province}}"/>
                                                @error('state_province')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div> --}}

                                        {{-- <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Country</label>
                                                @inject('countries','App\Models\Country')
                                                {!! Form::select('country_id',$countries->pluck('name','id'),Request::old('country_id') ? Request::old('country_id') : $model->country_id,[
                                                    'placeholder' => __('admin/home.select'),
                                                    'class'       => 'form-control select'. ( $errors->has('country_id') ? ' is-invalid' : '' )
                                                ]) !!}
                                                @error('country_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div> --}}

                                        {{-- <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Governorate</label>
                                                @inject('governorate','App\Models\Governorate')
                                                {!! Form::select('governorate_id',$governorate->pluck('name','id'),Request::old('governorate_id') ? Request::old('governorate_id') : $model->governorate_id,[
                                                    'placeholder' => __('admin/home.select'),
                                                    'class'       => 'form-control select'. ( $errors->has('governorate_id') ? ' is-invalid' : '' )
                                                ]) !!}
                                                @error('governorate_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div> --}}

                                        {{-- <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">City</label>
                                                @inject('cities','App\Models\City')
                                                {!! Form::select('city_id',$cities->pluck('name','id'),Request::old('city_id') ? Request::old('city_id') : $model->city_id,[
                                                    'placeholder' => __('admin/home.select'),
                                                    'class'       => 'form-control select'.( $errors->has('city_id') ? ' is-invalid' : '' )
                                                ]) !!}
                                                @error('city_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div> --}}

                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label">Bio</label>
                                                <textarea class="form-control" rows="5" name="bio" placeholder="Enter your bio here...">{{Request::old('bio') ? Request::old('bio') : $model->bio}}</textarea>
                                                @error('bio')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-md-6">
                                            <div class="mb-3 input-group-solid">
                                                <label class="form-label">Facebook</label>
                                                <div class="input-group">
                                                    <span class="input-group-text"><i class="icofont icofont-social-facebook"></i></span>
                                                    <input class="form-control @error('facebook') is-invalid @enderror" type="text" name="facebook" placeholder="Enter Facebook User Profile Link" autocomplete="off" value="{{Request::old('facebook') ? Request::old('facebook') : $model->facebook}}"/>
                                                    @error('facebook')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        {{-- <div class="col-sm-6 col-md-6">
                                            <div class="mb-3 input-group-solid">
                                                <label class="form-label">Twitter</label>
                                                <div class="input-group">
                                                    <span class="input-group-text"><i class="icofont icofont-social-twitter"></i></span>
                                                    <input class="form-control @error('twitter') is-invalid @enderror" type="text" name="twitter" placeholder="Enter Twitter Username" autocomplete="off" value="{{Request::old('twitter') ? Request::old('twitter') : $model->twitter}}"/>
                                                    @error('twitter')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div> --}}

                                        <div class="col-sm-4 col-md-4">
                                            <div class="mb-3 input-group-solid">
                                                <label class="form-label">Instagram</label>
                                                <div class="input-group">
                                                    <span class="input-group-text"><i class="icofont icofont-social-instagram"></i></span>
                                                    <input class="form-control @error('instagram') is-invalid @enderror" type="text" name="instagram" placeholder="Enter Instagram Username" autocomplete="off" value="{{Request::old('instagram') ? Request::old('instagram') : $model->instagram}}"/>
                                                    @error('instagram')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-4 col-md-4">
                                            <div class="mb-3 input-group-solid">
                                                <label class="form-label">WhatsApp</label>
                                                <div class="input-group">
                                                    <span class="input-group-text"><i class="icofont icofont-social-whatsapp"></i></span>
                                                    <input class="form-control @error('whatsapp') is-invalid @enderror" type="tel" name="whatsApp" placeholder="Enter WhatsApp Number" autocomplete="off" value="{{Request::old('whatsApp') ? Request::old('whatsApp') : $model->whatsapp}}"/>
                                                    @error('whatsapp')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        {{-- <div class="col-sm-4 col-md-4">
                                            <div class="mb-3 input-group-solid">
                                                <label class="form-label">Telegram</label>
                                                <div class="input-group">
                                                    <span class="input-group-text"><i class="icofont icofont-social-telegram"></i></span>
                                                    <input class="form-control @error('telegram') is-invalid @enderror" type="text" name="telegram" placeholder="Enter Telegram Username" autocomplete="off" value="{{Request::old('telegram') ? Request::old('telegram') : $model->telegram}}"/>
                                                    @error('telegram')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div> --}}

                                        <div class="col-sm-6 col-md-6">
                                            <div class="mb-6">
                                                <label class="form-label">Avatar</label>
                                                <input class="form-control @error('avatar') is-invalid @enderror" type="file" name="avatar"/>
                                                @error('avatar')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-md-6">
                                            <div class="mb-6">
                                                <label class="form-label">Cover Image</label>
                                                <input class="form-control @error('cover') is-invalid @enderror" type="file" name="cover"/>
                                                @error('cover')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="card-footer text-end">
                                    <button class="btn btn-primary" type="submit">Update Profile</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        <!-- Container-fluid Ends-->
{{--        </div>--}}

        <!-- footer start-->
        <footer class="footer" style="margin-left: auto; margin-right: auto;">
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


