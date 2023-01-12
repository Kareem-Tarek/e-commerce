<select class="form-control select @error('size_value') is-invalid @enderror" name="size_value" id="" value="{{Request::old('size_value') ? Request::old('size_value') : $model->size_value}}">
    <option value="" selected>----Please select a size----</option>
    <option value="{{ "XS" }} {{ isset($model) && $model->size_value == 'XS' ? 'selected'  : '' }}">XS</option>
    <option value="{{ "S" }}" {{ isset($model) && $model->size_value == 'S' ? 'selected'  : '' }}>S</option>
    <option value="{{ "M" }}" {{ isset($model) && $model->size_value == 'M' ? 'selected'  : '' }}>M</option>
    <option value="{{ "L" }}" {{ isset($model) && $model->size_value == 'L' ? 'selected'  : '' }}>L</option>
    <option value="{{ "XL" }}" {{ isset($model) && $model->size_value == 'XL' ? 'selected'  : '' }}>XL</option>
    <option value="{{ "XXL" }}" {{ isset($model) && $model->size_value == 'XXL' ? 'selected'  : '' }}>XXL</option>
    <option value="{{ "XXXL" }}" {{ isset($model) && $model->size_value == 'XXXL' ? 'selected'  : '' }}>XXXL</option>
    <option value="{{ "XXXXL" }}" {{ isset($model) && $model->size_value == 'XXXXL' ? 'selected'  : '' }}>XXXXL</option>
</select>