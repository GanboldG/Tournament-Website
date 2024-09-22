@extends('layouts.app')

@section('content')
    <main role="main" class="container">
        <div class="jumbotron">
        <h1><?php echo $title; ?></h1>
        <p class="lead">
            @if(count($services) > 0)
            <ul class="list-group">    
                @foreach($services as $service)
                    <li class="list-group-item">{{$service}}</li>
                @endforeach
            </ul>
        @endif
        </p>
        <a class="btn btn-lg btn-primary" href="/" role="button">View navbar docs &raquo;</a>
        </div>
    </main>
@endsection
