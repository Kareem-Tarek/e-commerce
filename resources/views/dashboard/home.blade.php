@extends('layouts.admin.master')

@section('title')
    Dashboard - Home
@endsection

@push('css')
<link rel="stylesheet" type="text/css" href="{{asset('admin/css/animate.css')}}">
@endpush
@section('content')

<style>
    .number-count{
        font-weight: bold;
    }

    .no-select-line{
        user-select: none;
        color: black;
    }

    .show-btn{
        color: black;
        padding:2% 5%;
        margin-top: 5%;
        font-weight: bold;
        border-radius:5px;
        transition: 0.40s ease-in-out;
        border: 2px solid rgb(0, 0, 0);
    }

    .show-btn:hover{
        border: 2px solid #0083FF;
        background-color:rgb(40, 37, 37);
        color: rgb(255, 255, 255);
    }
</style>

@yield('breadcrumb-list')

@if(auth()->user()->user_type == "admin" || auth()->user()->user_type == "moderator")
    <!-- Container-fluid starts-->
    <div class="container-fluid dashboard-default-sec mt-5">

        <div class="row">
            <div class="col-xl-6 box-col-12 des-xl-100">
                <div class="row">

                    <div class="col-xl-6 col-md-6 col-sm-6 box-col-3 des-xl-25 rate-sec">
                        <div class="card income-card">
                            <div class="card-body text-center">
                                <div class="round-box">
                                    <i class="fa-solid fa-align-justify" style="font-size: 180%;"></i>
                                </div>
                                <h6>Categories</h6>
                                <span class="number-count" style="font-size: 180%;">{{\App\Models\Category::count()}}</span><br>
                                <span class="no-select-line">⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯</span>
                                <a class="btn-arrow arrow-primary show-btn" href="{{ route('categories.index') }}" >
                                Show
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 col-md-6 col-sm-6 box-col-3 des-xl-25 rate-sec">
                        <div class="card income-card">
                            <div class="card-body text-center">
                                <div class="round-box">
                                    <i class="fa-solid fa-box-open" style="font-size: 180%;"></i>
                                </div>
                                <h6>All Products</h6>
                                <span class="number-count" style="font-size: 180%;">{{\App\Models\Product::count()}}</span><br>
                                <span class="no-select-line">⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯</span>
                                <a class="btn-arrow arrow-primary show-btn" href="{{ route('products.index') }}" >
                                Show
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-xl-6 box-col-12 des-xl-100">
                <div class="row">

                    <div class="col-xl-6 col-md-6 col-sm-6 box-col-3 des-xl-25 rate-sec">
                        <div class="card income-card">
                            <div class="card-body text-center">
                                <div class="round-box">
                                    <i class="fa-solid fa-box-open" style="font-size: 180%;"></i>&nbsp;
                                    <i class="fa-solid fa-percent" style="font-size: 160%;"></i>&nbsp;&nbsp;
                                    <i class="fa-solid fa-circle-xmark" style="font-size: 120%;"></i>
                                </div>
                                <h6>Products (with no sales)</h6>
                                <span class="number-count" style="font-size: 180%;">{{\App\Models\Product::where('discount' , '<=' , 0)->orWhere('discount' , '=' , null)->count()}}</span><br>
                                <span class="no-select-line">⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯</span>
                                <a class="btn-arrow arrow-primary show-btn" href="{{ route('products.index') }}" >
                                Show
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 col-md-6 col-sm-6 box-col-3 des-xl-25 rate-sec">
                        <div class="card income-card">
                            <div class="card-body text-center">
                                <div class="round-box">
                                    <i class="fa-solid fa-box-open" style="font-size: 180%;"></i>&nbsp;
                                    <i class="fa-solid fa-percent" style="font-size: 160%;"></i>&nbsp;&nbsp;
                                    <i class="fa-solid fa-circle-check" style="font-size: 120%;"></i>
                                </div>
                                <h6>Products (with sales)</h6>
                                <span class="number-count" style="font-size: 180%;">{{\App\Models\Product::where('discount' , '>' , 0)->count()}}</span><br>
                                <span class="no-select-line">⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯</span>
                                <a class="btn-arrow arrow-primary show-btn" href="{{ route('products.index') }}" >
                                Show
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-xl-6 box-col-12 des-xl-100">
                <div class="row">

                    <div class="col-xl-6 col-md-6 col-sm-6 box-col-3 des-xl-25 rate-sec">
                        <div class="card income-card">
                            <div class="card-body text-center">
                                <div class="round-box">
                                    <i class="fa-solid fa-children" style="font-size: 230%;"></i>
                                </div>
                                <h6>Kids' Wear</h6>
                                <span class="number-count" style="font-size: 180%;">{{\App\Models\Product::where('product_category','kids')->count()}}</span><br>
                                <span class="no-select-line">⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯</span>
                                <a class="btn-arrow arrow-primary show-btn" href="{{ route('products.index') }}" >
                                Show
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 col-md-6 col-sm-6 box-col-3 des-xl-25 rate-sec">
                        <div class="card income-card">
                            <div class="card-body text-center">
                                <div class="round-box">
                                    <i class="fa-solid fa-person-dress" style="font-size: 230%;"></i>
                                </div>
                                <h6>Women's Wear</h6>
                                <span class="number-count" style="font-size: 180%;">{{\App\Models\Product::where('product_category','women')->count()}}</span><br>
                                <span class="no-select-line">⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯</span>
                                <a class="btn-arrow arrow-primary show-btn" href="{{ route('products.index') }}" >
                                Show
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-xl-6 box-col-12 des-xl-100">
                <div class="row">

                    <div class="col-xl-6 col-md-6 col-sm-6 box-col-3 des-xl-25 rate-sec">
                        <div class="card income-card">
                            <div class="card-body text-center">
                                <div class="round-box">
                                    <i class="fa-solid fa-person" style="font-size: 230%;"></i>
                                </div>
                                <h6>Men's Wear</h6>
                                <span class="number-count" style="font-size: 180%;">{{\App\Models\Product::where('product_category','men')->count()}}</span><br>
                                <span class="no-select-line">⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯</span>
                                <a class="btn-arrow arrow-primary show-btn" href="{{ route('products.index') }}" >
                                Show
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 col-md-6 col-sm-6 box-col-3 des-xl-25 rate-sec">
                        <div class="card income-card">
                            <div class="card-body text-center">
                                <div class="round-box">
                                    <i class="fa-solid fa-hands-asl-interpreting" style="font-size: 230%;"></i>
                                </div>
                                <h6>All Accessories</h6>
                                <span class="number-count" style="font-size: 180%;">{{\App\Models\Product::where('is_accessory','yes')->count()}}</span><br>
                                <span class="no-select-line">⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯</span>
                                <a class="btn-arrow arrow-primary show-btn" href="{{ route('products.index') }}" >
                                Show
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-xl-12 box-col-12 des-xl-100">
                <div class="row">

                    <div class="col-xl-6 col-md-6 col-sm-6 box-col-3 des-xl-25 rate-sec">
                        <div class="card income-card">
                            <div class="card-body text-center">
                                <div class="round-box">
                                    <i class="fa-solid fa-star" style="font-size: 230%;"></i>
                                </div>
                                <h6>Ratings</h6>
                                <span class="number-count" style="font-size: 180%;">{{\App\Models\Rating::count()}}</span><br>
                                <span class="no-select-line">⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯</span>
                                <a class="btn-arrow arrow-primary show-btn" href="javascript:void(0);" >
                                Show
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 col-md-6 col-sm-6 box-col-3 des-xl-25 rate-sec">
                        <div class="card income-card">
                            <div class="card-body text-center">
                                <div class="round-box">
                                    <i class="fa-solid fa-cart-shopping" style="font-size: 230%;"></i>
                                </div>
                                <h6>Carts</h6>
                                <span class="number-count" style="font-size: 180%;">{{\App\Models\Cart::count()}}</span><br>
                                <span class="no-select-line">⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯</span>
                                <a class="btn-arrow arrow-primary show-btn" href="{{ route('carts.index') }}" >
                                Show
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <hr>

        <!---------------------------------- Start User information ---------------------------------->
        <div class="row">
            <div style="text-align: center; padding-bottom: 3%; font-size: 180%; font-weight: bold;">Users Information</div>
            <div class="col-xl-12 box-col-12 des-xl-100">
                <div class="row" style="justify-content: space-evenly">

                    <div class="col-xl-2 col-md-6 col-sm-6 box-col-3 des-xl-25 rate-sec">
                        <div class="card income-card">
                            <div class="card-body text-center">
                                <div class="round-box">
                                    <i class="fa fa-users" style="font-size: 180%;"></i>
                                </div>
                                <h6>All users</h6>
                                <span class="number-count" style="font-size: 180%;">{{\App\Models\User::count()}}</span><br>
                                <span class="no-select-line">⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯</span>
                                <a class="btn-arrow arrow-primary show-btn" href="" >
                                Show
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-2 col-md-6 col-sm-6 box-col-3 des-xl-25 rate-sec">
                        <div class="card income-card">
                            <div class="card-body text-center">
                                <div class="round-box">
                                    <i class="fa-solid fa-user" style="font-size: 180%;"></i>
                                </div>
                                <h6>Customers</h6>
                                <span class="number-count" style="font-size: 180%;">{{\App\Models\User::where('user_type','customer')->count()}}</span><br>
                                <span class="no-select-line">⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯</span>
                                <a class="btn-arrow arrow-primary show-btn" href="" >
                                Show
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-2 col-md-6 col-sm-6 box-col-3 des-xl-25 rate-sec">
                        <div class="card income-card">
                            <div class="card-body text-center">
                                <div class="round-box">
                                    {{-- <i class="fa-solid fa-user-check" style="font-size: 180%;"></i> --}}
                                    <i class="fa-solid fa-user-gear" style="font-size: 180%;"></i>
                                </div>
                                <h6>Suppliers</h6>
                                <span class="number-count" style="font-size: 180%;">{{\App\Models\User::where('user_type','supplier')->count()}}</span><br>
                                <span class="no-select-line">⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯</span>
                                <a class="btn-arrow arrow-primary show-btn" href="" >
                                Show
                                </a>
                            </div>
                        </div>
                    </div>


                    <div class="col-xl-2 col-md-6 col-sm-6 box-col-3 des-xl-25 rate-sec">
                        <div class="card income-card">
                            <div class="card-body text-center">
                                <div class="round-box">
                                    <i class="fa-solid fa-gears" style="font-size: 250%;"></i>
                                </div>
                                <h6>Admins</h6>
                                <span class="number-count" style="font-size: 180%;">{{\App\Models\User::where('user_type','admin')->count()}}</span><br>
                                <span class="no-select-line">⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯</span>
                                <a class="btn-arrow arrow-primary show-btn" href="" >
                                Show
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-2 col-md-6 col-sm-6 box-col-3 des-xl-25 rate-sec">
                        <div class="card income-card">
                            <div class="card-body text-center">
                                <div class="round-box">
                                    <i class="fa-solid fa-gear" style="font-size: 180%;"></i>
                                </div>
                                <h6>Moderators</h6>
                                <span class="number-count" style="font-size: 180%;">{{\App\Models\User::where('user_type','moderator')->count()}}</span><br>
                                <span class="no-select-line">⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯</span>
                                <a class="btn-arrow arrow-primary show-btn" href="" >
                                Show
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!---------------------------------- End User information ---------------------------------->
    </div>
    <!-- Container-fluid Ends-->
@else <?php //elseif(auth()->user()->user_type == "supplier") ?>
    <?php //empty area ?>
@endif

@push('scripts')
<script src="{{asset('admin/js/counter/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('admin/js/counter/jquery.counterup.min.js')}}"></script>
<script src="{{asset('admin/js/counter/counter-custom.js')}}"></script>

@endpush
@endsection
