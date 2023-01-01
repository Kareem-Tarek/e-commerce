<form id="submit_addFavorite_form" action="{{ route('add-to-favorite' , $product->id) }}" method="POST" style="margin-top: 2%; margin-bottom: 3%;">
    @csrf
    <input class="add-to-favorites-btn" type="submit" value="Add To Favorites" name="" style="width: 100%;">
</form>

