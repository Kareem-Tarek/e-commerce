<header class="main-nav">
    <div class="sidebar-user text-center mt-2" style="margin-bottom: 1%;">
        <a class="setting-primary" href="javascript:void(0);"><i data-feather="settings"></i></a><img class="img-90 rounded-circle" src="{{ auth()->user()->avatar ?? ''}}" alt="{{auth()->user()->username}}" />
        @php $data = Carbon\Carbon::parse(Auth::user()->created_at)->diffInDays(Carbon\Carbon::now()); @endphp
        @if($data <= 7) <!---------- in days ---------->
            <div class="badge-bottom mt-1">
                <span class="badge badge-primary">New</span>
            </div>
        @endif
    <a href="javascript:void(0);">
        <h6 class="mt-3 f-14 f-w-600 name" onMouseOver="this.style.color='grey'" onMouseOut="this.style.color=''">{{auth()->user()->name ?? ''}}</h6>
    </a>
    <p class="mt-1 font-roboto">{{auth()->user()->email ?? ''}}</p>
    </div>

    <div class="sidebar-main-title text-center mt-2" style="color: #0083FF; border-bottom: 1px solid #E6EDEF;">
        <h6>
            @if(auth()->user()->user_type == "admin")
                Admin
            @elseif(auth()->user()->user_type == "moderator")
                Moderator
            @elseif(auth()->user()->user_type == "supplier")
                Supplier
            @endif
            Dashboard
        </h6>
    </div>

    

    <nav>
        <div class="main-navbar">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="mainnav">
                <ul class="nav-menu custom-scrollbar">
                    <li class="back-btn">
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                    </li>

                    <!------------- Start route dashboard ------------->
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="{{route('dashboard')}}"><i class="fa fa-institution" style="font-size: 130%;"></i><span>&nbsp;&nbsp;&nbsp;&nbsp;Dashboard (Home)</span></a>
                    </li>
                    <!------------- End route dashboard ------------->


                    <!------------- Start route main website ------------->
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="{{route('home')}}" target="_blank"><i class="fa fa-home" style="font-size: 150%;"></i><span>&nbsp;&nbsp;&nbsp;&nbsp;Website (Home)</span></a>
                    </li>
                    <!------------- End route main website ------------->

                    @if(auth()->user()->user_type == "admin" || auth()->user()->user_type == "moderator")
                        <!------------- Start route users ------------->

                        <li class="dropdown">
                            <a class="nav-link menu-title" href="javascript:void(0)">
                                <i class="fa fa-users"></i></i>&nbsp;&nbsp;&nbsp;&nbsp;
                                <span>Users</span>
                            </a>
                            <ul class="nav-submenu menu-content" style="">
                                {{-- <li class="dropdown">
                                    <span class="drop-down-all-users">All Users</span>
                                    <div class="dropdown-content">
                                        <a href="javascript:void(0); "class="javascript:void(0);">Admins</a>
                                        <a href="javascript:void(0); "class="javascript:void(0);">Moderators</a>
                                        <a href="javascript:void(0); "class="javascript:void(0);">Suppliers</a>
                                        <a href="javascript:void(0); "class="javascript:void(0);">Customers</a>
                                    </div>
                                </li> --}}
                                <li><a href="{{route('users.create')}}" class="{{route('users.create')}}">Create User</a></li>
                                <li><a href="{{ route('users.index') }}" class="{{ route('users.index') }}">All Users</a></li>
                                <li><a href="javascript:void(0); "class="javascript:void(0);">Customers</a></li>
                                <li><a href="javascript:void(0); "class="javascript:void(0);">Suppliers</a></li>
                                <li><a href="javascript:void(0); "class="javascript:void(0);">Moderators</a></li>
                                <li><a href="javascript:void(0); "class="javascript:void(0);">Admins</a></li>
                                <li><a href="{{ route('users.delete') }}" class="{{ route('users.delete') }}" style="color: rgb(152, 6, 6);" >Deleted Users</a></li>
                            </ul>
                        </li>
                        <!------------- End route users ------------->

                        <!------------- Start route categories ------------->
                        <li class="dropdown">
                            <a class="nav-link menu-title" href="javascript:void(0)">
                                <i class="fa-solid fa-align-justify" style="padding-left: 1.25%;"></i>&nbsp;&nbsp;&nbsp;&nbsp;
                                <span>Categories</span>
                            </a>
                            <ul class="nav-submenu menu-content" style="">
                                <li><a href="{{route('categories.create')}}" class="{{route('categories.create')}}">Create Category</a></li>
                                <li><a href="{{ route('categories.index') }}" class="{{ route('categories.index') }}">All Categories</a></li>
                                <li><a href="{{ route('categories.delete') }}" class="{{ route('categories.delete') }}" style="color: rgb(152, 6, 6);">Deleted Categories</a></li>
                            </ul>
                        </li>
                        <!------------- End route categories ------------->


                        <!------------- Start route carts ------------->
                        <li class="dropdown">
                            <a class="nav-link menu-title" href="javascript:void(0)">
                                <i class="fa-solid fa-cart-shopping"></i></i>&nbsp;&nbsp;&nbsp;&nbsp;
                                <span>Carts</span>
                            </a>
                            <ul class="nav-submenu menu-content" style="">
                                {{-- <li><a href="javascript:void(0);" class="javascript:void(0);">Create Cart</a></li> --}}
                                <li><a href="{{ route('carts.index') }}" class="{{ route('carts.index') }}">All Carts</a></li>
                                <li><a href="{{ route('carts.delete') }}" class="javascript:void(0);" style="color: rgb(152, 6, 6);">Deleted Carts</a></li>
                            </ul>
                        </li>
                        <!------------- End route carts ------------->


                        <!------------- Start route products ------------->
                        <li class="dropdown">
                            <a class="nav-link menu-title" href="javascript:void(0);">
                                <i class="fa-solid fa-box-open"></i></i>&nbsp;&nbsp;&nbsp;&nbsp;
                                <span>Products</span>
                            </a>
                            <ul class="nav-submenu menu-content">
                                <li><a href="{{route('products.create')}}" class="{{route('products.create')}}">Create Product</a></li>
                                <li><a href="{{ route('products.index') }}" class="{{ route('products.index') }}">All Products</a></li>
                                <li><a href="{{ route('products.index') }}" class="{{ route('products.index') }}">All Clothes</a></li>
                                <li><a href="{{ route('products.index') }}" class="{{ route('products.index') }}">All Accessories</a></li>
                                <li><a href="javascript:void(0);" class="javascript:void(0);">Formal</a></li>
                                <li><a href="javascript:void(0);" class="javascript:void(0);">Casual</a></li>
                                <li><a href="javascript:void(0);" class="javascript:void(0);">Sports Wear</a></li>
                                <li><a href="javascript:void(0);" class="javascript:void(0);">Men</a></li>
                                <li><a href="javascript:void(0);" class="javascript:void(0);">Women</a></li>
                                <li><a href="javascript:void(0);" class="javascript:void(0);">Kids</a></li>
                                <li><a href="{{ route('products.delete') }}" class="{{ route('products.delete') }}" style="color: rgb(152, 6, 6);">Deleted Products</a></li>
                            </ul>
                        </li>
                        <!------------- End route products ------------->


                        <!------------- Start route tags ------------->
                        {{-- <li class="dropdown">
                            <a class="nav-link menu-title" href="javascript:void(0)">
                                <i data-feather="hash"></i>
                                <span>Tags</span>
                            </a>
                            <ul class="nav-submenu menu-content" style="display: @if(routeActive('tags.index') || routeActive('tags.create')  || routeActive('tags.delete')) block @else none @endif ;">
                                <ul class="nav-submenu menu-content" style="">
                                <li><a href="javascript:void(0);" class="javascript:void(0);">Create Tag</a></li>
                                <li><a href="javascript:void(0);" class="javascript:void(0);">All Tags</a></li>
                                <li><a href="javascript:void(0);" class="javascript:void(0);">Deleted Tags</a></li>
                                
                                <li><a href="{{ route('tags.create') }}" class="{{routeActive('tags.create')}}">Create Tag</a></li>
                                <li><a href="{{ route('tags.index') }}" class="{{routeActive('tags.index')}}">All Tags</a></li>
                                <li><a href="{{ route('tags.delete') }}" class="{{routeActive('tags.delete')}}">Deleted Tags</a></li>
                            </ul>
                        </li> --}}
                        <!------------- End route tags ------------->


                        <!------------- Start route countries ------------->
                        {{-- <li class="dropdown">
                            <a class="nav-link menu-title" href="javascript:void(0)">
                                <i class="fa fa-globe" style="font-size: 140%;"></i> &nbsp; &nbsp;
                                <span>Countries</span>
                            </a>
                            <ul class="nav-submenu menu-content" style="">
                                <li><a href="javascript:void(0);" class="javascript:void(0);">Create Country</a></li>
                                <li><a href="javascript:void(0);" class="javascript:void(0);">All Countries</a></li>
                                <li><a href="javascript:void(0);" class="javascript:void(0);">Deleted Countries</a></li>
                            </ul>
                        </li> --}}
                        <!------------- End route countries ------------->


                        <!------------- Start route governorates ------------->
                        {{-- <li class="dropdown">
                            <a class="nav-link menu-title" href="javascript:void(0)">
                                <i data-feather="map"></i>
                                <span>Governorates</span>
                            </a>
                            <ul class="nav-submenu menu-content" style="">
                                <li><a href="javascript:void(0);" class="javascript:void(0);">Create Governorate</a></li>
                                <li><a href="javascript:void(0);" class="javascript:void(0);">All Governorates</a></li>
                                <li><a href="javascript:void(0);" class="javascript:void(0);">Deleted Governorates</a></li>
                            </ul>
                        </li> --}}
                        <!------------- End route governorates ------------->


                        <!------------- Start route cities ------------->
                        {{-- <li class="dropdown">
                            <a class="nav-link menu-title" href="javascript:void(0)">
                                <i data-feather="map-pin"></i>
                                <span>Cities</span>
                            </a>
                            <ul class="nav-submenu menu-content" style="">
                                <li><a href="javascript:void(0);" class="javascript:void(0);">Create City</a></li>
                                <li><a href="javascript:void(0);" class="javascript:void(0);">All Cities</a></li>
                                <li><a href="javascript:void(0);" class="javascript:void(0);">Deleted Cities</a></li>
                            </ul>
                        </li> --}}
                        <!------------- End route cities ------------->

                     @elseif(auth()->user()->user_type == "supplier")
                        <!------------- Start route products ------------->
                        <li class="dropdown">
                            <a class="nav-link menu-title" href="javascript:void(0)">
                                <i class="fa-solid fa-align-justify" style="padding-left: 1.25%;"></i>&nbsp;&nbsp;&nbsp;&nbsp;
                                <span>Products</span>
                            </a>
                            <ul class="nav-submenu menu-content" style="">
                                <li><a href="{{route('products.create')}}" class="{{route('products.create')}}">Create Product</a></li>
                                <li><a href="{{ route('products.index') }}" class="{{ route('products.index') }}">All Products</a></li>
                                <li><a href="{{ route('products.delete') }}" class="{{ route('products.delete') }}" style="color: rgb(152, 6, 6);">Deleted Products</a></li>
                            </ul>
                        </li>
                        <!------------- End route products ------------->
                    @endif


                    <!------------- Start route email ------------->
                    {{-- <li class="dropdown">
                        <a class="nav-link menu-title @if(routeActive('mail.inbox') || routeActive('mail.all-mail') || routeActive('mail.trash')) active @endif" href="{{route('mail.all-mail')}}">
                            <i data-feather="mail"></i>
                            <span>{{__('admin/email.all_mail')}}</span>
                        </a>
                    </li> --}}
                    <!------------- End route email ------------->


                    <!------------- Start route setting ------------->
                    {{-- <li class="dropdown">
                        <a class="nav-link menu-title @if(routeActive('setting')) active @endif" href="javascript:void(0)">
                            <i data-feather="settings"></i>
                            <span>{{__('admin/home.settings')}}</span>
                        </a>
                        <ul class="nav-submenu menu-content" style="display: @if(routeActive('setting')) block @else none @endif ;">
                            <li><a href="{{ route('setting') }}" class="{{routeActive('setting')}}">{{__('admin/home.settings')}}</a></li>
                        </ul>
                    </li> --}}
                    <!------------- End route setting ------------->
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </div>
    </nav>
</header>

<style>
.drop-down-all-users {
  /* background-color: #04AA6D; */
  color: #838383;
  padding-left: 44px;
  font-size: 14px;
  border: none;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .drop-down-all-users {}
</style>
