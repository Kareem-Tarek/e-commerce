<select class="form-control select @error('size_value') is-invalid @enderror" name="size_value" id="" value="{{Request::old('size_value') ? Request::old('size_value') : $size->size_value}}">
    <option value="" selected>----Please select a size----</option>
    <option value="{{ "XS" }} {{ $size->size_value == 'XS' ? 'selected'  : '' }}">XS</option>
    <option value="{{ "S" }}" {{ $size->size_value == 'S' ? 'selected'  : '' }}>S</option>
    <option value="{{ "M" }}" {{ $size->size_value == 'M' ? 'selected'  : '' }}>M</option>
    <option value="{{ "L" }}" {{ $size->size_value == 'L' ? 'selected'  : '' }}>L</option>
    <option value="{{ "XL" }}" {{ $size->size_value == 'XL' ? 'selected'  : '' }}>XL</option>
    <option value="{{ "XXL" }}" {{ $size->size_value == 'XXL' ? 'selected'  : '' }}>XXL</option>
    <option value="{{ "XXXL" }}" {{ $size->size_value == 'XXXL' ? 'selected'  : '' }}>XXXL</option>
    <option value="{{ "XXXXL" }}" {{ $size->size_value == 'XXXXL' ? 'selected'  : '' }}>XXXXL</option>
</select>
