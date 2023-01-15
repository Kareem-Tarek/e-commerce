<select class="form-control select @error('size_value') is-invalid @enderror" name="size_value" id="" value="{{Request::old('size_value') ? Request::old('size_value') : $size->size_value}}">
    <option value="" selected>----Please select a size----</option>
    <option value="{{ "XS" }}" {{ isset($size) && $size->size_value == 'XS' ? 'selected'  : '' }}>XS</option>
    <option value="{{ "S" }}" {{ isset($size) && $size->size_value == 'S' ? 'selected'  : '' }}>S</option>
    <option value="{{ "M" }}" {{ isset($size) && $size->size_value == 'M' ? 'selected'  : '' }}>M</option>
    <option value="{{ "L" }}" {{ isset($size) && $size->size_value == 'L' ? 'selected'  : '' }}>L</option>
    <option value="{{ "XL" }}" {{ isset($size) && $size->size_value == 'XL' ? 'selected'  : '' }}>XL</option>
    <option value="{{ "XXL" }}" {{ isset($size) && $size->size_value == 'XXL' ? 'selected'  : '' }}>XXL</option>
    <option value="{{ "XXXL" }}" {{ isset($size) && $size->size_value == 'XXXL' ? 'selected'  : '' }}>XXXL</option>
    <option value="{{ "XXXXL" }}" {{ isset($size) && $size->size_value == 'XXXXL' ? 'selected'  : '' }}>XXXXL</option>
</select>

{{-- <select class="form-control select @error('size_value') is-invalid @enderror" name="size_value" id="" value="">
    <option value="" selected>----Please select a size----</option>
    <option value="{{ "XS" }}">XS</option>
    <option value="{{ "S" }}">S</option>
    <option value="{{ "M" }}">M</option>
    <option value="{{ "L" }}">L</option>
    <option value="{{ "XL" }}">XL</option>
    <option value="{{ "XXL" }}">XXL</option>
    <option value="{{ "XXXL" }}">XXXL</option>
    <option value="{{ "XXXXL" }}">XXXXL</option>
</select> --}}

