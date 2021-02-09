@extends('blog_theme/main')
@section('content')
    <div class="row justify-content-center ">
        <h2>Add Category</h2>
    </div>
    <form action="/storecategory" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <label for="category"></label>
            <input type="text" class="form-control" id="category" name="category" placeholder="Add category to database">
        </div>
        <div class="form-group d-flex justify-content-center m-5">
            <button type="submit" class="btn btn-secondary rounded">Add Category</button>
        </div>
    </form>
    <div class="row justify-content-center ">
        <ul class="list-group">
            @foreach($cat as $c)
                <li class="list-group-item">{{$c->category}}</li>
            @endforeach
        </ul>
    </div>



@endsection
