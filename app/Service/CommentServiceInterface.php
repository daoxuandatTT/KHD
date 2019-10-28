<?php


namespace App\Service;


interface CommentServiceInterface
{
    public function getAll();

    public function store($request,$postId);

    public function edit($id);

    public function update($request, $id);

    public function delete($id);
}
