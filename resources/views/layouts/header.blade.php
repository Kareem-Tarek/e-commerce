<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="index.html" class="logo">
                        {{-- <img src="assets/images/logo.png"> --}}
                        <i class="fas fa-heart"></i>
                            <i class="fa-solid fa-m"></i><i class="fa-solid fa-i"></i>k</i><i class="fa-solid fa-a"></i>n</i><i class="fa-solid fa-o"></i>
                        <i class="fas fa-heart"></i>
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
                    </ul>
                    @if (Route::has('login'))
                            @auth
                            @else
                                <li class="nav-item">
                                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline login-header">Log in</a>
                                </li>
                                @if (Route::has('register'))
                                <li class="nav-item">
                                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline register-header">Register</a>
                                </li>
                                @endif
                            @endauth
                        @endif
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>