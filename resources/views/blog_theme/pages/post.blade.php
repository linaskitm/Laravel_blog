@extends('blog_theme/main')
@section('content')

    <div class="row ">
        <div class="col-lg-8 col-md-10 mx-auto">
            <div class="post-preview">
                <h2 class="post-title">{{$post->title}}</h2>
                <h6 class="post-subtitle">{{$post->body}}</h6>
                <p class="post-meta mb-0">Category: {{$post->category}}</p>
            </div>
        </div>
    </div>


    <a href="/">Back</a>
@endsection
