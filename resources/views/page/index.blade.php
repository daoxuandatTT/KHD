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
                    <h2 class="mb-4"><span>Bài viết gần đây </span></h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 order-md-last col-lg-6 ftco-animate">
                    <div class="blog-entry">
                        <div class="img img-big d-flex align-items-end"
                             style="background-image: url({{asset('storage/upload/images/'.$postNewest->image)}});">
                            <div class="overlay"></div>
                            <div class="text">
                                <span class="subheading"></span>
                                <h3><a href="data/single.html">{{$postNewest->title}}</a></h3>
                                <p class="mb-0"><a href="{{route('page.showDetail',$postNewest->id)}}" class="btn-custom">Đọc thêm <span
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
                                        <h3><a href="{{route('page.showDetail',$post->id)}}">{{ $post->title }}</a></h3>
                                        <p class="mb-0"><a href="{{route('page.showDetail',$post->id)}}" class="btn-custom">Đọc thêm <span
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
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-md-12 heading-section ftco-animate">
                            <h2 class="mb-4"><span>Thể loại món ăn</span></h2>
                        </div>
                    </div>
                    <div class="row">
                        @foreach($categories as $category)
                        <div class="col-md-3 ftco-animate">
                            <div class="blog-entry">
                                <a href="}" class="img-2"><img style="width: 520px;height: 245px" src="{{asset('storage/upload/images/'.$category->image) }}"
                                                                              class="img-fluid" alt="Colorlib Template"></a>
                                <div class="text pt-3">
                                    <p class="meta d-flex"><span class="pr-3">Dessert</span><span
                                            class="ml-auto pl-3">{{$category->created_at}}</span>
                                    </p>
                                    <p class="mb-0"><a href="" class="btn btn-black py-2">Đọc thêm
                                            <span class="icon-arrow_forward ml-4"></span></a></p>
                                </div>
                            </div>
                        </div>
                            @endforeach
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
                        @foreach($randomposts as $randomPost)
                        <div class="col-md-6 col-lg-6 ftco-animate">
                            <div class="blog-entry">
                                <div class="img img-big img-big-2 d-flex align-items-end"
                                    style="background-image: url('{{asset('storage/upload/images/'.$randomPost->image)}}')">
                                    <div class="overlay"></div>
                                    <div class="text">
                                        <span class="subheading"></span>
                                        <h3><a href="#"></a></h3>
                                        <p class="mb-0"><a href="#" class="btn-custom">Read More <span
                                                    class="icon-arrow_forward ml-4"></span></a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                            @endforeach
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="sidebar-wrap pt-4">
                        <div class="sidebar-box categories text-center ftco-animate">
                            <h2 class="heading mb-4">Tag</h2>
                            <ul class="category-image">
                                @foreach($tags as $tag)
                                <li>
                                    <a href=""
                                       class="img d-flex align-items-center justify-content-center text-center">
                                        <div class="text">
                                            <h3>{{$tag->name}}</h3>
                                        </div>
                                    </a>
                                </li>
                                    @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
