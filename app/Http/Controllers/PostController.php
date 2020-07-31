<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Events\MyEvent;
//use App\Events\PostCreated;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
    	//$posts = Post::all();

    	$posts = Post::addSelect(['last_comment' => Comment::select('comment')
    		->whereColumn('post_id', 'posts.id')
    		->orderBy('id', 'desc')
    		->limit(1)
    	])->get();

    	return view('posts.index', [
    		'posts' => $posts
    	]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $post = Post::create($request->all());

        //event(new PostCreated($post));

        return redirect()->route('posts.index');
    }

    public function edit($id)
    {
        return view('posts.edit', [
            'post' => Post::findOrFail($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        $post = Post::find($id);

        /*$post->fill([
            'title' => $request->title,
            'content' => $request->content
        ])->save();*/

        Post::where('id', $id)
            ->update([
                'title' => $request->title,
                'content' => $request->content
            ]);

        return redirect()->route('posts.index');
    }

    public function destroy($id)
    {
        Post::destroy($id);

        return redirect()->route('posts.index');
    }

    public function event()
    {
        event(new MyEvent('hello world'));
    }
}
