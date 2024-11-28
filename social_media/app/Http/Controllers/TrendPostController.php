<?php

namespace App\Http\Controllers;

use App\Models\ActionLog;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrendPostController extends Controller
{
    public function index(){
        $data = ActionLog::select(
            'action_logs.post_id',
            'posts.title', // Specify the necessary columns from 'posts'
            'posts.desc',
            'posts.image',
            DB::raw('COUNT(action_logs.post_id) as post_count')
        )
        ->leftJoin('posts', 'posts.post_id', 'action_logs.post_id')
        ->groupBy('action_logs.post_id', 'posts.title', 'posts.desc','posts.image') // Add non-aggregated columns here
        ->get();

        return view('admin.trend_post.index',compact('data'));
    }

    public function trendDetail($id){
        $post = Post::where('post_id', $id)->first();
        return view('admin.trend_post.detail',compact('post'));
    }
}
