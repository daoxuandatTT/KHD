<?php

use App\Post;
use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post = new Post();
        $post->title = "Suon xao chua ngot";
        $post->material = "abc";
        $post->recipe = "xyz";
        $post->description = "hhh";
        $post->image = "image11";
        $post->mode = "public";
        $post->save();

        $post = new Post();
        $post->title = "Dau sot ca chua";
        $post->material = "abc";
        $post->recipe = "xyz";
        $post->description = "hhh";
        $post->image = "image11";
        $post->mode = "public";
        $post->save();

        $post = new Post();
        $post->title = "Bun dau mam tom";
        $post->material = "abc";
        $post->recipe = "xyz";
        $post->description = "hhh";
        $post->image = "image11";
        $post->mode = "public";
        $post->save();
    }
}
