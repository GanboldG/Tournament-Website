<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() // posts
    {
        // $posts = Post::orderBy('created_at', 'desc')->take(1)->get();
        // $posts = Post::all();

        $posts = Post::orderBy('created_at', 'desc')->paginate(5); //shows posts with navigators
        return view('posts.index') -> with("posts", $posts);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // post-title and post-body are input names 
        $validatedData = $request->validate([
            'post-title' => 'required',
            'post-body' => 'required'
        ]);

        // Create post
        $post = new Post();
        $post->title = $request->input('post-title');
        $post->body = $request->input('post-body'); 
        $post->save();

        return redirect('/posts') -> with('success', 'Post Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)  // posts/id
    {
        $post = Post::find($id);
        return view("posts.show") -> with("post", $post);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::find($id);
        return view("posts.edit") -> with("post", $post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'post-title' => 'required',
            'post-body' => 'required'
        ]);

        // Update Post
        $post = Post::find($id);
        $post->title = $request->input('post-title');
        $post->body = $request->input('post-body'); 
        $post->save();

        return redirect('/posts') -> with('success', 'Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect('/posts') -> with('success', 'Post Removed');
    }
}
