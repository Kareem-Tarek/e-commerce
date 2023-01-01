@extends('layouts.admin.master')
@inject('model', 'App\Models\User')

@section('title')
    Create User
@endsection

@section('content')

    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3 class="mt-4">Create User</h3>
        @endslot
        <li class="breadcrumb-item"><a href="{{route('users.index')}}">Users</a> </li>
        <li class="breadcrumb-item active">Create User</li>

    @endcomponent

    @include('layouts.admin.partials.validation-errors')

    @if(session()->has('confirm_password_empty'))
        <div class="alert alert-danger text-left session-message">
            {{-- <button type="button" class="close" data-dismiss="alert" style="color: rgb(173, 6, 6)">x</button> --}}
            <h3>Warning!</h3><br><span style="font-size: 150%;">•</span>&nbsp;&nbsp;{{ session()->get('confirm_password_empty') }}
        </div>
    @elseif(session()->has('confirm_password_not_matching'))
        <div class="alert alert-danger text-left session-message">
            {{-- <button type="button" class="close" data-dismiss="alert" style="color: rgb(173, 6, 6)">x</button> --}}
            <h3>Warning!</h3><br><span style="font-size: 150%;">•</span>&nbsp;&nbsp;{{ session()->get('confirm_password_not_matching') }}
        </div>
    @endif

    <div class="col-sm-12 col-xl-6 xl-100">
        <div class="card">
            <div class="card-header pb-0">
                <h5>Add New User</h5>
            </div>
            <div class="card-body">
                <div class="tab-content" id="pills-tabContent">
                    <form action="{{route('users.store')}}" method="post" id="alert-form">
                        @csrf
                        @include('dashboard.users.form')
                        <button class="btn btn-success mt-4 d-block me-auto" type="submit">Add</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
