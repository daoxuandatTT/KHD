<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\StoreMyPost;
use App\Post;
use App\Service\PostServiceInterface;
use App\Tag;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public function store(StoreMyPost $request, $id)
    {
        $this->postService->store($request);
        Session::flash('message', 'Thêm mới thành công');
        return redirect()->route('page.myPost', $id);
    }

    public function edit($id)
    {
        $categories = Category::all();
        $post = $this->postService->edit($id);
        return view('post.edit', compact('post', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $userId = Auth::user()->id;
        $this->postService->update($request, $id);
        Session::flash('message', 'Update successful');
        return redirect()->route('page.myPost', $userId);
    }

    public function delete($id)
    {
        $userId = Auth::user()->id;
        $this->postService->delete($id);
        Session::flash('message', 'Delete successful');
        return redirect()->route('page.myPost', $userId);
    }

    public function postByTag($id){
       $tag=Tag::find($id);

        return view('page.tag',compact('tag'));
    }


    public function search(Request $request)
    {
        $keyword = $request->search;
        if (!$keyword) {
            return redirect()->route('post.search');
        }
        $posts = Post::where('title', 'LIKE', '%' . $keyword . '%')->get();
        return view('page.users.search', compact('posts'));
    }

}
