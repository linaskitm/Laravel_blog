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
        <div>
            <h4 class="text-center pb-3">List of Categories</h4>

        <ul class="list-group">
            @foreach($categories as $category)
                <li class="list-group-item"><a href="/bycategory/{{$category->id}}">{{$category->category}}</a></li>
{{--                <span><a href="/del/{{$category->id}}">X</a></span>--}}
                                            {{--  Modeliu relations, bet vietoj kategrijos pavadinimo gaunu jos Id          --}}
                <li class="list-group-item"><a href="/postby/{{$category->id}}">Eloquent. Relationships method: {{$category->category}} </a></li>
            @endforeach
        </ul>
        </div>
    </div>

@endsection
