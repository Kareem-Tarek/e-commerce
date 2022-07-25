<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="first-item">
                    <div class="logo">
                        <a href="{{ route('home') }}">
                            <img src="assets/images/Anywhere-Anytime(2).png" alt="AA.png" style="width: 200px; color: snow;">
                        </a>
                    </div>
                    <ul>
                        <li><a href="javascript:void(0);">11111 Cairo, xxxx, Egypt</a></li>
                        <li><a href="javascript:void(0);">AA@company.com</a></li>
                        <li><a href="javascript:void(0);">+20 01000000111</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3" style="padding-top: 3%;">
                <h4>Shopping &amp; Categories</h4>
                <ul>
                    <li><a href="http://127.0.0.1:8000/products#men">Men’s Shopping</a></li>
                    <li><a href="http://127.0.0.1:8000/products#women">Women’s Shopping</a></li>
                    <li><a href="http://127.0.0.1:8000/products#kids">Kid's Shopping</a></li>
                </ul>
            </div>
            <div class="col-lg-3" style="padding-top: 3%;">
                <h4>Useful Links</h4>
                <ul>
                    <li><a href="{{ route('home') }}">Homepage</a></li>
                    <li><a href="{{ route('about') }}">About Us</a></li>
                    <li><a href="javascript:void(0);">Help</a></li>
                    <li><a href="{{ route('contact') }}">Contact Us</a></li>
                </ul>
            </div>
            <div class="col-lg-3" style="padding-top: 3%;">
                <h4>Help &amp; Information</h4>
                <ul>
                    <li><a href="javascript:void(0);">Help</a></li>
                    <li><a href="{{ route('faqs') }}">FAQ's</a></li>
                    <li><a href="javascript:void(0);">Shipping</a></li>
                    <li><a href="javascript:void(0);">Tracking ID</a></li>
                </ul>
            </div>
            <div class="col-lg-12">
                <div class="under-footer">
                    <p>Copyright © 2022 AA Co., Ltd. All Rights Reserved.

                    {{-- <br>Design: <a href="https://templatemo.com" target="_parent" title="free css templates">TemplateMo</a> --}}

                    {{-- <br>Distributed By: <a href="https://themewagon.com" target="_blank" title="free & premium responsive templates">ThemeWagon</a> --}}
                    </p>
                    <ul>
                        <li><a href="javascript:void(0);"><i class="facebook-icon fa-brands fa-facebook-f"></i></a></li>
                        <li><a href="javascript:void(0);"><i class="twitter-icon fa-brands fa-twitter"></i></a></li>
                        <li><a href="javascript:void(0);"><i class="linkedin-icon fa-brands fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>

<style>
    .facebook-icon:hover{
        color: #3b5998;
        transition: 0.40s ease-in-out;
    }

    .twitter-icon:hover{
        color: #1DA1F2;
        transition: 0.40s ease-in-out;
    }

    .linkedin-icon:hover{
        color: #0A66C2;
        transition: 0.40s ease-in-out;
    }
</style>
