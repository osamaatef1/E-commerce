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

                        <!-- ********************   Add To Cart On Click *******************************-->
                        <a href="/addproducttocart/{{$pro->id}}" class="cart-btn">
                            <i class="fas fa-shopping-cart"></i> Add to Cart
                        </a>
{{--                        <!--************************* Send  Product_Id With Url************************* -->--}}
{{--                        <form id="add-product-to-cart" action="/addproducttocart/{{$pro->id}}" method="POST">--}}
{{--                            @csrf--}}
{{--                            <!-- You can include additional hidden fields or other input elements here if needed -->--}}
{{--                        </form>--}}

                        <a href="/removeproduct/{{$pro->id}}" class="btn btn-danger"><i></i>
                            Delete
                        </a>
                        <a href="/edit/{{$pro->id}}" class="btn btn-success"><i></i>
                            Edit
                        </a>
                    </div>
                </div>
                @endforeach

                    <div style="height: 5px ; text-align: center !important;">
    {{ $products->links() }}

                    </div>
<style>
    svg{
        height: 50px;
    }
</style>

            </div>

        </div>
    </div>
@endsection
