<form id="submit_addCart_form" action="{{ url('addCart' , [$product->id]) }}" method="POST" style="margin-top: 2%; margin-bottom: 3%;">
    @csrf
    <div class="input-group">
        <!-- declaration for first field -->
        <input class="form-control input-sm" type="number" value="1" min="1" name="quantity" placeholder="Quantity">

        <!-- reducong the gap between them to zero -->
        <span class="input-group-btn" style="width: 5px;"></span>

        <!-- declaration for second field -->
        <input class="add-to-cart-btn" type="submit" value="Add To Cart" name="">
    </div>
</form>

