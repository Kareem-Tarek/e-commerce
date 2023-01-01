<div style="display: flex; justify-content: flex-start; text-align: center; flex-wrap: wrap;">
    @forelse($cart_product as $product)
        <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" style="margin-top: 3%;">
            <div class="curriculum-event-thumb">
                <img src="{{$product->product_image}}" alt="{{$product->product_name}}" style="width: 180px; height: 200px; border: 2px solid black;">
            </div>
            <div class="curriculum-event-content d-flex justify-content-center" >
                <div class="row">
                    <div class="col-lg-12 col-sm-8 col-md-8 text-left mt-1">
                        <div class="c-red"><u>Title:</u> {{$product->product_name}}</div>
                        <div class="c-red"><u>Quantity:</u> {{$product->quantity}}</div>
                        <div class="c-red"><u>Price/Unit:</u> {{$product->price}} EGP</div>
                        <div class="c-red"><u>Category:</u> {{ucfirst($product->product_category)}}</div>
                        @if($product->is_accessory == 'no')
                            <div class="c-red"><u>Clothing Type:</u>
                                @if($product->clothing_type == '1')
                                    Formal
                                @elseif($product->clothing_type == '2')
                                    Casual
                                @else
                                    Sports Wear
                                @endif
                            </div>
                        @else <!-- elseif($product->is_accessory == 'yes') -->
                            
                        @endif
                        <?php $total_price_for_each = $product->quantity * $product->price; //total price for each quantity of a the added product to the cart ?>
                        <div class="c-red"><u>Total Price:</u> {{ $total_price_for_each ?? '-' }}</div>
                    </div>
                </div>
            </div>
        </div>