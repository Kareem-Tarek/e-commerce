@extends('layouts.admin.master')

@section('title') 
    {{ $product->name }} (Sizes)
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3 class="mt-4">Products</h3>
        @endslot
        <li class="breadcrumb-item active">Products</li>
        <li class="breadcrumb-item active">{{ $product->name }} (Sizes)</li>
        @slot('bookmark')
            <a href="{{route('products-sizes.create', [$product->id, $product->name])}}" class="btn btn-pill btn-air-success btn-success-gradien" type="button" title="Add New Product">Add New Sizes</a>
        @endslot
    @endcomponent

    @include('layouts.admin.partials.messages.message')
    
    {{-- @forelse ($sizes as $size)
        {{ $size->size_value ?? 's'}}
    @empty
        <div class="alert alert-secondary text-center">
            <span class="h6">There are no sizes yet for this product! Go ahead and sizes for it.</span>
        </div>
    @endforelse --}}

    @push('scripts')
        <script src="{{asset('admin/js/bootstrap/popper.min.js')}}"></script>
        <script src="{{asset('admin/js/bootstrap/bootstrap.min.js')}}"></script>
    @endpush

@endsection
