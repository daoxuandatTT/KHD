<?php


namespace App\Service\Impl;


use App\Post;
use App\Repositories\Contract\PostRepositoryInterface;
use App\Service\PostServiceInterface;
use Illuminate\Support\Facades\Auth;

class PostService implements PostServiceInterface
{
    protected $postRepository;

    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function getAll()
    {
        return $this->postRepository->getAll();
    }

    public function store($request)
    {
        $post = new Post();
        $imageFile = $request->file('image');
        $post->title = $request->name;
        $post->material = $request->material;
        $post->recipe = $request->recipe;
        $post->description = $request->description;
        $post->image = $imageFile->getClientOriginalName();
        $imageFile->storeAs('public/upload/images', $imageFile->getClientOriginalName());
        $post->category_id = $request->category_id;
        $post->user_id = Auth::user()->id;
        $this->postRepository->save($post);

    }

    public function edit($id)
    {
        return $this->postRepository->findById($id);
    }

    public function update($request, $id)
    {
        $post = $this->postRepository->findById($id);
        $imageFile = $request->file('image');
        $post->name = $request->name;
        $post->material = $request->material;
        $post->recipe = $request->recipe;
        $post->description = $request->description;
        $post->image = $imageFile->getClientOriginalName();
        $imageFile->storeAs('public/upload/images', $imageFile->getClientOriginalName());
        $post->category_id = $request->category_id;
        $this->postRepository->save($post);
    }

    public function delete($id)
    {
        $post = $this->postRepository->findById($id);
        $this->postRepository->delete($post);
    }
}
