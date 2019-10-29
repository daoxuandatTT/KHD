<?php


namespace App\Repositories\Eloquent;


use App\Comment;
use App\Repositories\Contract\CommentRepositoryInterface;

class ReplyEloquentRepository extends EloquentRepository implements RreplyRepositoryInterface
{

    public function getModel()
    {
        $model = Comment::class;
        return $model;
    }
}
