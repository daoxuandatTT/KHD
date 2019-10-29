@extends('master')
@push('css')

@endpush
@section('content')

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

                    <div class="pt-5 mt-5">
                        @if(count($post->comments)>0)
                        <h3 class="mb-4">{{count($post->comments)}} comment</h3>
                        @foreach($comments as $comment)
                            @if($comment->post_id===$post->id)
                                <ul class="comment-list">
                                    <li class="comment">
                                        <div class="vcard bio">
                                            <img src="{{ $comment->user->image }}">
                                        </div>
                                        <div class="comment-body comment-container">
                                            <h3>{{$comment->user->name}}</h3>
                                            <div class="meta">{{$comment->created_at}}</div>
                                            <p>{{$comment->content}}</p>
                                            <div style="margin-left:10px;">
                                                <a style="cursor: pointer;" cid="{{ $comment->id }}" name_a="{{ Auth::user()->name }}" token="{{ csrf_token() }}" class="reply">Reply</a>&nbsp;
                                                <a style="cursor: pointer;"  class="delete-comment" token="{{ csrf_token() }}" comment-did="{{ $comment->id }}" >Delete</a>
                                                <div class="reply-form">

                                                    <!-- Dynamic Reply form -->

                                                </div>
                                                @foreach($replies as $rep)
                                                    @if($comment->id === $rep->comment_id)
                                                        <div class="well">
                                                            <i><b> {{ $rep->user->name }} </b></i>&nbsp;&nbsp;
                                                            <span> {{ $rep->content }} </span>
                                                            <div style="margin-left:10px;">
                                                                <a rname="{{ Auth::user()->name }}" rid="{{ $comment->id }}" style="cursor: pointer;" class="reply-to-reply" token="{{ csrf_token() }}">Reply</a>&nbsp;<a did="{{ $rep->id }}" class="delete-reply" token="{{ csrf_token() }}" >Delete</a>
                                                            </div>
                                                            <div class="reply-to-reply-form">

                                                                <!-- Dynamic Reply form -->

                                                            </div>

                                                        </div>
                                                    @endif
                                                @endforeach

                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                @endif
                        @endforeach
                        @else
                            <div>Nothing comment at here.try again</div>
                        @endif
                        <div class="comment-form-wrap pt-5">
                            <h3 class="mb-5">Comment</h3>
                            @guest
                                <p>Please Login before comment this Post<a href="{{ route('login') }}">Login</a></p>
                            @else
                            <form method="post" action="{{route('comment.store',$post->id)}}" class="p-5 bg-light">
                                @csrf
                                <div class="form-group">
                                    <label for="message">Message</label>
                                    <textarea title="" id="message" cols="30" rows="10" class="form-control"
                                              name="content"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Post Comment" class="btn py-3 px-4 btn-primary">
                                </div>
                            </form>
                            @endguest
                        </div>
                    </div>
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
                                            @elseif(Auth::guard('web')->check())
                                            User
                                            @elseif(Auth::guard('client')->check())
                                            Client</a>
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
    <script >
        $(document).ready(function(){


            $(".comment-container").delegate(".reply","click",function(){

                var well = $(this).parent().parent();
                var cid = $(this).attr("cid");
                var name = $(this).attr('name_a');
                var token = $(this).attr('token');
                var form = '<form id="form-reply" method="post" action="/replies"><input type="hidden" name="_token" value="'+token+'"><input type="hidden" name="comment_id" value="'+ cid +'"><input type="hidden" name="name" value="'+name+'"><div class="form-group"><textarea class="form-control" name="content" placeholder="Enter your reply" > </textarea> </div> <div class="form-group"> <input class="btn btn-primary" type="submit"> </div></form>';
                var fromReply = document.getElementById('form-reply');
                if (!fromReply) {
                    well.find(".reply-form").append(form);
                } else {
                    well.find(".reply-form").children().remove();
                }




            });

            $(".comment-container").delegate(".delete-comment","click",function(){

                var cdid = $(this).attr("comment-did");
                var token = $(this).attr("token");
                var well = $(this).parent().parent();
                $.ajax({
                    url : "/comments/"+cdid,
                    method : "POST",
                    data : {_method : "delete", _token: token},
                    success:function(response){
                        if (response == 1 || response == 2) {
                            well.hide();
                        }else{
                            alert('Oh ! you can delete only your comment');
                            console.log(response);
                        }
                    }
                });

            });

            $(".comment-container").delegate(".reply-to-reply","click",function(){
                var well = $(this).parent().parent();
                var cid = $(this).attr("rid");
                var rname = $(this).attr("rname");
                var token = $(this).attr("token")
                var form = '<form method="post" action="/replies"><input type="hidden" name="_token" value="'+token+'"><input type="hidden" name="comment_id" value="'+ cid +'"><input type="hidden" name="name" value="'+rname+'"><div class="form-group"><textarea class="form-control" name="content" placeholder="Enter your reply" > </textarea> </div> <div class="form-group"> <input class="btn btn-primary" type="submit"> </div></form>';

                well.find(".reply-to-reply-form").append(form);

            });

            $(".comment-container").delegate(".delete-reply", "click", function(){

                var well = $(this).parent().parent();

                if (confirm("Are you sure you want to delete this..!")) {
                    var did = $(this).attr("did");
                    var token = $(this).attr("token");
                    $.ajax({
                        url : "/replies/"+did,
                        method : "POST",
                        data : {_method : "delete", _token: token},
                        success:function(response){
                            if (response == 1) {
                                well.hide();
                                //alert("Your reply is deleted");
                            }else if(response == 2){
                                alert('Oh! You can not delete other people comment');
                            }else{
                                alert('Something wrong in project setup');
                            }
                        }
                    })
                }



            });

        });

    </script>
@endpush
