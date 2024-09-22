@extends("layouts.app")

@section('content')
    <h1>Post #{{$post->id}}</h1>
    <h3 class="text-muted">{{$post->title}}</h3>
    <p class="text-muted">{!!nl2br(e($post->body))!!}</p>
    <hr>
    <a href="/posts/{{$post->id}}/edit" class="btn btn-primary">Edit</a>

    <form class="float-right" action="{{route('posts.destroy', $post->id)}}" method="POST">
        @csrf
        @method("DELETE")
        <input type="submit" class="btn btn-danger" value="Delete">
    </form>
@endsection