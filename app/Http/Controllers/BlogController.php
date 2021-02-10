<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Post;

class BlogController extends Controller
{
    public function index(){

        $posts = Post::paginate(3);
        $cat = Category::all();

        return view('blog_theme.pages.home', compact('posts','cat'));
    }
    public function addPost(){

        $categories = Category::all();

        return view('blog_theme.pages.add-post', compact('categories'));
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

    public function showFull(Post $post){
        return view('blog_theme.pages.post', compact('post'));
    }

    public function edit(Post $post){
        return view('blog_theme.pages.edit', compact('post'));
    }
    public function storeUpdate(Request $request, Post $post){
            Post::where('id', $post->id)->update($request->only(['title', 'category', 'body']));
            return redirect('/post/'.$post->id);
    }

    public function delete(Post $post){
        $post->delete();
        return redirect('/');
    }
//----- neveikia sitas
    public function showByCategory(Request $request, Post $post1){

        $posts = Post::with('categoryBy')->where('category', $request->category)->get();
        $post1 = Post::paginate(2);
       // dd($posts);
        return view('blog_theme.pages.category-one', compact('posts', 'post1'));
    }
}
