@extends("layouts.app")

@section('content')
    <div class="container">
        <h1>Post #{{$post->id}}</h1>
        <img style="width:100%" src="storage/cover_image/{{$post->cover_image}}">
        <h3 class="text-muted">{{$post->title}}</h3>
        <p class="text-muted">{!!nl2br(e($post->body))!!}</p>
        <hr>
    </div>
    {{-- Non guest users can see (logged) --}}
    @if(!Auth::guest())
        {{-- Only the creator can edit / delete their post --}}
        @if(Auth::user()->id == $post->user_id)
            <a href="/posts/{{$post->id}}/edit" class="btn btn-primary">Edit</a>

            <form class="float-right" action="{{route('posts.destroy', $post->id)}}" method="POST">
                @csrf
                @method("DELETE")
                <input type="submit" class="btn btn-danger" value="Delete">
            </form>
        @endif
    @endif
@endsection