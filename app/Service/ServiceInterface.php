<?php


namespace App\Service;


interface ServiceInterface
{
    public function getAll();

    public function store($request);

    public function edit($id);

    public function update($request, $id);

    public function delete($id);

}
