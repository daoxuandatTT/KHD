@extends('master')
@push('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="{{asset('ViewAdmin/assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    {{--    <link rel="stylesheet" href="{{asset('ViewAdmin/assets/vendors/mdi/css/vendor.bundle.base.css')}}">--}}
    <style type="text/css">
        #form1 {
            padding: 15px;
            background: #fff;
            display: none;
        }
        #formButton {
            display: block;
            margin-right: auto;
            margin-left: auto;
        }
        .modal-body{
            max-height: calc(100vh - 200px);
            overflow-y: auto;
        }
    </style>
@endpush
@section('content')
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true" style="overflow: scroll">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Create New Post</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times</span>
                    </button>
                </div>
                <div class="modal-body mx-3">
                    <form id="form2" class="forms-sample" method="POST"
                          action="{{ route('post.store',Auth::user()->id) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputName1">Title</label>
                            <input type="text" name="title" class="form-control" id="exampleInputName1"
                                   placeholder="enter title...">
                            <div class="error-message">
                                @if($errors->has('title'))
                                    <p class="alert-danger">{{$errors->first('title')}}</p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group" >
                            <label for="exampleInputEmail3">Category</label>
                            <select name="category_id" id="" class="show-tick selectpicker">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{$category->name}}</option>
                                @endforeach
                            </select>
                            <label for="exampleInputEmail3">Select Tag</label>
                            <select style="float: right" name="tags[]" id="tag" class="show-tick selectpicker" data-live-search="false" multiple>
                                @foreach($tags as $tag)
                                    <option value="{{ $tag->id }}">{{$tag->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">

                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword4">Descriptions</label>
                            <textarea class="ckeditor" id="description" cols="98" rows="5" name="description"></textarea>
                            <div class="error-message">
                                @if($errors->has('description'))
                                    <p class="alert-danger">{{$errors->first('description')}}</p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleSelectGender">Cong khai</label>
                            <input type="radio" value="public" name="mode"/>
                            <label for="exampleSelectGender">Chi minh toi</label>
                            <input type="radio" value="private" name="mode"/>
                            <div class="error-message">
                                @if($errors->has('mode'))
                                    <p class="alert-danger">{{$errors->first('mode')}}</p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="file"
                                   onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])"
                                   class="form-control-file"
                                   name="image"
                            ><br>
                            <img id="image" src=""
                                 style="height: 70px"/>
                            <div class="error-message">
                                @if($errors->has('image'))
                                    <p class="alert-danger">{{$errors->first('image')}}</p>
                                @endif
                            </div>
                        </div>
{{--                        <div class="form-group">--}}
{{--                            <label>Upload video</label>--}}
{{--                            <input type="file"--}}
{{--                                   onchange="document.getElementById('video').src = window.URL.createObjectURL(this.files[0])"--}}
{{--                                   class="form-control-file"--}}
{{--                                   name="video"--}}
{{--                            ><br>--}}
{{--                            <video id="video" width="320" height="240" controls>--}}
{{--                                <source src="" type="video/mp4">--}}
{{--                                Your browser does not support the video tag.--}}
{{--                            </video>--}}
{{--                        </div>--}}
                        <div class="form-group">
                            Video :<input  class="form-control-file" type="text" name="link">
                            <div class="error-message">
                                @if($errors->has('link'))
                                    <p class="alert-danger">{{$errors->first('link')}}</p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword4">Material</label>
                            <textarea class="ckeditor" id="material" cols="98" rows="5" name="material"></textarea>
                            <div class="error-message">
                                @if($errors->has('material'))
                                    <p class="alert-danger">{{$errors->first('material')}}</p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword4">Recipe</label>
                            <textarea class="ckeditor" id="recipe" cols="98" rows="5" name="recipe"></textarea>
                            <div class="error-message">
                                @if($errors->has('recipe'))
                                    <p class="alert-danger">{{$errors->first('recipe')}}</p>
                                @endif
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <a href="{{route('page.myPost')}}">
                            <button type="" class="btn btn-light">Cancel</button>
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @if(count($posts)==0)
        <div class="text-center">
            <p class="btn btn-danger">Không có bài viết nào</p>
        </div>
        <div class="col-lg-3">
            <div class="sidebar-wrap">
                <div class="sidebar-box p-4 about text-center ftco-animate">
                    <h2 class="heading mb-4">About Me</h2>
                    <img class="img-profile img-circle img-responsive center-block" src="{{asset('storage/upload/images/'.$user->image) }}" alt="">

                    <div class="text pt-4">
                        <p>Hi! My name is <strong>Cathy Deon</strong>, behind the word mountains, far from the countries
                            Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove
                            right at the coast of the Semantics, a large language ocean.
                        </p>
                    </div>
                </div>
                <div class="sidebar-box p-4 ftco-animate text-center">
                    <a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal"
                       data-target="#modalRegisterForm">
                        <button id="formButton" type="button" class="btn btn-primary btn-lg" data-toggle="modal"
                                data-target="#ModalLoginForm">
                            <i class="icon icon-add">New Post</i></button>
                    </a>
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
                            <a href="#" class="img d-flex align-items-center justify-content-center text-center">
                                <div class="text">
                                    <h3>Foods</h3>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="img d-flex align-items-center justify-content-center text-center">
                                    <div class="text">
                                    <h3>Lifestyle</h3>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="img d-flex align-items-center justify-content-center text-center">
                                <div class="text">
                                    <h3>Others</h3>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        {{--         modal form when no post in database of user --}}
    @else
        <section class="ftco-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="row">
                            @foreach($posts as $post)
                                <div class="col-md-4 ftco-animate">
                                    <div class="blog-entry">
                                        <a href="{{'page.showDetail',$post->id}}" class="img-2"><img style="width:200px; height: 250px"
                                                                                 src="{{asset('storage/upload/images/'.$post->image) }}"
                                                                                 class="img-fluid"
                                                                                 alt="Colorlib Template"></a>
                                        <div class="text pt-3">
                                            <p class="meta d-flex"><span class="pr-3">Dessert</span><span
                                                    class="ml-auto pl-3">{{ $post->created_at }}</span></p>
                                            <h3><a href="{{'page.showDetail',$post->id}}">{{$post->title}}</a></h3>
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
                                {{$posts->links()}}
                        </div>
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class=" ftco-animate">
                                    <h3 class="heading mb-4">Recent Blog</h3>
                                    <div class="block-21 mb-4 d-flex">
                                        <a class="blog-img mr-4"></a>
                                        <div class="text">
                                            <h3><a href="#">Even the all-powerful Pointing has no control about the blind
                                                    texts</a>
                                            </h3>
                                            <div class="meta">
                                                <div><a href="#"><span class="icon-calendar"></span> February 12, 2019</a>
                                                </div>
                                                <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                                                <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="block-21 mb-4 d-flex">
                                        <a class="blog-img mr-4"></a>
                                        <div class="text">
                                            <h3><a href="#">Even the all-powerful Pointing has no control about the blind
                                                    texts</a>
                                            </h3>
                                            <div class="meta">
                                                <div><a href="#"><span class="icon-calendar"></span> February 12, 2019</a>
                                                </div>
                                                <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                                                <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="block-21 mb-4 d-flex">
                                        <a class="blog-img mr-4"></a>
                                        <div class="text">
                                            <h3><a href="#">Even the all-powerful Pointing has no control about the blind
                                                    texts</a>
                                            </h3>
                                            <div class="meta">
                                                <div><a href="#"><span class="icon-calendar"></span> February 12, 2019</a>
                                                </div>
                                                <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                                                <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{--Tag CLoud--}}
                                <div class=" ftco-animate">
                                    <h3 class="heading mb-4">Tag Cloud</h3>
                                    <div class="tagcloud">
                                        @foreach($tags  as $tag)
                                            <a href="{{route('tag.posts',$tag->id)}}">{{$tag->name}}</a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-3">
                        <div class="sidebar-wrap">
                            <div class="sidebar-box p-4 about text-center ftco-animate">
                                <h2 class="heading mb-4">About Me</h2>
                                <img class="img-profile img-circle img-responsive center-block" src="{{asset('/storage/upload/images/'.$user->image) }}" alt="">

                                <div class="text pt-4">
                                    <p>Hi! My name is <strong>{{Auth::user()->name}}</strong>, behind the word mountains, far from
                                        the countries Vokalia and Consonantia, there live the blind texts. Separated
                                        they live in Bookmarksgrove right at the coast of the Semantics, a large
                                        language ocean.
                                    </p>
                                </div>
                            </div>
                            <div class="sidebar-box p-4 ftco-animate text-center">
                                {{--                           <button><a class="icon icon-add" href="#">New Post</a></button>--}}
                                <a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal"
                                   data-target="#modalRegisterForm">
                                    <button id="formButton" type="button" class="buttonModal btn btn-primary btn-lg"
                                            data-toggle="modal" data-target="#ModalLoginForm">
                                        <i class="icon icon-add">New Post</i></button>
                                </a>

                            </div>

                            {{--                        form--}}

                            <div class="sidebar-box p-4 ftco-animate">
                                <form action="{{route('post.search')}}" method="post" class="search-form">
                                    @csrf
                                    <div class="form-group">
                                        <span class="icon icon-search"></span>
                                        <input type="text" class="form-control" placeholder="Search" name="search">
                                    </div>
                                </form>
                            </div>
                            {{--paragraph--}}
                            <div class="sidebar-box ftco-animate">
                                <h3 class="heading mb-4">Paragraph</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem
                                    necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa
                                    sapiente consectetur similique, inventore eos fugit cupiditate numquam!
                                </p>
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
                            <p>A small river named Duden flows by their place and supplies it with the necessary
                                regelialia. It is a paradisematic country, in which roasted parts of sentences fly into
                                your mouth.
                            </p>
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
        <div class="modal fade" id="modalRegisterForm1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold">Update Post</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body mx-3">
                        <form id="form2" class="forms-sample" method="POST"
                              action="{{ route('post.update',$post->id) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputName1">Title</label>
                                <input type="text" name="title" class="form-control" id="exampleInputName1"
                                       value="{{ $post->title }}">
                                <div class="error-message">
                                    @if($errors->has('title'))
                                        <p class="alert-danger">{{$errors->first('title')}}</p>
                                    @endif
                                </div>
                              <div class="error-message">
                                  @if($errors->has('title'))
                                      <p class="alert-danger">{{$errors->first('title')}}</p>
                                  @endif
                              </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail3">Category</label>
                                <select name="category_id" id="">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword4">Descriptions</label>
                                <textarea class="ckeditor" id="updateDescription" cols="98" rows="5"
                                          name="description">{{$post->description}}</textarea>
                                <div class="error-message">
                                    @if($errors->has('description'))
                                        <p class="alert-danger">{{$errors->first('description')}}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleSelectGender"> Mode: </label>
                                <label for="exampleSelectGender"> public </label>
                                <input
                                    @if($post->mode == 'public')
                                    {{'checked'}}
                                    @endif
                                    type="radio" value="public" name="mode"/>
                                <label for="exampleSelectGender">private</label>
                                <input
                                    @if($post->mode == 'private')
                                    {{'checked'}}
                                    @endif
                                    type="radio" value="private" name="mode"/>
                                <div class="error-message">
                                    @if($errors->has('mode'))
                                        <p class="alert-danger">{{$errors->first('mode')}}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Upload image</label>
                                <input type="file"
                                       onchange="document.getElementById('image1').src = window.URL.createObjectURL(this.files[0])"
                                       class="form-control-file"
                                       name="image"
                                ><br>
                                <img id="image1" src="{{asset('storage/upload/images/'.$post->image) }}"
                                     style="height: 70px"/>
                                <div class="error-message">
                                    @if($errors->has('image'))
                                        <p class="alert-danger">{{$errors->first('image')}}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword4">Material</label>
                                <textarea class="ckeditor" id="updateMaterial" cols="98" rows="5"
                                          name="material">{{$post->material}}</textarea>
                                <div class="error-message">
                                    @if($errors->has('material'))
                                        <p class="alert- danger">{{$errors->first('material')}}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword4">Recipe</label>
                                <textarea class="ckeditor" id="updateRecipe" cols="98" rows="5"
                                          name="recipe">{{$post->recipe}}</textarea>
                                <div class="error-message">
                                    @if($errors->has('recipe'))
                                        <p class="alert-danger">{{$errors->first('recipe')}}</p>
                                    @endif
                                </div>
                            </div>
                            <a href="{{route('page.myPost',Auth::user()->id)}}">
                                <button  type="button" class="btn btn-light">Cancel</button>
                            </a>
                            <button type="submit" class="btn btn-gradient-primary mr-2">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif

@endsection
@push('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
    <script>
        CKEDITOR.replace('description', {
            filebrowserBrowseUrl: '{{ asset('ckfinder/ckfinder.html') }}',
            filebrowserImageBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Images') }}',
            filebrowserFlashBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Flash') }}',
            filebrowserUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
            filebrowserImageUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
            filebrowserFlashUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
        });
    </script>
    <script>
        CKEDITOR.replace('material', {
            filebrowserBrowseUrl: '{{ asset('ckfinder/ckfinder.html') }}',
            filebrowserImageBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Images') }}',
            filebrowserFlashBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Flash') }}',
            filebrowserUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
            filebrowserImageUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
            filebrowserFlashUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
        });
    </script>
    <script>
        CKEDITOR.replace('recipe', {
            filebrowserBrowseUrl: '{{ asset('ckfinder/ckfinder.html') }}',
            filebrowserImageBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Images') }}',
            filebrowserFlashBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Flash') }}',
            filebrowserUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
            filebrowserImageUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
            filebrowserFlashUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
        });
    </script>
    <script>
        CKEDITOR.replace('updateDescription', {
            filebrowserBrowseUrl: '{{ asset('ckfinder/ckfinder.html') }}',
            filebrowserImageBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Images') }}',
            filebrowserFlashBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Flash') }}',
            filebrowserUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
            filebrowserImageUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
            filebrowserFlashUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
        });
    </script>
    <script>
        CKEDITOR.replace('updateMaterial', {
            filebrowserBrowseUrl: '{{ asset('ckfinder/ckfinder.html') }}',
            filebrowserImageBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Images') }}',
            filebrowserFlashBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Flash') }}',
            filebrowserUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
            filebrowserImageUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
            filebrowserFlashUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
        });
    </script>
    <script>
        CKEDITOR.replace('updateRecipe', {
            filebrowserBrowseUrl: '{{ asset('ckfinder/ckfinder.html') }}',
            filebrowserImageBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Images') }}',
            filebrowserFlashBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Flash') }}',
            filebrowserUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
            filebrowserImageUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
            filebrowserFlashUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
        });
    </script>
    <script src="{{asset('ckeditor/ckeditor.js')}}"></script>

    <script>
        $(document).ready(function () {
            $("#formButton").click(function () {
                $("#form1").toggle();
            });
        });
    </script>

@endpush

