<?php


namespace App\Repositories\Contract;


interface RepositoryInterface
{
    public function getAll();

    public function save($obj);

    public function findById($id);

    public function delete($obj);

}
