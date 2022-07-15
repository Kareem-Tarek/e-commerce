<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Clock Start ***** -->
                    <div class="contact-item">
                        <div class="contact-item" id="clock">
                            {{Carbon\Carbon::now()->translatedFormat('D Y')}} &nbsp;
                            <span id="time" style="color: black;"></span>
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
    
                                    document.getElementById('time').innerHTML = utc.toLocaleTimeString();
                                }
    
                                setInterval(showTime, 1000);
                            </script>
                        </div>
                    </div>
                    <!-- ***** Clock End ***** -->

                    <!-- ***** Logo Start ***** -->
                    <a href="javascript:void(0);" class="logo">
                        {{-- <i class="fas fa-heart"></i>
                            <i class="fa-solid fa-k"></i>a</i></i><i class="fa-solid fa-r"></i></i>ee</i><i class="fa-solid fa-m"></i>
                        <i class="fas fa-heart"></i> --}}
                        <img src="assets/images/e-commerce_logo.png" style="width: 200px;">
                    </a>
                    <!-- ***** Logo End ***** -->
                    
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li class="scroll-to-section"><a href="javascript:void(0)">Home</a></li>
                        <li class="submenu">
                            <a href="{{ route('products') }}">Products</a>
                            <ul>
                                <li class="scroll-to-section"><a href="http://127.0.0.1:8000/products#men">Men's</a></li>
                                <li class="scroll-to-section"><a href="http://127.0.0.1:8000/products#women">Women's</a></li>
                                <li class="scroll-to-section"><a href="http://127.0.0.1:8000/products#kids">Kid's</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);">Company</a>
                            <ul>
                                <li><a href="about.html">About Us</a></li>
                                <li><a href="products.html">Products</a></li>
                                <li><a href="single-product.html">Single Product</a></li>
                                <li><a href="contact.html">Contact Us</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);">Features</a>
                            <ul>
                                <li><a href="#">Features Page 1</a></li>
                                <li><a href="#">Features Page 2</a></li>
                                <li><a href="#">Features Page 3</a></li>
                                <li><a rel="nofollow" href="https://templatemo.com/page/4" target="_blank">Template Page 4</a></li>
                            </ul>
                        </li>
                        <li class="scroll-to-section"><a href="http://127.0.0.1:8000/products#explore">Explore</a></li>
                        @if(!auth()->user()) <!---------- = unregistered user (which means "guest") ---------->
                        <li class="submenu">
                            <a href="javascript:void(0);">Account</a>
                            <ul>
                                <li><a href="{{ route('register') }}">Register</a></li>
                                <li><a href="{{ route('login') }}">Login</a></li>
                            </ul>
                        </li>
                        @else <!---------- = registered user (any user type in the system) ---------->
                            <li class="submenu">
                                <a href="javascript:void(0);" style="color: #0083FF;" onMouseOver="this.style.color='#151414'" onMouseOut="this.style.color='#0083FF'">{{auth()->user()->name ?? ''}}</a>
                                {{-- @if(auth()->user()->user_type == 'admin') <!---------- admin ---------->
                                    <label style="color:rgb(125, 125, 125);">Admin</label>
                                @elseif(auth()->user()->user_type == 'moderator') <!---------- moderator ---------->
                                    <label style="color:rgb(125, 125, 125);">Moderator</label>
                                @elseif(auth()->user()->user_type == 'customer') <!---------- customer ---------->
                                    <label style="color:rgb(125, 125, 125);">Customer</label>
                                @else <!---------- supplier ---------->
                                    <label style="color:rgb(125, 125, 125);">Supplier</label> --}}
                                <ul>
                                    <li><a href="javascript:void(0);">Profile Management</a></li>
                                    {{-- <li><a href="{{ route('logout') }}">Logout</a></li> --}}   <!--gives error because it's not a GET method!-->
                                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.querySelector('#logout-form').submit();">Logout</a></li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </ul>
                            </li>
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