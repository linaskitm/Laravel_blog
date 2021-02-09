@extends('blog_theme/main')
@section('content')

<form action="/storeupdate/{{$post->id}}" method="post">
    {{csrf_field()}}
    {{ method_field('PATCH') }}
    <div class="form-group">
        <label for="title"></label>
        <input type="text" class="form-control" id="title" name="title" value="{{$post->title}}" placeholder="Post title">
    </div>
    <div class="form-group">
        <label for="category"></label>
        <select class="form-control" id="category" name="category" >

            <option value='{{$post->category}}'>First</option>
            <option value='{{$post->category}}'>Second</option>
            <option value='{{$post->category}}'>Third</option>
        </select>
    </div>
    <div class="form-group">
        <label for="content"></label>
        <textarea class="form-control" id="content"  name="body" rows="3" placeholder="Your post..">{{$post->body}}</textarea>
    </div>
    <div class="form-group">
        <label for="image"></label>
        <input type="file" class="btn" id="image" name="image">
    </div>
    <div class="form-group d-flex justify-content-center m-5">
        <button type="submit" class="btn btn-secondary rounded">Post</button>
    </div>
</form>
@endsection
