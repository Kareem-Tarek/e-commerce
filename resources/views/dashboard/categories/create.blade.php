@extends('layouts.admin.master')
@inject('model', 'App\Models\Category')

@section('title')
    Create Product
@endsection

@section('content')

    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3 class="mt-4">Create Category</h3>
        @endslot
        <li class="breadcrumb-item"><a href="{{route('categories.index')}}">Categories</a> </li>
        <li class="breadcrumb-item active">Create Category</li>

    @endcomponent

    @include('layouts.admin.partials.validation-errors')

    <div class="col-sm-12 col-xl-6 xl-100">
        <div class="card">
            <div class="card-header pb-0">
                <h5>Add New Category</h5>
            </div>
            <div class="card-body">
                <div class="tab-content" id="pills-tabContent">
                    <form action="{{route('categories.store')}}" method="post" id="alert-form">
                        @csrf
                        @include('dashboard.categories.form')
                        <button class="btn btn-success mt-4 d-block me-auto" type="submit">Add</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
