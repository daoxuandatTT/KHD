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
        $post->name = "Suon xao chua ngot";
        $post->material = "abc";
        $post->recipe = "xyz";
        $post->description = "hhh";
        $post->image = "image11";
        $post->category_id = 1;
        $post->user_id = 1;
        $post->save();

        $post = new Post();
        $post->name = "Dau sot ca chua";
        $post->material = "abc";
        $post->recipe = "xyz";
        $post->description = "hhh";
        $post->image = "image11";
        $post->category_id = 2;
        $post->user_id = 2;
        $post->save();

        $post = new Post();
        $post->name = "Bun dau mam tom";
        $post->material = "abc";
        $post->recipe = "xyz";
        $post->description = "hhh";
        $post->image = "image11";
        $post->category_id = 3;
        $post->user_id = 3;
        $post->save();
    }
}
