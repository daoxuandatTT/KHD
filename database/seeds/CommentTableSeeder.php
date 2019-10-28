<?php

use App\Comment;
use Illuminate\Database\Seeder;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comment = new Comment();
        $comment->content = "bai viet rat hay";
        $comment->user_id = 1;
        $comment->post_id = 1;
        $comment->save();

        $comment = new Comment();
        $comment->content = "bai viet rat hay";
        $comment->user_id = 2;
        $comment->post_id = 2;
        $comment->save();

        $comment = new Comment();
        $comment->content = "bai viet rat hay";
        $comment->user_id = 3;
        $comment->post_id = 3;
        $comment->save();
    }
}
