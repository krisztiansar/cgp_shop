@extends('layouts.app')

@section('content')
    @if(session('message'))
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="alert alert-success" role="alert">
                        {{session('message')}}
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">Propducts</div>

                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Product name</th>
                                <th scope="col">Category</th>
                                <th scope="col">Normal price</th>
                                <th scope="col">Sale price</th>
                                <th scope="col">Tax</th>
                                <th scope="col">Full price</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)

                                <tr>
                                    <td><img src="{{ asset('images/uploads/'.$product->image_name.'') }}" alt="" class="categoryListImage"></td>
                                    <td>{{$product->product_title}}</td>
                                    <td>{{$product->title}}</td>
                                    <td>{{$product->price}} Ft.</td>
                                    <td>
                                        @if($product->sale_price > 0)
                                            {{$product->sale_price}} Ft.
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>{{$product->tax}} %</td>
                                    <td>
                                        @if($product->sale_price > 0)
                                            {{$product->sale_price+(($product->sale_price / 100)*$product->tax)}} Ft
                                        @else
                                            {{$product->price+(($product->price / 100)*$product->tax)}} Ft
                                        @endif
                                    </td>
                                    <td>
                                        {{ Form::open(array('route' => 'edit-product', 'method' => 'post', 'files'=>'true')) }}
                                        <a style="color: darkorange" data-toggle="modal" data-target="#modal{{ $product->product_id }}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                        <div class="modal fade" id="modal{{ $product->product_id }}" tabindex="-1" aria-labelledby="modal{{ $product->product_id }}Label" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit {{ $product->product_title }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="productName">Product name</label>
                                                            <input type="text" name="product_name" value="{{ $product->product_title }}" class="form-control" id="productName" placeholder="Example product name">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="productCategory">Select product category</label>
                                                            <select class="form-control" id="productCategory" name="category">
                                                                @foreach($category_list as $category)
                                                                    @if($product->category == $category->id)
                                                                        <option value="{{ $category->id }}" selected>{{ $category->title }}</option>
                                                                    @else
                                                                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                                                                    @endif
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="productPrice">Product price</label>
                                                            <input type="number" name="product_price" value="{{ $product->price }}" class="form-control" id="productPrice">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="productSalePrice">Product sale price</label>
                                                            <input type="number" name="product_sale_price" value="{{ $product->sale_price }}" class="form-control" id="productSalePrice">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="productTax">Product tax</label>
                                                            <input type="number" min="1" max="99" name="product_tax" value="{{ $product->tax }}" class="form-control" id="productTax">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="productDescription">Product Description</label>
                                                            <textarea class="form-control" id="productDescription" name="product_description" rows="3">{{ $product->description }}</textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <img id="blah" src="{{ asset('images/uploads/'.$product->image_name) }}" alt="your image" />
                                                            <input type="file" name="product_image" class="form-control-file" id="productImage">
                                                        </div>
                                                        <input type="hidden" name="product_id" value="{{ $product->product_id }}">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{ Form::close() }}
                                        <a href="delete-product/{{ $product->product_id }}" style="color: darkred" onclick="return confirm('Are you sure you want to delete this product?');"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
