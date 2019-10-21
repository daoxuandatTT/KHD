<?php


namespace App\Repositories\Eloquent;


use App\Repositories\Contract\UserRepositoryInterface;
use App\User;

class UserEloquentRepository extends EloquentRepository implements  UserRepositoryInterface
{

    public function getModel()
    {
        $model = User::class;
        return $model;
    }
}
