@extends('blog_theme/main')

@section('content')
    <div class="row justify-content-center ">
        <h2>Posts by selected category</h2>
    </div>
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            @foreach($posts as $post)
                <div class="post-preview">
                    <a href="/post/{{$post->id}}">
                        <h2 class="post-title">
                            {{$post->title}}
                        </h2>
                        <h3 class="post-subtitle">
                            {{ Str::limit($post->body, 100) }}
                        </h3>
                        @if(strlen(strip_tags($post->body)) > 50)
                            <a href="/post/{{$post->id}}">Read more</a>
                        @endif

                    </a>
                            <p class="post-meta mb-0">Category: {{$post->category}}</p>
                            <p class="post-meta mt-0">Created at: {{$post->created_at}}</p>

                            <ul class="list-group">
                                <li class="list-group-item"><a href="/edit/{{$post->id}}">Edit</a></li>
                                <li class="list-group-item"><a href="/delete/{{$post->id}}">Delete</a></li>
                            </ul>
                </div>
                <hr>
            @endforeach


        <!-- Pager -->
            <div class="clearfix">
{{--                 gauname nauja postu masyva, todel netinka sitas metodas--}}
{{--                {{$post1->links()}}--}}
                <a class="btn btn-primary float-left" href="/add-category">Back &rarr;</a>
            </div>
        </div>
    </div>
@endsection
