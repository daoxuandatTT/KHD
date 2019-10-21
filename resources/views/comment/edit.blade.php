<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
    <div class="row justify-content-center">
        <form action="{{route('comment.update',$comment->id)}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="content">Content <span class="require"></span></label>
                <input type="text" class="form-control" name="content" value="{{$comment->content}}"/>
            </div>
            <div class="form-group">
                @if($errors->has('content'))
                    <p class="alert-danger">{{$errors->first('content')}}</p>
                @endif
            </div>
            <div class="form-group">
                <label for="user_id">User_id <span class="require"></span></label>
                <input type="text" class="form-control" name="user_id" value="{{$comment->user_id}}"/>
            </div>
            <div class="form-group">
                <label for="post_id">Post_id <span class="require"></span></label>
                <input type="text" class="form-control" name="post_id" value="{{$comment->post_id}}"/>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">
              Update
                </button>
                <button class="btn btn-default">
                    Cancel
                </button>
            </div>

        </form>
    </div>

</div>




