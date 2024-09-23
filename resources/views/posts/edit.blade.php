@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center align-items-center">
        <div>
            <h1>Edit Post</h1>
            <form class="form-group border border-primary p-4" action="{{ route('posts.update', $post->id) }}" method="POST"  accept-charset="UTF-8" enctype="multipart/form-data">
                @csrf
                @method('PUT') <!-- This line specifies that the request should be treated as a PUT request -->

                <div class="form-group">
                    <label for="title"><b>Title:</b></label>
                    <input type="text" id="title" class="form-control" placeholder="Type a title..." name="post-title" value="{{$post->title}}">
                </div>
                <div class="form-group m-3">
                    <label for="post-body"><b>Body:</b></label>
                    <textarea class="form-control" rows="5" placeholder="Type a body..." name="post-body" id="post-body">{{$post->body}}</textarea>
                </div>  

                {{-- Buttons for upload/submit --}}
                <div class="form-group mb-3">
                    <label for="post-file">Upload:</label>
                    <input type="file" class="form-control-file btn btn-secondary" name="cover_image" id="post-file">
                </div>
                <div class="form-group d-flex justify-content-center">
                    <input type="submit" class="btn btn-primary">
                </div>
            </form>    
        </div>
    </div>
@endsection 