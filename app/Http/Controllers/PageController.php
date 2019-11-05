<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\Http\Requests\PasswordRequest;
use App\Http\Requests\ProfileRequest;
use App\Post;
use App\Reply;
use App\Rules\MatchOldPassword;
use App\Service\UserServiceInterface;
use App\Tag;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
class PageController extends Controller
{
    protected $userService;

    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $tags = Tag::all()->random(3);
        $randomposts = Post::all()->random(2);
        return view('page.index',compact('randomposts','tags'));
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
        $posts = User::find(Auth::user()->id)->posts->paginate(6);
        $categories = Category::all();
        $user = User::find(Auth::user()->id);
        return view('page.users.myPost', compact('posts', 'categories','user'));
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
        $postTags=Post::where('category_id',$post->category_id)->get();
        $randomposts = Post::all()->random(3);
        $postRecents=Post::where('mode','public')->orderBy('created_at','desc')->paginate(4);
        $categories = Category::all();
        $comments=Comment::all();
        $replies=Reply::all();
        return view('page.users.detailPost', compact('post','postRecents','postTags', 'posts', 'categories','comments','randomposts','replies'));
    }

    public function editProfile($id)
    {
        $user = User::find($id);
        return view('page.users.EditProfile', compact('user'));
    }

    public function updateProfile(ProfileRequest $request, $id)
    {

        $this->userService->update($request, $id);
        return redirect()->route('page.myProfile', Auth::user()->id)->with('notif','Cập nhật thông tin thành công');
    }

    public function editPassword($id)
    {
        $user = User::find($id);
        return view('page.users.changePassword', compact('user'));
    }

    public function updatePassword(Request $request, $id)
    {
        $request->validate([
            'password' => ['required', new MatchOldPassword],
            'newpassword1' => ['required','min:8'],
            'newpassword2' => ['required','same:newpassword1'],
        ]);
        User::find(\auth()->user()->id)->update(['password' => Hash::make($request->password1)]);
        Session()->flash('message','Thay đổi mật khẩu thành công');
        $this->userService->changePassword($request, $id);
        return redirect()->route('page.myProfile', Auth::user()->id);
    }

}
