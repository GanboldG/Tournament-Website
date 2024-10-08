@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="/posts/create" class="btn btn-primary mb-3">Create Post</a>
                    <h3>Your Posts:</h3>
                    <table class="table table-striped">
                        @foreach($posts as $post)
                            <tr>
                                <td>{{$post->title}}</td>
                                <th><a href="/posts/{{$post->id}}/edit" class="btn btn-success">Edit</a></th>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
