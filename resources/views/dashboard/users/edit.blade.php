@extends('layouts.admin.master')

@section('title') Edit ({{$model->name ?? $model->username}}) @endsection

@section('content')

    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3 class="mt-4">Edit ({{$model->name ?? $model->username}})</h3>
        @endslot
        <li class="breadcrumb-item"><a href="{{route('users.index')}}">Users</a> </li>
        <li class="breadcrumb-item active">Edit ({{$model->name ?? $model->username}})</li>
        @slot('bookmark')
            <a href="{{route('users.create')}}" class="btn btn-pill btn-air-success btn-success-gradien" type="button" title="Add New User">Add New User</a>
        @endslot
    @endcomponent
    @include('layouts.admin.partials.validation-errors')

    <div class="col-sm-12 col-xl-6 xl-100">
        <div class="card">
            <div class="card-header pb-0">
                <h5>Check Changes</h5>
            </div>
            <div class="card-body">
                <div class="tab-content " id="pills-tabContent">
                    <form action="{{route('users.update',$model->id)}}" method="post" id="alert-form">
                        @csrf
                        {{ method_field('put') }}
                        @include('dashboard.users.form')                        
                        <button class="btn btn-success mt-4 d-block me-auto" type="submit">Update</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
