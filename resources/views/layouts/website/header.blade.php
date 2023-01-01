<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <a href="{{ route('home') }}" class="logo">
                        {{-- <i class="fas fa-heart"></i>
                            <i class="fa-solid fa-k"></i>a</i></i><i class="fa-solid fa-r"></i></i>ee</i><i class="fa-solid fa-m"></i>
                        <i class="fas fa-heart"></i> --}}
                        <img src="/assets/images/Anywhere-Anytime(1).png" alt="AA.png"  >
                    </a>
                    <!-- ***** Logo End ***** -->

                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        {{-- <li style="padding-top: 1%;"> --}}
                            <!-- ***** Clock Start ***** -->
                                    {{-- <label style="color: rgb(20, 41, 136);">{{Carbon\Carbon::now()->translatedFormat('D, M')}}</label>
                                    <span id="time" style="color: rgb(20, 41, 136); font-weight: bold;"></span>
                                    <script >
                                        function showTime() {
                                            var date = new Date(),
                                                utc = new Date(Date.UTC(
                                                    date.getFullYear(),
                                                    date.getMonth(),
                                                    date.getDate(),
                                                    date.getHours() - 2,  //modified on the Egyptian (Cairo UTC) time
                                                    date.getMinutes(),
                                                    date.getSeconds()
                                                ));

                                            document.querySelector('#time').innerHTML = utc.toLocaleTimeString();
                                        }

                                        setInterval(showTime, 1000);
                                    </script> --}}
                            <!-- ***** Clock End ***** -->
                        {{-- </li> --}}
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li class="submenu">
                            <a href="{{ route('products') }}">Our Products</a>
                            <ul>
                                <li class="scroll-to-section"><a href="http://localhost:8000/products#men"><i class="fa-solid fa-mars" style="font-size: 130%; padding-right: 2%;"></i>Men's Wear</a></li>
                                <li class="scroll-to-section"><a href="http://localhost:8000/products#women"><i class="fa-solid fa-venus" style="font-size: 130%; padding-right: 2%;"></i>Women's Wear</a></li>
                                <li class="scroll-to-section"><a href="http://localhost:8000/products#kids"><i class="fa-solid fa-person-half-dress" style="font-size: 130%; padding-right: 2%;"></i>&nbsp;Kids' Wear</a></li>
                                <li class="scroll-to-section"><a href="http://localhost:8000/products#accessories"><i class="fa-solid fa-ring" style="font-size: 110%; padding-right: 2%;"></i>Accessories</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);">Our Company</a>
                            <ul>
                                <li><a href="{{ route('about') }}">About Us</a></li>
                                <li><a href="{{ route('mission-vision') }}">Mission & Vision</a></li>
                                @auth
                                    @if(auth()->user()->user_type == "customer" || auth()->user()->user_type == "supplier")
                                        <li><a href="{{ route('contact') }}">Contact Us</a></li>
                                    @endif
                                @endauth
                                @if(!auth()->user())
                                    <li><a href="{{ route('contact') }}">Contact Us</a></li>
                                @endif
                                <li><a href="{{ route('faqs') }}">FAQ's</a></li>
                            </ul>
                        </li>

                        <li class="scroll-to-section"><a href="http://localhost:8000/home#explore">Explore</a></li>
                        @if(!auth()->user()) <!---------- = unregistered user (which means "guest") ---------->
                            <li class="submenu">
                                <a href="javascript:void(0);">Account</a>
                                <ul>
                                    <li><a href="{{ route('favorites-unregistered') }}"><i class="fa-solid fa-star" style="font-size: 130%; padding-right: 2%;"></i>&nbsp;Favorites (0)</a></li>
                                    <li><a href="{{ route('register') }}"><i class="fa-regular fa-address-card" style="font-size: 130%; padding-left: 4%;"></i>&nbsp;&nbsp;Register</span></a></li>
                                    <li><a href="{{ route('login') }}"><i class="fa-solid fa-right-to-bracket" style="font-size: 130%; padding-left: 4%;"></i>&nbsp;&nbsp;&nbsp;Login</a></li>
                                </ul>
                            </li>

                            <li style="padding-top: 0.7%;">
                                <span style="font-size: 13px; color: #8197ac;">{{ 'guest_'.substr(uniqid(),8,13) }}</span>
                                {{-- <div class="badge-bottom">
                                    <a href="{{ route('register') }}"><span class="badge badge-primary">Register Now!</span></a>
                                </div> --}}
                            </li>
                        @else <!---------- = registered user (any user type in the system) ---------->
                            <li class="submenu">
                                {{-- <a class="username" href="javascript:void(0);">{{auth()->user()->username ?? auth()->user()->name}}</a> --}}
                                <a class="username" href="javascript:void(0);"><img style="border-radius: 4px;" width="40" class="username" src="{{auth()->user()->avatar}}" alt="{{auth()->user()->name ?? auth()->user()->username}}"></a>
                                <ul>
                                    @if(auth()->user()->user_type == 'admin' || auth()->user()->user_type == 'moderator' || auth()->user()->user_type == 'supplier')
                                        <li><a href="{{ route('dashboard') }}"><i class="fa fa-institution" style="font-size: 130%; padding-right: 2%;"></i>Dashboard</a></li>
                                    @endif
                                    @if(auth()->user()->user_type == 'customer')
                                        <li><a href="{{ route('favorites-registered') }}"><i class="fa-solid fa-star" style="font-size: 120%; padding-right: 2%;"></i>Favorites ({{\App\Models\Favorite::where('customer_id',auth()->user()->id)->count()}})</a></li>
                                    @endif
                                    <li><a href="{{route('User')}}"><i class="fa-solid fa-user" style="font-size: 130%; padding-right: 2%;"></i>&nbsp;Profile Management</a></li>
                                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.querySelector('#logout-form').submit();"><i class="fa-solid fa-arrow-right-from-bracket" style="font-size: 130%; padding-right: 2%;"></i><span style="padding-left: 1%;">Logout</span></a></li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </ul>
                            </li>
                            @auth
                                <li style="margin-top: 1.10%;">
                                    <label style="color:#8197ac; ">
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
                                    </label>
                                </li>
                            @endauth
                        @endif

                        @auth
                            @if(auth()->user()->email_verified_at == null)
                                <li style="margin-top: 0.4%;">
                                    <a href="{{ route('email-verification') }}"><u>Unverified! <i class="fa-solid fa-circle-xmark"></i></u></a>
                                </li>
                            @else
                                <li style="margin-top: 1.10%; ">
                                    <label>Verified <i class="fa-solid fa-circle-check"></i></label>
                                </li>
                            @endif
                        @endauth

                        @auth
                            {{-- @if(auth()->user()->user_type == "admin" || auth()->user()->user_type == "moderator" || auth()->user()->user_type == "supplier")
                                <li style="padding-top: 0.25%;"><a href="{{route('products.create')}}" class="" style="float:; color: black; background-color: rgba(47, 130, 251, 0.1); padding: 0px 10px; border-radius: 4px;" type="button" title="Add New Product">Add New Product</a></li>
                            @elseif(auth()->user()->user_type == 'customer')
                                <li style="padding-top: 0.25%;"><a href="{{ route('cart-registered') }}"><i class="fa-solid fa-cart-shopping" style="font-size: 120%;"></i><span>({{\App\Models\Cart::where('customer_id',auth()->user()->id)->count()}})</span></a></li>
                            @endif --}}
                            @if(auth()->user()->user_type == 'customer')
                                <li style="padding-top: 0.25%;"><a href="{{ route('cart-registered') }}"><i class="fa-solid fa-cart-shopping" style="font-size: 120%;"></i><span>({{\App\Models\Cart::where('customer_id',auth()->user()->id)->count()}})</span></a></li>
                            @endif
                        @endauth

                        @if(Auth::guest())
                            <li style="padding-top: 0.25%;"><a href="{{ route('cart-unregistered') }}"><i class="fa-solid fa-cart-shopping" style="font-size: 120%;"></i>({{ 0 }})</a></li>
                        @endif
                    </ul>
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>
