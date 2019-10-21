<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
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

    public function myPost($id)
    {
        $posts=User::find($id)->posts;
        $categories=Category::all();
        return view('page.users.myPost',compact('posts','categories'));
    }
    public function myProfile(){
        return view('page.users.myProfile');
    }
    public function showDetail($id){
        $post=Post::find($id);
        return view('page.users.detailPost',compact('post'));
    }
}
