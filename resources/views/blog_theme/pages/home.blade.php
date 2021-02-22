@extends('blog_theme/main')

@section('content')
<div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
        @foreach($posts as $post)
        <div class="post-preview">
            <a href="post/{{$post->id}}">
                <h2 class="post-title">
                    {{$post->title}}
                </h2>
                <h3 class="post-subtitle">
                    {{ Str::limit($post->body, 100) }}
                </h3>
                    @if(strlen(strip_tags($post->body)) > 50)
                        <a href="post/{{$post->id}}">Read more</a>
                        @endif


            </a>
            <div>
                <img src="{{asset($post->image)}}" >
            </div>
                    @foreach($cat as $c)
                        @if($post->category == $c->id)
            <p class="post-meta mb-0">Category: {{$c->category}}
                        @endif
                    @endforeach

                    <p class="post-meta mb-0">Created at: {{$post->created_at->format('M j, Y')}}</p>


            @foreach($users as $user)
                @if($user->id === $post->user_id)
                    <p class="post-meta mt-0"> Author: {{ $user->name }}</p>
                    @if(!empty($auth) and $auth->name === $user->name)
                        <ul class="list-group">
                            <li class="list-group-item"><a href="/edit/{{$post->id}}">Edit</a></li>
                            <li class="list-group-item"><a href="/delete/{{$post->id}}">Delete</a></li>
                        </ul>
                    @endif
                @endif

            @endforeach
        </div>
            <hr>
            <form method="post" action="/post{{$post->id}}/comment">
                {{csrf_field()}}
                <label> Leave a comment</label>
                <textarea name="body" class="form-control" rows="2"> </textarea>
                <button type="submit">Comment</button>
            </form>
            <ul>
                @foreach($post->comments as $comment)
                    <li>{{$comment->body}}</li>
                @endforeach
            </ul>

    @endforeach



        <!-- Pager -->
        <div class="clearfix">
            {{$posts->links()}}
            <a class="btn btn-primary float-right" href="/">Back to Top &uarr;</a>
        </div>
    </div>
</div>
@endsection
