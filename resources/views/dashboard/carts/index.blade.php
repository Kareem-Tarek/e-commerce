@extends('layouts.admin.master')

@section('title') 
    All Carts
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3 class="mt-4">Carts</h3>
        @endslot
        <li class="breadcrumb-item active">Carts</li>
    @endcomponent

    @include('layouts.admin.partials.messages.message')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Show Carts - <span class="b-b-success">{{App\Models\Cart::count()}}</span></h5>
                    </div>
                    <div class="card-block row">
                        <div class="col-sm-12 col-lg-12 col-xl-12">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th scope="col" class="text-center">#</th>
                                        <th scope="col" class="text-center">Cart ID</th>
                                        <th scope="col" class="text-center">Customer Name</th>
                                        <th scope="col" class="text-center">Phone</th>
                                        <th scope="col" class="text-center">Email</th>
                                        <th scope="col" class="text-center">Address</th>
                                        <th scope="col" class="text-center">Product Image</th>
                                        <th scope="col" class="text-center">Product Name</th>
                                        <th scope="col" class="text-center">Product Category</th>
                                        <th scope="col" class="text-center">Clothing Type</th>
                                        <th scope="col" class="text-center">Accessory</th>
                                        <th scope="col" class="text-center">Discount (%)</th>
                                        <th scope="col" class="text-center">Price (EGP)</th>
                                        <th scope="col" class="text-center">Quantity</th>
                                        <th scope="col" class="text-center" style="background: linear-gradient(to top, #b4b18d 0%, #f8f8f8 100%);">Total Amount (EGP)</th>
                                        <th scope="col" class="text-center">Date of Creation</th>
                                        <th scope="col" class="text-center">Last Updated By</th>
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
                                        <td class="text-center"><a href="{{route('single_product_page_dashboard', [$cart->product_id, $cart->product_name])}}"><img src="{{$cart->product_image}}" alt="{{$cart->product_name.'img'}}" width="80" height="80"></a></td>
                                        <th class="text-center"><a href="{{route('single_product_page_dashboard', [$cart->product_id, $cart->product_name])}}" class="font-secondary">{{$cart->product_name}}</a></th>
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
                                        <td class="text-center">{{$cart->created_at->translatedFormat('d/m/Y - h:m A')}}</td>
                                        <td class="text-center">{{$cart->update_user->name ?? '???'}}</td>
                                        @if(auth()->user()->user_type == "admin")
                                            <td class="text-center">
                                                {!! Form::open([
                                                    'route' => ['carts.destroy',$cart->id],
                                                    'method' => 'delete'
                                                ])!!}
                                                <button class="btn btn-danger btn-xs" onclick="return confirm('Deleting the cart using its ID as the following.. => cart (ID)\n\nAre you sure that you want to delete cart ({{ $cart->id }})?\nThe cart was made by ({{ $cart->customer_name }})');" type="submit" title="{{'Delete'." ($cart->name)"}}"><i class="fa-solid fa-trash"></i> Delete </button>

                                                <a href="{{route('carts.edit',$cart->id)}}" class="btn btn-primary btn-xs" type="button" title="{{'Edit'." ($cart->id)"}}"><li class="icon-pencil"></li> Edit</a>
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
