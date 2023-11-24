@extends('layout.master')

@section('content')

    <div class="product-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3><span class="orange-text">Our</span> Products</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet beatae optio.</p>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach($products as $pro)
                <div class="col-lg-4 col-md-6 text-center">
                    <div class="single-product-item">
                        <div class="product-image">
                            <a href="/product/{{$pro->cat_id}}"><img
                                    src="{{$pro->imagepath}}"

                                    alt=""></a>
                        </div>
                        <h3>{{$pro->name}}</h3>
                        <p class="product-price"><span>{{$pro->quantity}}</span> {{$pro->price}} </p>
                        <a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i>
                            Add to Cart</a>

                        <a href="/removeproduct/{{$pro->id}}" class="btn btn-danger"><i></i>
                            Delete
                        </a>
                        <a href="/edit/{{$pro->id}}" class="btn btn-success"><i></i>
                            Edit
                        </a>
                    </div>
                </div>
                    @endforeach

            </div>
        </div>
    </div>
@endsection
