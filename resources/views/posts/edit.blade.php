@extends('layouts.app')

@section('content')
    <h1>Edit Post</h1>
    
    <form class="form-group" action="{{ route('posts.update', $post->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- This line specifies that the request should be treated as a PUT request -->

        <div class="form-group">
            <label for="title" class="strong">Title:</label>
            <input type="text" id="title" class="form-control" placeholder="Type a title..." name="post-title" value="{{$post->title}}">
        </div>
        <div class="form-group">
            <label for="post-body">Body:</label>
            <textarea class="form-control" rows="5" placeholder="Type a body..." name="post-body" id="post-body">{{$post->body}}</textarea>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary">
        </div>
    </form>    
    
@endsection 