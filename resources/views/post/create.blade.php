@extends('admin.home.masterdb')
@section('adminContent')

    <div class="col-10 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Create New Post</h4>

                <form class="forms-sample" method="post" action="{{route('post.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Name">
                    </div>
<<<<<<< HEAD
                    <div class="form-group">
                        @if($errors->has('name'))
                            <p class="alert-danger">{{$errors->first('name')}}</p>
                        @endif
                    </div>
=======


>>>>>>> 53a268adaf8ff68145724f4a7fe7123294005106
                    <div class="form-group">
                        <label for="exampleSelectGender">Mode</label>
                        <select class="form-control" name="mode">
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
<<<<<<< HEAD
                        @if($errors->has('image'))
                            <p class="alert-danger">{{$errors->first('image')}}</p>
                        @endif
                    </div>
                    <div class="form-group">
=======
>>>>>>> 53a268adaf8ff68145724f4a7fe7123294005106
                        <label for="exampleTextarea1">Material</label>
                        <textarea class="form-control" name="material" rows="4"></textarea>
                    </div>
                    <div class="form-group">
<<<<<<< HEAD
                        @if($errors->has('material'))
                            <p class="alert-danger">{{$errors->first('material')}}</p>
                        @endif
                    </div>
                    <div class="form-group">
=======
>>>>>>> 53a268adaf8ff68145724f4a7fe7123294005106
                        <label for="exampleTextarea1">Recipe</label>
                        <textarea class="form-control" name="recipe" rows="4"></textarea>
                    </div>
                    <div class="form-group">
<<<<<<< HEAD
                        @if($errors->has('recipe'))
                            <p class="alert-danger">{{$errors->first('recipe')}}</p>
                        @endif
                    </div>
                    <div class="form-group">
=======
>>>>>>> 53a268adaf8ff68145724f4a7fe7123294005106
                        <label for="exampleTextarea1">Description</label>
                        <textarea class="form-control" name="description" rows="4"></textarea>
                    </div>
                    <div class="form-group">
<<<<<<< HEAD
                        @if($errors->has('description'))
                            <p class="alert-danger">{{$errors->first('description')}}</p>
                        @endif
                    </div>
                    <div class="form-group">
=======
>>>>>>> 53a268adaf8ff68145724f4a7fe7123294005106
                        <label for="exampleSelectGender">Category</label>
                        <select class="form-control" name="category_id">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
<<<<<<< HEAD
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleTextarea1">User</label>
                        <input class="form-control" name="user_id">
                    </div>
                    <div class="form-group">
                        @if($errors->has('user_id'))
                            <p class="alert-danger">{{$errors->first('user_id')}}</p>
                        @endif
                    </div>
=======

                        </select>
                    </div>
>>>>>>> 53a268adaf8ff68145724f4a7fe7123294005106
                    <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                    <a href="{{route('post.list')}}">
                        <button class="btn btn-light" type="button">Cancel</button>
                    </a>
                </form>
            </div>
        </div>
    </div>
<<<<<<< HEAD
@endsection
=======

@endsection

>>>>>>> 53a268adaf8ff68145724f4a7fe7123294005106


