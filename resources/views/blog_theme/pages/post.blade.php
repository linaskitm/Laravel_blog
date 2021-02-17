@extends('blog_theme/main')
@section('content')

    <div class="row ">
        <div class="col-lg-8 col-md-10 mx-auto">
            <div class="post-preview">
                <h2 class="post-title">{{$post->title}}</h2>
                <p class="post-subtitle">{{$post->body}}</p>

            </div>
        </div>
    </div>


    <a class="btn btn-secondary float-left" href="/">Back  &larr;</a>
@endsection
