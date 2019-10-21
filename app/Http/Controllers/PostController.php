<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\StorePost;
use App\Http\Requests\UpdatePost;
use App\Service\PostServiceInterface;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    protected $postService;

    public function __construct(PostServiceInterface $postService)
    {
        $this->postService = $postService;
    }

    public function getAll()
    {
        $posts = $this->postService->getAll();
        return view('post.list', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('post.create', compact('categories'));
    }

    public function store(StorePost $request,$id)
    {
        $this->postService->store($request);
        Session::flash('message', 'Add successfully');
        return redirect()->route('page.myPost',$id);
    }

    public function edit($id)
    {
        $categories = Category::all();
        $post = $this->postService->edit($id);
        return view('post.edit', compact('post','categories'));
    }

    public function update(UpdatePost $request, $id)
    {
        $this->postService->update($request, $id);
        Session::flash('message', 'Update successful');
        return redirect()->route('post.list');
    }

    public function delete($id)
    {
        $this->postService->delete($id);
        Session::flash('message', 'Delete successful');
        return redirect()->route('post.list');
    }
}
