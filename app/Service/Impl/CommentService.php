<?php


namespace App\Service\Impl;


use App\Comment;
use App\Repositories\Contract\CommentRepositoryInterface;
use App\Service\CommentServiceInterface;
use Illuminate\Support\Facades\Auth;

class CommentService implements CommentServiceInterface
{
    protected $commentRepository;

    public function __construct(CommentRepositoryInterface $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    public function getAll()
    {
        return $this->commentRepository->getAll();
    }

    public function store($request, $id)
    {
        $comment = new Comment();
        $comment->content = $request->content;
        $comment->user_id = Auth::user()->id;
        $comment->post_id = $id;
        $this->commentRepository->save($comment);
    }

    public function edit($id)
    {
        return $this->commentRepository->findById($id);
    }

    public function update($request, $id)
    {
        $comment = $this->commentRepository->findById($id);
        $comment->content = $request->content;
        $comment->user_id = $request->user_id;
        $comment->post_id = $request->post_id;
        $this->commentRepository->save($comment);
    }

    public function delete($id)
    {
        $comment = $this->commentRepository->findById($id);
        $this->commentRepository->delete($comment);
    }
}
