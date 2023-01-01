@extends('layouts.admin.master')

@section('title')
    Deleted Categories
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3 class="mt-4">Deleted Categories</h3>
        @endslot
        <li class="breadcrumb-item"><a href="{{route('categories.index')}}">Categories</a> </li>
        <li class="breadcrumb-item active">Deleted Categories</li>
        @slot('bookmark')
            <a href="{{route('categories.create')}}" class="btn btn-pill btn-air-success btn-success-gradien" type="button" title="Add New Category">Add New Category</a>
        @endslot
    @endcomponent
    @include('layouts.admin.partials.messages.message')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Show deleted categories - <span class="b-b-success">{{App\Models\Category::onlyTrashed()->count()}}</span></h5>
                        <span>
                            All deleted categories. If you want to create and add new sections,
                            you must click the (Add New Categories) button at the top of the page,
                            and if you want to restore any section, press (Restore) next to each category.
                        </span>
                    </div>
                    <div class="card-block row">
                        <div class="col-sm-12 col-lg-12 col-xl-12">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th scope="col" class="text-center">#</th>
                                        <th scope="col" class="text-center">Name</th>
                                        <th scope="col" class="text-center">Description</th>
                                        <th scope="col" class="text-center">Added By</th>
                                        <th scope="col" class="text-center">Last Updated By</th>
                                        <th scope="col" class="text-center">Date of Creation</th>
                                        <th scope="col" class="text-center">Date of Deletion</th>
                                        @if(auth()->user()->user_type == "admin")
                                            <th scope="col" class="text-center">Action</th>
                                        @endif
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($categories as $category)
                                    <tr>
                                        <th scope="row" class="text-center">{{$loop->iteration}}</th>
                                        <td class="text-center">{{$category->name}}</td>
                                        <td class="text-center">{{$category->description}}</td>
                                        <td class="text-center">{{$product->create_user->name ?? '???'}}</td>
                                        <td class="text-center">{{$product->update_user->name ?? '???'}}</td>
                                        <td class="text-center" title="{{$category->created_at->format('Y-D-M h:m h:m A')}}">{{$category->created_at->format('Y-D-M h:m A')}}</td>
                                        <td class="text-center" title="{{$category->deleted_at->format('Y-D-M h:m h:m A')}}">{{$category->deleted_at->format('Y-D-M h:m A')}}</td>
                                        @if(auth()->user()->user_type == "admin")
                                            <td class="text-center">
                                                {!! Form::open([
                                                    'route' => ['categories.forceDelete',$category->id],
                                                    'method' => 'delete'
                                                ])!!}
                                                <button class="btn btn-danger btn-xs" onclick="return confirm('Are you sure that you want to permanently delete - {{ $category->name }}?');" type="submit" title="{{'Permanent Delete'." ($category->name)"}}"><i class="fa-solid fa-trash"></i> Permanent Delete </button>
                                                <a href="{{route('categories.restore',$category->id)}}" onclick="return confirm('Are you sure that you want to restore - {{ $category->name }}?');" class="btn btn-primary btn-xs" type="button" title="{{'Restore'." ($category->name)"}}"><i class="fa-solid fa-trash-arrow-up"></i> Restore</a>
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
                        {!! $categories->links('pagination::bootstrap-5') !!}
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
