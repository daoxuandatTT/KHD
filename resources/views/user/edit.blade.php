@extends('admin.home.masterdb')
@section('adminContent')

    <div class="col-10 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
<<<<<<< HEAD
                <h4 class="card-title">Update User</h4>
=======
                <h4 class="card-title">Create New User</h4>
>>>>>>> 53a268adaf8ff68145724f4a7fe7123294005106

                <form class="forms-sample" method="post" action="{{route('user.update',$user->id)}}"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Name" value="{{$user->name}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Email address</label>
                        <input type="email" class="form-control" name="email" placeholder="Email"
                               value="{{$user->email}}">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword4">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password"
                               value="{{$user->password}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleSelectGender">Gender</label><br>
                        <label for="exampleSelectGender">Male</label>
<<<<<<< HEAD
                        <input
                            @if ($user->gender == 'Male')
                                {{'checked'}}
                            @endif
                            type="radio" value="Male" name="gender">
                        <label for="exampleSelectGender">Female</label>
                        <input
                            @if ($user->gender == 'Female')
                            {{'checked'}}
                            @endif
                            type="radio" value="Female" name="gender">
=======
                        <input type="radio" value="Male" name="gender">
                        <label for="exampleSelectGender">Female</label>
                        <input type="radio" value="Female" name="gender">
>>>>>>> 53a268adaf8ff68145724f4a7fe7123294005106
                    </div>
                    <div class="form-group">
                        <label>Upload image</label>
                        <input type="file"
                               onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])"
                               class="form-control-file"
<<<<<<< HEAD
                               name="image"><br>
=======
                               name="image"
                        ><br>
>>>>>>> 53a268adaf8ff68145724f4a7fe7123294005106
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
                        <label for="exampleInputCity1">Address</label>
                        <input type="text" class="form-control" name="address" placeholder="Location"
                               value="{{$user->address}}">
                    </div>
=======
                        <label for="exampleInputCity1">Address</label>
                        <input type="text" class="form-control" name="address" placeholder="Location"
                               value="{{$user->address}}">
                    </div>
>>>>>>> 53a268adaf8ff68145724f4a7fe7123294005106
                    <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                    <a href="{{route('user.list')}}">
                        <button class="btn btn-light" type="button">Cancel</button>
                    </a>
                </form>
            </div>
        </div>
    </div>

@endsection


