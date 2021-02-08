<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class BlogController extends Controller
{
    public function index(){

        $posts = Post::paginate(7);

        return view('blog_theme.pages.home', compact('posts'));
    }
    public function addPost(){
        return view('blog_theme.pages.add-post');
    }
    public function store(Request $request){
        $validateData = $request->validate([
            'title' => 'required|unique:posts|max:255',
            'body' => 'required',
            'category'=> 'required'
        ]);
//        dd($request);
        Post::create([
            'title' => request('title'),
            'category' => request('category'),
            'body' => request('body')
        ]);
        return redirect('/');
    }
}
