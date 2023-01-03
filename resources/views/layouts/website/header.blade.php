<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <a href="{{ route('home') }}" class="logo">
                        <img src="/assets/images/Anywhere-Anytime(1).png" alt="AA.png"  >
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li class="submenu">
                            <a href="{{ route('products') }}">Our Products</a>
                            <ul>
                                <li class="scroll-to-section"><a href="http://localhost:8000/products#men"><i class="fa-solid fa-mars"></i>Men's Wear</a></li>
                                <li class="scroll-to-section"><a href="http://localhost:8000/products#women"><i class="fa-solid fa-venus"></i>Women's Wear</a></li>
                                <li class="scroll-to-section"><a href="http://localhost:8000/products#kids"><i class="fa-solid fa-person-half-dress"></i>&nbsp;Kids' Wear</a></li>
                                <li class="scroll-to-section"><a href="http://localhost:8000/products#accessories"><i class="fa-solid fa-ring"></i>Accessories</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);">Our Company</a>
                            <ul>
                                <li><a href="{{ route('about') }}"><i class="fa-solid fa-medal"></i> About Us</a></li>
                                <li><a href="{{ route('mission-vision') }}"><i class="fa-solid fa-bullseye"></i> Mission & Vision</a></li>
                                @auth
                                    @if(auth()->user()->user_type == "customer" || auth()->user()->user_type == "supplier")
                                        <li><a href="{{ route('contact') }}"><i class="fa-solid fa-message"></i> Contact Us</a></li>
                                    @endif
                                @endauth
                                @if(!auth()->user())
                                    <li><a href="{{ route('contact') }}"><i class="fa-solid fa-message"></i> Contact Us</a></li>
                                @endif
                                <li><a href="{{ route('faqs') }}"><i class="fa-regular fa-circle-question"></i> FAQ's</a></li>
                            </ul>
                        </li>

                        <li class="scroll-to-section"><a href="http://localhost:8000/home#explore">Explore</a></li>
                        @if(!auth()->user()) <!---------- = unregistered user (which means "guest") ---------->
                            <li class="submenu">
                                <a href="javascript:void(0);">Account</a>
                                <ul>
                                    <li><a href="{{ route('favorites-unregistered') }}"><i class="fa-solid fa-star submenu-icon" ></i>&nbsp;Favorites (0)</a></li>
                                    <li><a href="{{ route('register') }}"><i class="fa-regular fa-address-card submenu-icon" ></i>&nbsp;&nbsp;Register</span></a></li>
                                    <li><a href="{{ route('login') }}"><i class="fa-solid fa-right-to-bracket submenu-icon"></i>&nbsp;&nbsp;&nbsp;Login</a></li>
                                </ul>
                            </li>

                            <li class="guest-uniqid-list">
                                <span>{{ 'guest_'.substr(uniqid(),8,13) }}</span>
                            </li>
                        @else <!---------- = registered user (any user type in the system) ---------->
                            <li class="submenu">
                                <a class="header-user-img-name-username-ancor" href="javascript:void(0);"><img width="40" class="header-user-img-tag" src="{{auth()->user()->avatar}}" alt="{{auth()->user()->name ?? auth()->user()->username}}"></a>
                                <ul>
                                    @if(auth()->user()->user_type == 'admin' || auth()->user()->user_type == 'moderator' || auth()->user()->user_type == 'supplier')
                                        <li><a href="{{ route('dashboard') }}"><i class="fa fa-institution submenu-icon"></i>Dashboard</a></li>
                                    @endif
                                    @if(auth()->user()->user_type == 'customer')
                                        <li><a href="{{ route('favorites-registered') }}"><i class="fa-solid fa-star submenu-star-icon"></i>Favorites ({{\App\Models\Favorite::where('customer_id',auth()->user()->id)->count()}})</a></li>
                                    @endif
                                    <li><a href="{{route('User')}}"><i class="fa-solid fa-user submenu-icon" ></i>&nbsp;Profile Management</a></li>
                                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.querySelector('#logout-form').submit();"><i class="fa-solid fa-arrow-right-from-bracket logout-header-icon"></i><span class="logout-header-text">Logout</span></a></li>
                                    <form id="logout-form" class="d-none" action="{{ route('logout') }}" method="POST" >
                                        @csrf
                                    </form>
                                </ul>
                            </li>
                            @auth
                                <li class="mt-3">
                                    <label class="user-type-value">
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
                                <li>
                                    <a href="{{ route('email-verification') }}" class="email-unverified">Unverified! <i class="fa-solid fa-circle-xmark"></i></a>
                                </li>
                            @else
                                <li class="mt-3">
                                    <label class="email-verified">Verified <i class="fa-solid fa-circle-check"></i></label>
                                </li>
                            @endif
                        @endauth

                        @auth
                            @if(auth()->user()->user_type == 'customer')
                                <li class="cart-icon-header"><a href="{{ route('cart-registered') }}"><i class="fa-solid fa-cart-shopping"></i><span>({{\App\Models\Cart::where('customer_id',auth()->user()->id)->count()}})</span></a></li>
                            @endif
                        @endauth

                        @if(Auth::guest())
                            <li class="cart-icon-header"><a href="{{ route('cart-unregistered') }}"><i class="fa-solid fa-cart-shopping"></i>({{ 0 }})</a></li>
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
