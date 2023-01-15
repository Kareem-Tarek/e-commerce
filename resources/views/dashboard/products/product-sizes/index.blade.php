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
            <a href="{{route('product-sizes.create', [$product->id, $product->name])}}" class="btn btn-pill btn-air-success btn-success-gradien" type="button" title="Add New Product">Add New Sizes</a>
        @endslot
    @endcomponent

    @include('layouts.admin.partials.messages.message')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">

                        <h5>Show Sizes - <span class="b-b-success">{{App\Models\Size::where('product_id', $product->id)->count()}}</span></h5>
                        <span>
                            All sizes. If you want to create and add new sizes, 
                            you have to click on the (Add New Sizes) button at 
                            the top of the page.
                        </span>
                    </div>
                    <div class="card-block row">
                        <div class="col-sm-12 col-lg-12 col-xl-12">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered @if($all_sizes_for_each_product->count() == 0) d-none @endif">
                                    <thead>
                                    <tr>
                                        <th scope="col" class="text-center">#</th>
                                        <th scope="col" class="text-center">ID</th>
                                        <th scope="col" class="text-center">Size</th>
                                        <th scope="col" class="text-center">Date of Creation</th>
                                        <th scope="col" class="text-center">Added By</th>
                                        <th scope="col" class="text-center">Last Updated By</th>
                                        @if(auth()->user()->user_type == "admin")
                                            <th scope="col" class="text-center">Action</th>
                                        @endif
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($all_sizes_for_each_product as $size)
                                    <tr>
                                        <th scope="row" class="text-center">{{$loop->iteration}}</th>
                                        <td class="text-center">{{$size->id}}</td>
                                        <td class="text-center">{{$size->size_value}}</td>
                                        <td class="text-center">{{$size->created_at->translatedFormat('d/m/Y - h:m A')}}</td>
                                        <td class="text-center">{{$size->create_user->name ?? '—'}}</td>
                                        <td class="text-center">{{$size->update_user->name ?? '—'}}</td>
                                        @if(auth()->user()->user_type == "admin")
                                            <td class="text-center">
                                                {!! Form::open([
                                                    'route' => ['product-sizes.destroy',$size->id],
                                                    'method' => 'delete'
                                                ])!!}
                                                <button class="btn btn-danger btn-xs" onclick="return confirm('Are you sure that you want to delete Size ({{ $size->size_value }}) for product [{{ $product->name }}]?');" type="submit" title="{{'Delete'." ($size->size_value)"}}"><i class="fa-solid fa-trash"></i> Delete </button>

                                                <a href="{{route('product-sizes.edit',[$product->id, $product->name])}}" class="btn btn-primary btn-xs" type="button" title="{{'Edit'." ($size->size_value)"}}"><li class="icon-pencil"></li> Edit</a>
                                                {!! Form::close() !!}
                                            </td>
                                        @endif
                                    </tr>

                                    @empty
                                        <div class="alert alert-secondary text-center">
                                            <span class="h6">There are no sizes yet for this product! Go ahead and <a href="{{ route('product-sizes.create', [$product->id, $product->name]) }}" class="text-dark fw-bold">add some sizes</a> for it.</span>
                                        </div>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <nav class="m-b-30" aria-label="Page navigation example">
                    <ul class="pagination justify-content-center pagination-primary">
                        {!! $all_sizes_for_each_product->links('pagination::bootstrap-5') !!}
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="{{asset('admin/js/bootstrap/popper.min.js')}}"></script>
        <script src="{{asset('admin/js/bootstrap/bootstrap.min.js')}}"></script>
    @endpush

@endsection
