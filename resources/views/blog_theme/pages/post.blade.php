@extends('blog_theme/main')
@section('content')
    <h2>{{$post->title}}</h2>
    <p>{{$post->body}}</p>
    <a href="/">Back</a>
@endsection
