@extends('layouts.app')

@section('content')
    <h1>Posts:</h1>
    <div class="text-muted">
        @if(count($posts) > 0)
            @foreach($posts as $post) 
                <div class="well">
                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <img style="width:100%" src="storage/cover_image/{{$post->cover_image}}">
                        </div>
                        <div class="col-md-8 col-sm-8">
                            <h3><a class="text-decoration-none" href="posts/{{$post->id}}">{{$post->title}}</a></h3>
                            <small>Created on {{$post->created_at}} by {{$post->user->name}}</small>
                        </div>
                    </div>
                </div>
            @endforeach
            {{-- For the paginator --}}
            {{$posts->links()}}
        @else
            <p>No posts found</p>
        @endif
    </div>
@endsection 