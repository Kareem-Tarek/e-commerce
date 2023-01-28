@extends('layouts.admin.master')

@section('title') 
    All Suppliers
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3 class="mt-4">Users</h3>
        @endslot
        <li class="breadcrumb-item active">Users (Suppliers)</li>
        @slot('bookmark')
            <a href="{{route('users.create')}}" class="btn btn-pill btn-air-success btn-success-gradien" type="button" title="Add New User">Add New User</a>
        @endslot
    @endcomponent

    @if(session()->has('unauthorized_action'))
        <div class="alert alert-danger text-left session-message">
            {{-- <button type="button" class="close" data-dismiss="alert" style="color: rgb(173, 6, 6)">x</button> --}}
            <h3>Warning!</h3><br><span style="font-size: 150%;">•</span>&nbsp;&nbsp;{{ session()->get('unauthorized_action') }}
        </div>
    @endif

    @include('layouts.admin.partials.messages.message')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Show Suppliers - <span class="b-b-success">{{App\Models\User::where('user_type','supplier')->count()}}</span></h5>
                        <span>
                            All suppliers If you want to create and add new suppliers, 
                            you have to click on the (Add New User) button at 
                            the top of the page.
                        </span>
                    </div>
                    <div class="card-block row">
                        <div class="col-sm-12 col-lg-12 col-xl-12">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered @if($suppliers->count() == 0) d-none @endif">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="text-center">#</th>
                                            <th scope="col" class="text-center">Avatar</th>
                                            <th scope="col" class="text-center">Name</th>
                                            <th scope="col" class="text-center">Username</th>
                                            <th scope="col" class="text-center">Email</th>
                                            <th scope="col" class="text-center">User Type</th>
                                            <th scope="col" class="text-center">Products <br> <span class="font-danger fw-bold f-12">(Under Construction!)</span></th>
                                            <th scope="col" class="text-center">Phone</th>
                                            <th scope="col" class="text-center">Bio</th>
                                            <th scope="col" class="text-center">Date of Creation</th>
                                            <th scope="col" class="text-center">Added By</th>
                                            <th scope="col" class="text-center">Last Updated By</th>
                                            @if(auth()->user()->user_type == "admin")
                                                <th scope="col" class="text-center">Action</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($suppliers as $supplier)
                                    <tr>
                                        <th scope="row" class="text-center">{{$loop->iteration}}</th>
                                        <td class="text-center">
                                            @if ($supplier->avatar != null)
                                                <img src="{{ $supplier->avatar }}" alt="" width="60" height="60" style="border-radius: 2px;" />
                                            @else
                                                —
                                            @endif
                                        </td>
                                        <td class="text-center" style="width: 20%;">
                                            @if($supplier->name == null || $supplier->name == "")
                                                —
                                            @else
                                                {{$supplier->name}}
                                            @endif
                                        </td>
                                        <td class="text-center font-secondary" style="font-weight: bold;">{{$supplier->username}}</td>
                                        <td class="text-center">{{$supplier->email}}</td>
                                        <td class="text-center">{{ucfirst($supplier->user_type)}}</td>
                                        <td class="text-center"><a href="javascript:void(0);" class="fw-bold">Browse</a></td>
                                        <td class="text-center">
                                            @if(strlen($supplier->phone) == 11)
                                                {{ '(+20) '.$supplier->phone ?? '—' }} <!-- Egypt's country code (+20) -->
                                                <span class="badge badge-info">Egypt</span>
                                            @else
                                                {{ $supplier->phone ?? '—' }}
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if($supplier->bio == null || $supplier->bio == "")
                                                —
                                            @else
                                                {!! \Str::words($supplier->bio,'5','...') !!}
                                            @endif
                                        </td>
                                        <td class="text-center" style="width: 18%;">{{$supplier->created_at->translatedFormat('d/m/Y - h:m A')}}</td>
                                        <td class="text-center">{{$supplier->create_user->name ?? '—'}}</td>
                                        <td class="text-center">{{$supplier->update_user->name ?? '—'}}</td>
                                        @if(auth()->user()->user_type == "admin")
                                            <td class="text-center" style="width: 15%;">
                                                {!! Form::open([
                                                    'route' => ['users.destroy',$supplier->id],
                                                    'method' => 'delete'
                                                ])!!}
                                                @if($supplier->user_type == "admin" && $supplier->id != auth()->user()->id)
                                                    {{-- <button style="display: none;" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure that you want to delete - {{ $supplier->name }}?');" type="submit" title="{{'Delete'." ($supplier->name)"}}"><i class="fa-solid fa-trash"></i> Delete </button> --}}
                                                @else($supplier->user_type == "admin" && auth()->user())
                                                    <button class="btn btn-danger btn-xs" onclick="return confirm('Are you sure that you want to delete - {{ $supplier->name }}?');" type="submit" title="{{'Delete'." ($supplier->name)"}}"><i class="fa-solid fa-trash"></i> Delete </button>
                                                @endif
                                                {!! Form::close() !!}

                                                @if($supplier->user_type == "admin" && $supplier->id != auth()->user()->id)
                                                    {{-- <a style="display: none;" href="{{route('users.edit',$supplier->id)}}" class="btn btn-primary btn-xs" type="button" title="{{'Edit'." ($supplier->name)"}}"><li class="icon-pencil"></li> Edit</a> --}}
                                                @else($supplier->user_type == "admin" && auth()->user())
                                                    <a href="{{route('users.edit',$supplier->id)}}" class="btn btn-primary btn-xs" type="button" title="{{'Edit'." ($supplier->name)"}}"><li class="icon-pencil"></li> Edit</a>
                                                @endif
                                            </td>
                                        @endif
                                    </tr>

                                    @empty
                                        <div class="alert alert-secondary text-center">
                                            <span class="h6">There are no suppliers yet!</span>
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
                        {!! $suppliers->links('pagination::bootstrap-5') !!}
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
