@extends('blog_theme/main')
@section('content')
    <div class="row justify-content-center ">
        <h2>Add Post</h2>
    </div>
    @include('blog_theme/_partials/errors')
    <form action="/store" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <label for="title"></label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Post title">
        </div>
        <div class="form-group">
            <label for="category"></label>
            <select class="form-control" id="category" name="category">
                <option value="" disabled selected>Choose category</option>
                <option value='first'>First</option>
                <option value='second'>Second</option>
                <option value='third'>Third</option>
            </select>
        </div>
        <div class="form-group">
            <label for="content"></label>
            <textarea class="form-control" id="content" name="body" rows="3" placeholder="Your post.."></textarea>
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
