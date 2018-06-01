<?php

namespace App\Http\Controllers\beheer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNewPost;
use App\Post;
use Carbon\Carbon;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('beheer.posts.index', compact('posts'));
    }

    public function create(StoreNewPost $request)
    {
        $validated = $request->validated();
        $userId = Auth()->user()->id;
        $post = new Post;
        $post->user_id = $userId;
        $post->title = $validated['title'];
        $post->message = $validated['message'];
        $post->save();
        return redirect()->action('beheer\PostController@index');
    }

    public function update(Request $request)
    {
        return $request;
        $title = $request->titleEdit;
        $message = $request->textarea;
        $post_id = $request->post_id;

 
        $updatePost = Post::where('id', $post_id)
        ->update([
            'title' => $title,
            'message' => $message,
        ]);
        return redirect()->action('beheer\PostController@index');
    }
}
