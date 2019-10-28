<?php


namespace App\Repositories\Eloquent;


use App\Comment;
use App\Repositories\Contract\CommentRepositoryInterface;

class CommentEloquentRepository extends EloquentRepository implements CommentRepositoryInterface
{

    public function getModel()
    {
        $model = Comment::class;
        return $model;
    }
}
