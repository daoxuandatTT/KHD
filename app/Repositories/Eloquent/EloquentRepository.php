<?php


namespace App\Repositories\Eloquent;


use App\Repositories\Contract\RepositoryInterface;

abstract class EloquentRepository implements RepositoryInterface
{
    protected $model;

    public function __construct()
    {
        $this->setModel();
    }

    abstract public function getModel();

    public function setModel()
    {
        $this->model = app()->make($this->getModel());
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function save($obj)
    {
        $obj->save();
    }

    public function findById($id)
    {
        return $this->model->findOrFail($id);
    }

    public function delete($obj)
    {
        $obj->delete();
    }
}
