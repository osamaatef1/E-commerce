@extends('layout.master')

@section('content')
    <div class="contact-from-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="form-title">
                        <h2>Edit Product</h2>
                    </div>
                    <div id="form_status"></div>
                    <div class="contact-form">
                        <form enctype="multipart/form-data" method="post" action="/editproduct/{{$product->id}} ">
                            @csrf
                            <p>
                                <input type="text" placeholder="Name" name="name" id="name" value="{{$product->name}}">
                                <span class="alert-danger">
                                    @error('name')
                                    {{$message}}
                                    @enderror

                                </span>
                            </p>
                            <p style="display: flex">
                                <input type="number" style="width: 50% " class="mr-4" placeholder="price" name="price" id="price" value="{{$product->price}}" >
                                <span class="alert-danger">
                                    @error('price')
                                    {{$message}}
                                    @enderror

                                </span>
                                <input type="number" style="width: 50%" placeholder="Quantity" name="quantity" id="quantity" value="{{$product->quantity}}">
                                <span class="alert-danger">
                                    @error('quantity')
                                    {{$message}}
                                    @enderror

                                </span>
                                <p>

                            <p>
                                <input type="file" name="photo" id="photo" class="form-control">
                            </p>
                                <img src="{{asset($product->imagepath)}}" alt="" height="250" width="200" >
                            </p>
                            <p><textarea name="description" id="description"  placeholder="description">{{$product->description}}</textarea></p>
                            <select placeholder="category" name="cat_id" id="cat_id" class="form-control" style="height: 40px; font-size: 16px;">
                                @foreach($categories as $cat)
                                    @if($cat->id == $product->cat_id)
                                        <option selected value="{{$cat->id}}">{{$cat->name}}</option>
                                    @endif
                                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                                @endforeach
                            </select>
<br>
                            <input type="hidden" name="token" value="FsWga4&@f6aw" />
                            <p><input type="submit" value="Submit"></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
