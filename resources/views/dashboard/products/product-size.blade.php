@extends('layouts.admin.master')

@section('title') 
    {{ $product->name }} (Sizes)
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3 class="mt-4">Products</h3>
        @endslot
        <li class="breadcrumb-item active">Products / <a href="{{ route('single_product_page_dashboard',[$product->id, $product->name]) }}">{{ $product->name }}</a></li>
        @slot('bookmark')
            <a href="{{route('products.create')}}" class="btn btn-pill btn-air-success btn-success-gradien" type="button" title="Add New Product">Add New Product</a>
        @endslot
    @endcomponent

    @include('layouts.admin.partials.messages.message')
    
    {{-- @forelse ( as )
        
    @empty
        
    @endforelse --}}

    <form action="/*{{ /* route('sizes.store') */ '#' }}" method="POST">
        <select name="size_value" id="">
            <option value="" disabled selected>----Please select a size----</option>
            <option value="XS">XS</option>
            <option value="S">S</option>
            <option value="M">M</option>
            <option value="L">L</option>
            <option value="XL">XL</option>
            <option value="XXL">XXL</option>
            <option value="XXXL">XXXL</option>
            <option value="XXXXL">XXXXL</option>
        </select>

        <button type="submit">Submit</button>
    </form>

    @push('scripts')
        <script src="{{asset('admin/js/bootstrap/popper.min.js')}}"></script>
        <script src="{{asset('admin/js/bootstrap/bootstrap.min.js')}}"></script>
    @endpush

@endsection
