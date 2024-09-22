@extends('layouts.app')

@section('content')
    <h1>Create Post</h1>

    <form class="form-group" action="{{ route('posts.store') }}" method="POST">
        <div class="form-group">
            <label for="title" class="strong">Title:</label>
            <input type="text" id="title" class="form-control" placeholder="Type a title..." name="post-title" value="{{ old('post-title')}}">
        </div>
        <div class="form-group">
            <label for="post-body">Body:</label>
            <textarea class="form-control" rows="5" placeholder="Type a body..." name="post-body" id="post-body">{{ old('post-body')}}</textarea>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary">
        </div>
        @csrf
    </form>    
    
@endsection 