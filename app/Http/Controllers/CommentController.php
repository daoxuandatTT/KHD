<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Http\Requests\StoreComment;
use App\Http\Requests\UpdateComment;
use App\Service\CommentServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CommentController extends Controller
{
    protected $commentService;

    public function __construct(CommentServiceInterface $commentService)
    {
        $this->commentService = $commentService;
    }

    public function getAll()
    {
        $comments = $this->commentService->getAll();
        return view('comment.list', compact('comments'));
    }

    public function create()
    {
        return view('comment.create');
    }

    public function store(CommentRequest $request,$postId)
    {
        $userId=Auth::user()->id;
        $this->commentService->store($request,$postId);
        Session::flash('message', 'Add successfully');
//        return redirect()->route('page.showDetail',$postId);
        return redirect()->back();
    }

    public function edit($id)
    {
        $comment = $this->commentService->edit($id);
        return view('comment.edit', compact('comment'));
    }

    public function update(UpdateComment $request, $id)
    {
        $this->commentService->update($request, $id);
        Session::flash('message', 'Update successfully');
        return redirect()->route('comment.list');
    }

    public function delete($id)
    {
        $this->commentService->delete($id);
        Session::flash('message', 'Delete successfully');
        return redirect()->route('comment.list');
    }
}
