@extends('layouts.app')

@section('content')
    
    <div class="d-flex justify-content-center align-items-center">
        <div>
            <h1>Create Post</h1>
            {{-- enctype="multipart/form-data is necessary for file upload" --}}
            <form class="form-group border border-primary p-3" action="{{ route('posts.store') }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="title" class="strong">Title:</label>
                    <input type="text" id="title" class="form-control" placeholder="Type a title..." name="post-title" value="{{ old('post-title')}}">
                </div>
                <div class="form-group mb-3">
                    <label for="post-body">Body:</label>
                    <textarea class="form-control" rows="5" placeholder="Type a body..." name="post-body" id="post-body">{{ old('post-body')}}</textarea>
                </div>

                {{-- File upload/submit button --}}
                <div class="form-group mb-3">
                    <label for="post-file">Upload:</label>
                    <input type="file" class="form-control-file btn btn-secondary" name="cover_image" id="post-file">
                </div>
                <div class="form-group d-flex justify-content-center">
                    <input type="submit" class="btn btn-primary">
                </div>
                @csrf
            </form>    
        </div>
    </div>
    
@endsection 