<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function edit($com_id)
    {
        return view('bbs/commentEdit', ['comment' => Comment::find($com_id)]);
    }

    public function store(Request $request, $post_id)
    {
        //$request->validate(['comment' => 'require']);
        $comment = new Comment;
        $comment->comment = $request->comment;
        $comment->user_id = Auth::user()->id;
        $comment->post_id = $post_id;

        $comment->save();

        return redirect()->back();
    }

    public function update(Request $request, $com_id)
    {
        $comment = Comment::find($com_id);
        $comment->comment = $request->comment;
        $comment->save();

        $post_id = $comment->post_id;



        // update comments set comment=?, updated_at=now() where id = ?

        return redirect()->route('posts.show', ['post' => $post_id]);
    }

    public function destroy($id)
    {
        Comment::find($id)->delete();
        return redirect()->back();
    }
}
