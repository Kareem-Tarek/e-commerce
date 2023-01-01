<!-- ***** Subscribe Area Starts ***** -->
<section class="section" id="subscribe">
    <div class="container">
        <div class="row text-center">

            @if(Auth::guest() || auth()->user()->user_type == "admin" || auth()->user()->user_type == "moderator" || auth()->user()->user_type == "supplier")
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-6">
                            <ul>
                                <li>Store Location:<br><span>Al Maadi, Amit, Egypt</span></li>
                                <li>Phone:<br><span>+20 0100 000 0111</span></li>
                                <li>Office Location:<br><span>Cairo, Egypt</span></li>
                            </ul>
                        </div>
                        <div class="col-6">
                            <ul>
                                <li>Work Hours:<br><span>07:30 AM - 9:30 PM Daily</span></li>
                                <li>Email:<br><span>AA.info@company.com</span></li>
                                <li>Social Media:<br><span><a href="javascript:void(0);">Facebook</a>, <a href="javascript:void(0);">Twitter</a>, <a href="javascript:void(0);">Linkedin</a>, <a href="javascript:void(0);">Instagram</a></span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endif

            @auth
                @if(auth()->user()->user_type == "customer")
                    <div class="col-lg-8">
                        <div class="section-heading text-left">
                            <h3>By Subscribing To Our Newsletter You will Get 30% OFF on the total amount for one time purchase!</h3>
                            <h6>(for all the products in your cart)</h6>
                            {{-- <h3 class="inline-item">For one time purchase!</h3> --}}
                            <div style="display:inline;">
                                <img src="/assets/images/subscription_discount.gif" alt="subscription_discount" style="width: 9%;">
                            </div>
                            <br>
                            <span>Details to details is what makes AA different from the other competitors.</span>
                        </div>

                        <form id="subscribe" action="/subscription-submit" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-lg-4">
                                    <fieldset>
                                        <input name="name" type="text" id="name" placeholder="Your Name" required="">
                                    </fieldset>
                                </div>
                                <div class="col-lg-5">
                                    <fieldset>
                                        <input name="email" type="text" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your Email Address" required="">
                                    </fieldset>
                                </div>
                                <div class="col-lg-1">
                                    <fieldset>
                                        <button type="submit" id="form-submit" class="main-dark-button">
                                            <i class="fa fa-paper-plane"></i>
                                        </button>
                                    </fieldset>
                                </div>
                                <div class="col-lg-12 text-left mt-2">
                                    <span>By subscribing you accept our <a href="javascript:void(0);"><u>Privacy Policy</u></a>.</span>
                                </div>
                            </div>
                        </form>

                        @if(session()->has('subscription_successful_message'))
                            <div class="alert alert-success text-center" style="width: 60%; margin-top: 3%;">
                                <button type="button" class="close" data-dismiss="alert" style="color: rgb(173, 6, 6)">x</button>
                                {{ session()->get('subscription_successful_message') }}
                            </div>
                        @elseif(session()->has('subscription_unsuccessful_incorrect_email_message'))
                            <div class="alert alert-danger text-center" style="width: 75%; margin-top: 3%;">
                                <button type="button" class="close" data-dismiss="alert" style="color: rgb(173, 6, 6)">x</button>
                                {{ session()->get('subscription_unsuccessful_incorrect_email_message') }}
                            </div>
                        @elseif(session()->has('subscription_unsuccessful_duplication_error_message'))
                            <div class="alert alert-danger text-center" style="width: 75%; margin-top: 3%;">
                                <button type="button" class="close" data-dismiss="alert" style="color: rgb(173, 6, 6)">x</button>
                                {{ session()->get('subscription_unsuccessful_duplication_error_message') }}
                            </div>
                        @endif

                    </div>
                    <div class="col-lg-4">
                        <div class="row">
                            <div class="col-6">
                                <ul>
                                    <li>Store Location:<br><span>Al Maadi, Amit, Egypt</span></li>
                                    <li>Phone:<br><span>+20 0100 000 0111</span></li>
                                    <li>Office Location:<br><span>Cairo, Egypt</span></li>
                                </ul>
                            </div>
                            <div class="col-6">
                                <ul>
                                    <li>Work Hours:<br><span>07:30 AM - 9:30 PM Daily</span></li>
                                    <li>Email:<br><span>AA.info@company.com</span></li>
                                    <li>Social Media:<br><span><a href="javascript:void(0);">Facebook</a>, <a href="javascript:void(0);">Twitter</a>, <a href="javascript:void(0);">Linkedin</a>, <a href="javascript:void(0);">Instagram</a></span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif
            @endauth

        </div>
    </div>
</section>
<!-- ***** Subscribe Area Ends ***** -->