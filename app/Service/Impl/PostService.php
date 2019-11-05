<?php


namespace App\Service\Impl;


use App\Post;
use App\Repositories\Contract\PostRepositoryInterface;
use App\Service\PostServiceInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

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
        $videoFile = $request->file('video');
        $post->title = $request->title;
        $post->material = $request->material;
        $post->recipe = $request->recipe;
        $post->description = $request->description;
        $post->mode = $request->mode;
        $post->link = $request->link;
        $post->image = $imageFile->getClientOriginalName();
        if ($videoFile) {
            $post->video = $videoFile->getClientOriginalName();
            $videoFile->storeAs('public/upload/videos', $videoFile->getClientOriginalName());
        } else {
            $post->video = null;
        }
        $imageFile->storeAs('public/upload/images', $imageFile->getClientOriginalName());
        $post->category_id = $request->category_id;
        $post->user_id = Auth::user()->id;
        $this->postRepository->save($post);
        $post->tags()->attach($request->tags) ;

    }

    public function edit($id)
    {
        return $this->postRepository->findById($id);
    }

    public function update($request, $id)
    {
        $post = $this->postRepository->findById($id);
        $postImage=$post->image;

        if ($request->hasFile('image')){
            $imageFile = $request->file('image');
            $imageFileName = $imageFile->getClientOriginalName();
            $post->image=$imageFileName;
            $imageFile->storeAs('public/upload/images', $imageFile->getClientOriginalName());

        }
        else{
            $post->image=$postImage;
        }


        $post->title = $request->title;
        $post->material = $request->material;
        $post->recipe = $request->recipe;
        $post->description = $request->description;
        $post->mode = $request->mode;
        $post->category_id = $request->category_id;
        $this->postRepository->save($post);
    }

    public function delete($id)
    {
        $post = $this->postRepository->findById($id);
        $this->postRepository->delete($post);
    }

}
