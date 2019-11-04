<?php


namespace App\Service\Impl;


use App\Repositories\Contract\UserRepositoryInterface;
use App\Service\UserServiceInterface;
use App\User;
use Illuminate\Support\Facades\Auth;
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
        $user->gender = $request->gender;
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->job = $request->job;
        $user->dob = $request->dob;
        $this->userRepository->save($user);
    }

    public function edit($id)
    {
        return $this->userRepository->findById($id);
    }

    public function update($request, $id)
    {
        $user = $this->userRepository->findById($id);
        $user->name = $request->name;
        $userImage=$user->image;

        if ($request->hasFile('image')){
            $imageFile = $request->file('image');
           $imageFileName = $imageFile->getClientOriginalName();
           $user->image=$imageFileName;
            $imageFile->storeAs('public/upload/images', $imageFile->getClientOriginalName());

        }
        else{
            $user->image=$userImage;
        }


        $user->gender = $request->gender;
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->job = $request->job;
        $user->dob = $request->dob;
        $this->userRepository->save($user);

    }

    public function changePassword($request, $id)
    {

        if (Hash::check($request->password ,Auth::user()->password )&& $request->newpassword1 == $request->newpassword2) {
            $user = $this->userRepository->findById($id);
            $user->password = Hash::make($request->newpassword2);
            $this->userRepository->save($user);
        }
    }

    public function delete($id)
    {
        $user = $this->userRepository->findById($id);
        $this->userRepository->delete($user);
    }
}
