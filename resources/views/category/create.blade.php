<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
    <div class="row justify-content-center">
        <form action="{{route('category.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name <span class="require"></span></label>
                <input type="text" class="form-control" name="name"/>
            </div>
            <div class="form-group">
                @if($errors->has('name'))
                    <p class="alert-danger">{{$errors->first('name')}}</p>
                @endif
            </div>
            <div class="form-group">
                <label for="image">Image <span class="require"></span></label>
                <input type="text" class="form-control" name="image"/>
            </div>


            <div class="form-group">
                <button type="submit" class="btn btn-primary">
                    Create
                </button>
                <button class="btn btn-default">
                    Cancel
                </button>
            </div>

        </form>
    </div>

</div>


