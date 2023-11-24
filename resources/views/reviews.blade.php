@extends('layout.master')

@section('content')

    <div class="contact-from-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="form-title">
                        <h2>Add Review</h2>
                    </div>
                    <div id="form_status"></div>
                    <div class="contact-form">
                        <form method="post" action="/addreview">
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
                                <input type="text" style="width: 50% " class="mr-4" placeholder="phone" name="phone" id="phone" >
                                <span class="alert-danger">
                                    @error('phone')
                                    {{$message}}
                                    @enderror

                                </span>
                                <input type="text" style="width: 50%" placeholder="email" name="email" id="email">
                                <span class="alert-danger">
                                    @error('email')
                                    {{$message}}
                                    @enderror

                                </span>
                                </span>
                                <input type="text" style="width: 50%" placeholder="subject" name="subject" id="subject">
                                <span class="alert-danger">
                                    @error('subject')
                                    {{$message}}
                                    @enderror

                                </span>
                            <p>

                            </p>
                            <p><textarea name="message" id="message"  placeholder="message"></textarea></p>

                            <br>
                            <input type="hidden" name="token" value="FsWga4&@f6aw" />
                            <p><input type="submit" value="Submit"></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="testimonial-section mt-80 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1 text-center">
                    <div class="testimonial-sliders">

                        @foreach ($reviews as $item)
                            <div class="single-testimonial-slider">
                                <div class="client-avater">
                                    <img src="assets/img/avaters/avatar1.png" alt="">
                                </div>

                                <div class="client-meta">
                                    <h3>{{$item->name}} <span>{{$item->subject}}</span></h3>
                                    <p class="testimonial-body">
                                        {{$item->message}}

                                    </p>
                                    <div class="last-icon">
                                        <i class="fas fa-quote-right"></i>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
