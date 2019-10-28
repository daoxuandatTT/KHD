@extends('master')
@section('content')
    <section class="hero-wrap hero-wrap-2" style="background-image: url('{{asset('data/images/bg_4.jpg')}}');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate pb-5 text-center">
                    <h1 class="mb-3 bread"> {{ $tag->name }}</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i
                                    class="ion-ios-arrow-forward"></i></a></span> <span>{{$tag->name}} <i
                                class="ion-ios-arrow-forward"></i></span></p>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div style="margin-bottom: 50px" class="col-md-12 heading-section ftco-animate">
                    <h1 class="mb-4 text-center"><span>{{$tag->name}} </span></h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        @foreach($tag->posts as $post)
                            <div class="col-md-4 ftco-animate">
                                <div class="blog-entry">
                                    <a href="{{route('page.showDetail',$post->id)}}" class="img d-flex align-items-end"
                                       style="background-image: url({{asset('storage/upload/images/'.$post->image)}});">
                                        <div class="overlay"></div>
                                    </a>
                                    <div class="text pt-3">
                                        <p class="meta d-flex"><span class="pr-3">{{$post->user->name}}</span><span
                                                class="ml-auto pl-3">{{$post->created_at}}</span></p>
                                        <h3><a href="data/single.html">{{ $post->title }}</a></h3>
                                        <p class="mb-0"><a href="{{route('page.showDetail',$post->id)}}"
                                                           class="btn-custom">Read More <span
                                                    class="icon-arrow_forward ml-4"></span></a></p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{--                    {{$post->links()}}--}}
                </div>
            </div>
        </div>
    </section>
@endsection
