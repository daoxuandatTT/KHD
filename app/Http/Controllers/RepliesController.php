<?php

namespace App\Http\Controllers;

use App\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RepliesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function store(Request $request)
    {


        $reply = new Reply();
        $reply->comment_id=$request->input('comment_id');
        $reply->content=$request->input('content');
        $reply->user_id=Auth::user()->id;
        $reply->save();
        return redirect()->back();
    }
    public function destroy(Reply $reply)
    {
        if (Auth::check()) {
            $reply = Reply::where(['id'=>$reply->id,'user_id'=>Auth::user()->id]);
            if ($reply->delete()) {
                return 1;
            }else{
                return 2;
            }
        }else{
        }
        return 3;
    }


}
