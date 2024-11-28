<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function allPost(){
        $post = Post::all();
        return response()->json($post);
    }

    public function postDetail(Request $request){
        $id = $request->postId;
        $post = Post::where('post_id', $id)->first();
        return response()->json($post);
    }
}
