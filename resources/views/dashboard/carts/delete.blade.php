@extends('layouts.admin.master')

@section('title')
    Deleted Carts
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3 class="mt-4">Deleted Carts</h3>
        @endslot
        <li class="breadcrumb-item"><a href="{{route('carts.index')}}">Carts</a> </li>
        <li class="breadcrumb-item active">Deleted Carts</li>
        @slot('bookmark')
            <a href="{{route('carts.create')}}" class="btn btn-pill btn-air-success btn-success-gradien" type="button" title="Add New Category">Add New Category</a>
        @endslot
    @endcomponent
    @include('layouts.admin.partials.messages.message')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Show deleted carts - <span class="b-b-success">{{App\Models\Category::onlyTrashed()->count()}}</span></h5>
                        <span>
                            All deleted carts. If you want to create and add new sections, 
                            you must click the (Add New Carts) button at the top of the page, 
                            and if you want to restore any section, press (Restore) next to each cart.
                        </span>
                    </div>
                    <div class="card-block row">
                        <div class="col-sm-12 col-lg-12 col-xl-12">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th scope="col" class="text-center">#</th>
                                        <th scope="col" class="text-center">Cart ID</th>
                                        <th scope="col" class="text-center">Customer Name</th>
                                        <th scope="col" class="text-center">Phone</th>
                                        <th scope="col" class="text-center">Email</th>
                                        <th scope="col" class="text-center">Address</th>
                                        <th scope="col" class="text-center">Product Name</th>
                                        <th scope="col" class="text-center">Product Category</th>
                                        <th scope="col" class="text-center">Clothing Type</th>
                                        <th scope="col" class="text-center">Accessory</th>
                                        <th scope="col" class="text-center">Discount (%)</th>
                                        <th scope="col" class="text-center">Price (EGP)</th>
                                        <th scope="col" class="text-center">Quantity</th>
                                        <th scope="col" class="text-center" style="background: linear-gradient(to top, #b4b18d 0%, #f8f8f8 100%);">Total Amount (EGP)</th>
                                        <th scope="col" class="text-center">Last Updated By</th>
                                        <th scope="col" class="text-center">Date of Creation</th>
                                        <th scope="col" class="text-center">Date of Deletion</th>
                                        @if(auth()->user()->user_type == "admin")
                                            <th scope="col" class="text-center">Action</th>
                                        @endif
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($carts as $cart)
                                    <tr>
                                        <th scope="row" class="text-center">{{$loop->iteration}}</th>
                                        <td class="text-center">{{$cart->id}}</td>
                                        <td class="text-center">{{$cart->customer_name}}</td>
                                        <td class="text-center">
                                            @if(strlen($cart->customer_phone) == 11)
                                                {{ '(+20) '.$cart->customer_phone ?? '—' }} <!-- Egypt's country code (+20) -->
                                                <span class="badge badge-info">Egypt</span>
                                            @else
                                                {{ $cart->customer_phone ?? '—' }}
                                            @endif
                                        </td>
                                        <td class="text-center">{{$cart->customer_email}}</td>
                                        <td class="text-center">{{$cart->customer_address ?? '—'}}</td>
                                        <th class="text-center"><a href="{{ route('products.edit',[$cart->product_id]) }}" class="font-secondary">{{$cart->product_name}}</a></th>
                                        <td class="text-center">{{ucfirst($cart->product_category)}}</td>
                                        <td class="text-center">
                                            <a href="{{ route('categories.index') }}" style="color: rgb(63, 82, 205);">
                                                @if($cart->clothing_type == '1')
                                                    Formal
                                                @elseif($cart->clothing_type == '2')
                                                    Casual
                                                @else
                                                    Sports Wear
                                                @endif
                                            </a>
                                        </td>
                                        <td class="text-center">{{ucfirst($cart->is_accessory)}}</td>
                                        <td>{{ $cart->discount * 100 }}%</td>
                                        @if($cart->discount > 0)
                                            <td class="text-center">
                                                <span class="font-danger"><del>{{$cart->price}}</del></span> <label class="font-secondary">&RightArrow;</label> <span style="color: rgb(9, 145, 9); font-weight: bold;">{{$cart->price - ($cart->price * $cart->discount)}}</span>
                                            </td>
                                        @elseif($cart->discount <= 0 || $cart->discount == null || $cart->discount == "")
                                            <td class="text-center">{{$cart->price}}</td>
                                        @endif
                                        <td class="text-center">{{$cart->quantity}}</td>
                                        <td class="text-center" style="background: linear-gradient(to top, #f8f8f8 0%, #b4b18d 100%);">
                                            @if($cart->discount > 0)
                                                <span class="font-danger"><del>{{$cart->quantity * $cart->price}}</del></span> <label class="font-dark">&RightArrow;</label> <span style="color: rgb(9, 145, 9); font-weight: bold;">{{ $cart->quantity * ($cart->price - ($cart->price * $cart->discount)) }}</span>
                                            @elseif($cart->discount <= 0 || $cart->discount == null || $cart->discount == "")
                                                <span style="font-weight: bold;">{{$cart->quantity * $cart->price}}</span>
                                            @endif
                                        </td>
                                        <td class="text-center">{{$product->update_user->name ?? '???'}}</td>
                                        <td class="text-center" title="{{$cart->created_at->format('Y-D-M h:m h:m A')}}">{{$cart->created_at->format('Y-D-M h:m A')}}</td>
                                        <td class="text-center" title="{{$cart->deleted_at->format('Y-D-M h:m h:m A')}}">{{$cart->deleted_at->format('Y-D-M h:m A')}}</td>
                                        @if(auth()->user()->user_type == "admin")
                                            <td class="text-center">
                                                {!! Form::open([
                                                    'route' => ['carts.forceDelete',$cart->id],
                                                    'method' => 'delete'
                                                ])!!}
                                                <button class="btn btn-danger btn-xs" onclick="return confirm('Are you sure that you want to permanently delete - Cart with ID [{{ $cart->id }}]?');" type="submit" title="{{'Permanent Delete'." (Cart with ID [.$cart->id.']')"}}"><i class="fa-solid fa-trash"></i> Permanent Delete </button>
                                                <a href="{{route('carts.restore',$cart->id)}}" onclick="return confirm('Are you sure that you want to restore - Cart with ID [{{ $cart->id }}]?');" class="btn btn-primary btn-xs" type="button" title="{{'Restore'." (Cart with ID [.$cart->id.']')"}}"><i class="fa-solid fa-trash-arrow-up"></i> Restore</a>
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
                        {!! $carts->links('pagination::bootstrap-5') !!}
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
