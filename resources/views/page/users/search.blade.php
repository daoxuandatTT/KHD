@extends('master')
@section('content')
    <section class="hero-wrap hero-wrap-2" style="background-image: url('{{asset('data/images/bg_4.jpg')}}');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate pb-5 text-center">
                    <h1 class="mb-3 bread">Các bài viết tìm được</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{route('page.index')}}">Home <i
                                    class="ion-ios-arrow-forward"></i></a></span> <span>My Post<i
                                class="ion-ios-arrow-forward"></i></span></p>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-subscribe ftco-section bg-light">
        <div class="overlay">
            <div class="container">
                <div class="row">
                    @foreach($posts as $post)
                        <div class="col-md-3 ftco-animate">
                            <div class="blog-entry">
                                <a href="single.html" class="img-2"><img style="width:200px; height: 250px"
                                                                         src="{{asset('storage/upload/images/'.$post->image) }}"
                                                                         class="img-fluid"
                                                                         alt="Colorlib Template"></a>

                                <div class="text pt-3">
                                    <p class="meta d-flex"><span class="pr-3">Dessert</span><span
                                            class="ml-auto pl-3">March 01, 2018</span></p>
                                    <h3><a href="data/single.html">{{$post->title}}</a></h3>
                                    {{--                                    <a href=""><i class="fa fa-edit">delete</i></a>--}}
                                    {{--                                    <a href=""><i class="fa fa-edit">update</i></a>--}}
                                    <a href="{{route('post.delete',$post->id)}}"
                                       class="btn btn-default btn-rounded mb-4">
                                        <i class="icon icon-delete">
                                            <button type="button" onclick="return confirm('delete')">Delete
                                            </button>
                                        </i>
                                    </a>
                                    <a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal"
                                       data-target="#modalRegisterForm1">
                                        <i class="icon icon-add">
                                            <button type="button">Update</button>
                                        </i>
                                    </a>
                                    <p class="mb-0"><a href="{{ route('page.showDetail',$post->id) }}"
                                                       class="btn btn-black py-2">Read More <span
                                                class="icon-arrow_forward ml-4"></span></a></p>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-md-8 text-wrap text-center heading-section ftco-animate">
                        <h2 class="mb-4"><span>Subcribe to our Newsletter</span></h2>
                        <p>A small river titled Duden flows by their place and supplies it with the necessary
                            regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your
                            mouth.</p>
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

