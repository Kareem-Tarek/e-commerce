@extends('layouts.admin.master')

@section('title') 
    {{ $product->name }} (Edit Sizes)
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3 class="mt-4">Edit ({{$size->size_value ?? 'NULL'}}) for product ({{ $product->name }})</h3>
        @endslot
        <li class="breadcrumb-item active">Products</li>
        <li class="breadcrumb-item active">{{ $product->name }} (Sizes)</li>
        <li class="breadcrumb-item active">Edit Sizes</li>
        @slot('bookmark')
            <a href="{{route('product-sizes.create', [$product->id, $product->name])}}" class="btn btn-pill btn-air-success btn-success-gradien" type="button" title="Add New Product">Add New Size</a>
        @endslot
    @endcomponent

    @include('layouts.admin.partials.messages.message')

    <div class="col-sm-12 col-xl-6 xl-100">
        <div class="card">
            <div class="card-header pb-0">
                <h5>Check Changes</h5>
            </div>
            <div class="card-body">
                <div class="tab-content " id="pills-tabContent">
                    <form action="{{ route('product-sizes.update', [$product->id, $product->name]) }}" method="POST">
                        @csrf
                        @method('patch')
                        @include('dashboard.products.product-sizes.form')
                        <button class="btn btn-success mt-4 d-block me-auto" type="submit">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="{{asset('admin/js/bootstrap/popper.min.js')}}"></script>
        <script src="{{asset('admin/js/bootstrap/bootstrap.min.js')}}"></script>
    @endpush

@endsection
