<?php


namespace App\Service;


interface CommentServiceInterface
{
    public function getAll();

    public function store($request,$id);

    public function edit($id);

    public function update($request, $id);

    public function delete($id);
}
