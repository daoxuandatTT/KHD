<?php


namespace App\Repositories\Eloquent;


use App\Category;
use App\Repositories\Contract\CategoryRepositoryInterface;

class CategoryEloquentRepository extends EloquentRepository implements CategoryRepositoryInterface
{

    public function getModel()
    {
        $model = Category::class;
        return $model;
    }
}
