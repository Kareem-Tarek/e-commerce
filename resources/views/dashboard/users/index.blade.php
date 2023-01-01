@extends('layouts.admin.master')

@section('title') 
    All Users
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3 class="mt-4">Users</h3>
        @endslot
        <li class="breadcrumb-item active">Users</li>
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
                        <h5>Show Users - <span class="b-b-success">{{App\Models\User::count()}}</span></h5>
                        <span>
                            All users If you want to create and add new users, 
                            you have to click on the (Add New User) button at 
                            the top of the page from the left.
                        </span>
                    </div>
                    <div class="card-block row">
                        <div class="col-sm-12 col-lg-12 col-xl-12">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="text-center">#</th>
                                            <th scope="col" class="text-center">Avatar</th>
                                            <th scope="col" class="text-center">Name</th>
                                            <th scope="col" class="text-center">Username</th>
                                            <th scope="col" class="text-center">Email</th>
                                            <th scope="col" class="text-center">User Type</th>
                                            <th scope="col" class="text-center">Gender</th>
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
                                    @forelse($users as $user)
                                    <tr>
                                        <th scope="row" class="text-center">{{$loop->iteration}}</th>
                                        <td class="text-center">
                                            @if ($user->avatar != null)
                                                <img src="{{ $user->avatar }}" alt="" width="60" height="60" style="border-radius: 2px;" />
                                            @else
                                                —
                                            @endif
                                        </td>
                                        <td class="text-center" style="width: 20%;">
                                            @if($user->name == null || $user->name == "")
                                                —
                                            @else
                                                {{$user->name}}
                                            @endif
                                        </td>
                                        <td class="text-center font-secondary" style="font-weight: bold;">{{$user->username}}</td>
                                        <td class="text-center">{{$user->email}}</td>
                                        <td class="text-center">{{ucfirst($user->user_type)}}</td>
                                        <td class="text-center">
                                            @if($user->user_type == "customer" || $user->user_type == "admin" || $user->user_type == "moderator")
                                                {{ucfirst($user->gender ?? 'unspecified')}}
                                            @else
                                                —
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if(strlen($user->phone) == 11)
                                                {{ '(+20) '.$user->phone ?? '—' }} <!-- Egypt's country code (+20) -->
                                                <span class="badge badge-info">Egypt</span>
                                            @else
                                                {{ $user->phone ?? '—' }}
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if($user->bio == null || $user->bio == "")
                                                —
                                            @else
                                                {!! \Str::words($user->bio,'5','...') !!}
                                            @endif
                                        </td>
                                        <td class="text-center" style="width: 18%;">{{$user->created_at->translatedFormat('d/m/Y - h:m A')}}</td>
                                        <td class="text-center">{{$user->create_user->name ?? '??'}}</td>
                                        <td class="text-center">{{$user->update_user->name ?? '??'}}</td>
                                        @if(auth()->user()->user_type == "admin")
                                            <td class="text-center" style="width: 15%;">
                                                {!! Form::open([
                                                    'route' => ['users.destroy',$user->id],
                                                    'method' => 'delete'
                                                ])!!}
                                                @if($user->user_type == "admin" && $user->id != auth()->user()->id)
                                                    {{-- <button style="display: none;" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure that you want to delete - {{ $user->name }}?');" type="submit" title="{{'Delete'." ($user->name)"}}"><i class="fa-solid fa-trash"></i> Delete </button> --}}
                                                @else($user->user_type == "admin" && auth()->user())
                                                    <button class="btn btn-danger btn-xs" onclick="return confirm('Are you sure that you want to delete - {{ $user->name }}?');" type="submit" title="{{'Delete'." ($user->name)"}}"><i class="fa-solid fa-trash"></i> Delete </button>
                                                @endif
                                                {!! Form::close() !!}

                                                @if($user->user_type == "admin" && $user->id != auth()->user()->id)
                                                    {{-- <a style="display: none;" href="{{route('users.edit',$user->id)}}" class="btn btn-primary btn-xs" type="button" title="{{'Edit'." ($user->name)"}}"><li class="icon-pencil"></li> Edit</a> --}}
                                                @else($user->user_type == "admin" && auth()->user())
                                                    <a href="{{route('users.edit',$user->id)}}" class="btn btn-primary btn-xs" type="button" title="{{'Edit'." ($user->name)"}}"><li class="icon-pencil"></li> Edit</a>
                                                @endif
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
                        {!! $users->links('pagination::bootstrap-5') !!}
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
