<?php


namespace App\Service;


interface UserServiceInterface extends ServiceInterface
{
    public function changePassword($request,$id);
}
