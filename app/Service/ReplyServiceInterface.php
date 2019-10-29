<?php


namespace App\Service;


interface ReplyServiceInterface
{
    public function getAll();

    public function store($request,$id);

    public function edit($id);

    public function update($request, $id);

    public function delete($id);
}
