@extends('layouts.admin.master')
@inject('model', 'App\Models\Size')

@section('title') 
    {{ $product->name }} (Add Sizes)
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3 class="mt-4">Products</h3>
        @endslot
        <li class="breadcrumb-item active">Products</li>
        <li class="breadcrumb-item active">{{ $product->name }} (Sizes)</li>
        <li class="breadcrumb-item active">Add Sizes</li>
        @slot('bookmark')
            <a href="{{route('products.create')}}" class="btn btn-pill btn-air-success btn-success-gradien" type="button" title="Add New Product">Add New Product</a>
        @endslot
    @endcomponent

    @include('layouts.admin.partials.messages.message')

    <form action="/*{{ /* route('sizes.store') */ '#' }}" method="POST">
        @csrf
        @include('dashboard.products.products-sizes.form')
        <button class="btn btn-success mt-4 d-block me-auto" type="submit">Add</button>
    </form>

    @push('scripts')
        <script src="{{asset('admin/js/bootstrap/popper.min.js')}}"></script>
        <script src="{{asset('admin/js/bootstrap/bootstrap.min.js')}}"></script>
    @endpush

@endsection
