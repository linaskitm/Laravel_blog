<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function addCategory(){
        $categories = Category::all();
        return view('blog_theme.pages.category', compact('categories'));
    }

    public function storeCategory(Request $request){
        $validateData = $request->validate([
            'category'=> 'required'
        ]);
        Category::create([
            'category' => request('category')
        ]);
        return redirect('/');
    }

    public function deleteCategory (Category $category){
        $category->delete();
        return redirect('/add-category');
    }

    public function selectByCategory(Category $category){
        $posts = DB::table('categories')
            ->join('posts', 'categories.id', '=', 'posts.category')
            ->select('posts.id', 'posts.title', 'posts.body', 'user_id', 'posts.created_at', 'categories.category')
            ->where('categories.id', $category->id)
            ->paginate(2);

        $users = User::all();
        $auth = Auth::user();


        return view('blog_theme.pages.category-one', compact('posts','users', 'auth'));
    }



}
