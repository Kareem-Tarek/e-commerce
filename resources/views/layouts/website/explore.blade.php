<!-- ***** Explore Area Starts ***** -->
<section class="section" id="explore">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="left-content">
                    <h2>Explore Our Products</h2>
                    <span>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Similique quasi ipsum, obcaecati eum quaerat error magni dolore ipsa distinctio commodi quae earum minima exercitationem veniam iste rerum praesentium eos? Commodi.</span>
                    <div class="quote">
                        <i class="fa fa-quote-left"></i><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit non quas ullam neque, por.</p>
                    </div>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iste optio at obcaecati laudantium, minus saepe accusantium quia provident, exercitationem soluta quidem quo voluptate.</p>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Explicabo <a href="javascript:void(0);" style="color: rgb(46, 46, 222):">molestias velit</a>, doloribus totam labore enim distinctio nemo, atque laudantium sint sunt minus in.</p>
                    <div class="main-border-button">
                        <a href="{{ route('products') }}">Discover More</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="right-content">
                    <div class="row">
                        <div class="col-lg-6">
                            @foreach($latest_product as $latest_product_result)
                            <div class="leather border" style="/* background: linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.4)),url('{{ '/assets/images/'.$latest_product_result->image_name }}'); */">
                                <h4>
                                    <a href="{{ route('single_product_page' , $latest_product_result->id) }}" style="color:inherit; transition: all 0.25s ease-in-out;" onMouseOver="this.style.color='#3385ff'" onMouseOut="this.style.color='inherit'">
                                        {{ $latest_product_result->name ?? 'No product found!' }}
                                    </a>
                                </h4>
                                <a href="{{ route('latest_items') }}" style="color: #AAAAAA; transition: all 0.25s ease-in-out; font-size: 90%; font-style: italic;" onMouseOver="this.style.color='#261198'" onMouseOut="this.style.color='#AAAAAA'">Checkout Latest Items</a>
                            </div>
                            @endforeach
                        </div>
                        <div class="col-lg-6">
                            <div class="first-image">
                                <img src="/assets/images/explore-image-01.jpg" alt="">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="second-image">
                                <img src="/assets/images/explore-image-02.jpg" alt="">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="types border">
                                <h4>Different Types</h4>
                                {{-- <span style="font-size: 90%">Over {{\App\Models\Product::count()-10}} Products</span> --}}
                                <span style="font-size: 90%">
                                @auth
                                    @if(auth()->user()->user_type == "admin" || auth()->user()->user_type == "moderator")
                                        Total Products: {{\App\Models\Product::count()}}
                                    @else
                                        Over {{\App\Models\Product::count()-10}} Products
                                    @endif
                                @endauth
                                @if(!auth()->user())
                                    Over {{\App\Models\Product::count()-10}} Products
                                @endif
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Explore Area Ends ***** -->