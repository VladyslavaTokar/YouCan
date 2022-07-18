<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Comment;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {

        $request->validate([
            'comment' => 'required'
        ]);


        $comment= new Comment;
        $comment->post_id=$id;
        $comment->comment=$request->comment;
        $comment->user_id = Auth::user()->id;
        $comment->save();

        $post=Post::where('id', $request->post_id)->first();
        return redirect()->back()->with('message', 'Comment saved!');
    }
       

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function commentdelete($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        return redirect()->back();
    }
}
