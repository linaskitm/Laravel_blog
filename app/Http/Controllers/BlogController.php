<?php

namespace App\Http\Controllers;

use App\Category;
use App\User;
use Gate;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function __construct(){
        $this->middleware('auth', ['except' => ['index', 'showFull']]);
    }

    public function index(){

        $posts = Post::paginate(3);
        $cat = Category::all();
        $users = User::all();
        $auth = Auth::user();
//        dd($auth);

        return view('blog_theme.pages.home', compact('posts','cat', 'users', 'auth'));
    }
    public function addPost(){

        $categories = Category::all();

        return view('blog_theme.pages.add-post', compact('categories'));
    }
    public function store(Request $request){
        $validateData = $request->validate([
            'title' => 'required|unique:posts|max:255',
            'body' => 'required',
            'category'=> 'required',
            'image'=>'mimes:jpeg, jpg, png, gif|required|max:10000'
        ]);

        $path = $request->file('image')->store('public/images');
        $filename = str_replace('public/', "", $path);
//        dd(Auth::id());
        Post::create([
            'title' => request('title'),
            'body' => request('body'),
            'category' => request('category'),
            'image' => $filename,
            'user_id' => Auth::id()
        ]);

        return redirect('/');
    }

    public function showFull(Post $post){
        return view('blog_theme.pages.post', compact('post'));
    }

    public function edit(Post $post){
        if(Gate::allows('update', $post))
        {

            return view('blog_theme.pages.edit', compact('post' ));
        }
        dd('klaida');

    }
    public function storeUpdate(Request $request, Post $post){
            Post::where('id', $post->id)->update($request->only(['title', 'category', 'body',]));
            return redirect('/post/'.$post->id);
    }

    public function delete(Post $post){
        if(Gate::allows('update', $post))
        {
            $post->delete();
            return redirect('/');
        }
        dd('klaida');
    }
//----- neveikia sitas
    public function showByCategory(Request $request){

        $posts = Post::with('categoryBy')->where('category', $request->category)->paginate(2);
        ;
       // dd($posts);
        return view('blog_theme.pages.category-one', compact('posts'));
    }
}
