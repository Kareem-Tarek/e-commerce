@extends('layouts.admin.master')

@section('title') 
    All Products
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3 class="mt-4">Products</h3>
        @endslot
        <li class="breadcrumb-item active">Products</li>
        @slot('bookmark')
            <a href="{{route('products.create')}}" class="btn btn-pill btn-air-success btn-success-gradien" type="button" title="Add New Product">Add New Product</a>
        @endslot
    @endcomponent

    @include('layouts.admin.partials.messages.message')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">

                        <h5>Show Products - <span class="b-b-success">{{App\Models\Product::count()}}</span></h5>
                        <span>
                            All products If you want to create and add new products, 
                            you have to click on the (Add New Product) button at 
                            the top of the page from the left.
                        </span>
                    </div>
                    <div class="card-block row">
                        <div class="col-sm-12 col-lg-12 col-xl-12">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th  class="text-center">#</th>
                                            <th scope="col" class="text-center">Image</th>
                                            <th scope="col" class="text-center">Name</th>
                                            {{-- <th scope="col" class="text-center">Description</th> --}}
                                            <th scope="col" class="text-center">Discount (%)</th>
                                            <th scope="col" class="text-center">Price (EGP)</th>
                                            <th scope="col" class="text-center">Category</th>
                                            <th scope="col" class="text-center">Clothing type</th>
                                            <th scope="col" class="text-center">Available Quantity</th>
                                            <th scope="col" class="text-center">Date of Creation</th>
                                            <th scope="col" class="text-center">Added By</th>
                                            <th scope="col" class="text-center">Last Updated By</th>
                                            @if(auth()->user()->user_type == "admin")
                                                <th scope="col" class="text-center">Action</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($products as $product)
                                    <tr>
                                        <th scope="row" class="text-center">{{$loop->iteration}}</th>
                                        <td class="text-center"><a href="{{ route('single_product_page_dashboard',[$product->id, $product->name]) }}"><img src="{{$product->image_name}}" alt="{{$product->name.'img'}}" width="80" height="80" style="border-radius: 2px;" /></a></td>
                                        <th class="text-center" style="width: 20%;"><a href="{{ route('single_product_page_dashboard',[$product->id, $product->name]) }}" class="font-secondary">{{$product->name}}</a></th>
                                        {{-- <td class="text-center">{{$product->description}}</td> --}}
                                        <td class="text-center">
                                            @if (($product->discount * 100 ) == 0)
                                                —
                                            @else
                                                {{ $product->discount * 100 }}%
                                            @endif
                                        </td>
                                        @if($product->discount > 0)
                                            <td class="text-center">
                                                <span class="font-danger"><del>{{$product->price}}</del></span> <label class="font-secondary">&RightArrow;</label> <span class="font-primary">{{$product->price - ($product->price * $product->discount)}}</span>
                                            </td>
                                        @elseif($product->discount <= 0 || $product->discount == null || $product->discount == "")
                                            <td class="text-center">{{$product->price}}</td>
                                        @endif
                                        <td class="text-center">{{ucwords($product->product_category)}}</td> <!-- ucwords($variable), capitalizes first letter in each word -->
                                        {{-- <td class="text-center">{{Str::upper($product->product_category)}}</td> --}} <!-- uppercasing all letters in each word -->
                                        <td class="text-center">
                                            <a href="{{ route('categories.index') }}" style="color: rgb(63, 82, 205);">
                                                @if($product->clothing_type == '1')
                                                    Formal
                                                @elseif($product->clothing_type == '2')
                                                    Casual
                                                @else
                                                    Sports Wear
                                                @endif
                                            </a>
                                        </td>
                                        {{-- <td class="text-center"><a href="{{ route('categories.index') }}">{{$product->category->name ?? 'No Clothing Type'}}</a></td> --}}
                                        <td class="text-center">{{$product->available_quantity}}</td>
                                        <td class="text-center" style="width: 18%;">{{$product->created_at->translatedFormat('d/m/Y - h:m A') /* date('d/M/y', strtotime($product->created_at)) */}}</td>
                                        <td class="text-center">{{$product->create_user->name ?? '??'}}</td>
                                        <td class="text-center">{{$product->update_user->name ?? '??'}}</td>
                                        @if(auth()->user()->user_type == "admin")
                                            <td class="text-center" style="width: 15%;">
                                                {!! Form::open([
                                                    'route' => ['products.destroy',$product->id],
                                                    'method' => 'delete'
                                                ])!!}
                                                <button class="btn btn-danger btn-xs" onclick="return confirm('Are you sure that you want to delete - {{ $product->name }}?');" type="submit" title="{{'Delete'." ($product->name)"}}"><i class="fa-solid fa-trash"></i> Delete </button>

                                                <a href="{{route('products.edit', [$product->id, $product->name])}}" class="btn btn-primary btn-xs" type="button" title="{{'Edit'." ($product->name)"}}"><li class="icon-pencil"></li> Edit</a>
                                                <a href="{{route('products-sizes', [$product->id, $product->name])}}" class="btn btn-dark btn-xs" type="button" title="{{$product->name." (Sizes)"}}">Sizes</a>
                                                {!! Form::close() !!}
                                            </td>
                                        @endif
                                    </tr>

                                    @empty
                                        <div class="alert alert-secondary">
                                            There are no data!
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
                        {!! $products->links('pagination::bootstrap-5') !!}
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
