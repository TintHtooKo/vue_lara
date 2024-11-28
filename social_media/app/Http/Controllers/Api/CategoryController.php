<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function categoryList(){
        $category = Category::select('category_id','title','desc')
                            ->get();
        return response()->json($category);
    }

    public function postSearch(Request $request){
        $category = Post::where('title','like','%'.$request->key.'%')->get();
        return response()->json($category);
    }

    public function categorySearch(Request $request){
        $category = Category::select('posts.*')
                                ->join('posts','categories.category_id','posts.category_id')
                                ->where('categories.title','like','%'.$request->key.'%')->get();
        return response()->json($category);
    }
}
