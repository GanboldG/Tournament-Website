<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Post;

class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' =>  ['index', 'show']]);
    }

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
    // Form submits to this function
    public function store(Request $request)
    {
        // post-title and post-body are input names 
        $validatedData = $request->validate([
            'post-title' => 'required',
            'post-body' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        // Handle file upload
        if($request->hasFile('cover_image')){
            // Get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext 
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Upload image
            // public/cover_image exists in storage/app/public
            $path = $request->file('cover_image')->storeAs('public/cover_image', $fileNameToStore);
        }
        else{
            $fileNameToStore = "noimage.jpg";
        }

        // Create post
        $post = new Post();
        $post->title = $request->input('post-title');
        $post->body = $request->input('post-body'); 
        $post->user_id = auth()->user()->id;
        $post->cover_image = $fileNameToStore;
        $post->save();

        return redirect('/posts') -> with('success', 'Post Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)  // posts/id
    {
        $post = Post::find($id);
        
        // If someone tries to open a post with this id
        if ($post == null){
            return redirect('/posts')->with('error', "That page doesn't exist (Yet)");;
        }

        return view("posts.show") -> with("post", $post);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::find($id);

        // Check for correct user
        if(auth()->user()->id !== $post->user_id){
            return redirect('/posts')->with('error', 'Unauthortized Page!!!');
        }
        
        return view("posts.edit") -> with("post", $post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'post-title' => 'required',
            'post-body' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        // Handle file upload
        if($request->hasFile('cover_image')){
            // Get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext 
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Upload image
            // public/cover_image exists in storage/app/public
            $path = $request->file('cover_image')->storeAs('public/cover_image', $fileNameToStore);
        }

        // Update Post
        $post = Post::find($id);
        $post->title = $request->input('post-title');
        $post->body = $request->input('post-body'); 

        // If the user actually edited an image
        if($request->hasFile('cover_image')){
            $post->cover_image = $request->input('cover_image');
        }
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

        // Delete the image
        if ($post->cover_image != "noimage.jpg"){
            Storage::delete('public/cover_image/'.$post->cover_image);
        }

        return redirect('/posts') -> with('success', 'Post Removed');
    }

    public function get_it(){
        return "XD";
    }
}
