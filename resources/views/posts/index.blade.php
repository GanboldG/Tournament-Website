@extends('layouts.app')

@section('content')
    <h1>Posts:</h1>
    <div class="text-muted">
        @if(count($posts) > 0)
            @foreach($posts as $post) 
                <h3><a class="text-decoration-none" href="posts/{{$post->id}}">{{$post->title}}</a></h3>
                <small>Created on {{$post->created_at}}</small>
                <div style="margin-bottom: 30px;"></div>
            @endforeach
            {{$posts->links()}}
        @else
            <p>No posts found</p>
        @endif
    </div>
@endsection 