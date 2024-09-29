@extends('layouts.app')

@section('content')
    <main role="main" class="container">
        <div class="jumbotron">
            <h1>{{$title}}</h1>
            <p class="lead">{{$text}}</p>
            <a class="btn btn-lg btn-primary" href="/" role="button">Useless button &raquo;</a>
        </div>
    </main>
@endsection