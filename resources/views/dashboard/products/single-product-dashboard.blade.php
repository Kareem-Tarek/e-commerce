@extends('layouts.admin.master')

@section('styles')
@endsection

@section('title')
    {{ $product->name }}
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3 class="mt-4">Products</h3>
        @endslot
        <li class="breadcrumb-item active"><a href="{{route('products.index')}}">Products</a></li>
        <li class="breadcrumb-item active">{{ $product->name }}</li>
        @slot('bookmark')
            <a href="{{route('products.create')}}" class="btn btn-pill btn-air-success btn-success-gradien" type="button" title="Add New Product">Add New Product</a>
        @endslot
    @endcomponent

    <div class="text-cent pb-">
        <img src="{{ $product->image }}" alt="{{ $product->name.'img' }}" width="220" height="200" style="border-radius: 1px;"/><br>
        <span style="font-size: 200%; font-weight: bolder; color: black;">{{ $product->name }}</span>
        <h6 style="font-size: 100%;">
            @if($product->is_accessory == "no")
                Category - Clothing Type: 
                <span style="color: rgb(83, 84, 82);">
                    {{ ucfirst($product->product_category) }} 
                    - 
                    @if($product->clothing_type == 1)
                        {{ "Formal" }}
                    @elseif($product->clothing_type == 2)
                        {{ "Casual" }}
                    @elseif($product->clothing_type == 3)
                        {{ "Sports Wear" }}
                    @endif
                </span>
            @else($product->is_accessory == "yes")
                Category: 
                <span style="color: rgb(83, 84, 82);">
                    {{ ucfirst($product->product_category) }} 
                </span>
            @endif
        </h6>
        <h6 class="mb-4" style="font-weight: bold; color: black;">
            @if($product->discount <= 0 || $product->discount == null)
                <span style="color: green;">{{ $product->price }} EGP</span>
            @elseif($product->discount > 0)
                <del style="color: red;">{{ $product->price }} EGP</del> 
                <label style="color: #000;">&RightArrow;</label> 
                <span style="color: green;">{{ $product->price - ($product->price * $product->discount) }} EGP</span> <span style="color: rgb(155, 31, 151);">({{ $product->discount * 100 }}% OFF)</span>
            @endif
        </h6>
        <h6 class="mb-5" style="color: black;">
            <u>Description:</u><br>
            <span>
                {{ $product->description }}
            </span>
        </h6>
    </div>

    <div class="">
        <table class="table mb-4">
            <thead>
                <tr>
                    <th>Brand name (Supplier)</th>
                    <th>Available quantity</th>
                    <th>Available sizes</th>
                    <th>Available Colors</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td scope="row">{{ $product->brand_name ?? 'N/A' }}</td>
                    <td>{{ $product->available_quantity ?? '' }}</td>
                    <td>{{ $product->sizes ?? '—' }}</td>
                    <td>{{ $product->colors ?? '—' }}</td>
                </tr>
            </tbody>
        </table>

        <table class="table">
            <thead>
                <tr>
                    <th>Who added this product to their cart?</th>
                    <th>xxx</th>
                    <th>xxx</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td scope="row">yyy</td>
                    <td>yyy</td>
                    <td>yyy</td>
                </tr>
                <tr>
                    <td scope="row">zzz</td>
                    <td>zzz</td>
                    <td>zzz</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="text-center mb-4 mt-5">
        {{-- <a href="{{ route('products.destroy', $product->id) }}" class="button-link-delete">Delete this product</a> --}}
        {!! Form::open([
            'route' => ['products.destroy',$product->id],
            'method' => 'delete'
        ])!!}
        <a href="{{ route('products.edit', $product->id) }}" class="button-link-edit"><i class="fa-solid fa-pen-to-square"></i>&nbsp;&nbsp;Edit this product</a>
        <button class="button-link-delete" onclick="return confirm('Are you sure that you want to delete - {{ $product->name }}?');" type="submit" title="{{'Delete'." ($product->name)"}}"><i class="fa-solid fa-trash"></i>&nbsp;&nbsp;Delete this product</button>
        <a href="{{ route('products.index') }}" class="button-link-back-to-products"><i class="fa-solid fa-arrow-left-long"></i>&nbsp;&nbsp;Back To Products Page</a>
        {!! Form::close() !!}
        
    </div>
<style>
    .button-link-edit{
        background-color: #00265f; 
        color: snow;
        font-size: 80%; 
        font-weight: bold; 
        padding: 1%; 
        padding-left: 2%;
        padding-right: 2%;
        border-radius: 3px;
    }

    .button-link-edit:hover{
        background-color: #011b42; 
        color: snow;
    }

    .button-link-delete{
        background-color: #aa0606; 
        color: snow;
        font-size: 80%; 
        font-weight: bold; 
        padding: 0.85%; 
        padding-left: 2%;
        padding-right: 2%;
        border-radius: 3px;
    }

    .button-link-delete:hover{
        background-color: #860202; 
        color: snow;
    }

    .button-link-back-to-products{
        background-color: #2F82FB; 
        color: snow;
        font-size: 80%; 
        font-weight: bold; 
        padding: 1%; 
        padding-left: 2%;
        padding-right: 2%;
        border-radius: 3px;
    }

    .button-link-back-to-products:hover{
        background-color: #0868F3; 
        color: snow;
    }
</style>
@endsection


@section('scripts')
@endsection



