<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;


class PostController extends Controller
{
    public function index()
    {
        $posts = Post::where('user_id',auth()->user()->id)->get();
        return view('dashboard',compact('posts'));
    }

    public function create()
    {
        return view('post.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);
        
        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => auth()->user()->id,
        ]);
        return redirect()->route('dashboard');

    }

    public function edit(Post $post)
    {   
        return view('post.edit',compact('post'));
    }

    public function update(Post $post,Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);
        
        $post->update($data);
    
        return redirect()->route('dashboard');
    }

    public function delete(Post $post)
    {    
        return view('post.delete',compact('post'));
    }

    public function destroy(Post $post)
    {    
        $post->delete();
        return redirect()->route('dashboard');
    }
}
