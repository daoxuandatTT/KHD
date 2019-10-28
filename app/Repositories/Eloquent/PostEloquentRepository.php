<?php


namespace App\Repositories\Eloquent;


use App\Post;
use App\Repositories\Contract\PostRepositoryInterface;

class PostEloquentRepository extends EloquentRepository implements PostRepositoryInterface
{

    public function getModel()
    {
        $model = Post::class;
        return $model;
    }

}
