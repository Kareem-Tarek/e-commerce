<div style="margin-top: 2%; margin-bottom: 10%;">
                                            
    {{-- <a href="{{route('products.edit',$product->id)}}" class="form-control input-sm" style="background-color: rgb(36, 157, 36); color: snow; padding: 2% 5%; border-radius: 4px;">
        <i class="fa-solid fa-pen-to-square"></i>Edit
    </a> --}}

    <div class="input-group">
        <!---- By using "ancor" will take the admin to the edit form for the current product ---->
            {{-- <a href="{{route('products.edit',$product->id)}}" class="" style="background-color: rgb(36, 157, 36); color: snow; border-radius: 4px;">
                <i class="fa-solid fa-pen-to-square"></i> Edit
            </a> --}}
        <!--------------------------------------------------------------------------------------->

        <!----------- By using "button" will take the admin to the edit form for the current product ---------->
            <button type="button" class="form-control edit-btn" onclick="window.location='{{ route('products.edit',[$product->id]) }}'"><i class="fa-solid fa-pen-to-square"></i> Edit</button>
        <!----------------------------------------------------------------------------------------------------->

        <span class="input-group-btn" style="width: 5px;"></span> <!-- reducong the gap between them to zero -->

        {!! Form::open([
            'route' => ['products.destroy',$product->id],
            'method' => 'delete'
        ])!!}
        <button class="form-control delete-btn" type="submit" onclick="return confirm('Are you sure that you want to delete - {{$product->name}}?')"><i class="fa-solid fa-trash"></i> Delete</button>
        {!! Form::close() !!}
    </div>
    
    {{-- <button class="btn btn-danger btn-xs" onclick="return confirm('Are you sure that you want to delete - {{$product->name}}?')" type="submit" title="{{'Delete'." ($product->name)"}}"><i class="fa-solid fa-trash"></i> Delete </button> --}}
</div>