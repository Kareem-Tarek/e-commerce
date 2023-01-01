@extends('layouts.admin.master')

@section('title') Profile @endsection
@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>Edit Profile</h3>
        @endslot
        <li class="breadcrumb-item">Users</li>
        <li class="breadcrumb-item"><a href="{{route('profile')}}">{{$model->name}}</a> </li>
        <li class="breadcrumb-item active">Profile</li>
    @endcomponent
    @include('layouts.admin.partials.validation-errors')
    <div class="container-fluid">
        <div class="edit-profile">
            <div class="row">
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-header pb-0">
                            <h4 class="card-title mb-0">My Profile</h4>
                            <div class="card-options">
                                <a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{route('edit-profile-post')}}" method="post">
                                @csrf
                                @include('dashboard.users.form-password')
                                <div class="form-footer">
                                    <button class="btn btn-primary btn-block" type="submit">{{__('admin/home.save')}}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8">
                    <form action="{{route('edit-myProfile')}}" method="post" class="card" files="true" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header pb-0">
                            <h4 class="card-title mb-0">{{__('admin/user.edit_profile')}}</h4>
                            <div class="card-options">
                                <a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a>
                            </div>
                        </div>
                        @include('dashboard.users.form-myProfile')
                        <div class="card-footer text-end">
                            <button class="btn btn-primary" type="submit">{{__('admin/user.update_profile')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
