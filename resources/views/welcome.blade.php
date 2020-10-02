@extends('layouts.app')

@section('content')

    <div class="col-lg-4 col-md-6 col-xs-12 exampleProduct" style="display: none;">
        <div class="card" style="margin-bottom: 20px;">
            <img src="{{ asset('images/uploads/') }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title" id="productName"></h5>
                <hr>
                <p class="card-text" id="productDescription"></p>
                <hr>
                <p class="card-text" id="productPrice" style="text-align: right; font-size: 20px;"></p>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <h1 id="categoryName" style="margin-bottom: 20px">Összes termék</h1>
        </div>
        <div class="row" id="test">
            @if($products)
                @foreach($products as $product)
                    <div class="col-lg-4 col-md-6 col-xs-12">
                        <div class="card" style="margin-bottom: 20px;">
                            <img src="{{ asset('images/uploads/'.$product->image_name) }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title" id="productName">{{ $product->title }}</h5>
                                <hr>
                                <p class="card-text" id="productDescription">{{ $product->description }}</p>
                                <hr>
                                <p class="card-text" id="productPrice" style="text-align: right; font-size: 20px;">
                                    @if($product->sale_price > 0)
                                        {{$product->sale_price+(($product->sale_price / 100)*$product->tax)}} Ft
                                    @else
                                        {{$product->price+(($product->price / 100)*$product->tax)}} Ft
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>


@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function(){
        $(".categoryLink").click(function(){
            var category_id = jQuery(this).attr("id");

            console.log("category_id: "+category_id)

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $("#categoryName").html(jQuery(this).html());

            $.ajax({
                type:'get',
                url: "{{ route('list-product') }}",
                data: {
                    category_id: category_id
                },

                success:function(html){
                    $('#test').html("");

                    jQuery.each(html.products,function(i,e){
                        var itemHTML = $(".exampleProduct").clone().removeClass("exampleProduct").addClass("Product").css('display', 'block');
                        itemHTML.find("#productName").html(e.title)
                        itemHTML.find("#productDescription").html(e.description)

                        if(e.sale_price > 0){
                            var sp = e.sale_price;
                            var tx = e.tax / 100;

                            sp = sp + sp * tx;

                            itemHTML.find("#productPrice").html(sp+" Ft.")
                        }else{
                            var np = e.price;
                            var tx = e.tax / 100;

                            np = np + np * tx;

                            itemHTML.find("#productPrice").html(np+" Ft.")
                        }

                            var imgSrc = itemHTML.find(".card-img-top").attr("src")+"/"+e.image_name;
                        itemHTML.find(".card-img-top").attr("src", imgSrc);
                        $('#test').append(itemHTML)
                    })

                    //image_name
                }

            });
        });
    });
</script>
