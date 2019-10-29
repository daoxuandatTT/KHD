<?php


namespace App\Service\Impl;


use App\Comment;
use App\Repositories\Contract\CommentRepositoryInterface;
use App\Repositories\Contract\ReplyRepositoryInterface;
use App\Service\CommentServiceInterface;
use Illuminate\Support\Facades\Auth;

class  ReplyService implements CommentServiceInterface
{
    protected $replyRepository;

    public function __construct(ReplyRepositoryInterface $replyRepository)
    {
      $this-> replyRepository=$replyRepository;
    }

    public function getAll()
    {
        return $this->replyRepository->getAll();
    }

    public function store($request, $id)
    {
        $reply = new Comment();
        $reply->content = $request->content;
        $reply->user_id = Auth::user()->id;
        $reply->post_id = $id;
        $this->replyRepository->save($reply);
    }

    public function edit($id)
    {
        return $this->replyRepository->findById($id);
    }

    public function update($request, $id)
    {
        $reply = $this->replyRepository->findById($id);
        $reply->content = $request->content;
        $reply->user_id = $request->user_id;
        $reply->post_id = $request->post_id;
        $this->replyRepository->save($reply);
    }

    public function delete($id)
    {
        $reply = $this->replyRepository->findById($id);
        $this->replyRepository->delete($reply);
    }
}
