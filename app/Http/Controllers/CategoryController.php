<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function addCategory(){
        $cat = Category::all();
        return view('blog_theme.pages.category', compact('cat'));
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


}
