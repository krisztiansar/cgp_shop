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
                {{ Form::open(array('route' => 'add-product-categories', 'method' => 'post', 'files'=>'true')) }}
                <div class="card">
                    <div class="card-header"><b>New Propduct Categories</b></div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="categoryName">Product category name</label>
                            <input type="text" name="category_name" class="form-control" id="categoryName" placeholder="Example category" required>
                        </div>
                        <div class="form-group">
                            <img id="blah" src="{{ asset('images/default/no-image-1.jpg') }}" alt="your image" />
                            <input type="file" name="category_image" class="form-control-file" id="categoryImage" required>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success float-right">Save</button>
                    </div>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
