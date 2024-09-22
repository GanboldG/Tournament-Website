@extends('layouts.app')

@section('content')
    <main role="main" class="container">
        <div class="jumbotron">
            <h1><?php echo $title; ?></h1>
        <p class="lead"><?php echo $text; ?></p>
        <a class="btn btn-lg btn-primary" href="/" role="button">View navbar docs &raquo;</a>
        </div>
    </main>
@endsection