@extends('master')
@section('content')
@push('css')

    @endpush


    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="row">
                        @foreach($postsShare as $post)
                        <div class="col-md-6 col-lg-12 ftco-animate">
                            <div class="blog-entry d-lg-flex">
                                <div class="half">
                                    <a href="single.html" class="img d-flex align-items-end" style="background-image: url({{asset('storage/upload/images/'.$post->image)}});">
                                        <div class="overlay"></div>
                                    </a>
                                </div>
                                <div class="text px-md-4 px-lg-5 half pt-3">
                                    <p class="meta d-flex"><span class="pr-3">Dessert</span><span class="ml-auto pl-3">March 01, 2018</span></p>
                                    <h3><a href="single.html">Tasty &amp; Delicious Foods</a></h3>
                                    <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.
                                    </p>
                                    <p class="mb-0"><a href="single.html" class="btn btn-primary">Read More <span class="icon-arrow_forward ml-4"></span></a></p>
                                </div>
                            </div>
                        </div>
                            @endforeach
                        {{$postsShare->links()}}
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="sidebar-wrap">
                        <div class="sidebar-box p-4 about text-center ftco-animate">
                            <h2 class="heading mb-4">About Me</h2>
                            <img src="{{asset('storage/upload/images/'.auth::user()->image)}}" class="img-fluid" alt="Colorlib Template">
                            <div class="text pt-4">
                                <p>Hi! My name is <strong>Cathy Deon</strong>, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                            </div>
                        </div>
                        <div class="sidebar-box p-4 ftco-animate">
                            <form action="#" class="search-form">
                                <div class="form-group">
                                    <span class="icon icon-search"></span>
                                    <input type="text" class="form-control" placeholder="Search">
                                </div>
                            </form>
                        </div>
                        <div class="sidebar-box categories text-center ftco-animate">
                            <h2 class="heading mb-4">Categories</h2>
                            <ul class="category-image">
                                <li>
                                    <a href="#" class="img d-flex align-items-center justify-content-center text-center" style="background-image: url(images/category-1.jpg);">
                                        <div class="text">
                                            <h3>Foods</h3>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="ftco-subscribe ftco-section bg-light">
        <div class="overlay">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-8 text-wrap text-center heading-section ftco-animate">
                        <h2 class="mb-4"><span>Subcribe to our Newsletter</span></h2>
                        <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
                        <div class="row d-flex justify-content-center mt-4 mb-4">
                            <div class="col-md-8">
                                <form action="#" class="subscribe-form">
                                    <div class="form-group d-flex">
                                        <input type="text" class="form-control" placeholder="Enter email address">
                                        <input type="submit" value="Subscribe" class="submit px-3">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
@endpush
