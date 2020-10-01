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
                {{ Form::open(array('route' => 'add-product', 'method' => 'post', 'files'=>'true')) }}
                <div class="card">
                    <div class="card-header"><b>New Propduct</b></div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="productName">Product name</label>
                            <input type="text" name="product_name" class="form-control" id="productName" placeholder="Example product name" required>
                        </div>
                        <div class="form-group">
                            <label for="productCategory">Select product category</label>
                            <select class="form-control" id="productCategory" name="category">
                                @foreach($category_list as $category)
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="productPrice">Product price</label>
                            <input type="number" name="product_price" class="form-control" id="productPrice" required>
                        </div>
                        <div class="form-group">
                            <label for="productSalePrice">Product sale price</label>
                            <input type="number" name="product_sale_price" class="form-control" id="productSalePrice">
                        </div>
                        <div class="form-group">
                            <label for="productTax">Product tax</label>
                            <input type="number" min="1" max="99" name="product_tax" class="form-control" id="productTax" required>
                        </div>
                        <div class="form-group">
                            <label for="productDescription">Product Description</label>
                            <textarea class="form-control" id="productDescription" name="product_description" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <img id="blah" src="{{ asset('images/default/no-image-1.jpg') }}" alt="your image" />
                            <input type="file" name="product_image" class="form-control-file" id="productImage" required>
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
