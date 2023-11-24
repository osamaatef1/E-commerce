@extends('layout.master')

@section('content')

    <div class="product-section mt-150 mb-150">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <div class="product-filters">
                        <ul>
                            <li class="active" data-filter="*">All</li>

                            @foreach($categories as $cat)
                                <li data-filter="._{{$cat->id}}">{{$cat->name}}</li>

                            @endforeach

                        </ul>
                    </div>
                </div>
            </div>

            <div class="row product-lists">

             @foreach($products as $pro)
                <div class="col-lg-4 col-md-6 text-center _{{$pro->cat_id}}">
                    <div class="single-product-item">
                        <div class="product-image">
                            <div class="single-product-item">
                            <a href="single-product.html"><img style="max-height: 250px; min-height: 250px" src="{{$pro->imagepath}}" alt=""></a>
                        </div>
                        <h3>{{$pro->name}}</h3>
                        <p class="product-price"><span>Price</span> {{$pro->price}} </p>
                        <p class="product-price"><span>Quantity</span> {{$pro->quantity}} </p>
                        <a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="pagination-wrap">
                        <ul>
                            <li><a href="#">Prev</a></li>
                            <li><a href="#">1</a></li>
                            <li><a class="active" href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">Next</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
