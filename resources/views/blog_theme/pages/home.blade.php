@extends('blog_theme/main')

@section('content')
<div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
        @foreach($posts as $post)
        <div class="post-preview">
            <a href="post.html">
                <h2 class="post-title">
                    {{$post->title}}
                </h2>
                <h3 class="post-subtitle">
                    {{ substr(strip_tags($post->body), 0, 250) }}
                </h3>
                    @if(strlen(strip_tags($post->body)) > 50)
                        <a href="post/{{$post->id}}">Read more</a>
                        @endif

            </a>
                    @foreach($cat as $c)
                        @if($post->category == $c->id)
            <p class="post-meta">{{$c->category}}
                        @endif
                    @endforeach
                <a href="#">From Database</a>
                {{$post->created_at->format('M j, Y')}}</p>

            <ul class="list-group">
                <li class="list-group-item"><a href="/edit/{{$post->id}}">Edit</a></li>
                <li class="list-group-item"><a href="/delete/{{$post->id}}">Delete</a></li>
            </ul>
        </div>
            <hr>
        @endforeach


        <!-- Pager -->
        <div class="clearfix">
            {{$posts->links()}}
            <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
        </div>
    </div>
</div>
@endsection
