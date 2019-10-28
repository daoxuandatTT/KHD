@extends('master')
@section('content')
    <section class="home-slider owl-carousel">
        <div class="slider-item">
            <div class="container">
                <div class="row d-flex slider-text justify-content-center align-items-center"
                     data-scrollax-parent="true">
                    <div class="img" style="background-image: url({{asset('data/images/bg_1.jpg')}});"></div>
                    <div class="text d-flex align-items-center ftco-animate">
                        <div class="text-2 pb-lg-5 mb-lg-4 px-4 px-md-5">
                            <h3 class="subheading mb-3">Featured Posts</h3>
                            <h1 class="mb-5">Love the Delicious &amp; Tasty Foods</h1>
                            <p class="mb-md-5">A small river named Duden flows by their place and supplies it with the
                                necessary regelialia</p>
                            <p><a href="#" class="btn btn-black px-3 px-md-4 py-3">Read More <span
                                        class="icon-arrow_forward ml-lg-4"></span></a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="slider-item">
            <div class="container">
                <div class="row d-flex slider-text justify-content-center align-items-center"
                     data-scrollax-parent="true">
                    <div class="img" style="background-image: url({{asset('data/images/bg_2.jpg')}});"></div>
                    <div class="text d-flex align-items-center ftco-animate">
                        <div class="text-2 pb-lg-5 mb-lg-4 px-4 px-md-5">
                            <h3 class="subheading mb-3">Featured Posts</h3>
                            <h1 class="mb-5">I am A Blogger &amp; I Love Foods</h1>
                            <p class="mb-md-5">A small river named Duden flows by their place and supplies it with the
                                necessary regelialia</p>
                            <p><a href="#" class="btn btn-black px-3 px-md-4 py-3">Read More <span
                                        class="icon-arrow_forward ml-lg-4"></span></a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-md-7 heading-section ftco-animate">
                    <h2 class="mb-4"><span>Bài Viết gần đây </span></h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 order-md-last col-lg-6 ftco-animate">
                    <div class="blog-entry">
                        <div class="img img-big d-flex align-items-end"
                             style="background-image: url({{asset('storage/upload/images/'.$postNewest->image)}});">
                            <div class="overlay"></div>
                            <div class="text">
                                <span class="subheading">Food</span>
                                <h3><a href="data/single.html">{{$postNewest->title}}</a></h3>
                                <p class="mb-0"><a href="{{route('page.showDetail',$postNewest->id)}}" class="btn-custom">Read More <span
                                            class="icon-arrow_forward ml-4"></span></a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        @foreach($posts as $post)
                            <div class="col-md-6 ftco-animate">
                                <div class="blog-entry">
                                    <a href="{{route('page.showDetail',$post->id)}}" class="img d-flex align-items-end"
                                       style="background-image: url({{asset('storage/upload/images/'.$post->image)}});">
                                        <div class="overlay"></div>
                                    </a>
                                    <div class="text pt-3">
                                        <p class="meta d-flex"><span class="pr-3">{{$post->user->name}}</span><span class="ml-auto pl-3">{{$post->created_at}}</span></p>
                                        <h3><a href="data/single.html">{{ $post->title }}</a></h3>
                                        <p class="mb-0"><a href="{{route('page.showDetail',$post->id)}}" class="btn-custom">Read More <span
                                                    class="icon-arrow_forward ml-4"></span></a></p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{$posts->links()}}
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section ftco-no-pt">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-md-12 heading-section ftco-animate">
                            <h2 class="mb-4"><span>Món ăn theo miền</span></h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 ftco-animate">
                            <div class="blog-entry">
                                <a href="data/single.html" class="img-2"><img src="{{asset('data/images/ha noi.jpg')}}"
                                                                              class="img-fluid" alt="Colorlib Template"></a>
                                <div class="text pt-3">
                                    <p class="meta d-flex"><span class="pr-3">Dessert</span><span
                                            class="ml-auto pl-3">{{$post->created_at}}</span>
                                    </p>
                                    <h3><a href="#">Miền Bắc</a></h3>
                                    <p class="mb-0"><a href="data/single.html" class="btn btn-black py-2">Read More
                                            <span class="icon-arrow_forward ml-4"></span></a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 ftco-animate">
                            <div class="blog-entry">
                                <a href="data/single.html" class="img-2"><img src="{{asset('data/images/da nang.jpg')}}"
                                                                              class="img-fluid" alt="Colorlib Template"></a>
                                <div class="text pt-3">
                                    <p class="meta d-flex"><span class="pr-3">Dessert</span><span
                                            class="ml-auto pl-3">{{$post->created_at}}</span>
                                    </p>
                                    <h3><a href="#">Miền Trung</a></h3>
                                    <p class="mb-0"><a href="data/single.html" class="btn btn-black py-2">Read More
                                            <span class="icon-arrow_forward ml-4"></span></a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 ftco-animate">
                            <div class="blog-entry">
                                <a href="data/single.html" class="img-2"><img
                                        src="{{asset('data/images/sai gon.jpeg')}}"
                                        class="img-fluid" alt="Colorlib Template"></a>
                                <div class="text pt-3">
                                    <p class="meta d-flex"><span class="pr-3">Dessert</span><span
                                            class="ml-auto pl-3">{{$post->created_at}}</span>
                                    </p>
                                    <h3><a href="#">Miền Nam</a></h3>
                                    <p class="mb-0"><a href="data/single.html" class="btn btn-black py-2">Read More
                                            <span class="icon-arrow_forward ml-4"></span></a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="sidebar-wrap">
                        <div class="sidebar-box p-4 about text-center ftco-animate">
                            <h2 class="heading mb-4">About Me</h2>
                            @if(Auth::user())
                                <img src="{{Auth::user()->image}}" alt="">
                                @else
                                <img src="{{asset('data/images/author.jpg')}}" class="img-fluid" alt="Colorlib Template">
                            @endif

                            <div class="text pt-4">
                                <p>Hi! My name is <strong>Cathy Deon</strong>, behind the word mountains, far from the
                                    countries Vokalia and Consonantia, there live the blind texts. Separated they live
                                    in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                            </div>
                        </div>
                        <div class="sidebar-box p-4 ftco-animate">
                            <form action="{{route('post.search')}}" method="post" class="search-form">
                                @csrf
                                <div class="form-group">
                                    <span class="icon icon-search"></span>
                                    <input type="text" class="form-control" placeholder="Search" name="search">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-12 heading-section ftco-animate">
                            <h2 class="mb-4"><span>Những món ăn ưa chuộng</span></h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-lg-6 ftco-animate">
                            <div class="blog-entry">
                                <div class="img img-big img-big-2 d-flex align-items-end"
                                     style="background-image: url({{asset('data/images/image_1.jpg')}});">
                                    <div class="overlay"></div>
                                    <div class="text">
                                        <span class="subheading">Food</span>
                                        <h3><a href="#">ham sandwich on white surface</a></h3>
                                        <p class="mb-0"><a href="#" class="btn-custom">Read More <span
                                                    class="icon-arrow_forward ml-4"></span></a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 ftco-animate">
                            <div class="blog-entry">
                                <div class="img img-big img-big-2 d-flex align-items-end"
                                     style="background-image: url({{asset('data/images/image_3.jpg')}});">
                                    <div class="overlay"></div>
                                    <div class="text">
                                        <span class="subheading">Lifestyle</span>
                                        <h3><a href="#">White and red ceramic plate</a></h3>
                                        <p class="mb-0"><a href="#" class="btn-custom">Read More <span
                                                    class="icon-arrow_forward ml-4"></span></a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="sidebar-wrap pt-4">
                        <div class="sidebar-box categories text-center ftco-animate">
                            <h2 class="heading mb-4">Categories</h2>
                            <ul class="category-image">
                                <li>
                                    <a href="data/foods.html"
                                       class="img d-flex align-items-center justify-content-center text-center"
                                       style="background-image: url({{asset('data/images/category-1.jpg')}});">
                                        <div class="text">
                                            <h3>Foods</h3>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="data/lifestyle.html"
                                       class="img d-flex align-items-center justify-content-center text-center"
                                       style="background-image: url({{asset('data/images/category-2.jpg')}});">
                                        <div class="text">
                                            <h3>Lifestyle</h3>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="img d-flex align-items-center justify-content-center text-center"
                                       style="background-image: url({{asset('data/images/category-2.jpg')}});">
                                        <div class="text">
                                            <h3>Others</h3>
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
@endsection
