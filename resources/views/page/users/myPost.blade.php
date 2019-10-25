@extends('master')
@push('css')
    <link rel="stylesheet" href="{{asset('ViewAdmin/assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('ViewAdmin/assets/vendors/mdi/css/vendor.bundle.base.css')}}">
    <style type="text/css">
        #form1{
            padding: 15px;
            background: #fff;
            display: none;
        }

        #formButton {
            display: block;
            margin-right: auto;
            margin-left: auto;
        }
    </style>

@endpush
@section('content')
    @if(count($posts)==0)
        <div class="text-center">
            <p class="btn btn-danger">Khong co bai viet nao</p>
        </div>
        <div class="col-lg-3">
            <div class="sidebar-wrap">
                <div class="sidebar-box p-4 about text-center ftco-animate">
                    <h2 class="heading mb-4">About Me</h2>
                    <img src="images/author.jpg" class="img-fluid" alt="Colorlib Template">
                    <div class="text pt-4">
                        <p>Hi! My name is <strong>Cathy Deon</strong>, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                    </div>
                </div>
                <div class="sidebar-box p-4 ftco-animate text-center">
                    {{--                           <button><a class="icon icon-add" href="#">New Post</a></button>--}}
                    <a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#modalRegisterForm">
                        <button id="formButton" type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#ModalLoginForm">
                            <i class="icon icon-add">New Post</i>  </button>
                    </a>

                </div>

                {{--                        form--}}

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
                        <li>
                            <a href="#" class="img d-flex align-items-center justify-content-center text-center" style="background-image: url(images/category-2.jpg);">
                                <div class="text">
                                    <h3>Lifestyle</h3>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="img d-flex align-items-center justify-content-center text-center" style="background-image: url(images/category-2.jpg);">
                                <div class="text">
                                    <h3>Others</h3>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold">Create New Post</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body mx-3">
                        <form id="form2" class="forms-sample" method="POST" action="{{ route('post.store',Auth::user()->id) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputName1">Title</label>
                                <input type="text" name="title" class="form-control" id="exampleInputName1" placeholder="enter title...">
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
                                <textarea class="ckeditor" id="id" cols="98" rows="5" name="description"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="exampleSelectGender"> Mode: </label>
                                <label for="exampleSelectGender"> public </label>
                                <input type="radio" value="public" name="mode"/>
                                <label for="exampleSelectGender">private</label>
                                <input type="radio" value="private" name="mode"/>
                            </div>
                            <div class="form-group">
                                <label>Upload image</label>
                                <input type="file"
                                       onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])"
                                       class="form-control-file"
                                       name="image"
                                ><br>
                                <img id="image" src=""
                                     style="height: 70px"/>
                            </div>
                            <div class="form-group">
                                <label>Upload video</label>
                                <input type="file"
                                       onchange="document.getElementById('video').src = window.URL.createObjectURL(this.files[0])"
                                       class="form-control-file"
                                       name="video"
                                ><br>
                                <video id="video" width="320" height="240" controls>
                                    <source src="" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            </div>
                            <div class="form-group">
                                Video :<input type="text" name="link">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword4">Material</label>
                                <textarea class="ckeditor" id="id" cols="98" rows="5" name="material"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleSelectGender">bac</label>
                                <input type="checkbox" value="bac" name="region"/>
                                <label for="exampleSelectGender">trung</label>
                                <input type="checkbox" value="trung" name="region"/>
                                <label for="exampleSelectGender"> nam </label>
                                <input type="checkbox" value="nam" name="region"/>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword4">Recipe</label>
                                <textarea class="ckeditor" id="id" cols="98" rows="5" name="recipe"></textarea>
                            </div>

                            <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                            <button class="btn btn-light">Cancel</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>


    @else
    <section class="hero-wrap hero-wrap-2" style="background-image: url('{{asset('data/images/bg_4.jpg')}}');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate pb-5 text-center">
                    <h1 class="mb-3 bread"> {{ Auth::user()->name }}'s BLOG</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Foods <i class="ion-ios-arrow-forward"></i></span></p>
                </div>
            </div>
        </div>
    </section>


    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="row">

                        @foreach($posts as $post)
                        <div class="col-md-4 ftco-animate">
                            <div class="blog-entry">
                                <a href="single.html" class="img-2"><img style="width:200px; height: 250px" src="{{asset('storage/upload/images/'.$post->image) }}"  class="img-fluid" alt="Colorlib Template"></a>
                                <div class="text pt-3">
                                    <p class="meta d-flex"><span class="pr-3">Dessert</span><span class="ml-auto pl-3">March 01, 2018</span></p>
                                    <h3><a href="data/single.html">{{$post->title}}</a></h3>
{{--                                    <a href=""><i class="fa fa-edit">delete</i></a>--}}
{{--                                    <a href=""><i class="fa fa-edit">update</i></a>--}}
                                    <a href="{{route('post.delete',$post->id)}}" class="btn btn-default btn-rounded mb-4">
                                        <i class="icon icon-delete">
                                            <button type="button" onclick="return confirm('delete')">Delete</button>
                                        </i>
                                    </a>
                                    <a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#modalRegisterForm1">
                                        <i class="icon icon-add"><button type="button">Update</button></i>
                                    </a>
                                    <p class="mb-0"><a href="{{ route('page.showDetail',$post->id) }}" class="btn btn-black py-2">Read More <span class="icon-arrow_forward ml-4"></span></a></p>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                    <div class="row mt-5">
                        <div class="col text-center">
                            <div class="block-27">
                                <ul>
                                    <li><a href="#">&lt;</a></li>
                                    <li class="active"><span>1</span></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                    <li><a href="#">&gt;</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
{{--                    <button type="button" id="formButton">Toggle Form!</button>--}}

                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                        </div>
                    </div>

                </div>



                <div class="col-lg-3">
                    <div class="sidebar-wrap">
                        <div class="sidebar-box p-4 about text-center ftco-animate">
                            <h2 class="heading mb-4">About Me</h2>
                            <img src="images/author.jpg" class="img-fluid" alt="Colorlib Template">
                            <div class="text pt-4">
                                <p>Hi! My name is <strong>Cathy Deon</strong>, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                            </div>
                        </div>
                        <div class="sidebar-box p-4 ftco-animate text-center">
{{--                           <button><a class="icon icon-add" href="#">New Post</a></button>--}}
                                <a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#modalRegisterForm">
                                    <button id="formButton" type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#ModalLoginForm">
                                        <i class="icon icon-add">New Post</i>  </button>
                                </a>

                        </div>

{{--                        form--}}

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
                                <li>
                                    <a href="#" class="img d-flex align-items-center justify-content-center text-center" style="background-image: url(images/category-2.jpg);">
                                        <div class="text">
                                            <h3>Lifestyle</h3>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="img d-flex align-items-center justify-content-center text-center" style="background-image: url(images/category-2.jpg);">
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


{{--    modal create --}}
    <div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Create New Post</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="endorsement-form-container" class="container">
                    <form id="form2" class="form-horizontal" role="" method="POST" action="{{ route('post.store',Auth::user()->id) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputName1">Title</label>
                            <input type="text" name="title" class="form-control" id="exampleInputName1" placeholder="enter title...">
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
                            <label for="exampleSelectGender"> Mode: </label>
                            <label for="exampleSelectGender"> public </label>
                            <input type="radio" value="public" name="mode"/>
                            <label for="exampleSelectGender">private</label>
                            <input type="radio" value="private" name="mode"/>
                        </div>
                        <div class="form-">
                            <label for="exampleInputPassword4">Descriptions</label>
                            <textarea class="ckeditor" id="id" cols="98" rows="5" name="description"></textarea>
                        </div>

                        <div class="form-">
                            <label>Upload image</label>
                            <input type="file"
                                   onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])"
                                   class="form-control-file"
                                   name="image"
                            ><br>
                            <img id="image" src=""
                                 style="height: 70px"/>
                        </div>
                        <div class="form-group">
                            <label>Upload video</label>
                            <input type="file"
                                   onchange="document.getElementById('video').src = window.URL.createObjectURL(this.files[0])"
                                   class="form-control-file"
                                   name="video"
                            ><br>
                            <video id="video" width="320" height="240" controls>
                                <source src="" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                        OR
                        <div class="form-group">
                           Video :<input type="text" name="link">
                        </div>

{{--                            <video id="video" width="320" height="240" controls>--}}
{{--                                <source src="" type="video/mp4">--}}
{{--                                Your browser does not support the video tag.--}}
{{--                            </video>--}}
                        <div class="form-group">
                            <label for="exampleInputPassword4">Material</label>
                            <textarea class="ckeditor" id="id" cols="98" rows="5" name="material"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Region</label><br>
                            <label for="exampleSelectGender">Mien Bac</label>
                            <input type="checkbox" value="Mien Bac" name="region"/>
                            <label for="exampleSelectGender">Mien Trung</label>
                            <input type="checkbox" value="Mien Trung" name="region"/>
                            <label for="exampleSelectGender">Mien Nam</label>
                            <input type="checkbox" value="Mien Nam" name="region"/>
                        </div>
                        <div class=" form-group">
                            <label for="exampleInputPassword4">Recipe</label>
                            <textarea class="ckeditor" id="id" cols="98" rows="5" name="recipe"></textarea>
                        </div>

                        <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                        <button class="btn btn-light">Cancel</button>
                    </form>
                    </div>

                </div>
            </div>
        </div>
    </div>


{{--    endmodal--}}


{{--    modal form update--}}
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
                    <form id="form2" class="forms-sample" method="POST" action="{{ route('post.update',$post->id) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputName1">Title</label>
                            <input type="text" name="title" class="form-control" id="exampleInputName1" value="{{ $post->title }}" >
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
                            <textarea class="ckeditor" id="id" cols="98" rows="5" name="description">{{$post->description}}</textarea>
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
                        </div>
                        <div class="form-group">
                            <label>Upload image</label>
                            <input type="file"
                                   onchange="document.getElementById('image1').src = window.URL.createObjectURL(this.files[0])"
                                   class="form-control-file"
                                   name="image"
                            ><br>
                            <img id="image1" src="{{asset('storage/upload/images/'.$post->image) }}"
                                 style="height: 70px" />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword4">Material</label>
                            <textarea class="ckeditor" id="id" cols="98" rows="5" name="material">{{$post->material}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleSelectGender">bac</label>
                            <input type="checkbox" value="bac" name="region"/>
                            <label for="exampleSelectGender">trung</label>
                            <input type="checkbox" value="trung" name="region"/>
                            <label for="exampleSelectGender"> nam </label>
                            <input type="checkbox" value="nam" name="region"/>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword4">Recipe</label>
                            <textarea class="ckeditor" id="id" cols="98" rows="5" name="recipe">{{$post->recipe}}</textarea>
                        </div>
                        <a href="">
                            <button class="btn btn-light">Cancel</button>
                        </a>
                        <button type="submit" class="btn btn-gradient-primary mr-2">Update</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endif
    {{--    end modal--}}
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace( 'id', {
            filebrowserBrowseUrl: '{{ asset('ckfinder/ckfinder.html') }}',
            filebrowserImageBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Images') }}',
            filebrowserFlashBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Flash') }}',
            filebrowserUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
            filebrowserImageUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
            filebrowserFlashUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
        } );
    </script>
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            $("#formButton").click(function() {
                $("#form1").toggle();
            });
        });
    </script>
    @endpush

