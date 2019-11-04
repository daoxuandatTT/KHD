@extends('admin.home.masterdb')
@section('adminContent')

    <div class="container">
        @if(Session::has('message'))
            <p class="alert-success">{{Session::get('message')}}</p>
        @endif
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-4">
                    </div>
                    <div class="col-sm-4">
                        <h2 class="text-center">Tag List</h2>
                    </div>
                    <div class="col-sm-4">
                        <div class="search-box">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="material-icons">&#xE8B6;</i></span>
                                <input type="text" class="form-control" placeholder="Search&hellip;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Stt</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>

            @foreach($tags as $key=> $tag)
                <tr>
                    <td>{{++$key}}</td>
                    <td>{{$tag->name}}</td>
                    <td>
                        <a href="#" class="view" title="View" data-toggle="tooltip"><i
                                class="material-icons">&#xE417;</i></a>
                        <a href="{{route('tag.edit',$tag->id)}}" class="edit" title="Edit"
                           data-toggle="tooltip"><i
                                class="material-icons">&#xE254;</i></a>
                        <a href="{{route('tag.delete',$tag->id)}}" class="delete" title="Delete"
                           data-toggle="tooltip" onclick="return confirm('Delete tag')"><i class="material-icons">&#xE872;</i></a>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
        <div class="clearfix">
            <a href="{{route('tag.create')}}">Create</a>
            <ul class="pagination">
                <li class="page-item disabled"><a href="#">Previous</a></li>
                <li class="page-item"><a href="#" class="page-link">1</a></li>
                <li class="page-item"><a href="#" class="page-link">2</a></li>
                <li class="page-item active"><a href="#" class="page-link">3</a></li>
                <li class="page-item"><a href="#" class="page-link">4</a></li>
                <li class="page-item"><a href="#" class="page-link">5</a></li>
                <li class="page-item"><a href="#" class="page-link">Next</a></li>
            </ul>
        </div>
    </div>

@endsection
