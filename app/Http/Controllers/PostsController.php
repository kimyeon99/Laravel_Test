<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('create');
    }

    public function index()
    {
        $posts = Post::latest()->paginate(7);

        // User::when($request->query('sort'), function ($query, $sort) {
        //     if ($sort == 'new') {
        //        return $query->latest();
        //     }

        //     return $query;
        //  })->get();
        return view('bbs.index', ['posts' => $posts]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'company' => 'required',
            'carName' => 'required',
            'year' => 'required | integer',
            'money' => 'required  | integer',
            'carJong' => 'required',
            'hung' => 'required',
            'image' => 'image | required',
        ]);

        $post = new Post();
        $post->company = $request->company;
        $post->carName = $request->carName;
        $post->year = $request->year;
        $post->money = $request->money;
        $post->carJong = $request->carJong;
        $post->hung = $request->hung;
        $post->user_id = Auth::user()->id;

        if ($request->hasFile('image')) {
            $fileName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs(
                'public/images/',
                $fileName
            );
            $post->image = $fileName;
        }

        $post->save();

        return redirect()->route('posts.index', ['posts' => Post::all()]);
    }

    public function create()
    {
        return view('bbs/create');
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        if ($post->image) {
            Storage::delete('public/images/' . $post->image);
        }
        $post->delete();

        return redirect()->route('posts.index');
    }

    public function show($id)
    {
        $post = Post::find($id);
        $comments = Comment::where('post_id', $id)->latest()->paginate(10);
        if (Auth::check()) {
            $liked = DB::table('post_user')->where('post_id', $id)->where('user_id', Auth::user()->id)->exists();
        } else {
            $liked = false;
        }
        return view('bbs.show', ['post' => $post, 'comments' => $comments, 'liked' => $liked]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'company' => 'required',
            'carName' => 'required',
            'year' => 'required | integer',
            'money' => 'required  | integer',
            'carJong' => 'required',
            'hung' => 'required',
            'image' => 'image | required',
        ]);

        $post = Post::find($id);
        $post->company = $request->company;
        $post->carName = $request->carName;
        $post->year = $request->year;
        $post->money = $request->money;
        $post->carJong = $request->carJong;
        $post->hung = $request->hung;
        $post->user_id = Auth::user()->id;

        if ($request->hasFile('image')) {

            $fileName = time() . '_' . $request->file('image')->getClientOriginalName();
            if ($post->image) {
                Storage::delete('public/images/' . $post->image);
                $post->image = null;
            }
            $request->file('image')->storeAs(
                'public/images/',
                $fileName
            );
            $post->image = $fileName;
        }
        $post->save();




        return redirect()->route('posts.show', ['post' => $post->id]);
    }

    public function edit($id)
    {
        return view('bbs/edit', ['post' => Post::find($id)]);
    }

    public function imageDel($id)
    {
        $post = Post::find($id);
        $post->image = null;
        $post->save();

        return redirect()->back();
    }
}
