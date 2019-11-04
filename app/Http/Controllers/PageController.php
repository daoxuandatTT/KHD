<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\Post;
use App\Reply;
use App\Service\UserServiceInterface;
use App\Tag;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;

class PageController extends Controller
{
    protected $userService;

    public function __construct(UserServiceInterface $userService)
    {
        $this->middleware('auth');
        $this->userService = $userService;
    }

    public function index()
    {
        return view('page.index');
    }

    public function about()
    {
        return view('page.about');
    }

    public function cooking()
    {
        return view('page.cooking');
    }

    public function contact()
    {
        return view('page.contact');
    }

    public function myPost()
    {
        $posts = User::find(Auth::user()->id)->posts;
        $categories = Category::all();
        return view('page.users.myPost', compact('posts', 'categories'));
    }
    public function showPostShare(){
        $tag= Tag::where('name','share')->first();
        $posts=$tag->posts;
        $postsShare = $posts->paginate(2);
        return \view('page.share',compact('postsShare'));
    }

    public function myProfile($id)
    {
        $user = User::find($id);
        return view('page.users.myProfile', compact('user'));
    }

    public function showDetail($id)
    {
        $posts = Post::all();
        $post = Post::find($id);
        $randomposts= Post::all()->random(3);
        $categories = Category::all();
        $comments=Comment::all();
        $replies=Reply::all();
        return view('page.users.detailPost', compact('post', 'posts', 'categories','comments','randomposts','replies'));
    }

    public function editProfile($id)
    {
        $user = User::find($id);
        return view('page.users.EditProfile', compact('user'));
    }

    public function updateProfile(Request $request, $id)
    {
        $this->userService->update($request, $id);
        return redirect()->route('page.myProfile', Auth::user()->id);
    }

    public function editPassword($id)
    {
        $user = User::find($id);
        return view('page.users.changePassword', compact('user'));
    }

    public function updatePassword(Request $request, $id)
    {
        $this->userService->changePassword($request, $id);
        return redirect()->route('page.myProfile', Auth::user()->id);
    }

}
