@extends('master')
@push('css')

@endpush
@section('content')

    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v5.0&appId=2474525532872947&autoLogAppEvents=1"></script>
    <section class="hero-wrap hero-wrap-2" style="background-image: url('{{asset('data/images/bg_4.jpg')}}');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate pb-5 text-center">
                    <h1 class="mb-3 bread">{{$post->title}}</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i
                                    class="ion-ios-arrow-forward"></i></a></span> <span>Detail post<i
                                class="ion-ios-arrow-forward"></i></span></p>

                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 order-lg-last ftco-animate">
                    <h2 class="mb-3">#1. Desription</h2>
                    <p>{!! $post->description !!}</p>
                    {{--                    <p>{{$post->recipe}}</p>--}}
                    <p>
                        <img src="{{asset('storage/upload/images/' . $post->image)}}" alt="" class="img-fluid">
                    </p>
                    <h2 class="mb-3 mt-5">#2. Material</h2>
                    {{--                        image--}}

                    <p>{!! $post->material !!}</p>
                    <h2 class="mb-3 mt-5">#3. Recipe</h2>
                    <p>
                        {!! $post->recipe !!}

                    </p>
                    @if(isset($post->video))
                        <video id="video" width="560" height="365" controls autoplay>
                            <source src="{{asset('storage/upload/videos/' . $post->video)}}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    @else
                        <div class="media-body">
                            {!! Embed::make($post->link)->parseUrl()->getIframe() !!}
                        </div>
                    @endif

                    <div class="tag-widget post-tag-container mb-5 mt-5">
                        <div class="tagcloud">
                            @foreach($post->tags as $tag)
                                <a href="#" class="tag-cloud-link">{{$tag->name}}</a>
                            @endforeach
                        </div>
                    </div>

                    <div class="fb-comments" data-href="http://blogmonngon.tk/{{$post->id}}" data-width="" data-numposts="5"></div>
                </div> <!-- .col-md-8 -->
                <div class="col-lg-3 sidebar pr-lg-5 ftco-animate">
                    <div class="about-author d-flex p-4 bg-light">
                        <div class="bio mr-5">
                            <img src="{{$post->user->image}}" alt="Image placeholder" class="img-fluid mb-4">
                        </div>
                        <div class="desc">
                            <h6>{{ $post->user->name }}</h6>
                            <p>{{$post->user->description}}</p>
                        </div>
                    </div>
                    <div class="sidebar-box">
                        <form action="#" class="search-form">
                            <div class="form-group">
                                <span class="icon icon-search"></span>
                                <input type="text" class="form-control" placeholder="Type a keyword and hit enter">
                            </div>
                        </form>
                    </div>
                    <div class="sidebar-box ftco-animate">
                        <ul class="categories">
                            <h3 class="heading mb-4">Categories</h3>
                            @foreach($categories as $category)
                                <li><a href="#">{{$category->name}} <span>{{ $category->posts->count()}}</span></a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="sidebar-box ftco-animate">
                        <h3 class="heading mb-4">Recent Blog</h3>
                        @foreach($randomposts as $randompost)
                        <div class="block-21 mb-4 d-flex">
                            <a class="blog-img mr-4" style="background-image: url({{asset('Storage/upload/images/'.$randompost->image)}});"></a>
                            <div class="text">
                                <h3><a href="#">{{$randompost->title}}</a>
                                </h3>
                                <div class="meta">
                                    <div><a href="#"><span class="icon-calendar"></span> {{$randompost->created_at->diffForHumans()}}</a></div>
                                    <div><a href="#"><span class="icon-person"></span>  @if(Auth::guard('admin')->check())
                                            Admin
                                            @else(Auth::guard('web')->check())
                                                User</a>
                                    @endif</div>
                                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                                </div>
                            </div>
                        </div>
                            @endforeach
                    </div>
                    <div class="sidebar-box ftco-animate">
                        <h3 class="heading mb-4">Paragraph</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem
                            necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente
                            consectetur similique, inventore eos fugit cupiditate numquam!</p>
                    </div>
                </div>
            </div>
        </div>
    </section> <!-- .section -->
    <section class="ftco-subscribe ftco-section bg-light">
        <div class="overlay">
            <div class="container">
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
@push('js')
@endpush
