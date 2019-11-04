@extends('admin.home.masterdb')
@section('adminContent')

    <div class="col-10 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Create New User</h4>
                <form class="forms-sample" method="post" action="{{route('user.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Email address</label>
                        <input type="email" class="form-control" name="email" placeholder="Email">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword4">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="exampleSelectGender">Gender</label><br>
                        <label for="exampleSelectGender">Male</label>
                        <input type="radio" value="Male" name="gender">
                        <label for="exampleSelectGender">Female</label>
                        <input type="radio" value="Female" name="gender">
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
                        <label for="exampleInputCity1">Address</label>
                        <input type="text" class="form-control" name="address" placeholder="Location">
                    </div>

                    <div class="form-group">
                        <label for="exampleSelectGender">Gender</label><br>
                        <label for="exampleSelectGender">Male</label>
                        <input type="radio" value="Male" name="gender">
                        <label for="exampleSelectGender">Female</label>
                        <input type="radio" value="Female" name="gender">
                    </div>
                    <div class="form-group">
                        @if($errors->has('gender'))
                            <p class="alert-danger">{{$errors->first('gender')}}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Upload image</label>
                        <input type="file"
                               onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])"
                               class="form-control-file"
                               name="image"><br>
                        <img id="image" src=""
                             style="height: 70px"/>
                    </div>
                    <div class="form-group">
                        @if($errors->has('image'))
                            <p class="alert-danger">{{$errors->first('image')}}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputCity1">Address</label>
                        <input type="text" class="form-control" name="address" placeholder="Location">
                    </div>
                    <div class="form-group">
                        @if($errors->has('address'))
                            <p class="alert-danger">{{$errors->first('address')}}</p>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                    <a href="{{route('user.list')}}">
                        <button class="btn btn-light" type="button">Cancel</button>
                    </a>
                </form>
            </div>
        </div>
    </div>

@endsection


