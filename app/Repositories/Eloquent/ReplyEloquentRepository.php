<?php


namespace App\Repositories\Eloquent;



use App\Reply;
use App\Repositories\Contract\ReplyRepositoryInterface;


class ReplyEloquentRepository extends EloquentRepository implements ReplyRepositoryInterface
{

    public function getModel()
    {
        $model = Reply::class;
        return $model;
    }
}
