@extends('admin.home.masterdb')
@section('adminContent')

    <div class="col-10 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Create New Tag</h4>

                <form class="forms-sample" method="post" action="{{route('tag.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Name">
                    </div>
                    <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                    <a href="{{route('tag.index')}}">
                        <button class="btn btn-light" type="button">Cancel</button>
                    </a>
                </form>
            </div>
        </div>
    </div>

@endsection


