<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUser;
use App\Http\Requests\UpdateUser;
use App\Service\UserServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

    public function getAll()
    {
        $users = $this->userService->getAll();
        return view('user.list', compact('users'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $this->userService->store($request);
        return redirect()->route('user.list');
    }

    public function edit($id)
    {
        $user = $this->userService->edit($id);
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $this->userService->update($request, $id);

        return redirect()->route('page.myProfile');
    }

    public function delete($id)
    {
        $this->userService->delete($id);
        return redirect()->route('user.list');
    }
}
