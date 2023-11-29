@extends('layout.master')

@section('content')

    <div class="contact-from-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="form-title">
                        <h2>Add Product</h2>
                    </div>
                    <div id="form_status"></div>
                    <div class="contact-form">
                        <form method="post" action="/storeproduct" enctype="multipart/form-data">
                            @csrf
                            <p>
                                <input type="text" placeholder="Name" name="name" id="name">
                                <span class="alert-danger">
                                    @error('name')
                                    {{$message}}
                                    @enderror

                                </span>
                            </p>
                            <p style="display: flex">
                                <input type="number" style="width: 50% " class="mr-4" placeholder="price" name="price" id="price" >
                                <span class="alert-danger">
                                    @error('price')
                                    {{$message}}
                                    @enderror

                                </span>
                                <input type="number" style="width: 50%" placeholder="Quantity" name="quantity" id="quantity">
                                <span class="alert-danger">
                                    @error('quantity')
                                    {{$message}}
                                    @enderror

                                </span>
                                <p>
                                <input type="file" name="photo" id="photo" class="form-control">
                            </p>
                            <p><textarea name="description" id="description"  placeholder="description"></textarea></p>
                            <select placeholder="category" name="cat_id" id="cat_id" class="form-control" style="height: 40px; font-size: 16px;">
                                @foreach($categories as $cat)
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
