@extends('admin.home.masterdb')
@section('adminContent')
    <div class="col-10 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Create New Post</h4>
                <form class="forms-sample" method="post" action="{{route('post.update',$post->id)}}"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Name" value="{{$post->name}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleSelectGender">Mode</label>
                        <select class="form-control" name="mode" >
                            <option>Public</option>
                            <option>Private</option>
                        </select>
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
                        <label for="exampleTextarea1">Material</label>
                        <textarea class="form-control" name="material" rows="4">{{$post->material}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleTextarea1">Recipe</label>
                        <textarea class="form-control" name="recipe" rows="4">{{$post->recipe}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleTextarea1">Description</label>
                        <textarea class="form-control" name="description" rows="4">{{$post->description}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleSelectGender">Category</label>
                        <select class="form-control" name="category_id">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                    <a href="{{route('post.list')}}">
                        <button class="btn btn-light" type="button">Cancel</button>
                    </a>
                </form>
            </div>
        </div>
    </div>

@endsection




