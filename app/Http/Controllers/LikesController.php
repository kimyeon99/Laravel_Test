<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikesController extends Controller
{
    public function store(Post $post)
    {

        $check = Like::where('post_id', $post->id)->where('user_id', Auth::user()->id)->first();

        if (is_null($check)) {
            $like = new Like();
            $like->post_id = $post->id;
            $like->user_id = Auth::user()->id;
            $like->save();
        } else {
            $check->delete();
            return redirect()->back();
        }
        return redirect()->back();
    }
}
