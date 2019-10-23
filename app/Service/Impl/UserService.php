<?php


namespace App\Service\Impl;


use App\Repositories\Contract\UserRepositoryInterface;
use App\Service\UserServiceInterface;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserService implements UserServiceInterface
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getAll()
    {
        return $this->userRepository->getAll();
    }

    public function store($request)
    {
        $user = new User();
        $user->name = $request->name;
        $imageFile = $request->file('image');
        $user->email = $request->email;
        $user->image = $imageFile->getClientOriginalName();
        $imageFile->storeAs('public/upload/images', $imageFile->getClientOriginalName());
        $user->password = Hash::make($request->password);
        $user->gender = $request->gender;
        $user->address = $request->address;
        $this->userRepository->save($user);
    }

    public function edit($id)
    {
        return $this->userRepository->findById($id);
    }

    public function update($request, $id)
    {
//        return $request->all();
        $user = $this->userRepository->findById($id);
        $user->name = $request->name;
        $imageFile = $request->file('image');
        dd($imageFile);
        $user->email = $request->email;
        $user->image = $imageFile->getClientOriginalName();
        $imageFile->storeAs('public/upload/images', $imageFile->getClientOriginalName());
        $user->password = Hash::make($request->password);
        $user->gender = $request->gender;
        $user->address = $request->address;
        $this->userRepository->save($user);
    }

    public function delete($id)
    {
        $user = $this->userRepository->findById($id);
        $this->userRepository->delete($user);
    }
}
