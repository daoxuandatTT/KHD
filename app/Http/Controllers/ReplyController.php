<?php

namespace App\Http\Controllers;

use App\Service\ReplyServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ReplyController extends Controller
{
    protected $replyService;

    public function __construct(ReplyServiceInterface $replyService)
    {
        $this->replyService = $replyService;
    }

    public function getAll()
    {
        $replies = $this->replyService->getAll();

    }

    public function store($request, $id)
    {

        $this->replyService->store($request, $id);
        Session::flash('message', 'Add successfully');
//        return redirect()->route('page.showDetail',$postId);
        return redirect()->back();
    }

}
