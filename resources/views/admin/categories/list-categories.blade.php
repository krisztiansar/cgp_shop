@extends('layouts.app')

@section('content')
    @if(session('message'))
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="alert alert-success" role="alert">
                        {{session('message')}}
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Propduct Categories</div>

                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Title</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($category_list as $category)
                                    <tr>
                                        <td width="20%">
                                            <img src="{{ asset('images/uploads/'.$category->image_name.'') }}" alt="" class="categoryListImage">
                                        </td>
                                        <td width="60%">{{ $category->title }}</td>
                                        <td width="20%">
                                            {{ Form::open(array('route' => 'edit-product-category', 'method' => 'get')) }}
                                            <a style="color: darkorange" data-toggle="modal" data-target="#modal{{ $category->category_id }}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                            <!-- Modal -->
                                            <div class="modal fade" id="modal{{ $category->category_id }}" tabindex="-1" aria-labelledby="modal{{ $category->category_id }}Label" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Edit {{ $category->title }}</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="categoryName">Edit product category name</label>
                                                                <input type="text" name="category_name" class="form-control" id="categoryName" value="{{ $category->title }}">
                                                                <input type="hidden" name="category_id" value="{{ $category->category_id }}">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{ Form::close() }}
                                            <a href="delete-product-category/{{ $category->category_id }}" style="color: darkred" onclick="return confirm('Are you sure you want to delete this category?');"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $category_list->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
